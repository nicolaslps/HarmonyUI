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
                    'relative overflow-hidden after:shimmer-overlay',
                    'rtl:after:[animation-direction:reverse] motion-reduce:after:[animation:none]',
                    'group-[&]/skeleton-shimmer:after:content-none',
                ],
                'none' => '',
            ],
        ],
        defaultVariants: ['animation' => 'shimmer'],
    ),
    'skeleton-group' => new ComponentStyle(
        base: [
            'group/skeleton-shimmer relative overflow-hidden after:shimmer-overlay',
            'rtl:after:[animation-direction:reverse] motion-reduce:after:[animation:none]',
        ],
    ),
];
