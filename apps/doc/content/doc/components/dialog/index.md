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

### Nested dialogs

A `Dialog` can be opened from inside another `Dialog:Content`, no extra wiring needed: each
`Dialog` is an independent instance, and escape, outside clicks, and focus trapping all apply to
whichever one is on top. The parent dialog scales down and its backdrop darkens for every level of
nesting, so the stack stays legible.

<ComponentPreview name="nested-dialogs"/>

### No close button

<ComponentPreview name="no-close-button"/>

### Custom close button

Override `Dialog:Close`'s `content` block to render your own dismiss element instead of the
default ghost icon button. Spread `dialog_close_attrs` onto it to keep the same
`--close`/`commandfor` wiring.

<ComponentPreview name="custom-close-button"/>

### Close confirmation

Escape, an outside click, and the `--close` command all dispatch a cancelable
`hui:dialog:beforeclose` event on the dialog element first. Call `event.preventDefault()` on it to
keep the dialog open, for example to show a nested confirm dialog instead.

<ComponentPreview name="close-confirmation"/>

### Scrolling inside

Cap `Dialog:Content` with a `max-h-*` and split it into a fixed header/footer around an
`overflow-y-auto` region, so the dialog stays fully on screen and only its content scrolls.

<ComponentPreview name="scroll-inside"/>

### Scrolling outside

For content that should keep growing instead, make the positioner itself scrollable so the page
scrolls around the dialog and it can extend past the viewport instead of being clipped. The
positioner is portaled to `<body>` on connect, so it can't be targeted with an ancestor selector
from the `Dialog` root; target it by `data-owner` (the dialog's `id`) instead.

<ComponentPreview name="scroll-outside"/>

## Focus management

By default, opening a `Dialog` focuses `Dialog:Content` itself rather than the first focusable
element inside it, so a leading `Dialog:Close` button (or a destructive footer action) never
grabs focus by accident. To focus a specific element instead, add `autofocus` (or `data-autofocus`)
to it, no matter where it sits in the markup:

<ComponentPreview name="initial-focus"/>

Closing the dialog returns focus to whatever had it before the dialog opened, typically the
trigger. To send focus somewhere else instead, set `data-dialog-final-focus` **to the dialog's
`id`** on the element that should receive it, anywhere on the page (not necessarily inside
`Dialog:Content`, which is hidden once closed). Scoping it by `id` rather than just marking an
element means several dialogs on the same page, each with their own final-focus target, never
collide with each other:

<ComponentPreview name="final-focus"/>

## API Reference

### `<twig:ui:Dialog>`

| Prop | Type | Description |
|---|---|---|
| `open` | `boolean` | Whether the dialog is open on initial render. Defaults to `false` |
| `id` | `string` | The dialog's DOM id, used as the `commandfor` target. Defaults to an auto-generated value |
| `role` | `'dialog' \| 'alertdialog'` | The content part's ARIA role. Use `alertdialog` for interruptive confirmations. Defaults to `'dialog'` |
| `preventScroll` | `boolean` | Whether to lock body scroll while the dialog is open. Defaults to `true` |
| `closeOnInteractOutside` | `boolean` | Whether a pointer interaction outside `Dialog:Content` closes the dialog. Defaults to `true` |
| `closeOnEscape` | `boolean` | Whether pressing escape closes the dialog. Defaults to `true` |
| `modal` | `boolean` | Whether the dialog traps focus inside itself. Defaults to `true`. Doesn't affect `preventScroll` or `closeOnInteractOutside`, which stay controlled by their own props |
| `ariaLabel` | `string` | Accessible name for `Dialog:Content` when it doesn't render a `Dialog:Title`. Defaults to `null` |

For an interruptive confirmation that can only be dismissed through an explicit action, use
[`AlertDialog`](/docs/components/alert-dialog), a preset over these props.

| Block | Description |
|---|---|
| `content` | The dialog structure, typically one or more `Dialog:Trigger` and a `Dialog:Content` |

| Event | Description |
|---|---|
| `hui:dialog:beforeclose` | Cancelable. Dispatched before escape, an outside click, or `--close` dismiss the dialog. Call `event.preventDefault()` to keep it open |

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

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render the content part as. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The dialog content |

### `<twig:ui:Dialog:Header>`

Lays out a title and description stacked at the top of the dialog.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | Typically a `Dialog:Title` and a `Dialog:Description` |

### `<twig:ui:Dialog:Title>`

The dialog's accessible name. Its `id` is wired to the content's `aria-labelledby` automatically.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The title text |

### `<twig:ui:Dialog:Description>`

The dialog's accessible description. Its `id` is wired to the content's `aria-describedby`
automatically.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The description text |

### `<twig:ui:Dialog:Footer>`

Right-aligns actions at the bottom of the dialog.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | Typically one or more `Button` elements |

### `<twig:ui:Dialog:Close>`

Exposes a `dialog_close_attrs` variable (`command="--close"`, `commandfor="<dialog id>"`) to spread
onto a custom dismiss element, same mechanism as `Dialog:Trigger`. Defaults to a ghost icon button
with an `x` icon, positioned in the top-right corner of `Dialog:Content`.

| Block | Description |
|---|---|
| `content` | The dismiss element. Defaults to a `Button` with `{{ ...dialog_close_attrs }}` |
