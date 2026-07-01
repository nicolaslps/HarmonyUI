<?php

declare(strict_types=1);

namespace App\Dto;

final readonly class DocPage
{
    public function __construct(
        public string $title,
        public string $description,
        public int $priority,
        public string $html,
    ) {
    }
}
