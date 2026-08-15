---
title: Popover
description: A popover is a floating panel that displays content over other page elements.
priority: 0
---

Built on the [Zag.js popover machine](https://zagjs.com/components/react/popover), anchored to its
trigger through [Floating UI](https://floating-ui.com).

## Usage

<ComponentPreview name="usage"/>

## Examples

### Open by default

<ComponentPreview name="default-open"/>

### Placement

<ComponentPreview name="placement"/>

### Offset

<ComponentPreview name="offset"/>

### Preventing flip

<ComponentPreview name="should-flip"/>

### Close button

<ComponentPreview name="with-close-button"/>

### Trigger indicator

<ComponentPreview name="indicator"/>

### Modal

<ComponentPreview name="modal"/>

### Matching the trigger's width

<ComponentPreview name="same-width"/>

### Right-to-left

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Popover>`

| Prop | Type | Description |
|---|---|---|
| `open` | `boolean` | Whether the popover is open on initial render. Defaults to `false` |
| `id` | `string` | The popover's DOM id, used to scope its trigger(s) and content. Defaults to an auto-generated value |
| `modal` | `boolean` | Whether the popover traps focus, blocks scroll, and hides the rest of the page from screen readers while open. Defaults to `false` |
| `portalled` | `boolean` | Whether the content is moved to the end of `<body>` on connect. Defaults to `true` |
| `autoFocus` | `boolean` | Whether to focus the first focusable element inside `Popover:Content` when it opens. Add `autofocus` (or `data-autofocus`) to a specific element to focus it instead. Defaults to `true` |
| `closeOnInteractOutside` | `boolean` | Whether a pointer interaction outside `Popover:Content` closes the popover. Defaults to `true` |
| `closeOnEscape` | `boolean` | Whether pressing escape closes the popover. Defaults to `true` |
| `placement` | `Placement` | Where to place the content relative to its trigger, e.g. `'bottom'`, `'top-start'`. Defaults to `'bottom'` |
| `offset` | `number` | The gap, in pixels, between the trigger and the content. Defaults to `6` |
| `shouldFlip` | `boolean` | Whether to flip to the opposite side when the content would overflow the viewport. Defaults to `true` |
| `sameWidth` | `boolean` | Whether to make the content the same width as the trigger. Defaults to `false` |
| `ariaLabel` | `string` | Accessible name for `Popover:Content` when it doesn't wire up a `data-part="title"` element. Defaults to `null` |
| `dir` | `'ltr' \| 'rtl'` | Text direction applied to every popover part. Defaults to the page's `<html dir>` |
| `as` | `string` | The element to render the root wrapper as. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The popover structure: one or more `Popover:Trigger`, an optional `Popover:Anchor`, and a `Popover:Content` |

### `<twig:ui:Popover:Trigger>`

Exposes `popover_trigger_attrs` to spread onto the trigger element. Use several with different
`value`s to share one popover across many triggers. `aria-expanded` also scales it down slightly
while open, the same press feedback `Dialog` triggers get.

| Prop | Type | Description |
|---|---|---|
| `value` | `string` | Identifies this trigger among several inside the same `Popover`. Defaults to `null` |

| Block | Description |
|---|---|
| `content` | The trigger element (e.g. a `Button` with `{{ ...popover_trigger_attrs }}`) |

### `<twig:ui:Popover:Anchor>`

Decouples the positioning reference from the trigger, e.g. opening from a toolbar button but
pointing at selected text.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render. Defaults to `span` |

| Block | Description |
|---|---|
| `content` | The reference element |

### `<twig:ui:Popover:Content>`

Renders the positioner and content parts. There's no `width` prop; pass a literal `w-*` in `class`.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render the content part as. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The popover content |

### `<twig:ui:Popover:Indicator>`

Fades and recolors based on its own `data-state="open" | "closed"`. Layer on your own
`data-[state=open]:*` classes (e.g. a rotate) for state-driven motion beyond the default fade.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The element to render. Defaults to `span` |

| Block | Description |
|---|---|
| `content` | The indicator's content, e.g. an icon. Empty by default |

### `<twig:ui:Popover:Close>`

Exposes `popover_close_attrs` (`data-scope="popover" data-part="close-trigger"
data-owner="<popover id>"`) to spread onto a custom dismiss element. Defaults to a ghost icon
button in the top-right corner of `Popover:Content`.

| Block | Description |
|---|---|
| `content` | The dismiss element. Defaults to a `Button` with `{{ ...popover_close_attrs }}` |
