---
title: Alert dialog
description: A modal dialog that interrupts the user with important information requiring immediate attention or action.
priority: 0
---

A thin preset over [`Dialog`](/docs/components/dialog): `role="alertdialog"`, and
`closeOnInteractOutside`/`closeOnEscape` forced to `false` so the user has to pick an explicit
action to dismiss it. Everything inside is regular `Dialog:*` subcomponents.

## Usage

<ComponentPreview name="usage"/>

## API Reference

### `<twig:ui:AlertDialog>`

| Prop | Type | Description |
|---|---|---|
| `open` | `boolean` | Whether the dialog is open on initial render. Defaults to `false` |
| `id` | `string` | The dialog's DOM id, used as the `commandfor` target. Defaults to an auto-generated value |

| Block | Description |
|---|---|
| `content` | The dialog structure, built from `Dialog:Trigger`, `Dialog:Content`, `Dialog:Header`, `Dialog:Title`, `Dialog:Description` and `Dialog:Footer` — see the [`Dialog`](/docs/components/dialog) reference for each |
