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

See the [installation guide](https://harmonyui.org/docs/overview/installation) on the documentation site.

> [!WARNING]
> HarmonyUI is pre-1.0: the API is not frozen yet, and each 0.x minor release (0.1 to 0.2, for example) may contain breaking changes. A caret constraint like `^0.1` keeps you on non-breaking releases, so review the changelog before bumping to the next minor.

## Roadmap

The list below is the set of components and quality gates needed to reach a solid, stable `v1.0`, broken into small releases.

### v0.9.0 — Selection controls

- [ ] Radio
- [ ] Radio Group
- [ ] Checkbox Group
- [ ] Toggle
- [ ] Toggle Group

### v0.10.0 — Range & feedback

- [ ] Slider
- [ ] Progress
- [ ] Toast (Sonner)

### v0.11.0 — Carousel

- [ ] Carousel

### v0.12.0 — Content primitives

- [ ] Aspect Ratio
- [ ] Kbd
- [ ] Empty
- [ ] Item

### v0.13.0 — Layout & disclosure

- [ ] Collapsible
- [ ] Scroll Area
- [ ] Hover Card

### v0.14.0 — Search & advanced inputs

- [ ] Combobox
- [ ] Number Input
- [ ] Pin Input

### v0.15.0 — Navigation I

- [ ] Breadcrumb
- [ ] Pagination

### v0.16.0 — Navigation II

- [ ] Context Menu
- [ ] Menubar
- [ ] Navigation Menu

### v0.17.0 — Sidebar

- [ ] Sidebar (collapsible app shell navigation, geared towards Symfony back-office/admin apps)

### v0.18.0 — Dates

- [ ] Calendar
- [ ] Date Picker

### v0.19.0 — Chart

- [ ] Chart

### v0.20.0 — Quality gate

- [ ] Component test suite for every existing component (rendering + Stimulus/Zag.js behavior)
- [ ] Visual regression testing
- [ ] CI pipeline enforcing lint, PHPStan, tests and visual regression on every pull request

### v0.21.0 — AI skills

- [ ] Skill system so AI agents (Claude, Cursor, etc.) can scaffold and use HarmonyUI components correctly

### v0.XX.X — Unplanned

- [ ] Room for anything not yet identified above, versions can be inserted here as needed

### v1.0.0 — Stable

- [ ] API freeze and semver commitment
- [ ] Full documentation coverage audit across all components
- [ ] Changelog

Not planned for v1: 
Data Table, Command palette, File Upload, Resizable/Splitter, Tree View, Steps, Editable, Tour
and other niche Zag.js machines (Color Picker, QR Code, Signature Pad, Angle Slider, Tags Input, Timer). 
These may land post-1.0.

Missing a component you need? Open an [issue](https://github.com/nicolaslps/HarmonyUI/issues) 
or a short RFC describing the use case, it can reshuffle this roadmap.

## License

The `harmonyui/ui` package is released under the [MIT license](packages/ui/LICENSE).
