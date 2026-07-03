<?php

declare(strict_types=1);

namespace App\Dto;

final readonly class DocPage
{
    /**
     * @param list<DocHeading> $headings headings in document order, for the table of contents
     */
    public function __construct(
        public DocPageMetadata $meta,
        public string $html,
        public array $headings,
    ) {
    }
}
