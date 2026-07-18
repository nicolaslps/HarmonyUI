#!/usr/bin/env sh
# Validates a commit message header against Conventional Commits.
# https://www.conventionalcommits.org/en/v1.0.0/
# Usage: check_commit_msg "<first line of message>"

TYPES="feat|fix|docs|style|refactor|perf|test|build|ci|chore|revert"
PATTERN="^($TYPES)(\([a-z0-9][a-z0-9._-]*\))?!?: .{1,100}$"

check_commit_msg() {
    header="$1"

    # Allow git-generated messages
    case "$header" in
        "Merge "*|"Revert "*|"fixup! "*|"squash! "*) return 0 ;;
    esac

    echo "$header" | grep -qE "$PATTERN"
}

print_commit_msg_help() {
    cat >&2 <<EOF

  Invalid commit message:
    $1

  Expected format (Conventional Commits):
    <type>(<scope>)?: <subject>

  Types: feat, fix, docs, style, refactor, perf, test, build, ci, chore, revert

  Examples:
    feat: add Button outline variants
    fix(ui): prevent Alert from rendering empty title
    docs(button): document RTL support
    feat!: drop the color prop on Alert

EOF
}
