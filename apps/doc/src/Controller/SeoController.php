<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\DocCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class SeoController extends AbstractController
{
    public function __construct(
        #[Autowire('%kernel.environment%')]
        private readonly string $environment,
        #[Autowire('%kernel.debug%')]
        private readonly bool $debug,
    ) {
    }

    #[Route('/robots.txt', name: 'app_robots', methods: ['GET'])]
    public function robots(): Response
    {
        if ('prod' === $this->environment && !$this->debug) {
            $sitemapUrl = $this->generateUrl('app_sitemap', [], UrlGeneratorInterface::ABSOLUTE_URL);
            $content = "User-agent: *\nAllow: /\n\nSitemap: {$sitemapUrl}\n";
        } else {
            $content = "User-agent: *\nDisallow: /\n";
        }

        return new Response($content, Response::HTTP_OK, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    #[Route('/sitemap.xml', name: 'app_sitemap', methods: ['GET'])]
    public function sitemap(DocCatalog $catalog): Response
    {
        $urls = [
            $this->generateUrl('app_home', [], UrlGeneratorInterface::ABSOLUTE_URL),
            $this->generateUrl('app_docs_components', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ];

        foreach ($catalog->all() as $page) {
            $urls[] = $this->generateUrl('app_docs_show', ['slug' => $page->slug], UrlGeneratorInterface::ABSOLUTE_URL);
        }

        $response = $this->render('seo/sitemap.xml.twig', ['urls' => $urls]);
        $response->headers->set('Content-Type', 'application/xml; charset=UTF-8');
        $response->headers->set('Cache-Control', 'public, max-age=3600');

        return $response;
    }
}
