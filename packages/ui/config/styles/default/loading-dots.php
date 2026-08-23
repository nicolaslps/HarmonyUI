<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'loading-dots' => new ComponentStyle(
        base: 'inline-flex items-center',
        variants: [
            'size' => [
                'sm' => '[--loading-dots-size:2px]',
                'md' => '[--loading-dots-size:3px]',
                'lg' => '[--loading-dots-size:4px]',
                'xl' => '[--loading-dots-size:6px]',
            ],
        ],
        defaultVariants: ['size' => 'md'],
    ),
    'loading-dots-dot' => new ComponentStyle(
        base: 'inline-block size-(--loading-dots-size) mx-px rounded-full bg-current animate-blink motion-reduce:animate-none',
    ),
];
