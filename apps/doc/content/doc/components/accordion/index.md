---
title: Accordion
description: A vertically stacked set of interactive headings that each reveal a section of content
priority: 0
---

Built on the native [`<details>` and `<summary>`](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details)
HTML elements, with exclusive mode relying on the `name` attribute, enhanced by a small
Stimulus controller for arrow-key navigation, disabled items and `change` events.

## Usage

<ComponentPreview name="usage"/>

## Examples

### Multiple

Allow several items to stay open at the same time with `multiple`.

<ComponentPreview name="multiple"/>

### Disabled item

<ComponentPreview name="disabled"/>

### Custom indicator

Add the optional `<twig:ui:Accordion:Indicator>` inside the header to take over
the indicator: its content replaces the default chevron, and the header stops
rendering its own.

<ComponentPreview name="custom-indicator"/>

### Indicator position

The indicator is pushed to the end of the header by default (`ms-auto`);
override it to place the icon before the text.

<ComponentPreview name="indicator-position"/>

### Nested

Accordions can be nested inside a panel. Each accordion only manages its own
items: exclusive mode is scoped per instance through its own `name` group, and
the Stimulus controller ignores items belonging to a nested instance.

<ComponentPreview name="nested"/>

### Borders

Wrap the accordion in a border by adding `rounded-lg border` to the root, then
`border-b px-4 last:border-b-0` to each item.

<ComponentPreview name="borders"/>

### RTL

Set `dir="rtl"` on the root to render the accordion for right-to-left languages.
The direction is applied to the markup and forwarded to the Zag.js machine, and
the default styles use logical properties so text and the indicator follow the
reading direction.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Accordion>`

| Prop | Type | Description |
|---|---|---|
| `multiple` | `boolean` | Allow several items to stay open at the same time. Defaults to `false` |
| `disabled` | `boolean` | Disable every item of the accordion. Defaults to `false` |
| `value` | `string[]` | The values of the items open by default. Only the first one is kept when `multiple` is `false`. Defaults to `[]` |
| `dir` | `'ltr'` \| `'rtl'` | The reading direction. Defaults to `ltr` |
| `name` | `string` | The `name` attribute shared by the items in exclusive mode. Defaults to an auto-generated value |
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The accordion items |

| Event | Detail | Description |
|---|---|---|
| `hui-accordion:change` | `{ value: string[] }` | Fired when an item is toggled, with the values of the open items |

### `<twig:ui:Accordion:Item>`

| Prop | Type | Description |
|---|---|---|
| `value` | `string` | The unique value identifying the item. Required |
| `disabled` | `boolean` | Disable this item. Defaults to `false` |

| Block | Description |
|---|---|
| `content` | The item header and panel |

### `<twig:ui:Accordion:Header>`

Renders the `<summary>` element of the item.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag of the heading wrapping the content. Defaults to `h3` |

| Block | Description |
|---|---|
| `content` | The header label. The default indicator is appended unless the content brings its own `<twig:ui:Accordion:Indicator>` |

### `<twig:ui:Accordion:Panel>`

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The panel content |

### `<twig:ui:Accordion:Indicator>`

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `span` |

| Block | Description |
|---|---|
| `content` | The indicator icon. Defaults to a chevron |
