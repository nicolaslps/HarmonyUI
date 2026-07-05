<?php

declare(strict_types=1);

namespace App\Twig;

use App\Highlight\DocTwigLanguage;
use Tempest\Highlight\Highlighter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class CodeHighlightExtension extends AbstractExtension
{
    private readonly Highlighter $highlighter;

    public function __construct()
    {
        $this->highlighter = new Highlighter()->addLanguage(new DocTwigLanguage());
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
