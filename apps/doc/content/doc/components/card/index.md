---
title: Card
description: Display content in a card layout with header, content, and footer sections.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

Compose a card from `<twig:ui:Card:Header>`, `<twig:ui:Card:Content>` and
`<twig:ui:Card:Footer>`. Every section is optional and can appear more than
once.

<ComponentPreview name="usage"/>

## Examples

### With action

Add the optional `<twig:ui:Card:Action>` inside the header to place an
action in the top corner of the card, such as a button or a badge.

<ComponentPreview name="with-action"/>

### With header border

The footer is separated from the content by default. To separate the header
too, add `border-b`; the matching padding is applied automatically.

<ComponentPreview name="borders"/>

### With image

Place an `<img>` as the first direct child for full-bleed media. The top
padding is removed and the corners are rounded automatically. Serve a
resized, compressed file and add `loading="lazy"` so the image does not slow
the page down.

<ComponentPreview name="image"/>

### Sizes

The `size` prop scales the paddings and gaps of every section at once:
`sm` (12px), `default` (16px), `lg` (24px) and `xl` (32px). The `sm` size
also shrinks the title.

<ComponentPreview name="sizes"/>

### Custom spacing

The predefined sizes set the `--card-spacing` variable, so any other value
is one utility class away: override the variable on the root and every
section follows.

<ComponentPreview name="spacing"/>

### RTL

Set `dir="rtl"` on the root to render the card for right-to-left languages.
The default styles use logical properties, so the header action and text
alignment follow the reading direction.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Card>`

| Prop | Type | Description |
|---|---|---|
| `size` | `'sm'` \| `'default'` \| `'lg'` \| `'xl'` | The spacing scale of the card. Defaults to `default` |
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The card sections: header, content and footer |

### `<twig:ui:Card:Header>`

Wraps the title, description and optional action. A column is reserved for
the action automatically when one is present.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The title, description and optional action |

### `<twig:ui:Card:Title>`

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The card title |

### `<twig:ui:Card:Description>`

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The card description |

### `<twig:ui:Card:Action>`

Placed in the top corner of the header, spanning the title and description
rows.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The action, usually a `<twig:ui:Button>` or a badge |

### `<twig:ui:Card:Content>`

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The main content of the card |

### `<twig:ui:Card:Footer>`

Rendered as a muted band separated from the content by a border.

| Prop | Type | Description |
|---|---|---|
| `as` | `string` | The HTML tag to render. Defaults to `div` |

| Block | Description |
|---|---|
| `content` | The footer content, usually actions or secondary text |
