<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'dialog' => new ComponentStyle(
        base: ''
    ),
    'dialog-backdrop' => new ComponentStyle(
        base: 'fixed inset-0 z-50 bg-black/40 pointer-events-auto'
    ),
    'dialog-positioner' => new ComponentStyle(
        base: 'fixed inset-0 z-50 flex items-center justify-center p-4 pointer-events-auto'
    ),
    'dialog-content' => new ComponentStyle(
        base: 'relative grid w-full max-w-sm gap-4 rounded-xl bg-popover p-4 text-sm text-popover-foreground ring-1 ring-foreground/10 outline-none'
    ),
];
