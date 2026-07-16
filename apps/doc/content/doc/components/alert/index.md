---
title: Alert
description: Display alert messages with different variants and optional icons.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

Place an optional `<twig:ux:icon>` as the first direct child of the alert; the
layout reserves a column for it automatically.

<ComponentPreview name="usage"/>

## Examples

### Info

Use the `info` variant for neutral, informative messages.

<ComponentPreview name="info"/>

### Success

Use the `success` variant to confirm that an operation completed.

<ComponentPreview name="success"/>

### Warning

Use the `warning` variant to draw attention to something that needs care.

<ComponentPreview name="warning"/>

### Danger

Use the `danger` variant for errors and failures.

<ComponentPreview name="danger"/>

### Without icon

The icon column collapses when no icon is present.

<ComponentPreview name="without-icon"/>

### With action

Add the optional `<twig:ui:Alert:Action>` to place an action at the end of
the alert, such as a button or a dismiss icon. When the alert is narrow, the
action wraps below the text.

<ComponentPreview name="with-action"/>

### Responsive

The action placement responds to the width of the alert itself, not the
viewport. The same alert adapts when rendered in a narrow column, such as a
sidebar or a split view.

<ComponentPreview name="responsive"/>

### With action below

Set `:inline="false"` on the action to always place it below the icon, title
and description.

<ComponentPreview name="with-action-below"/>

### Colors

Use the `color` prop to tint an alert with any color of the Tailwind palette.
It overrides the base color set by the variant, from which the border,
background and icon tints all derive. The title and description colors adapt
to the base color too, at a lightness that keeps an accessible contrast in
both themes.

For colors outside the palette, set the underlying `--alert-color` custom
property directly, for example `class="[--alert-color:var(--my-brand-color)]"`,
along with `--alert-foreground` for the text color.

<ComponentPreview name="colors"/>

### RTL

Set `dir="rtl"` on the root to render the alert for right-to-left languages.
The default styles use logical properties, so the icon, text and action follow
the reading direction.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Alert>`

| Prop | Type | Description |
|---|---|---|
| `variant` | `'default'` \| `'danger'` \| `'info'` \| `'success'` \| `'warning'` | The visual style variant. Defaults to `default` |
| `color` | `string` | A Tailwind color name (`'red'`, `'teal'`, `'fuchsia'`, ...) used as base color instead of the variant one |
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | An optional icon as first direct child, then the title, description and action |

### `<twig:ui:Alert:Title>`

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The alert title |

### `<twig:ui:Alert:Description>`

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The alert message. Can hold paragraphs or lists |

### `<twig:ui:Alert:Action>`

Placed at the end of the alert, vertically centered. Wraps below the content
when the alert is narrow.

| Prop | Type | Description |
|---|---|---|
| `inline` | `bool` | Whether the action sits at the end of the alert. Set to `false` to always place it below the content. Defaults to `true` |
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The action, usually a small `<twig:ui:Button>` |
