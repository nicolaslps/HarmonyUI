---
title: Separator
description: Visually or semantically separates content.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Vertical

Set `orientation="vertical"` to render a vertical line. The parent needs an
explicit height, since the separator stretches to fill it.

<ComponentPreview name="vertical"/>

### With text

Place text inside the separator to render a labeled divider, such as the
"OR" split in a login form. The line splits into two segments around the
label automatically.

<ComponentPreview name="with-text"/>

### Non-decorative

By default the separator is purely visual and hidden from assistive
technology. Set `:decorative="false"` when it marks an actual boundary
between sections, so screen readers announce it.

<ComponentPreview name="non-decorative"/>

### RTL

Set `dir="rtl"` on a wrapping element to render the separator for
right-to-left languages.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Separator>`

| Prop | Type | Description |
|---|---|---|
| `orientation` | `'horizontal'` \| `'vertical'` | The direction of the line. Defaults to `horizontal` |
| `decorative` | `bool` | Whether the separator is purely visual. Set to `false` to expose it to assistive technology as a semantic boundary. Defaults to `true` |
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | Optional label rendered between two line segments. Leave empty for a plain line |
