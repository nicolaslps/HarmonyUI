<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'alert' => new ComponentStyle(
        base: [
            "@container/alert relative grid w-full items-start gap-x-2 gap-y-0.5 rounded-xl border px-3.5 py-3 text-start text-sm",
            "has-[>svg]:grid-cols-[calc(var(--spacing)*4)_1fr] has-data-[slot=alert-action]:grid-cols-[1fr_auto] has-[>svg]:has-data-[slot=alert-action]:grid-cols-[calc(var(--spacing)*4)_1fr_auto]",
            "border-(--alert-border) bg-(--alert-bg)",
            "[&>svg]:h-lh [&>svg]:w-4 [&>svg]:text-(--alert-icon)",
        ],
        variants: [
            'color' => [
                'neutral' => [
                    "[--alert-border:var(--color-neutral-200)] [--alert-bg:var(--color-neutral-50)]",
                    "[--alert-heading:var(--color-neutral-800)] [--alert-text:var(--color-neutral-500)] [--alert-icon:var(--color-neutral-400)]",
                    "dark:[--alert-border:var(--color-white)] dark:border-(--alert-border)/5",
                    "dark:[--alert-bg:var(--color-neutral-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-neutral-200)] dark:[--alert-text:var(--color-neutral-300)]",
                ],
                'red' => [
                    "[--alert-border:var(--color-red-200)] [--alert-bg:var(--color-red-50)]",
                    "[--alert-heading:var(--color-red-700)] [--alert-text:var(--color-red-700)] [--alert-icon:var(--color-red-400)]",
                    "dark:[--alert-border:var(--color-red-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-red-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-red-200)] dark:[--alert-text:var(--color-red-300)]",
                ],
                'orange' => [
                    "[--alert-border:var(--color-orange-200)] [--alert-bg:var(--color-orange-50)]",
                    "[--alert-heading:var(--color-orange-600)] [--alert-text:var(--color-orange-600)] [--alert-icon:var(--color-orange-500)]",
                    "dark:[--alert-border:var(--color-orange-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-orange-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-orange-200)] dark:[--alert-text:var(--color-orange-300)] dark:[--alert-icon:var(--color-orange-400)]",
                ],
                'amber' => [
                    "[--alert-border:var(--color-amber-400)] [--alert-bg:var(--color-amber-50)]",
                    "[--alert-heading:var(--color-amber-600)] [--alert-text:var(--color-amber-600)] [--alert-icon:var(--color-amber-500)]",
                    "dark:[--alert-border:var(--color-amber-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-amber-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-amber-200)] dark:[--alert-text:var(--color-amber-300)] dark:[--alert-icon:var(--color-amber-400)]",
                ],
                'yellow' => [
                    "[--alert-border:var(--color-yellow-400)] [--alert-bg:var(--color-yellow-50)]",
                    "[--alert-heading:var(--color-yellow-600)] [--alert-text:var(--color-yellow-700)] [--alert-icon:var(--color-yellow-500)]",
                    "dark:[--alert-border:var(--color-yellow-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-yellow-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-yellow-200)] dark:[--alert-text:var(--color-yellow-300)] dark:[--alert-icon:var(--color-yellow-400)]",
                ],
                'lime' => [
                    "[--alert-border:var(--color-lime-400)] [--alert-bg:var(--color-lime-50)]",
                    "[--alert-heading:var(--color-lime-700)] [--alert-text:var(--color-lime-600)] [--alert-icon:var(--color-lime-500)]",
                    "dark:[--alert-border:var(--color-lime-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-lime-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-lime-200)] dark:[--alert-text:var(--color-lime-300)] dark:[--alert-icon:var(--color-lime-400)]",
                ],
                'green' => [
                    "[--alert-border:var(--color-green-300)] [--alert-bg:var(--color-green-50)]",
                    "[--alert-heading:var(--color-green-600)] [--alert-text:var(--color-green-600)] [--alert-icon:var(--color-green-500)]",
                    "dark:[--alert-border:var(--color-green-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-green-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-green-200)] dark:[--alert-text:var(--color-green-300)] dark:[--alert-icon:var(--color-green-400)]",
                ],
                'emerald' => [
                    "[--alert-border:var(--color-emerald-200)] [--alert-bg:var(--color-emerald-50)]",
                    "[--alert-heading:var(--color-emerald-600)] [--alert-text:var(--color-emerald-600)] [--alert-icon:var(--color-emerald-500)]",
                    "dark:[--alert-border:var(--color-emerald-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-emerald-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-emerald-200)] dark:[--alert-text:var(--color-emerald-300)] dark:[--alert-icon:var(--color-emerald-400)]",
                ],
                'teal' => [
                    "[--alert-border:var(--color-teal-200)] [--alert-bg:var(--color-teal-50)]",
                    "[--alert-heading:var(--color-teal-600)] [--alert-text:var(--color-teal-600)] [--alert-icon:var(--color-teal-500)]",
                    "dark:[--alert-border:var(--color-teal-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-teal-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-teal-200)] dark:[--alert-text:var(--color-teal-300)] dark:[--alert-icon:var(--color-teal-400)]",
                ],
                'cyan' => [
                    "[--alert-border:var(--color-cyan-200)] [--alert-bg:var(--color-cyan-50)]",
                    "[--alert-heading:var(--color-cyan-600)] [--alert-text:var(--color-cyan-600)] [--alert-icon:var(--color-cyan-500)]",
                    "dark:[--alert-border:var(--color-cyan-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-cyan-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-cyan-200)] dark:[--alert-text:var(--color-cyan-300)] dark:[--alert-icon:var(--color-cyan-400)]",
                ],
                'sky' => [
                    "[--alert-border:var(--color-sky-200)] [--alert-bg:var(--color-sky-50)]",
                    "[--alert-heading:var(--color-sky-600)] [--alert-text:var(--color-sky-600)] [--alert-icon:var(--color-sky-500)]",
                    "dark:[--alert-border:var(--color-sky-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-sky-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-sky-200)] dark:[--alert-text:var(--color-sky-300)] dark:[--alert-icon:var(--color-sky-400)]",
                ],
                'blue' => [
                    "[--alert-border:var(--color-blue-200)] [--alert-bg:var(--color-blue-50)]",
                    "[--alert-heading:var(--color-blue-600)] [--alert-text:var(--color-blue-600)] [--alert-icon:var(--color-blue-500)]",
                    "dark:[--alert-border:var(--color-blue-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-blue-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-blue-200)] dark:[--alert-text:var(--color-blue-300)] dark:[--alert-icon:var(--color-blue-400)]",
                ],
                'indigo' => [
                    "[--alert-border:var(--color-indigo-200)] [--alert-bg:var(--color-indigo-50)]",
                    "[--alert-heading:var(--color-indigo-600)] [--alert-text:var(--color-indigo-600)] [--alert-icon:var(--color-indigo-500)]",
                    "dark:[--alert-border:var(--color-indigo-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-indigo-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-indigo-200)] dark:[--alert-text:var(--color-indigo-300)] dark:[--alert-icon:var(--color-indigo-400)]",
                ],
                'violet' => [
                    "[--alert-border:var(--color-violet-200)] [--alert-bg:var(--color-violet-50)]",
                    "[--alert-heading:var(--color-violet-600)] [--alert-text:var(--color-violet-600)] [--alert-icon:var(--color-violet-500)]",
                    "dark:[--alert-border:var(--color-violet-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-violet-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-violet-200)] dark:[--alert-text:var(--color-violet-300)] dark:[--alert-icon:var(--color-violet-400)]",
                ],
                'purple' => [
                    "[--alert-border:var(--color-purple-300)] [--alert-bg:var(--color-purple-50)]",
                    "[--alert-heading:var(--color-purple-800)] [--alert-text:var(--color-purple-700)] [--alert-icon:var(--color-purple-500)]",
                    "dark:[--alert-border:var(--color-purple-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-purple-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-purple-200)] dark:[--alert-text:var(--color-purple-300)] dark:[--alert-icon:var(--color-purple-400)]",
                ],
                'fuchsia' => [
                    "[--alert-border:var(--color-fuchsia-200)] [--alert-bg:var(--color-fuchsia-50)]",
                    "[--alert-heading:var(--color-fuchsia-600)] [--alert-text:var(--color-fuchsia-600)] [--alert-icon:var(--color-fuchsia-500)]",
                    "dark:[--alert-border:var(--color-fuchsia-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-fuchsia-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-fuchsia-200)] dark:[--alert-text:var(--color-fuchsia-300)] dark:[--alert-icon:var(--color-fuchsia-400)]",
                ],
                'pink' => [
                    "[--alert-border:var(--color-pink-200)] [--alert-bg:var(--color-pink-50)]",
                    "[--alert-heading:var(--color-pink-600)] [--alert-text:var(--color-pink-600)] [--alert-icon:var(--color-pink-500)]",
                    "dark:[--alert-border:var(--color-pink-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-pink-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-pink-200)] dark:[--alert-text:var(--color-pink-300)] dark:[--alert-icon:var(--color-pink-400)]",
                ],
                'rose' => [
                    "[--alert-border:var(--color-rose-200)] [--alert-bg:var(--color-rose-50)]",
                    "[--alert-heading:var(--color-rose-600)] [--alert-text:var(--color-rose-600)] [--alert-icon:var(--color-rose-500)]",
                    "dark:[--alert-border:var(--color-rose-400)] dark:border-(--alert-border)/50",
                    "dark:[--alert-bg:var(--color-rose-400)] dark:bg-(--alert-bg)/10",
                    "dark:[--alert-heading:var(--color-rose-200)] dark:[--alert-text:var(--color-rose-300)] dark:[--alert-icon:var(--color-rose-400)]",
                ],
            ],
        ],
        defaultVariants: ['color' => 'neutral'],
    ),
    'alert-title' => new ComponentStyle(
        base: "col-start-1 font-medium text-(--alert-heading) [svg~&]:col-start-2",
    ),
    'alert-description' => new ComponentStyle(
        base: "col-start-1 flex flex-col gap-2.5 text-(--alert-text) [svg~&]:col-start-2",
    ),
    'alert-action' => new ComponentStyle(
        base: "flex gap-1",
        variants: [
            'inline' => [
                'true' => "@max-lg/alert:mt-2 @max-lg/alert:col-start-1 @max-lg/alert:-col-end-1 @max-lg/alert:[svg~&]:col-start-2 @lg/alert:-col-start-2 @lg/alert:row-start-1 @lg/alert:row-end-3 @lg/alert:self-center",
                'false' => "mt-2 col-start-1 -col-end-1 [svg~&]:col-start-2",
            ],
        ],
        defaultVariants: ['inline' => 'true'],
    ),
];
