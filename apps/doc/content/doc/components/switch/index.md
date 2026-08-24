---
title: Switch
description: A toggle switch component for binary on/off states.
priority: 0
---

## Usage

<ComponentPreview name="usage"/>

## Examples

### With label

<ComponentPreview name="with-label"/>

### Checked

<ComponentPreview name="checked"/>

### Sizes

<ComponentPreview name="sizes"/>

### Disabled

<ComponentPreview name="disabled"/>

### Invalid

<ComponentPreview name="invalid"/>

### RTL

<ComponentPreview name="rtl"/>

### Programmatic toggle

Toggle a switch from a button elsewhere on the page using `commandfor` and `command`.

<ComponentPreview name="programmatic"/>

## API Reference

### `<twig:ui:Switch>`

`id` is rendered on the root `<label>`, so it works directly with `commandfor`. The
underlying `<input>` gets `{id}-input`; associate an external
`<twig:ui:Field:Label for="{id}-input">` with it.

| Prop | Type | Description |
|---|---|---|
| `id` | `string` | The id rendered on the `<label>` root. The input gets `{id}-input` |
| `checked` | `boolean` | The initial checked state. Defaults to `false` |
| `disabled` | `boolean` | Disables the switch. Defaults to `false` |
| `invalid` | `boolean` | Marks the switch as invalid. Defaults to `false` |
| `required` | `boolean` | Marks the underlying input as required. Defaults to `false` |
| `readOnly` | `boolean` | Prevents toggling while keeping it focusable. Defaults to `false` |
| `name` | `string` | The input name, for form submission |
| `value` | `string` | The input value, for form submission. Defaults to `on` |
| `form` | `string` | The id of the form the input belongs to |
| `dir` | `'ltr'` \| `'rtl'` | Overrides the inherited text direction |
| `size` | `'sm'` \| `'default'` \| `'lg'` | The size of the switch. Defaults to `default` |

| Event | Detail | Description |
|---|---|---|
| `hui:switch:change` | `{ checked: boolean }` | Dispatched whenever the checked state changes |

| Command | Description |
|---|---|
| `--check` | Sets the switch to checked |
| `--uncheck` | Sets the switch to unchecked |
| `--toggle` | Toggles the checked state |
