<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'dialog' => new ComponentStyle(
        base: ''
    ),
    'dialog-backdrop' => new ComponentStyle(
        base: [
            'fixed inset-0 z-[calc(50_+_var(--layer-index,0))] pointer-events-auto',
            'bg-[rgb(0_0_0/var(--hui-backdrop-alpha,0.4))]',
            'data-[has-nested=dialog]:[--hui-backdrop-alpha:calc(0.4_+_var(--nested-layer-count,0)*0.1)]',
        ],
    ),
    'dialog-positioner' => new ComponentStyle(
        base: 'fixed inset-0 z-[calc(50_+_var(--layer-index,0))] flex items-center justify-center p-4 pointer-events-auto'
    ),
    'dialog-content' => new ComponentStyle(
        base: [
            'relative grid w-full max-w-sm gap-4 rounded-xl bg-popover p-4 text-sm text-popover-foreground',
            'ring-1 ring-foreground/10 outline-none',
            'transition-transform duration-100 ease-out',
            'data-[has-nested=dialog]:scale-[calc(1_-_0.1*var(--nested-layer-count,0))]',
            'data-[has-nested=dialog]:translate-y-[calc(1.25rem*var(--nested-layer-count,0))]',
        ],
    ),
];
