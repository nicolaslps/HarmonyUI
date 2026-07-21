<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The previous site served its component index at /components; the new one
 * lives at /docs/components.
 */
final class LegacyController extends AbstractController
{
    #[Route('/components', name: 'app_legacy_components')]
    public function components(): Response
    {
        return $this->redirectToRoute('app_docs_components', [], Response::HTTP_MOVED_PERMANENTLY);
    }

    #[Route('/docs/overview/installation', name: 'app_legacy_installation')]
    public function installation(): Response
    {
        return $this->redirectToRoute('app_docs_show', [
            'slug' => 'overview/getting-started',
        ], Response::HTTP_MOVED_PERMANENTLY);
    }
}
