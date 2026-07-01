<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\DocHeading;
use App\Dto\DocPage;
use App\Dto\DocPageMetadata;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Node\Block\Document;
use League\CommonMark\Node\RawMarkupContainerInterface;
use League\CommonMark\Node\StringContainerHelper;
use League\CommonMark\Normalizer\SlugNormalizer;
use League\CommonMark\Parser\MarkdownParserInterface;
use League\CommonMark\Renderer\DocumentRendererInterface;
use RuntimeException;
use Twig\Environment;

use function sprintf;

final readonly class DocPageRenderer
{
    private const int MAX_TOC_LEVEL = 3;

    public function __construct(
        private Environment $twig,
        private MarkdownParserInterface $parser,
        private DocumentRendererInterface $renderer,
        private string $contentDir,
    ) {
    }

    public function render(DocPageMetadata $meta): DocPage
    {
        $dir = sprintf('%s/%s', $this->contentDir, $meta->slug);
        $raw = $this->read($dir.'/index.md');

        /** @var array<string, string> $demos Placeholder key => example source code. */
        $demos = [];
        $i = 0;

        $raw = preg_replace_callback(
            '/:::\s*demo\s+([a-z0-9\-]+)\s*:::/i',
            function (array $m) use (&$demos, &$i, $dir): string {
                $key = 'DEMO_PLACEHOLDER_'.$i;
                $demos[$key] = $this->read(sprintf('%s/examples/%s.twig', $dir, $m[1]));
                ++$i;

                return sprintf('<!--%s-->', $key);
            },
            $raw
        );

        $document = $this->parser->parse($raw);
        $headings = $this->extractHeadings($document, $meta->slug);
        $html = $this->renderer->renderDocument($document)->getContent();

        foreach ($demos as $key => $source) {
            $rendered = $this->twig->createTemplate($source)->render();
            $block = $this->twig->render('doc/_preview_block.html.twig', [
                'source' => $source,
                'rendered' => $rendered,
            ]);
            $html = str_replace(sprintf('<!--%s-->', $key), $block, $html);
        }

        return new DocPage($meta, $html, $headings);
    }

    /**
     * Assigns a unique anchor id to every h1-h3 and returns them in document order.
     *
     * @return list<DocHeading>
     */
    private function extractHeadings(Document $document, string $seed): array
    {
        $normalizer = new SlugNormalizer();
        $headings = [];
        $position = 0;

        foreach ($document->iterator() as $node) {
            if (!$node instanceof Heading || $node->getLevel() > self::MAX_TOC_LEVEL) {
                continue;
            }

            $text = StringContainerHelper::getChildText($node, [RawMarkupContainerInterface::class]);

            $token = substr(hash('xxh64', sprintf('%s|%d|%s', $seed, $position, $text)), 0, 6);
            $id = sprintf('%s-%s', $normalizer->normalize($text), $token);
            ++$position;

            $node->data->set('attributes/id', $id);
            $headings[] = new DocHeading($node->getLevel(), $text, $id);
        }

        return $headings;
    }

    private function read(string $path): string
    {
        $content = @file_get_contents($path);

        if (false === $content) {
            throw new RuntimeException(sprintf('Unable to read documentation file "%s".', $path));
        }

        return $content;
    }
}
