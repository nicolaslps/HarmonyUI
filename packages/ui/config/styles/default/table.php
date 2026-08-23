<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'table-container' => new ComponentStyle(
        base: 'relative w-full overflow-x-auto',
    ),
    'table' => new ComponentStyle(
        base: 'w-full caption-bottom text-sm',
        variants: [
            'variant' => [
                'default' => '',
                'card' => 'border-separate border-spacing-0',
            ],
        ],
        defaultVariants: ['variant' => 'default'],
    ),
    'table-header' => new ComponentStyle(
        base: '',
    ),
    'table-body' => new ComponentStyle(
        base: '',
    ),
    'table-footer' => new ComponentStyle(
        base: 'font-medium',
        variants: [
            'variant' => [
                'default' => 'bg-neutral-50 dark:bg-neutral-800/50',
                'card' => '',
            ],
        ],
        defaultVariants: ['variant' => 'default'],
    ),
    'table-row' => new ComponentStyle(
        base: 'group/table-row transition-colors',
        variants: [
            'variant' => [
                'default' => 'hover:bg-neutral-50 data-[state=selected]:bg-neutral-100 dark:hover:bg-neutral-800/50 dark:data-[state=selected]:bg-neutral-800',
                'card' => '',
                'footer' => '',
            ],
        ],
        defaultVariants: ['variant' => 'default'],
    ),
    'table-head' => new ComponentStyle(
        base: [
            'h-10 px-3 text-start align-middle font-medium text-neutral-500 whitespace-nowrap',
            '[&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]',
            'dark:text-neutral-400',
        ],
    ),
    'table-cell' => new ComponentStyle(
        base: [
            'px-3 py-2 align-middle whitespace-nowrap text-neutral-950 bg-clip-padding',
            '[&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]',
            'dark:text-neutral-50',
        ],
        variants: [
            'variant' => [
                'default' => '',
                'card' => [
                    'border-b border-neutral-950/10 first:border-s last:border-e bg-white',
                    'group-hover/table-row:bg-neutral-50 group-data-[state=selected]/table-row:bg-neutral-100',
                    'group-first/table-row:border-t group-first/table-row:first:rounded-ss-xl group-first/table-row:last:rounded-se-xl',
                    'group-last/table-row:first:rounded-es-xl group-last/table-row:last:rounded-ee-xl',
                    'dark:border-white/10 dark:bg-neutral-900',
                    'dark:group-hover/table-row:bg-neutral-800/50 dark:group-data-[state=selected]/table-row:bg-neutral-800',
                ],
            ],
        ],
        defaultVariants: ['variant' => 'default'],
    ),
    'table-caption' => new ComponentStyle(
        base: 'mt-4 text-sm text-neutral-500 dark:text-neutral-400',
    ),
];
