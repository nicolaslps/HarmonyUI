<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'avatar' => new ComponentStyle(
        base: [
            "group/avatar relative flex shrink-0 select-none rounded-full",
            "after:absolute after:inset-0 after:rounded-full after:border after:border-neutral-200 after:mix-blend-darken dark:after:border-neutral-800 dark:after:mix-blend-lighten",
        ],
        variants: [
            'size' => [
                'xs' => "size-5",
                'sm' => "size-6",
                'default' => "size-8",
                'lg' => "size-10",
                'xl' => "size-12",
            ],
        ],
    ),
    'avatar-image' => new ComponentStyle(
        base: "hidden aspect-square size-full rounded-full object-cover",
    ),
    'avatar-fallback' => new ComponentStyle(
        base: [
            "flex size-full items-center justify-center rounded-full bg-neutral-100 text-sm text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400",
            "group-data-[size=xs]/avatar:text-xs group-data-[size=sm]/avatar:text-xs group-data-[size=xl]/avatar:text-base",
        ],
    ),
    'avatar-badge' => new ComponentStyle(
        base: [
            "absolute z-10 inline-flex items-center justify-center rounded-full bg-accent text-accent-foreground ring-2 ring-white select-none dark:ring-neutral-900",
            "group-data-[size=xs]/avatar:size-1.5 group-data-[size=xs]/avatar:[&>svg]:hidden",
            "group-data-[size=sm]/avatar:size-2 group-data-[size=sm]/avatar:[&>svg]:hidden",
            "group-data-[size=default]/avatar:size-2.5 group-data-[size=default]/avatar:[&>svg]:size-2",
            "group-data-[size=lg]/avatar:size-3 group-data-[size=lg]/avatar:[&>svg]:size-2",
            "group-data-[size=xl]/avatar:size-3.5 group-data-[size=xl]/avatar:[&>svg]:size-2.5",
        ],
        variants: [
            'position' => [
                'top-start' => "top-0 ltr:left-0 rtl:inset-s-0",
                'top-end' => "top-0 ltr:right-0 rtl:inset-e-0",
                'bottom-start' => "bottom-0 ltr:left-0 rtl:inset-s-0",
                'bottom-end' => "bottom-0 ltr:right-0 rtl:inset-e-0",
            ],
        ],
    ),
    'avatar-group' => new ComponentStyle(
        base: "group/avatar-group flex -space-x-2 *:data-[slot=avatar]:ring-2 *:data-[slot=avatar]:ring-white dark:*:data-[slot=avatar]:ring-neutral-900",
    ),
    'avatar-group-count' => new ComponentStyle(
        base: [
            "relative flex size-8 shrink-0 items-center justify-center rounded-full bg-neutral-100 text-sm text-neutral-500 ring-2 ring-white dark:bg-neutral-800 dark:text-neutral-400 dark:ring-neutral-900",
            "group-has-data-[size=xs]/avatar-group:size-5 group-has-data-[size=sm]/avatar-group:size-6",
            "group-has-data-[size=lg]/avatar-group:size-10 group-has-data-[size=xl]/avatar-group:size-12",
            "[&>svg]:size-4 group-has-data-[size=xs]/avatar-group:[&>svg]:size-2.5 group-has-data-[size=sm]/avatar-group:[&>svg]:size-3",
            "group-has-data-[size=lg]/avatar-group:[&>svg]:size-5 group-has-data-[size=xl]/avatar-group:[&>svg]:size-6",
        ],
    ),
];
