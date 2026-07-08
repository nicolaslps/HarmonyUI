---
title: Accordion
description: A vertically stacked set of interactive headings that each reveal a section of content
priority: 0
---

Interactions are powered by the [Zag.js accordion machine](https://zagjs.com/components/react/accordion),
wired through a single Stimulus controller placed on the accordion root.

## Usage

<ComponentPreview name="usage"/>

## Multiple

Allow several items to stay open at the same time with `multiple`.

<ComponentPreview name="multiple"/>

## Disabled item

<ComponentPreview name="disabled"/>

## RTL

Set `dir="rtl"` on the root to render the accordion for right-to-left languages.
The direction is applied to the markup and forwarded to the Zag.js machine, and
the default styles use logical properties so text and the indicator follow the
reading direction.

<ComponentPreview name="rtl"/>
