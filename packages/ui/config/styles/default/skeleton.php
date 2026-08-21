<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'skeleton' => new ComponentStyle(
        base: 'block rounded-md bg-neutral-200 dark:bg-neutral-800',
        variants: [
            'animation' => [
                'pulse' => 'animate-pulse motion-reduce:animate-none',
                'shimmer' => [
                    '[--shimmer-base:var(--color-neutral-200)] [--shimmer-highlight:var(--color-neutral-100)]',
                    'dark:[--shimmer-base:var(--color-neutral-800)] dark:[--shimmer-highlight:var(--color-neutral-700)]',
                    'animate-shimmer rtl:[animation-direction:reverse] motion-reduce:animate-none',
                ],
                'none' => '',
            ],
        ],
        defaultVariants: ['animation' => 'shimmer'],
    ),
];
