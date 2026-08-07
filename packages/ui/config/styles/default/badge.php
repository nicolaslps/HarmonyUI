<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'badge' => new ComponentStyle(
        base: [
            "group/badge inline-flex w-fit shrink-0 items-center justify-center overflow-hidden rounded-4xl border border-transparent text-xs font-medium whitespace-nowrap transition-all",
            "focus-visible:border-neutral-500 focus-visible:ring-[3px] focus-visible:ring-neutral-500/40",
            "aria-invalid:border-red-600 aria-invalid:ring-red-600/20 dark:aria-invalid:ring-red-600/40",
            "[&>svg]:pointer-events-none",
        ],
        variants: [
            'size' => [
                'sm' => [
                    "h-4 gap-1 px-1.5 [&>svg]:size-2.5!",
                    "ltr:has-data-[icon=inline-end]:pr-1 rtl:has-data-[icon=inline-end]:pe-1",
                    "ltr:has-data-[icon=inline-start]:pl-1 rtl:has-data-[icon=inline-start]:ps-1",
                ],
                'md' => [
                    "h-5 gap-1 px-2 py-0.5 [&>svg]:size-3!",
                    "ltr:has-data-[icon=inline-end]:pr-1.5 rtl:has-data-[icon=inline-end]:pe-1.5",
                    "ltr:has-data-[icon=inline-start]:pl-1.5 rtl:has-data-[icon=inline-start]:ps-1.5",
                ],
                'lg' => [
                    "h-6 gap-1.5 px-2.5 py-1 [&>svg]:size-3.5!",
                    "ltr:has-data-[icon=inline-end]:pr-2 rtl:has-data-[icon=inline-end]:pe-2",
                    "ltr:has-data-[icon=inline-start]:pl-2 rtl:has-data-[icon=inline-start]:ps-2",
                ],
            ],
            'variant' => [
                'default' => [
                    "bg-accent text-accent-foreground",
                    "[a]:hover:bg-[color-mix(in_oklab,var(--color-accent),transparent_10%)]",
                ],
                'secondary' => [
                    "bg-neutral-800/5 text-neutral-800 dark:bg-white/10 dark:text-white",
                    "[a]:hover:bg-neutral-800/10 dark:[a]:hover:bg-white/20",
                ],
                'outline' => [
                    "border-neutral-200 text-neutral-950 dark:border-neutral-800 dark:text-neutral-50",
                    "[a]:hover:bg-neutral-100 [a]:hover:text-neutral-500",
                    "dark:[a]:hover:bg-neutral-800 dark:[a]:hover:text-neutral-400",
                ],
                'danger' => [
                    "bg-red-600/10 text-red-600",
                    "focus-visible:ring-red-600/20 dark:bg-red-600/20 dark:focus-visible:ring-red-600/40",
                    "[a]:hover:bg-red-600/20",
                ],
                'info' => [
                    "bg-blue-600/10 text-blue-600",
                    "focus-visible:ring-blue-600/20 dark:bg-blue-600/20 dark:focus-visible:ring-blue-600/40",
                    "[a]:hover:bg-blue-600/20",
                ],
                'success' => [
                    "bg-green-600/10 text-green-600",
                    "focus-visible:ring-green-600/20 dark:bg-green-600/20 dark:focus-visible:ring-green-600/40",
                    "[a]:hover:bg-green-600/20",
                ],
                'warning' => [
                    "bg-amber-600/10 text-amber-600",
                    "focus-visible:ring-amber-600/20 dark:bg-amber-600/20 dark:focus-visible:ring-amber-600/40",
                    "[a]:hover:bg-amber-600/20",
                ],
            ],
        ],
    ),
];
