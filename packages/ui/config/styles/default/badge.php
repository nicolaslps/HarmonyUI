<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'badge' => new ComponentStyle(
        base: [
            "group/badge inline-flex w-fit shrink-0 items-center justify-center overflow-hidden rounded-4xl border border-transparent text-xs font-medium whitespace-nowrap transition-all",
            "focus-visible:border-neutral-500 focus-visible:ring-[3px] focus-visible:ring-neutral-500/40",
            "aria-invalid:border-red-600 aria-invalid:ring-red-600/20",
            "dark:aria-invalid:ring-red-600/40",
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
            'color' => [
                'neutral' => [
                    "[--badge-color:var(--color-neutral-800)] [--badge-solid-bg:var(--color-accent)] [--badge-solid-fg:var(--color-accent-foreground)]",
                    "dark:[--badge-color:var(--color-white)]",
                ],
                'red' => "[--badge-color:var(--color-red-600)] [--badge-solid-bg:var(--color-red-500)] [--badge-solid-fg:var(--color-white)]",
                'orange' => [
                    "[--badge-color:var(--color-orange-600)] [--badge-solid-bg:var(--color-orange-500)] [--badge-solid-fg:var(--color-white)]",
                    "dark:[--badge-solid-bg:var(--color-orange-400)] dark:[--badge-solid-fg:var(--color-orange-950)]",
                ],
                'amber' => "[--badge-color:var(--color-amber-600)] [--badge-solid-bg:var(--color-amber-400)] [--badge-solid-fg:var(--color-amber-950)]",
                'yellow' => "[--badge-color:var(--color-yellow-600)] [--badge-solid-bg:var(--color-yellow-400)] [--badge-solid-fg:var(--color-yellow-950)]",
                'lime' => [
                    "[--badge-color:var(--color-lime-600)] [--badge-solid-bg:var(--color-lime-400)] [--badge-solid-fg:var(--color-lime-900)]",
                    "dark:[--badge-solid-fg:var(--color-lime-950)]",
                ],
                'green' => "[--badge-color:var(--color-green-600)] [--badge-solid-bg:var(--color-green-600)] [--badge-solid-fg:var(--color-white)]",
                'emerald' => "[--badge-color:var(--color-emerald-600)] [--badge-solid-bg:var(--color-emerald-600)] [--badge-solid-fg:var(--color-white)]",
                'teal' => "[--badge-color:var(--color-teal-600)] [--badge-solid-bg:var(--color-teal-600)] [--badge-solid-fg:var(--color-white)]",
                'cyan' => "[--badge-color:var(--color-cyan-600)] [--badge-solid-bg:var(--color-cyan-600)] [--badge-solid-fg:var(--color-white)]",
                'sky' => "[--badge-color:var(--color-sky-600)] [--badge-solid-bg:var(--color-sky-600)] [--badge-solid-fg:var(--color-white)]",
                'blue' => "[--badge-color:var(--color-blue-600)] [--badge-solid-bg:var(--color-blue-500)] [--badge-solid-fg:var(--color-white)]",
                'indigo' => "[--badge-color:var(--color-indigo-600)] [--badge-solid-bg:var(--color-indigo-500)] [--badge-solid-fg:var(--color-white)]",
                'violet' => "[--badge-color:var(--color-violet-600)] [--badge-solid-bg:var(--color-violet-500)] [--badge-solid-fg:var(--color-white)]",
                'purple' => "[--badge-color:var(--color-purple-600)] [--badge-solid-bg:var(--color-purple-500)] [--badge-solid-fg:var(--color-white)]",
                'fuchsia' => "[--badge-color:var(--color-fuchsia-600)] [--badge-solid-bg:var(--color-fuchsia-600)] [--badge-solid-fg:var(--color-white)]",
                'pink' => "[--badge-color:var(--color-pink-600)] [--badge-solid-bg:var(--color-pink-600)] [--badge-solid-fg:var(--color-white)]",
                'rose' => "[--badge-color:var(--color-rose-600)] [--badge-solid-bg:var(--color-rose-500)] [--badge-solid-fg:var(--color-white)]",
            ],
            'variant' => [
                'soft' => [
                    "bg-(--badge-color)/10 text-(--badge-color)",
                    "focus-visible:ring-(--badge-color)/20",
                    "[a]:hover:bg-(--badge-color)/20",
                    "dark:bg-(--badge-color)/20 dark:focus-visible:ring-(--badge-color)/40",
                    "dark:[a]:hover:bg-(--badge-color)/30",
                ],
                'solid' => [
                    "bg-(--badge-solid-bg) text-(--badge-solid-fg)",
                    "[a]:hover:bg-[color-mix(in_oklab,var(--badge-solid-bg),transparent_10%)]",
                ],
                'outline' => [
                    "border-(--badge-color)/25 text-(--badge-color) bg-transparent",
                    "[a]:hover:bg-(--badge-color)/10",
                    "dark:border-(--badge-color)/35",
                ],
            ],
        ],
        defaultVariants: ['variant' => 'soft', 'color' => 'neutral'],
    ),
];
