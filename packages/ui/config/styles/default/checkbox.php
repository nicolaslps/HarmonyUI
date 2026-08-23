<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'checkbox' => new ComponentStyle(
        base: 'group relative grid size-4 shrink-0 grid-cols-1',
    ),
    'checkbox-input' => new ComponentStyle(
        base: [
            'peer col-start-1 row-start-1 size-4 appearance-none rounded-[4px] border border-neutral-200 bg-white transition-colors outline-none',
            'focus-visible:border-neutral-500 focus-visible:ring-3 focus-visible:ring-neutral-500/40',
            'checked:border-(--color-accent) checked:bg-(--color-accent)',
            'disabled:cursor-not-allowed disabled:opacity-50',
            'aria-invalid:border-red-600 aria-invalid:ring-3 aria-invalid:ring-red-600/20',
            'dark:border-neutral-600 dark:bg-neutral-700 dark:checked:border-(--color-accent) dark:checked:bg-(--color-accent)',
            'dark:aria-invalid:border-red-600/50 dark:aria-invalid:ring-red-600/40',
            'forced-colors:appearance-auto',
        ],
    ),
    'checkbox-indicator' => new ComponentStyle(
        base: [
            'pointer-events-none col-start-1 row-start-1 flex items-center justify-center text-(--color-accent-foreground) opacity-0 transition-none',
            'group-has-checked:opacity-100 group-has-disabled:opacity-50',
        ],
    ),
];
