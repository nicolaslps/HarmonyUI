<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\DocCatalog;
use App\Service\LegacySite;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Process\Process;

use const JSON_THROW_ON_ERROR;

/**
 * Pre-renders the Open Graph image of every known page into var/og (see
 * OgImageController), so social crawlers never pay the on-request rendering
 * cost. Runs at Docker build time and can be re-run anytime.
 */
#[AsCommand(name: 'app:og:warm', description: 'Pre-render the Open Graph card image of every known page')]
final class OgWarmCommand extends Command
{
    // templates/base.html.twig
    private const string HOME_TITLE = 'Modern UI component library for Symfony';
    private const string HOME_DESCRIPTION = 'Build stunning Symfony applications with HarmonyUI. Modern component library featuring beautiful Twig components, Tailwind CSS styling and Stimulus controllers. Free, open source and developer friendly.';

    // templates/doc/components/index.html.twig
    private const string COMPONENTS_TITLE = 'Components';
    private const string COMPONENTS_DESCRIPTION = 'Browse every HarmonyUI component: accessible, extensible Twig components for Symfony, styled with Tailwind CSS and powered by Stimulus.';

    // templates/doc/show/layout.html.twig
    private const string DOC_DESCRIPTION_FALLBACK = 'HarmonyUI documentation: accessible, extensible Twig components for Symfony, styled with Tailwind CSS.';

    public function __construct(
        private readonly DocCatalog $catalog,
        private readonly LegacySite $legacySite,
        #[Autowire('%kernel.project_dir%/og')]
        private readonly string $ogDir,
        #[Autowire('%kernel.project_dir%/var/og')]
        private readonly string $cacheDir,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $pairs = [
            [self::HOME_TITLE, self::HOME_DESCRIPTION],
            [self::COMPONENTS_TITLE, self::COMPONENTS_DESCRIPTION],
        ];

        foreach ($this->catalog->all() as $page) {
            $pairs[] = $this->legacySite->isLegacy($page->slug)
                ? [$page->title, $page->description]
                : [$page->title, $page->description ?: self::DOC_DESCRIPTION_FALLBACK];
        }

        $process = new Process(['node', 'warm.mjs', $this->cacheDir], $this->ogDir, timeout: 300);
        $process->setInput(json_encode($pairs, JSON_THROW_ON_ERROR));
        $process->mustRun();

        $output->write($process->getOutput());

        return Command::SUCCESS;
    }
}
