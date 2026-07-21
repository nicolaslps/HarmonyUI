<?php

declare(strict_types=1);

namespace App\Highlight;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\ExtensionInterface;

final readonly class HighlightedCodeBlockExtension implements ExtensionInterface
{
    public function __construct(
        private MarkdownCodeBlockRenderer $renderer,
    ) {
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(FencedCode::class, $this->renderer, 10);
    }
}
