---
title: Avatar
description: Display user profile images with fallback support for missing images.
priority: 0
---

An image element with a fallback for representing a user. Built on a native
`<img>`, enhanced by a small Stimulus controller: the fallback is shown until
the image successfully loads, so a missing avatar, a slow network or a broken
URL always resolve to the fallback instead of a broken image icon.

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Fallback

The `<twig:ui:Avatar:Fallback>` content, usually initials or an icon, stays
visible until the image finishes loading. It is also what renders when
`<twig:ui:Avatar:Image>` is omitted entirely.

<ComponentPreview name="fallback"/>

### Badge

Use `<twig:ui:Avatar:Badge>` to add a status indicator at the bottom-right
of the avatar.

<ComponentPreview name="badge"/>

### Badge with icon

<ComponentPreview name="badge-with-icon"/>

### Badge position

Move the badge to any corner with `position`. The badge always scales with
the avatar's own `size`, shown here for every size.

<ComponentPreview name="badge-position"/>

### Group

Use `<twig:ui:Avatar:Group>` to stack a set of avatars with overlap.

<ComponentPreview name="group"/>

### Group count

Add `<twig:ui:Avatar:GroupCount>` at the end of a group to show how many
more members aren't displayed.

<ComponentPreview name="group-count"/>

### Sizes

<ComponentPreview name="sizes"/>

### RTL

Set `dir="rtl"` on a wrapping element to render avatars for right-to-left
languages.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Avatar>`

| Prop | Type | Description |
|---|---|---|
| `size` | `'xs'` \| `'sm'` \| `'default'` \| `'lg'` \| `'xl'` | The size of the avatar. Defaults to `default` |

| Block | Description |
|---|---|
| `content` | The avatar content, typically an `Avatar:Image` and an `Avatar:Fallback` |

### `<twig:ui:Avatar:Image>`

Renders the `<img>` element. Hidden until it successfully loads, revealing
itself and hiding the sibling `Avatar:Fallback`.

| Prop | Type | Description |
|---|---|---|
| `src` | `string` | The image URL |
| `alt` | `string` | The image alt text. Defaults to `''` |

### `<twig:ui:Avatar:Fallback>`

| Block | Description |
|---|---|
| `content` | The fallback content, typically initials or an icon |

### `<twig:ui:Avatar:Badge>`

| Prop | Type | Description |
|---|---|---|
| `position` | `'top-start'` \| `'top-end'` \| `'bottom-start'` \| `'bottom-end'` | The corner the badge is anchored to. Defaults to `bottom-end` |

| Block | Description |
|---|---|
| `content` | Optional badge content, typically an icon. Empty for a plain status dot |

### `<twig:ui:Avatar:Group>`

| Block | Description |
|---|---|
| `content` | The grouped avatars, typically multiple `Avatar` components followed by an optional `Avatar:GroupCount` |

### `<twig:ui:Avatar:GroupCount>`

| Block | Description |
|---|---|
| `content` | The count indicator, typically `+N` text or an icon |
