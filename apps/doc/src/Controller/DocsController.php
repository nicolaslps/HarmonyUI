<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\DocPageMetadata;
use App\Service\DocCatalog;
use App\Service\DocPageRenderer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function sprintf;

final class DocsController extends AbstractController
{
    #[Route('/docs/{slug}', name: 'app_docs', requirements: ['slug' => '.+'])]
    public function show(string $slug, DocCatalog $catalog, DocPageRenderer $renderer): Response
    {
        $meta = $catalog->get($slug);
        if (!$meta instanceof DocPageMetadata) {
            throw $this->createNotFoundException(sprintf('Documentation page "%s" not found.', $slug));
        }

        return $this->render('doc/show/show.html.twig', [
            'page' => $renderer->render($meta),
            'navigation' => $catalog->byCategory(),
            'previous' => $catalog->previous($slug),
            'next' => $catalog->next($slug),
        ]);
    }
}
