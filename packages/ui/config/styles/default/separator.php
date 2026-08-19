<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'separator' => new ComponentStyle(
        base: [
            'shrink-0 empty:bg-neutral-200',
            'dark:empty:bg-neutral-800',
            '[&:not(:empty)]:flex [&:not(:empty)]:items-center [&:not(:empty)]:gap-4',
            '[&:not(:empty)]:text-sm [&:not(:empty)]:text-neutral-500',
            'dark:[&:not(:empty)]:text-neutral-400',
            "[&:not(:empty)]:before:content-[''] [&:not(:empty)]:before:flex-1 [&:not(:empty)]:before:bg-neutral-200",
            "[&:not(:empty)]:after:content-[''] [&:not(:empty)]:after:flex-1 [&:not(:empty)]:after:bg-neutral-200",
            'dark:[&:not(:empty)]:before:bg-neutral-800 dark:[&:not(:empty)]:after:bg-neutral-800',
        ],
        variants: [
            'orientation' => [
                'horizontal' => [
                    'w-full empty:h-px',
                    '[&:not(:empty)]:before:h-px [&:not(:empty)]:after:h-px',
                ],
                'vertical' => [
                    'h-full empty:w-px',
                    '[&:not(:empty)]:flex-col [&:not(:empty)]:before:w-px [&:not(:empty)]:after:w-px',
                ],
            ],
        ],
        defaultVariants: ['orientation' => 'horizontal'],
    ),
];
