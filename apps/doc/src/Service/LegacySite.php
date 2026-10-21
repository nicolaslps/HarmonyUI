<?php

declare(strict_types=1);

namespace App\Service;

use Twig\Attribute\AsTwigFunction;

use function in_array;

/**
 * Pages carried over from the previous harmonyui.org that are not rewritten
 * yet. Slugs listed here render an "under construction" placeholder instead
 * of their Markdown body; remove a slug once its page is rewritten. The SEO
 * helpers reproduce the tags the old site served.
 */
final readonly class LegacySite
{
    private const string TITLE_SUFFIX = ' - Symfony Component | HarmonyUI - Modern UI Component Library for Symfony';

    private const string DESCRIPTION_SUFFIX = ' Free Twig component for Symfony with TailwindCSS styling and Stimulus controllers. Copy-paste ready examples and full documentation.';

    /** @var list<string> */
    private const array SLUGS = [
        'components/button-group',
        'components/drawer',
        'components/dropdown-menu',
        'components/form',
        'components/input-group',
        'components/select',
        'components/tabs',
        'components/textarea',
        'components/tooltip',
    ];

    #[AsTwigFunction('is_legacy_doc')]
    public function isLegacy(string $slug): bool
    {
        return in_array($slug, self::SLUGS, true);
    }

    public function seoTitle(string $title): string
    {
        return $title.self::TITLE_SUFFIX;
    }

    public function seoDescription(string $description): string
    {
        return $description.self::DESCRIPTION_SUFFIX;
    }
}
