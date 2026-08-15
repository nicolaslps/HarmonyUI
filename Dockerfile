# syntax=docker/dockerfile:1
#
# FrankenPHP image for the `apps/doc` Symfony application.
#
# IMPORTANT: the build context MUST be the monorepo root, because `apps/doc`
# depends on `packages/*` through a Composer path repository (`../../packages/*`).

FROM dunglas/frankenphp:1-php8.4 AS base

RUN install-php-extensions intl opcache zip

COPY --from=composer/composer:2-bin /composer /usr/bin/composer

# Copy path-repository packages into vendor/ instead of symlinking them
ENV APP_ENV=prod \
    COMPOSER_MIRROR_PATH_REPOS=1

WORKDIR /app

# --- Dependencies (cached layer) ---
FROM base AS vendor

# Keep the monorepo layout so the `../../packages/*` path repository resolves.
COPY packages/ /packages/
COPY apps/doc/composer.json apps/doc/composer.lock apps/doc/symfony.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction --no-progress

# --- JS assets (Vite/Reprise build) ---
FROM node:22-bookworm-slim AS assets

RUN corepack enable

WORKDIR /app

# @harmonyui/ui isn't published to npm: it's resolved through the pnpm
# workspace (packages/ui/assets), same as the Composer path repository above.
COPY pnpm-workspace.yaml pnpm-lock.yaml package.json ./
COPY apps/doc/package.json apps/doc/vite.config.ts ./apps/doc/
COPY packages/ui/assets/ ./packages/ui/assets/
RUN pnpm install --frozen-lockfile --ignore-scripts

COPY apps/doc/assets/ ./apps/doc/assets/
# app.css's `@source` directives scan these for Tailwind classes (component
# style overrides, page templates, doc demo snippets) - without them the
# production stylesheet silently ships missing large chunks of utilities.
COPY apps/doc/templates/ ./apps/doc/templates/
COPY apps/doc/content/ ./apps/doc/content/
COPY apps/doc/config/harmony_ui/ ./apps/doc/config/harmony_ui/
COPY apps/doc/src/ ./apps/doc/src/
# Tailwind's app.css also reaches into vendor/harmonyui/ui (composer's
# mirrored copy) for the package's default theme and templates (`@source`).
COPY --from=vendor /app/vendor/harmonyui ./apps/doc/vendor/harmonyui
RUN pnpm --filter doc build

# --- Open Graph rendering dependencies (bookworm to match the glibc runtime) ---
FROM node:22-bookworm-slim AS og

WORKDIR /app/og

COPY apps/doc/og/package.json apps/doc/og/package-lock.json ./
RUN npm ci

COPY apps/doc/og/ ./

# --- Production runtime ---
FROM base AS frankenphp_prod

# FrankenPHP worker runtime for Symfony (enables FRANKENPHP_CONFIG=worker ...)
ENV FRANKENPHP_CONFIG="worker ./public/index.php"

COPY --from=vendor /app/vendor ./vendor
COPY apps/doc/ ./
COPY --from=assets /app/apps/doc/public/build ./public/build

# /og.png renders unknown cards on request through `node og/render.mjs`;
# app:og:warm pre-renders every known page below so crawlers never wait.
COPY --from=og /usr/local/bin/node /usr/local/bin/node
COPY --from=og /app/og ./og

RUN composer dump-autoload --no-dev --optimize --classmap-authoritative \
 && composer dump-env prod \
 && php bin/console cache:clear \
 && php bin/console app:og:warm

# FrankenPHP serves ./public; SERVER_NAME / ports are provided by Kamal env.
