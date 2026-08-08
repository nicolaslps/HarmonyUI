---
title: Badge
description: Display a badge with different variants and styles.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Soft

<ComponentPreview name="soft"/>

### Solid

Use the `solid` variant for a stronger, high-emphasis label.

<ComponentPreview name="solid"/>

### Outline

Use the `outline` variant when the badge should blend into the background.
The `color` prop tints the border and text.

<ComponentPreview name="outline"/>

### Sizes

<ComponentPreview name="sizes"/>

### With icon

Add `data-icon="inline-start"` or `data-icon="inline-end"` on the icon for
the correct spacing.

<ComponentPreview name="with-icon"/>

### As a link

Set `as="a"` to render the badge as a link.

<ComponentPreview name="as-link"/>

### RTL

Set `dir="rtl"` on a wrapping element to render badges for right-to-left
languages.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Badge>`

| Prop | Type | Description |
|---|---|---|
| `variant` | `'soft'` \| `'solid'` \| `'outline'` | The visual style variant. Defaults to `soft` |
| `color` | `string` | Any Tailwind color name, such as `'purple'` or `'cyan'`. Defaults to `'neutral'` |
| `size` | `'sm'` \| `'md'` \| `'lg'` | The size of the badge. Defaults to `md` |
| `as` | `string` | The HTML tag to render. Defaults to `span` |

| Block | Description |
|---|---|
| `content` | The badge content, usually text and an optional icon |
