<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'button' => new ComponentStyle(
        variants: [
            'variant' => [
                'extended' => 'bg-gradient-to-r from-fuchsia-500 to-cyan-500 text-white',
            ],
        ],
    ),
];
