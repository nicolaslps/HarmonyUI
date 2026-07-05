---
title: Button
description: Displays a button or a component that looks like a button.
priority: 1
---

# Button

Displays a button or a component that looks like a button.

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Primary

<ComponentPreview name="primary"/>

### Outline

<ComponentPreview name="outline"/>

### Secondary

<ComponentPreview name="secondary"/>

### Ghost

<ComponentPreview name="ghost"/>

### Danger

<ComponentPreview name="danger"/>

### Link

<ComponentPreview name="link"/>

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
| `variant` | `'primary'` \| `'outline'` \| `'secondary'` \| `'ghost'` \| `'danger'` \| `'link'` | The visual style variant. Defaults to `primary` |
| `size` | `'md'` \| `'xs'` \| `'sm'` \| `'lg'` \| `'icon'` \| `'icon-xs'` \| `'icon-sm'` \| `'icon-lg'` | The button size. Defaults to `md` |
| `as` | `string` | The HTML tag to render. Defaults to `button` |

| Block | Description |
|---|---|
| `content` | The button label and/or icon |
