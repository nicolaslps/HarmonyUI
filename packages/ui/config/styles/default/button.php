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
            "aria-expanded:scale-[0.97]",
            "disabled:pointer-events-none disabled:opacity-50",
            "aria-invalid:border-red-600 aria-invalid:ring-3 aria-invalid:ring-red-600/20",
            "dark:aria-invalid:border-red-600/50 dark:aria-invalid:ring-red-600/40",
            "[&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4",
        ],
        variants: [
            'color' => [
                'neutral' => [
                    "[--button-color:var(--color-neutral-800)] [--button-solid-bg:var(--color-accent)] [--button-solid-fg:var(--color-accent-foreground)]",
                    "dark:[--button-color:var(--color-white)]",
                ],
                'red' => "[--button-color:var(--color-red-600)] [--button-solid-bg:var(--color-red-500)] [--button-solid-fg:var(--color-white)]",
                'orange' => [
                    "[--button-color:var(--color-orange-600)] [--button-solid-bg:var(--color-orange-500)] [--button-solid-fg:var(--color-white)]",
                    "dark:[--button-solid-bg:var(--color-orange-400)] dark:[--button-solid-fg:var(--color-orange-950)]",
                ],
                'amber' => "[--button-color:var(--color-amber-600)] [--button-solid-bg:var(--color-amber-400)] [--button-solid-fg:var(--color-amber-950)]",
                'yellow' => "[--button-color:var(--color-yellow-600)] [--button-solid-bg:var(--color-yellow-400)] [--button-solid-fg:var(--color-yellow-950)]",
                'lime' => [
                    "[--button-color:var(--color-lime-600)] [--button-solid-bg:var(--color-lime-400)] [--button-solid-fg:var(--color-lime-900)]",
                    "dark:[--button-solid-fg:var(--color-lime-950)]",
                ],
                'green' => "[--button-color:var(--color-green-600)] [--button-solid-bg:var(--color-green-600)] [--button-solid-fg:var(--color-white)]",
                'emerald' => "[--button-color:var(--color-emerald-600)] [--button-solid-bg:var(--color-emerald-600)] [--button-solid-fg:var(--color-white)]",
                'teal' => "[--button-color:var(--color-teal-600)] [--button-solid-bg:var(--color-teal-600)] [--button-solid-fg:var(--color-white)]",
                'cyan' => "[--button-color:var(--color-cyan-600)] [--button-solid-bg:var(--color-cyan-600)] [--button-solid-fg:var(--color-white)]",
                'sky' => "[--button-color:var(--color-sky-600)] [--button-solid-bg:var(--color-sky-600)] [--button-solid-fg:var(--color-white)]",
                'blue' => "[--button-color:var(--color-blue-600)] [--button-solid-bg:var(--color-blue-500)] [--button-solid-fg:var(--color-white)]",
                'indigo' => "[--button-color:var(--color-indigo-600)] [--button-solid-bg:var(--color-indigo-500)] [--button-solid-fg:var(--color-white)]",
                'violet' => "[--button-color:var(--color-violet-600)] [--button-solid-bg:var(--color-violet-500)] [--button-solid-fg:var(--color-white)]",
                'purple' => "[--button-color:var(--color-purple-600)] [--button-solid-bg:var(--color-purple-500)] [--button-solid-fg:var(--color-white)]",
                'fuchsia' => "[--button-color:var(--color-fuchsia-600)] [--button-solid-bg:var(--color-fuchsia-600)] [--button-solid-fg:var(--color-white)]",
                'pink' => "[--button-color:var(--color-pink-600)] [--button-solid-bg:var(--color-pink-600)] [--button-solid-fg:var(--color-white)]",
                'rose' => "[--button-color:var(--color-rose-600)] [--button-solid-bg:var(--color-rose-500)] [--button-solid-fg:var(--color-white)]",
            ],
            'variant' => [
                'solid' => [
                    "bg-(--button-solid-bg) text-(--button-solid-fg)",
                    "hover:bg-[color-mix(in_oklab,var(--button-solid-bg),transparent_10%)]",
                    "focus-visible:border-(--button-solid-bg)/40 focus-visible:ring-(--button-solid-bg)/20",
                    "dark:focus-visible:ring-(--button-solid-bg)/40",
                ],
                'soft' => [
                    "bg-(--button-color)/10 text-(--button-color)",
                    "hover:bg-(--button-color)/20 aria-expanded:bg-(--button-color)/20",
                    "focus-visible:ring-(--button-color)/20",
                    "dark:bg-(--button-color)/20 dark:focus-visible:ring-(--button-color)/40",
                    "dark:hover:bg-(--button-color)/30 dark:aria-expanded:bg-(--button-color)/30",
                ],
                'outline' => [
                    "border-neutral-200 bg-white text-neutral-800",
                    "hover:bg-neutral-50 aria-expanded:bg-neutral-50",
                    "dark:border-neutral-600 dark:bg-neutral-700 dark:text-white",
                    "dark:hover:bg-neutral-600/75 dark:aria-expanded:bg-neutral-600/75",
                ],
                'ghost' => [
                    "bg-transparent text-neutral-800",
                    "hover:bg-neutral-800/5 aria-expanded:bg-neutral-800/5",
                    "dark:text-white",
                    "dark:hover:bg-white/15 dark:aria-expanded:bg-white/15",
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
        defaultVariants: ['variant' => 'solid', 'color' => 'neutral'],
    ),
];
