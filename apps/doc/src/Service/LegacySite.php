<?php

declare(strict_types=1);

namespace App\Service;

use function in_array;
use function ltrim;
use function rtrim;

/**
 * The previous harmonyui.org, kept online while its pages are rewritten.
 * Slugs listed here render a placeholder embedding the old page instead of
 * their Markdown body; remove a slug once its page is rewritten. The SEO
 * helpers reproduce the tags the old site served.
 */
final class LegacySite
{
    private const string TITLE_SUFFIX = ' - Symfony Component | HarmonyUI - Modern UI Component Library for Symfony';
    private const string DESCRIPTION_SUFFIX = ' Free Twig component for Symfony with TailwindCSS styling and Stimulus controllers. Copy-paste ready examples and full documentation.';

    /** @var list<string> */
    private const array SLUGS = [
        'components/alert-dialog',
        'components/avatar',
        'components/button-group',
        'components/dialog',
        'components/drawer',
        'components/dropdown-menu',
        'components/field',
        'components/form',
        'components/input',
        'components/input-group',
        'components/label',
        'components/popover',
        'components/select',
        'components/separator',
        'components/skeleton',
        'components/spinner',
        'components/switch',
        'components/table',
        'components/tabs',
        'components/textarea',
        'components/tooltip',
    ];

    public function __construct(
        private readonly string $legacyHost = 'https://old.harmonyui.org',
    ) {
    }

    public function isLegacy(string $slug): bool
    {
        return in_array($slug, self::SLUGS, true);
    }

    public function url(string $path): string
    {
        return rtrim($this->legacyHost, '/').'/'.ltrim($path, '/');
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
