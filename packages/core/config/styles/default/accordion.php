<?php

declare(strict_types=1);

use HarmonyUI\Core\Style\ComponentStyle;

return [
    'accordion' => new ComponentStyle(
        base: 'flex w-full flex-col'
    ),
    'accordion-item' => new ComponentStyle(
        base: 'not-last:border-b'
    ),
    'accordion-header' => new ComponentStyle(
        base: 'flex'
    ),
    'accordion-trigger' => new ComponentStyle(
        base: [
            "relative flex flex-1 items-start justify-between gap-4 rounded-lg border border-transparent py-2.5 text-start text-sm font-medium transition-all outline-none cursor-pointer",
            "hover:underline",
            "focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50",
            "disabled:pointer-events-none disabled:opacity-50",
        ],
    ),
    'accordion-indicator' => new ComponentStyle(
        base: [
            "pointer-events-none size-4 shrink-0 translate-y-0.5 text-muted-foreground transition-transform duration-200",
            "data-[state=open]:rotate-180",
            "motion-reduce:transition-none",
        ],
    ),
    'accordion-panel' => new ComponentStyle(
        base: [
            "grid grid-rows-[1fr] text-sm",
            "transition-[grid-template-rows,display] transition-discrete duration-200 ease-out",
            "data-[state=closed]:grid-rows-[0fr]",
            "starting:data-[state=open]:grid-rows-[0fr]",
            "motion-reduce:transition-none",
        ],
    ),
    'accordion-panel-clip' => new ComponentStyle(
        base: 'min-h-0 min-w-0 overflow-hidden'
    ),
    'accordion-panel-body' => new ComponentStyle(
        base: [
            "pt-0 pb-2.5",
            "[&_a]:underline [&_a]:underline-offset-3 [&_a]:hover:text-foreground",
            "[&_p:not(:last-child)]:mb-4",
        ],
    ),
];
