<?php

declare(strict_types=1);

namespace App\Dto;

/**
 * Lightweight page descriptor built from front matter only, without rendering
 * the Markdown body. Used for the sidebar, index pages and navigation links.
 */
final readonly class DocPageMetadata
{
    public function __construct(
        public string $slug,
        public string $title,
        public string $description,
        public int $priority,
    ) {
    }

    /**
     * First slug segment, e.g. "components" for "components/button".
     */
    public function category(): string
    {
        return explode('/', $this->slug)[0];
    }
}
