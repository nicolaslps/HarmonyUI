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
- Tailwind CSS v4, set up through [Symfony AssetMapper](https://symfony.com/doc/current/frontend/asset_mapper.html) (recommended) or your own Node-based pipeline
- [symfony/stimulus-bundle](https://symfony.com/bundles/StimulusBundle/current/index.html) to enable interactive components

## Installation

### 1. Install the package

```bash
composer require harmonyui/ui
```

> HarmonyUI is pre-1.0: each `0.x` minor release may contain breaking changes.
> A caret constraint like `^0.1` keeps you on non-breaking releases, review the
> changelog before bumping to the next minor.

### 2. Import the styles

Import the bundle's stylesheet from your app's CSS entry point, and tell
Tailwind where to look for the classes used by HarmonyUI's templates and
component styles: both live in `vendor/`, which Tailwind ignores by default.

```css
/* assets/styles/app.css */
@import "tailwindcss";
@import "../../vendor/harmonyui/ui/assets/styles/harmonyui.css";

@source "../../vendor/harmonyui/ui/config/styles/default";
@source "../../vendor/harmonyui/ui/templates";
```

### 3. Build your CSS

With Symfony's TailwindBundle, build (or watch) the stylesheet:

```bash
php bin/console tailwind:build --watch
```

Using Webpack Encore or another Node-based setup instead? Run your usual
Tailwind v4 build, nothing else changes.

### 4. Enable interactive components

Interactive components ship their own Stimulus controllers. Install
`symfony/stimulus-bundle` if your project doesn't have it yet, it discovers
and registers HarmonyUI's controllers automatically:

```bash
composer require symfony/stimulus-bundle
```

## Use your first component

That's it, HarmonyUI is ready. Drop a component in any template:

<ComponentPreview name="usage"/>

## Next steps

Browse the [component library](/docs/components) to see what's available.
