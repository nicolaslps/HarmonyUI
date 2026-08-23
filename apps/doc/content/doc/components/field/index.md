---
title: Field
description: Build accessible forms with field validation, labels, descriptions, and error handling.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Group

<ComponentPreview name="group"/>

### Horizontal

<ComponentPreview name="horizontal"/>

### Description

<ComponentPreview name="description"/>

### Invalid

<ComponentPreview name="invalid"/>

### Disabled

<ComponentPreview name="disabled"/>

## API Reference

### `<twig:ui:Field>`

| Prop | Type | Description |
|---|---|---|
| `orientation` | `'vertical'` \| `'horizontal'` \| `'responsive'` | The layout direction of the field. Defaults to `vertical` |

### `<twig:ui:Field:Label>`

Wraps `<twig:ui:Label>` with field-aware spacing and disabled/checked states.

### `<twig:ui:Field:Content>`

Groups the input and supplementary elements like `Field:Description` and `Field:Error`, used in `horizontal` orientation.

### `<twig:ui:Field:Group>`

Groups multiple `Field` components together.

### `<twig:ui:Field:Description>`

The helper text describing the field.

### `<twig:ui:Field:Error>`

| Prop | Type | Description |
|---|---|---|
| `errors` | `array` | A list of error messages (strings or objects with a `message` property) |

Renders nothing when there is no content and no errors.
