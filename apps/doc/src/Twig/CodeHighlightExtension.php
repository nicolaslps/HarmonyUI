<?php

declare(strict_types=1);

namespace App\Twig;

use Tempest\Highlight\Highlighter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class CodeHighlightExtension extends AbstractExtension
{
    public function __construct(
        private readonly Highlighter $highlighter,
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('highlight', $this->highlight(...), ['is_safe' => ['html']]),
        ];
    }

    public function highlight(string $code, string $language = 'twig'): string
    {
        return $this->highlighter->parse($code, $language);
    }
}
