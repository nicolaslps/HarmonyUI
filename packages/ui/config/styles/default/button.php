<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'button' => new ComponentStyle(
        base: [
            "group/button",
            "inline-flex shrink-0 items-center justify-center rounded-lg border border-transparent bg-clip-padding text-sm font-medium whitespace-nowrap transition-all outline-none select-none cursor-pointer",
            "focus-visible:border-neutral-500 focus-visible:ring-3 focus-visible:ring-neutral-500/40",
            "active:not-aria-[haspopup]:translate-y-px",
            "disabled:pointer-events-none disabled:opacity-50",
            "aria-invalid:border-red-600 aria-invalid:ring-3 aria-invalid:ring-red-600/20",
            "dark:aria-invalid:border-red-600/50 dark:aria-invalid:ring-red-600/40",
            "[&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4",
        ],
        variants: [
            'variant' => [
                'primary' => [
                    "bg-accent text-accent-foreground",
                    "[a]:hover:bg-[color-mix(in_oklab,var(--color-accent),transparent_10%)]",
                ],
                'outline' => [
                    "border-neutral-200 bg-white text-neutral-800",
                    "hover:bg-neutral-50 aria-expanded:bg-neutral-50",
                    "dark:border-neutral-600 dark:bg-neutral-700 dark:text-white",
                    "dark:hover:bg-neutral-600/75 dark:aria-expanded:bg-neutral-600/75",
                ],
                'secondary' => [
                    "bg-neutral-800/5 text-neutral-800",
                    "hover:bg-neutral-800/10 aria-expanded:bg-neutral-800/10",
                    "dark:bg-white/10 dark:text-white",
                    "dark:hover:bg-white/20 dark:aria-expanded:bg-white/20",
                ],
                'ghost' => [
                    "bg-transparent text-neutral-800",
                    "hover:bg-neutral-800/5 aria-expanded:bg-neutral-800/5",
                    "dark:text-white",
                    "dark:hover:bg-white/15 dark:aria-expanded:bg-white/15",
                ],
                'danger' => [
                    "bg-red-500 text-white [a]:hover:bg-red-600",
                    "focus-visible:border-red-500/40 focus-visible:ring-red-500/20",
                    "dark:bg-red-600 dark:[a]:hover:bg-red-500 dark:focus-visible:ring-red-600/40",
                ],
                'danger-soft' => [
                    "bg-red-600/10 text-red-600",
                    "hover:bg-red-600/20",
                    "focus-visible:border-red-600/40 focus-visible:ring-red-600/20",
                    "dark:bg-red-600/20 dark:hover:bg-red-600/30 dark:focus-visible:ring-red-600/40",
                ],
                'info' => [
                    "bg-blue-500 text-white [a]:hover:bg-blue-600",
                    "focus-visible:border-blue-500/40 focus-visible:ring-blue-500/20",
                    "dark:bg-blue-600 dark:[a]:hover:bg-blue-500 dark:focus-visible:ring-blue-600/40",
                ],
                'info-soft' => [
                    "bg-blue-600/10 text-blue-600",
                    "hover:bg-blue-600/20",
                    "focus-visible:border-blue-600/40 focus-visible:ring-blue-600/20",
                    "dark:bg-blue-600/20 dark:hover:bg-blue-600/30 dark:focus-visible:ring-blue-600/40",
                ],
                'success' => [
                    "bg-green-500 text-neutral-950 [a]:hover:bg-green-600",
                    "focus-visible:border-green-500/40 focus-visible:ring-green-500/20",
                    "dark:bg-green-600 dark:[a]:hover:bg-green-500 dark:focus-visible:ring-green-600/40",
                ],
                'success-soft' => [
                    "bg-green-600/10 text-green-600",
                    "hover:bg-green-600/20",
                    "focus-visible:border-green-600/40 focus-visible:ring-green-600/20",
                    "dark:bg-green-600/20 dark:hover:bg-green-600/30 dark:focus-visible:ring-green-600/40",
                ],
                'warning' => [
                    "bg-amber-500 text-neutral-950 [a]:hover:bg-amber-600",
                    "focus-visible:border-amber-500/40 focus-visible:ring-amber-500/20",
                    "dark:bg-amber-600 dark:[a]:hover:bg-amber-500 dark:focus-visible:ring-amber-600/40",
                ],
                'warning-soft' => [
                    "bg-amber-600/10 text-amber-600",
                    "hover:bg-amber-600/20",
                    "focus-visible:border-amber-600/40 focus-visible:ring-amber-600/20",
                    "dark:bg-amber-600/20 dark:hover:bg-amber-600/30 dark:focus-visible:ring-amber-600/40",
                ],
                'link' => [
                    "text-accent underline-offset-4",
                    "hover:underline",
                ],
            ],
            'size' => [
                'md' => [
                    "h-8 gap-1.5 px-2.5",
                    "ltr:has-data-[icon=inline-end]:pr-2 rtl:has-data-[icon=inline-end]:pe-2",
                    "ltr:has-data-[icon=inline-start]:pl-2 rtl:has-data-[icon=inline-start]:ps-2",
                ],
                'xs' => [
                    "h-6 gap-1 rounded-[min(var(--radius-md),10px)] px-2 text-xs",
                    "in-data-[slot=button-group]:rounded-lg",
                    "ltr:has-data-[icon=inline-end]:pr-1.5 rtl:has-data-[icon=inline-end]:pe-1.5",
                    "ltr:has-data-[icon=inline-start]:pl-1.5 rtl:has-data-[icon=inline-start]:ps-1.5",
                    "[&_svg:not([class*='size-'])]:size-3",
                ],
                'sm' => [
                    "h-7 gap-1 rounded-[min(var(--radius-md),12px)] px-2.5 text-[0.8rem]",
                    "in-data-[slot=button-group]:rounded-lg",
                    "ltr:has-data-[icon=inline-end]:pr-1.5 rtl:has-data-[icon=inline-end]:pe-1.5",
                    "ltr:has-data-[icon=inline-start]:pl-1.5 rtl:has-data-[icon=inline-start]:ps-1.5",
                    "[&_svg:not([class*='size-'])]:size-3.5",
                ],
                'lg' => [
                    "h-9 gap-1.5 px-2.5",
                    "ltr:has-data-[icon=inline-end]:pr-2 rtl:has-data-[icon=inline-end]:pe-2",
                    "ltr:has-data-[icon=inline-start]:pl-2 rtl:has-data-[icon=inline-start]:ps-2",
                ],
                'icon' => 'size-8',
                'icon-xs' => [
                    "size-6 rounded-[min(var(--radius-md),10px)]",
                    "in-data-[slot=button-group]:rounded-lg",
                    "[&_svg:not([class*='size-'])]:size-3",
                ],
                'icon-sm' => [
                    "size-7 rounded-[min(var(--radius-md),12px)]",
                    "in-data-[slot=button-group]:rounded-lg",
                ],
                'icon-lg' => 'size-9',
            ],
        ],
    ),
];
