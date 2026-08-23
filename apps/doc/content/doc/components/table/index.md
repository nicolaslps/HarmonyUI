---
title: Table
description: A responsive table component for displaying tabular data with support for headers, footers, and captions.
priority: 0
---

<ComponentPreview name="demo"/>

## Usage

<ComponentPreview name="usage"/>

## Examples

### Team members

<ComponentPreview name="team"/>

### Card

Set `variant` to `card` to render the body as one bordered, rounded surface.

<ComponentPreview name="card"/>

### With caption and footer

<ComponentPreview name="caption-footer"/>

### Overflow

Wide tables scroll horizontally instead of breaking the page layout.

<ComponentPreview name="overflow"/>

### RTL

Set `dir="rtl"` on a wrapper. Header and cell alignment use logical
properties, so they follow the reading direction automatically.

<ComponentPreview name="rtl"/>

## API Reference

### `<twig:ui:Table>`

| Prop | Type | Description |
|---|---|---|
| `variant` | `'default'` \| `'card'` | Renders the body as one bordered, rounded surface when `card`. Defaults to `default` |

| Block | Description |
|---|---|
| `content` | The table sections: header, body and footer |

### `<twig:ui:Table:Caption>`

| Block | Description |
|---|---|
| `content` | A description of the table, rendered below it |

### `<twig:ui:Table:Header>`

| Block | Description |
|---|---|
| `content` | The header rows |

### `<twig:ui:Table:Body>`

| Block | Description |
|---|---|
| `content` | The data rows |

### `<twig:ui:Table:Footer>`

Rendered as a muted band.

| Block | Description |
|---|---|
| `content` | The footer rows |

### `<twig:ui:Table:Row>`

| Block | Description |
|---|---|
| `content` | The header or data cells |

### `<twig:ui:Table:Head>`

A header cell, rendered as `<th>`.

| Block | Description |
|---|---|
| `content` | The column label |

### `<twig:ui:Table:Cell>`

A data cell, rendered as `<td>`.

| Block | Description |
|---|---|
| `content` | The cell value |
