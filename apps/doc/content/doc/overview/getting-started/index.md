---
title: Getting started
description: Install HarmonyUI in a Symfony project and render your first component.
priority: 10
---

HarmonyUI is a set of Twig components for Symfony, styled with Tailwind CSS and
made interactive with small Stimulus controllers. Components ship with sensible
defaults and are extensible: override or extend any variant through the
bundle's design tokens and per-component configuration, no rewriting required.

## Requirements

- PHP 8.4+
- Symfony 7.0+ or 8.0+
- A Node-based build tool: [Webpack Encore](https://symfony.com/doc/current/frontend.html) or [Symfony Reprise](https://github.com/symfony/reprise)
- Tailwind CSS v4, installed through your Node package manager (npm, pnpm, yarn)

> [!NOTE]
> Symfony AssetMapper isn't supported yet, that integration is planned for a
> later release.

> [!WARNING]
> Reprise is still pre-1.0 (`v0.7` at the time of writing) and under active
> development. Check its [changelog](https://github.com/symfony/reprise/releases)
> before relying on it in production, Webpack Encore remains the safer choice
> if you need stability today.

## Installation

### 1. Install the package

```bash
composer require harmonyui/ui
```

> HarmonyUI is pre-1.0, breaking changes may land in any `0.x` release.

### 2. Install the JS dependencies

`@harmonyui/ui` isn't published to npm, it ships inside the Composer package
instead. Add it to your `package.json` as a `file:` dependency pointing at the
copy Composer just installed in `vendor/`:

```json
// package.json
{
    "dependencies": {
        "@harmonyui/ui": "file:vendor/harmonyui/ui/assets"
    }
}
```

Then install:

```bash
npm install
```

Interactive components ship their own Stimulus controllers under this package without extra configuration needed as
they're wired up automatically.

### 3. Import the styles

Import the package's stylesheet from your app's CSS entry point, and tell
Tailwind where to look for the classes used by HarmonyUI's templates and
component styles: both live in `vendor/`, which Tailwind ignores by default.

```css
/* assets/styles/app.css */
@import "tailwindcss";
@import "@harmonyui/ui/styles/harmonyui.css";

@source "../../vendor/harmonyui/ui/templates";
@source "../../vendor/harmonyui/ui/config/styles";

@custom-variant dark (&:where(.dark, .dark *):where(:not(.light, .light *)));
```

The `dark` custom variant is required for HarmonyUI's dark mode styles to work.

### 4. Build your assets

Run whichever build tool you chose:

```bash
# Symfony Reprise (Vite)
npx vite build

# Webpack Encore
npm run build
```

## Use your first component

That's it, HarmonyUI is ready. Drop a component in any template:

<ComponentPreview name="usage"/>

## Next steps

Browse the [component library](/docs/components) to see what's available.
