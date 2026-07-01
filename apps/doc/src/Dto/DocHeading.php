<?php

declare(strict_types=1);

namespace App\Dto;

/**
 * A section heading (h1-h3) extracted from a documentation page,
 * with the anchor id injected into the rendered HTML.
 */
final readonly class DocHeading
{
    public function __construct(
        public int $level,
        public string $text,
        public string $id,
    ) {
    }
}
