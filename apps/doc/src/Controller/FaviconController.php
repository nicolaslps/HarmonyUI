<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FaviconController extends AbstractController
{
    public function __construct(
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
        #[Autowire('%kernel.environment%')]
        private readonly string $environment,
    ) {
    }

    #[Route('/favicon.svg', name: 'app_favicon')]
    public function index(): Response
    {
        $svg = file_get_contents($this->projectDir.'/assets/icons/harmonyui.svg');

        $color = match ($this->environment) {
            'dev' => '#16a34a',
            'test' => '#f97316',
            default => null,
        };

        if (null !== $color) {
            $svg = str_replace('<svg ', sprintf('<svg color="%s" ', $color), $svg);
        }

        return new Response($svg, Response::HTTP_OK, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
