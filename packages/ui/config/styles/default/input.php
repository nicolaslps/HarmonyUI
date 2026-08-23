<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'input' => new ComponentStyle(
        base: [
            'h-8 w-full min-w-0 rounded-lg border border-neutral-200 bg-white px-2.5 py-1 text-sm text-neutral-950 transition-colors outline-none',
            'placeholder:text-neutral-400',
            'file:inline-flex file:h-6 file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-neutral-950',
            'focus-visible:border-neutral-500 focus-visible:ring-3 focus-visible:ring-neutral-500/40',
            'disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50',
            'aria-invalid:border-red-600 aria-invalid:ring-3 aria-invalid:ring-red-600/20',
            'dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-50 dark:file:text-neutral-50',
            'dark:placeholder:text-neutral-500',
            'dark:aria-invalid:border-red-600/50 dark:aria-invalid:ring-red-600/40',
        ],
    ),
];
