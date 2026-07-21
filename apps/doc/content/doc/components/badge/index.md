---
title: Badge
description: Display a badge with different variants and styles.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Secondary

Use the `secondary` variant for a lower-emphasis, neutral label.

<ComponentPreview name="secondary"/>

### Outline

Use the `outline` variant when the badge should blend into the background.

<ComponentPreview name="outline"/>

### Info

Use the `info` variant for neutral, informative labels.

<ComponentPreview name="info"/>

### Success

Use the `success` variant to indicate a positive or completed state.

<ComponentPreview name="success"/>

### Warning

Use the `warning` variant to draw attention to something that needs care.

<ComponentPreview name="warning"/>

### Danger

Use the `danger` variant for errors and failed states.

<ComponentPreview name="danger"/>

### Sizes

<ComponentPreview name="sizes"/>

### With icon

Add `data-icon="inline-start"` or `data-icon="inline-end"` on the icon for
the correct spacing.

<ComponentPreview name="with-icon"/>

### As a link

Set `as="a"` to render the badge as a link.

<ComponentPreview name="as-link"/>

### Custom colors

Badges are styled with plain utility classes, so recoloring one is just a
matter of overriding the border, background and text colors.

<ComponentPreview name="custom-colors"/>

### RTL

Set `dir="rtl"` on a wrapping element to render badges for right-to-left
languages.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Badge>`

| Prop | Type | Description |
|---|---|---|
| `variant` | `'default'` \| `'secondary'` \| `'outline'` \| `'danger'` \| `'info'` \| `'success'` \| `'warning'` | The visual style variant. Defaults to `default` |
| `size` | `'sm'` \| `'md'` \| `'lg'` | The size of the badge. Defaults to `md` |
| `as` | `string` | The HTML tag to render. Defaults to `span` |

| Block | Description |
|---|---|
| `content` | The badge content, usually text and an optional icon |
