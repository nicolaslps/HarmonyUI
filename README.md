<p align="center">
  <img src=".github/logo-light.svg" alt="HarmonyUI logo" width="72" height="72">
</p>

<h1 align="center">HarmonyUI</h1>

<p align="center">
  A UI component library for Symfony, with beautifully styled Twig components built on Tailwind CSS, Stimulus and Zag.js.
</p>

<p align="center">
  <a href="https://harmonyui.org"><strong>Documentation</strong></a>
  ·
  <a href="https://github.com/nicolaslps/HarmonyUI/issues">Issues</a>
</p>

<p align="center">
  <img alt="Status" src="https://img.shields.io/badge/status-pre--1.0-orange">
  <img alt="PHP" src="https://img.shields.io/badge/php-%3E%3D8.4-777bb4">
  <img alt="Symfony" src="https://img.shields.io/badge/symfony-7%20%7C%208-000000">
  <img alt="License" src="https://img.shields.io/badge/license-MIT-blue">
</p>

---

## Installation

```bash
composer require harmonyui/ui
```

> [!WARNING]
> HarmonyUI is pre-1.0: the API is not frozen yet, and each 0.x minor release (0.1 to 0.2, for example) may contain breaking changes. A caret constraint like `^0.1` keeps you on non-breaking releases, so review the changelog before bumping to the next minor.

## Repository structure

This is the main HarmonyUI monorepo. Issues and pull requests belong here.

```
.
├── apps/
│   └── doc/        Documentation site (harmonyui.org)
└── packages/
    └── ui/         The Symfony bundle, published as harmonyui/ui
```

The `harmonyui/ui` package is distributed as a read-only sub-tree split of `packages/ui`.

## License

The `harmonyui/ui` package is released under the [MIT license](packages/ui/LICENSE).
