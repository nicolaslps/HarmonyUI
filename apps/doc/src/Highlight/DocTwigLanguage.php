<?php

declare(strict_types=1);

namespace App\Highlight;

use Override;
use Tempest\Highlight\Languages\Twig\TwigLanguage;

final class DocTwigLanguage extends TwigLanguage
{
    #[Override]
    public function getPatterns(): array
    {
        return [
            ...parent::getPatterns(),
            new TwigComponentOpenTagPattern(),
            new TwigComponentCloseTagPattern(),
            new AttributeValuePattern(),
        ];
    }
}
