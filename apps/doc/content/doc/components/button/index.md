---
title: Button
description: Displays a button or a component that looks like a button.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Solid

<ComponentPreview name="solid"/>

### Soft

<ComponentPreview name="soft"/>

### Outline

<ComponentPreview name="outline"/>

### Ghost

<ComponentPreview name="ghost"/>

### Link

<ComponentPreview name="link"/>

### Danger

`color="danger"` is a shortcut for `color="red"`.

<ComponentPreview name="danger"/>

### Info

`color="info"` is a shortcut for `color="blue"`.

<ComponentPreview name="info"/>

### Success

`color="success"` is a shortcut for `color="green"`.

<ComponentPreview name="success"/>

### Warning

`color="warning"` is a shortcut for `color="amber"`.

<ComponentPreview name="warning"/>

### Size

Use the `size` prop to change the size of the button.

<ComponentPreview name="size"/>

### Icon

<ComponentPreview name="icon"/>

### With Icon

Remember to add the `data-icon="inline-start"` or `data-icon="inline-end"` attribute to the icon for the correct spacing.

<ComponentPreview name="with-icon"/>

### Rounded

Use the `rounded-full` class to make the button rounded.

<ComponentPreview name="rounded"/>

### Loading

Render a spinning icon inside the button to show a loading state. Remember to add the `data-icon="inline-start"` or `data-icon="inline-end"` attribute to the spinner for the correct spacing.

<ComponentPreview name="loading"/>

### As Link

You can use the `as` prop on Button to make another element look like a button. Here's an example of a link that looks like a button.

<ComponentPreview name="as-link"/>

### RTL

To enable RTL support, set the `dir="rtl"` attribute on the root element.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Button>`

| Prop | Type | Description |
|---|---|---|
| `variant` | `'solid'` \| `'soft'` \| `'outline'` \| `'ghost'` \| `'link'` | The visual style variant. Defaults to `solid` |
| `color` | `string` | Any Tailwind color name, such as `'purple'` or `'cyan'`, or a preset shortcut: `'danger'`, `'info'`, `'success'`, `'warning'`. Only affects the `solid` and `soft` variants. Defaults to `'neutral'` |
| `size` | `'md'` \| `'xs'` \| `'sm'` \| `'lg'` \| `'icon'` \| `'icon-xs'` \| `'icon-sm'` \| `'icon-lg'` | The button size. Defaults to `md` |
| `as` | `string` | The HTML tag to render. Defaults to `button` |

| Block | Description |
|---|---|
| `content` | The button label and/or icon |
