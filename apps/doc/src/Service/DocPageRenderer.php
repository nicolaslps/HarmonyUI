<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\DocPage;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;
use League\CommonMark\MarkdownConverter;
use RuntimeException;
use Twig\Environment;

use function sprintf;

final readonly class DocPageRenderer
{
    public function __construct(
        private Environment $twig,
        private MarkdownConverter $markdown,
        private string $contentDir,
    ) {
    }

    public function render(string $slug): DocPage
    {
        $dir = sprintf('%s/%s', $this->contentDir, $slug);
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

        $result = $this->markdown->convert($raw);
        $html = $result->getContent();
        $meta = $result instanceof RenderedContentWithFrontMatter ? $result->getFrontMatter() : [];

        foreach ($demos as $key => $source) {
            $rendered = $this->twig->createTemplate($source)->render();
            $block = $this->twig->render('doc/_preview_block.html.twig', [
                'source' => $source,
                'rendered' => $rendered,
            ]);
            $html = str_replace(sprintf('<!--%s-->', $key), $block, $html);
        }

        return new DocPage(
            strval($meta['title'] ?? ''),
            strval($meta['description'] ?? ''),
            intval($meta['priority'] ?? 0),
            $html,
        );
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
