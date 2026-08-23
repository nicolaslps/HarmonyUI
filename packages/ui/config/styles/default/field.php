<?php

declare(strict_types=1);

use HarmonyUI\Style\ComponentStyle;

return [
    'field' => new ComponentStyle(
        base: [
            'group/field flex w-full gap-2',
            'data-[invalid=true]:text-red-600 dark:data-[invalid=true]:text-red-500',
        ],
        variants: [
            'orientation' => [
                'vertical' => "flex-col *:w-full [&>.sr-only]:w-auto",
                'horizontal' => [
                    "flex-row items-center has-[>[data-slot=field-content]]:items-start",
                    "*:data-[slot=field-label]:flex-auto",
                    "has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px",
                ],
                'responsive' => [
                    "flex-col *:w-full [&>.sr-only]:w-auto",
                    "@md/field-group:flex-row @md/field-group:items-center",
                    "@md/field-group:has-[>[data-slot=field-content]]:items-start",
                    "@md/field-group:*:w-auto @md/field-group:*:data-[slot=field-label]:flex-auto",
                    "@md/field-group:has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px",
                ],
            ],
        ],
        defaultVariants: ['orientation' => 'vertical'],
    ),
    'field-content' => new ComponentStyle(
        base: 'group/field-content flex flex-1 flex-col gap-0.5 leading-snug',
    ),
    'field-label' => new ComponentStyle(
        base: [
            'group/field-label peer/field-label flex w-fit gap-2 leading-snug group-data-[disabled=true]/field:opacity-50',
            'has-data-checked:border-(--color-accent)/30 has-data-checked:bg-(--color-accent)/5',
            'has-checked:border-(--color-accent)/30 has-checked:bg-(--color-accent)/5',
            'has-[>[data-slot=field]]:rounded-lg has-[>[data-slot=field]]:border *:data-[slot=field]:p-2.5',
            'dark:has-data-checked:border-(--color-accent)/20 dark:has-data-checked:bg-(--color-accent)/10',
            'dark:has-checked:border-(--color-accent)/20 dark:has-checked:bg-(--color-accent)/10',
            'has-[>[data-slot=field]]:w-full has-[>[data-slot=field]]:flex-col',
        ],
    ),
    'field-description' => new ComponentStyle(
        base: [
            'ltr:text-left rtl:text-start text-sm leading-normal font-normal text-neutral-500 dark:text-neutral-400',
            'group-has-data-horizontal/field:text-balance',
            '[[data-variant=legend]+&]:-mt-1.5 last:mt-0 nth-last-2:-mt-1',
            '[&>a]:underline [&>a]:underline-offset-4 [&>a:hover]:text-(--color-accent)',
        ],
    ),
    'field-error' => new ComponentStyle(
        base: 'text-red-600 text-sm font-normal dark:text-red-500',
    ),
];
