---
title: Button
description: Displays a button or a component that looks like a button.
priority: 1
---

# Button

Displays a button or a component that looks like a button.

::: demo demo :::

## Usage

::: demo usage :::

## Examples

### Primary

::: demo primary :::

### Outline

::: demo outline :::

### Secondary

::: demo secondary :::

### Ghost

::: demo ghost :::

### Danger

::: demo danger :::

### Link

::: demo link :::

### Size

Use the `size` prop to change the size of the button.

::: demo size :::

### Icon

::: demo icon :::

### With Icon

Remember to add the `data-icon="inline-start"` or `data-icon="inline-end"` attribute to the icon for the correct spacing.

::: demo with-icon :::

### Rounded

Use the `rounded-full` class to make the button rounded.

::: demo rounded :::

### Loading

Render a spinning icon inside the button to show a loading state. Remember to add the `data-icon="inline-start"` or `data-icon="inline-end"` attribute to the spinner for the correct spacing.

::: demo loading :::

### As Link

You can use the `as` prop on Button to make another element look like a button. Here's an example of a link that looks like a button.

::: demo as-link :::

### RTL

To enable RTL support, set the `dir="rtl"` attribute on the root element.

::: demo rtl :::

## API Reference

### `<twig:HarmonyUICore:Button>`

| Prop | Type | Description |
|---|---|---|
| `variant` | `'primary'` \| `'outline'` \| `'secondary'` \| `'ghost'` \| `'danger'` \| `'link'` | The visual style variant. Defaults to `primary` |
| `size` | `'md'` \| `'xs'` \| `'sm'` \| `'lg'` \| `'icon'` \| `'icon-xs'` \| `'icon-sm'` \| `'icon-lg'` | The button size. Defaults to `md` |
| `as` | `string` | The HTML tag to render. Defaults to `button` |

| Block | Description |
|---|---|
| `content` | The button label and/or icon |
