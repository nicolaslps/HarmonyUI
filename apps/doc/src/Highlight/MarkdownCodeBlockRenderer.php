<?php

declare(strict_types=1);

namespace App\Highlight;

use InvalidArgumentException;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use Tempest\Highlight\Highlighter;
use Twig\Environment;

use function sprintf;

/**
 * Replaces CommonMark's default fenced code block rendering with a highlighted,
 * copy-to-clipboard block matching the rest of the doc site's code samples.
 */
final readonly class MarkdownCodeBlockRenderer implements NodeRendererInterface
{
    public function __construct(
        private Highlighter $highlighter,
        private Environment $twig,
    ) {
    }

    public function render(Node $node, ChildNodeRendererInterface $childRenderer): string
    {
        if (!$node instanceof FencedCode) {
            throw new InvalidArgumentException(sprintf('Node must be an instance of %s.', FencedCode::class));
        }

        $language = $node->getInfoWords()[0] ?? '';
        $code = $node->getLiteral();

        return $this->twig->render('doc/show/_code_block.html.twig', [
            'language' => $language,
            'source' => $code,
            'highlighted' => $this->highlighter->parse($code, '' !== $language ? $language : 'text'),
        ]);
    }
}
