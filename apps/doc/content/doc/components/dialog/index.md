---
title: Dialog
description: A dialog is an overlay shown above other content in an application.
priority: 0
---

Built on the [Zag.js dialog machine](https://zagjs.com/components/react/dialog), opened and closed
through the native [`command`/`commandfor`](https://developer.mozilla.org/en-US/docs/Web/API/Invoker_Commands_API)
attributes, so a trigger can live inside the `Dialog` or anywhere else on the page.

## Usage

<ComponentPreview name="usage"/>

## Examples

### Multiple triggers

`Dialog:Trigger` can be used more than once inside the same `Dialog`; every instance opens it.

<ComponentPreview name="multiple-triggers"/>

### Detached triggers

Give the dialog an explicit `id` and point a `command="--show-modal"` button at it with
`commandfor`, from anywhere on the page. `Dialog:Trigger` uses the same attributes under the hood,
so it's a single API regardless of where the trigger lives.

<ComponentPreview name="detached-triggers"/>

## API Reference

### `<twig:ui:Dialog>`

| Prop | Type | Description |
|---|---|---|
| `open` | `boolean` | Whether the dialog is open on initial render. Defaults to `false` |
| `id` | `string` | The dialog's DOM id, used as the `commandfor` target. Defaults to an auto-generated value |

| Block | Description |
|---|---|
| `content` | The dialog structure, typically one or more `Dialog:Trigger` and a `Dialog:Content` |

### `<twig:ui:Dialog:Trigger>`

Exposes a `dialog_trigger_attrs` variable (`command="--show-modal"`, `commandfor="<dialog id>"`) to
spread onto the element that opens the dialog. Can be used more than once inside the same `Dialog`.
Only useful when the trigger is nested inside the `Dialog`; a remote trigger sets
`command`/`commandfor` directly (see the example above).

| Block | Description |
|---|---|
| `content` | The trigger element (e.g. a `Button` with `{{ ...dialog_trigger_attrs }}`) |

### `<twig:ui:Dialog:Content>`

Renders the backdrop, positioner and content parts of the dialog.

| Block | Description |
|---|---|
| `content` | The dialog content |
