<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'popover' => new ComponentStyle(
        base: '',
    ),
    'popover-anchor' => new ComponentStyle(
        base: '',
    ),
    'popover-positioner' => new ComponentStyle(
        base: 'outline-none',
    ),
    'popover-content' => new ComponentStyle(
        base: [
            'z-[calc(50_+_var(--layer-index,0))] grid gap-3 rounded-xl bg-white p-4 text-sm text-neutral-950 shadow-lg outline-none',
            'ring-1 ring-neutral-950/10',
            'dark:bg-neutral-900 dark:text-neutral-50 dark:ring-white/15',
            'opacity-100 scale-100 translate-x-0 translate-y-0',
            'transition-[display,opacity,scale,translate] transition-discrete duration-200 ease-spring',
            'starting:opacity-0 starting:scale-95',
            'data-[state=closed]:opacity-0 data-[state=closed]:scale-95 data-[state=closed]:duration-100 data-[state=closed]:ease-in',
            'data-[side=bottom]:starting:-translate-y-1 data-[side=bottom]:data-[state=closed]:-translate-y-1',
            'data-[side=top]:starting:translate-y-1 data-[side=top]:data-[state=closed]:translate-y-1',
            'data-[side=left]:starting:translate-x-1 data-[side=left]:data-[state=closed]:translate-x-1',
            'data-[side=right]:starting:-translate-x-1 data-[side=right]:data-[state=closed]:-translate-x-1',
            'motion-reduce:duration-150 motion-reduce:ease-out',
            'motion-reduce:scale-100 motion-reduce:translate-x-0 motion-reduce:translate-y-0',
            'motion-reduce:starting:scale-100 motion-reduce:data-[state=closed]:scale-100',
            'motion-reduce:starting:translate-x-0 motion-reduce:starting:translate-y-0',
            'motion-reduce:data-[state=closed]:translate-x-0 motion-reduce:data-[state=closed]:translate-y-0',
        ],
    ),
    'popover-close' => new ComponentStyle(
        base: [
            'absolute top-3 ltr:right-3 rtl:left-3 text-neutral-500',
            'dark:text-neutral-400',
        ],
    ),
    'popover-indicator' => new ComponentStyle(
        base: [
            'text-neutral-400 opacity-60 transition-opacity data-[state=open]:opacity-100 data-[state=open]:text-neutral-600',
            'dark:text-neutral-500 dark:data-[state=open]:text-neutral-300',
        ],
    ),
];
