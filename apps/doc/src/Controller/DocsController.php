<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\DocPageMetadata;
use App\Service\DocCatalog;
use App\Service\DocPageRenderer;
use App\Service\LegacySite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function sprintf;

#[Route('/docs/', name: 'app_docs_')]
final class DocsController extends AbstractController
{
    #[Route('components', name: 'components', priority: 10)]
    public function index(DocCatalog $catalog): Response
    {
        return $this->render('doc/components/index.html.twig', [
            'components' => $catalog->byCategory()['components'] ?? [],
        ]);
    }

    #[Route('{slug}', name: 'show', requirements: ['slug' => '.+'])]
    public function show(string $slug, DocCatalog $catalog, DocPageRenderer $renderer, LegacySite $legacySite): Response
    {
        $meta = $catalog->get($slug);
        if (!$meta instanceof DocPageMetadata) {
            throw $this->createNotFoundException(sprintf('Documentation page "%s" not found.', $slug));
        }

        // Pages not rewritten yet embed the previous site instead of rendering.
        if ($legacySite->isLegacy($slug)) {
            return $this->render('legacy/under_construction.html.twig', [
                'title' => $legacySite->seoTitle($meta->title),
                'description' => $legacySite->seoDescription($meta->description),
                'legacy_url' => $legacySite->url('/docs/'.$slug),
            ]);
        }

        return $this->render('doc/show/show.html.twig', [
            'page' => $renderer->render($meta),
            'navigation' => $catalog->byCategory(),
            'previous' => $catalog->previous($slug),
            'next' => $catalog->next($slug),
        ]);
    }
}
