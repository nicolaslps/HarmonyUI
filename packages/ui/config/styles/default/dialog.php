<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'dialog' => new ComponentStyle(
        base: ''
    ),
    'dialog-backdrop' => new ComponentStyle(
        base: [
            'fixed inset-y-0 left-0 right-[calc(-1*var(--scrollbar-width,0px))] z-[calc(50_+_var(--layer-index,0))] pointer-events-auto',
            'bg-[rgb(0_0_0/var(--hui-backdrop-alpha,0.4))]',
            'data-[has-nested=dialog]:[--hui-backdrop-alpha:calc(0.4_+_var(--nested-layer-count,0)*0.1)]',
            'opacity-100 transition-[display,opacity] transition-discrete duration-200 ease-spring',
            'starting:opacity-0',
            'data-[state=closed]:opacity-0 data-[state=closed]:duration-100 data-[state=closed]:ease-in',
            'motion-reduce:duration-150 motion-reduce:ease-out',
        ],
    ),
    'dialog-positioner' => new ComponentStyle(
        base: [
            'fixed inset-0 z-[calc(50_+_var(--layer-index,0))] flex items-center justify-center p-4 pointer-events-auto',
            'transition-[display] transition-discrete duration-200',
            'motion-reduce:duration-150',
        ],
    ),
    'dialog-content' => new ComponentStyle(
        base: [
            'relative grid w-full max-w-sm gap-4 rounded-xl bg-popover p-4 text-sm text-popover-foreground',
            'ring-1 ring-foreground/10 outline-none',
            'opacity-100 scale-100',
            'transition-[display,opacity,scale,translate] transition-discrete duration-200 ease-spring',
            'starting:opacity-0 starting:scale-95',
            'data-[state=closed]:opacity-0 data-[state=closed]:scale-95 data-[state=closed]:duration-100 data-[state=closed]:ease-in',
            'data-[has-nested=dialog]:scale-[calc(1_-_0.1*var(--nested-layer-count,0))]',
            'data-[has-nested=dialog]:translate-y-[calc(1.25rem*var(--nested-layer-count,0))]',
            'motion-reduce:duration-150 motion-reduce:ease-out',
            'motion-reduce:scale-100 motion-reduce:starting:scale-100 motion-reduce:data-[state=closed]:scale-100',
        ],
    ),
    'dialog-header' => new ComponentStyle(
        base: 'flex flex-col gap-1',
    ),
    'dialog-title' => new ComponentStyle(
        base: 'text-base leading-snug font-medium text-popover-foreground',
    ),
    'dialog-description' => new ComponentStyle(
        base: 'text-sm text-muted-foreground',
    ),
    'dialog-footer' => new ComponentStyle(
        base: 'flex justify-end gap-2',
    ),
    'dialog-close' => new ComponentStyle(
        base: 'absolute top-3 right-3 text-muted-foreground',
    ),
];
