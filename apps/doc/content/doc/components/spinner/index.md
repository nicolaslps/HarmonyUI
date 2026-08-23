---
title: Spinner
description: An indicator that content is loading.
priority: 0
---
## Usage

<ComponentPreview name="usage"/>

## Examples

### Sizes

Use the `size-*` utility class to change the size of the spinner.

<ComponentPreview name="sizes"/>

### Color

The spinner uses the current text color, so tint it with any `text-*` class.

<ComponentPreview name="color"/>

### Custom icon

Set `icon` to any icon name to change the spinning glyph.

<ComponentPreview name="icon"/>

### In a button

Add `data-icon="inline-start"` for the correct spacing.

<ComponentPreview name="button"/>

## API Reference

### `<twig:ui:Spinner>`

| Prop | Type | Description |
|---|---|---|
| `icon` | `string` | The icon to spin. Defaults to `'lucide:loader-2'` |
| `label` | `string` | The accessible label announced to assistive technologies. Defaults to `'Loading'` |
