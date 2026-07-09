#!/usr/bin/env bash

# Publishes the packages/ui subtree to its read-only mirror repository
# (git@github.com:nicolaslps/ui.git), the repo Packagist is plugged into.
#
# It extracts the commits touching packages/ui into a standalone history
# where the package is the repo root, then force-pushes it to the mirror.
# When source-ref is a tag, the tag is also recreated on the extracted
# commit, which is what makes Packagist publish it as a new version.
#
# Usage: bin/split-ui.sh [source-ref] [target-branch]
#   source-ref     monorepo branch or tag to extract from (default: main)
#   target-branch  mirror branch that receives the result (default: main)
#
# Day-to-day sync, no release: pushes the current state of main
# to the mirror's main. Users only get dev-main, no new version.
#   bin/split-ui.sh
#
# Releasing a new version: tag the monorepo first, then split from
# that tag. The mirror's main branch is updated and the tag is
# published, so Packagist exposes version 2.1.0.
#   git tag v2.1.0
#   git push origin v2.1.0
#   bin/split-ui.sh v2.1.0
#
# Bugfix on a maintained legacy version: commit on the monorepo's
# legacy branch, tag it, then split from that tag towards the
# same-named mirror branch. Users on ^1.0 get the fix, main is untouched.
#   git switch 1.x
#   git tag v1.0.6
#   git push origin v1.0.6
#   bin/split-ui.sh v1.0.6 1.x

set -euo pipefail

PREFIX="packages/ui"
MIRROR_URL="git@github.com:nicolaslps/ui.git"
SOURCE_REF="${1:-main}"
TARGET_BRANCH="${2:-main}"

cd "$(git rev-parse --show-toplevel)"

if ! git rev-parse --verify --quiet "$SOURCE_REF" >/dev/null; then
    echo "error: unknown ref '$SOURCE_REF'" >&2
    exit 1
fi

echo "Splitting $PREFIX from $SOURCE_REF..."
SPLIT_SHA="$(git subtree split --prefix="$PREFIX" "$SOURCE_REF")"

echo "Pushing $SPLIT_SHA to $MIRROR_URL ($TARGET_BRANCH)..."
# The mirror only ever receives rewritten history, so a force push is expected.
git push --force "$MIRROR_URL" "$SPLIT_SHA:refs/heads/$TARGET_BRANCH"

# Monorepo tags point at monorepo commits, so the tag must be recreated
# on the split commit for Packagist to see the release.
if git rev-parse --verify --quiet "refs/tags/$SOURCE_REF" >/dev/null; then
    echo "Pushing tag $SOURCE_REF..."
    git push "$MIRROR_URL" "$SPLIT_SHA:refs/tags/$SOURCE_REF"
fi

echo "Done."
