<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\DocPageMetadata;
use League\CommonMark\Extension\FrontMatter\FrontMatterParserInterface;
use RuntimeException;
use Symfony\Component\Finder\Finder;
use Symfony\Contracts\Cache\CacheInterface;

use function sprintf;

/**
 * Index of every documentation page, built from front matter only (the
 * Markdown body is never rendered here). The index is cached and invalidated
 * automatically when a page is added, removed or modified.
 */
final class DocCatalog
{
    /** @var list<DocPageMetadata>|null */
    private ?array $pages = null;

    public function __construct(
        private readonly FrontMatterParserInterface $frontMatterParser,
        private readonly CacheInterface $cache,
        private readonly string $contentDir,
    ) {
    }

    /**
     * @return list<DocPageMetadata> Pages sorted by priority, then title.
     */
    public function all(): array
    {
        return $this->pages ??= $this->load();
    }

    public function get(string $slug): ?DocPageMetadata
    {
        foreach ($this->all() as $page) {
            if ($page->slug === $slug) {
                return $page;
            }
        }

        return null;
    }

    public function previous(string $slug): ?DocPageMetadata
    {
        $pages = $this->all();

        foreach ($pages as $index => $page) {
            if ($page->slug === $slug) {
                return $pages[$index - 1] ?? null;
            }
        }

        return null;
    }

    public function next(string $slug): ?DocPageMetadata
    {
        $pages = $this->all();

        foreach ($pages as $index => $page) {
            if ($page->slug === $slug) {
                return $pages[$index + 1] ?? null;
            }
        }

        return null;
    }

    /**
     * @return array<string, list<DocPageMetadata>> Pages grouped by category, e.g. for the sidebar.
     */
    public function byCategory(): array
    {
        $groups = [];

        foreach ($this->all() as $page) {
            $groups[$page->category()][] = $page;
        }

        return $groups;
    }

    /**
     * @return list<DocPageMetadata>
     */
    private function load(): array
    {
        $files = [];
        $finder = new Finder()->files()->in($this->contentDir)->name('index.md')->sortByName();

        foreach ($finder as $file) {
            $files[$file->getRelativePath()] = $file->getMTime();
        }

        // The fingerprint invalidates the cached index as soon as any page changes.
        $key = 'doc_catalog.'.hash('xxh128', serialize($files));

        return $this->cache->get($key, function () use ($files): array {
            $pages = array_map($this->parseMetadata(...), array_keys($files));

            usort(
                $pages,
                static fn (DocPageMetadata $a, DocPageMetadata $b): int => [$a->priority, $a->title] <=> [$b->priority, $b->title],
            );

            return $pages;
        });
    }

    private function parseMetadata(string $slug): DocPageMetadata
    {
        $path = sprintf('%s/%s/index.md', $this->contentDir, $slug);
        $content = @file_get_contents($path);

        if (false === $content) {
            throw new RuntimeException(sprintf('Unable to read documentation file "%s".', $path));
        }

        /** @var array<string, mixed> $meta */
        $meta = (array) $this->frontMatterParser->parse($content)->getFrontMatter();

        return new DocPageMetadata(
            $slug,
            strval($meta['title'] ?? $slug),
            strval($meta['description'] ?? ''),
            intval($meta['priority'] ?? 0),
        );
    }
}
