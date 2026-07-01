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

# --- Production runtime ---
FROM base AS frankenphp_prod

# FrankenPHP worker runtime for Symfony (enables FRANKENPHP_CONFIG=worker ...)
ENV FRANKENPHP_CONFIG="worker ./public/index.php"

COPY --from=vendor /app/vendor ./vendor
COPY apps/doc/ ./

RUN composer dump-autoload --no-dev --optimize --classmap-authoritative \
 && composer dump-env prod \
 && php bin/console cache:clear \
 && php bin/console importmap:install \
 && php bin/console tailwind:build --minify \
 && php bin/console asset-map:compile

# FrankenPHP serves ./public; SERVER_NAME / ports are provided by Kamal env.
