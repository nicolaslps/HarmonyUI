<?php

declare(strict_types=1);

namespace App\Highlight;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\Tokens\TokenTypeEnum;

/**
 * Matches namespaced component open tags (e.g. `<twig:ui:Button>`),
 * which the base HTML grammar deliberately ignores.
 */
final readonly class TwigComponentOpenTagPattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '<(?<match>[a-zA-Z][\w\-]*(?::[\w\-\.]+)+)';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::TYPE;
    }
}
