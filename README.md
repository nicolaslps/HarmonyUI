# HarmonyUI

HarmonyUI is a UI component library for Symfony. It provides beautifully styled Twig components, built on Tailwind CSS and extensible through design tokens and per-component configuration.

Read the documentation at [harmonyui.org](https://harmonyui.org).

## Installation

```bash
composer require harmonyui/ui
```

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
