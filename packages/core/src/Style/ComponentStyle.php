<?php

declare(strict_types=1);

namespace HarmonyUI\Core\Style;

/**
 * CVA styles of a single component part, backing the `hui()` Twig function.
 */
final readonly class ComponentStyle
{
    /**
     * @param string $base Classes always applied to the component
     * @param array<string, array<string, string>> $variants Map of category => { variant name => classes }
     * @param list<array<string, string|list<string>>> $compoundVariants List of { category => matching variant(s), ..., 'class' => classes }
     * @param array<string, string> $defaultVariants Map of category => variant name applied when no value is passed
     */
    public function __construct(
        public string $base = '',
        public array  $variants = [],
        public array  $compoundVariants = [],
        public array  $defaultVariants = [],
    )
    {
    }

    /**
     * Empty values are omitted so a partial style never clobbers the values it doesn't set.
     *
     * @return array{
     *     base?: string,
     *     variants?: array<string, array<string, string>>,
     *     compound_variants?: list<array<string, string|list<string>>>,
     *     default_variants?: array<string, string>,
     * }
     */
    public function toConfig(): array
    {
        return array_filter([
            'base' => $this->base,
            'variants' => $this->variants,
            'compound_variants' => $this->compoundVariants,
            'default_variants' => $this->defaultVariants,
        ], static fn(string|array $value): bool => [] !== $value && '' !== $value);
    }
}
