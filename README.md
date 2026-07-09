# HarmonyUI

HarmonyUI is a UI component library for Symfony. It provides beautifully styled Twig components, built on Tailwind CSS and extensible through design tokens and per-component configuration.

Read the documentation at [harmonyui.org](https://harmonyui.org).

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
