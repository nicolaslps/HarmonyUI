<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'switch' => new ComponentStyle(
        base: 'inline-flex shrink-0 cursor-pointer data-[disabled]:cursor-not-allowed data-[disabled]:opacity-50',
    ),
    'switch-control' => new ComponentStyle(
        base: [
            'relative inline-flex shrink-0 items-center rounded-full border border-transparent transition-colors outline-none',
            'bg-neutral-200 data-[state=checked]:bg-(--color-accent)',
            'data-[focus-visible]:border-neutral-500 data-[focus-visible]:ring-3 data-[focus-visible]:ring-neutral-500/40',
            'data-[invalid]:border-red-600 data-[invalid]:ring-3 data-[invalid]:ring-red-600/20',
            'dark:bg-neutral-700 dark:data-[state=checked]:bg-(--color-accent)',
            'dark:data-[invalid]:border-red-600/50 dark:data-[invalid]:ring-red-600/40',
        ],
        variants: [
            'size' => [
                'sm' => 'h-3.5 w-6',
                'default' => 'h-4.5 w-8',
                'lg' => 'h-5.5 w-10',
            ],
        ],
        defaultVariants: ['size' => 'default'],
    ),
    'switch-thumb' => new ComponentStyle(
        base: [
            'pointer-events-none block rounded-full bg-white shadow-sm translate-x-0',
            'transition-[width,translate] duration-150 ease-out',
        ],
        variants: [
            'size' => [
                'sm' => [
                    'size-3',
                    'ltr:data-[state=checked]:translate-x-[10px] rtl:data-[state=checked]:-translate-x-[10px]',
                    'data-[active]:w-3.5',
                    'ltr:data-[state=checked]:data-[active]:translate-x-[8px] rtl:data-[state=checked]:data-[active]:-translate-x-[8px]',
                ],
                'default' => [
                    'size-4',
                    'ltr:data-[state=checked]:translate-x-[14px] rtl:data-[state=checked]:-translate-x-[14px]',
                    'data-[active]:w-[18px]',
                    'ltr:data-[state=checked]:data-[active]:translate-x-[12px] rtl:data-[state=checked]:data-[active]:-translate-x-[12px]',
                ],
                'lg' => [
                    'size-5',
                    'ltr:data-[state=checked]:translate-x-[18px] rtl:data-[state=checked]:-translate-x-[18px]',
                    'data-[active]:w-5.5',
                    'ltr:data-[state=checked]:data-[active]:translate-x-[16px] rtl:data-[state=checked]:data-[active]:-translate-x-[16px]',
                ],
            ],
        ],
        defaultVariants: ['size' => 'default'],
    ),
];
