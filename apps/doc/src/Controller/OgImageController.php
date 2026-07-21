<?php

declare(strict_types=1);

namespace App\Controller;

use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Process;
use Symfony\Component\Routing\Attribute\Route;

use function sprintf;

/**
 * Serves Open Graph card images from title/description query parameters,
 * shadcn-style: /og.png?title=...&description=...
 *
 * Images are rendered by og/render.mjs (Satori) and cached in var/og, which
 * the Docker build pre-fills for every documentation page (og/warm.mjs), so
 * only unknown title/description pairs pay the rendering cost once.
 */
final class OgImageController extends AbstractController
{
    private const string DEFAULT_TITLE = 'Modern UI component library for Symfony';

    public function __construct(
        #[Autowire('%kernel.project_dir%/og')]
        private readonly string $ogDir,
        #[Autowire('%kernel.project_dir%/var/og')]
        private readonly string $cacheDir,
    ) {
    }

    #[Route('/og.png', name: 'app_og_image', methods: ['GET'])]
    public function image(Request $request): Response
    {
        $title = mb_substr(trim((string) $request->query->getString('title')), 0, 200);
        $description = mb_substr(trim((string) $request->query->getString('description')), 0, 500);

        if ('' === $title) {
            $title = self::DEFAULT_TITLE;
        }

        // MUST stay in sync with cacheKey() in og/card.mjs
        $path = sprintf('%s/%s.png', $this->cacheDir, hash('sha256', $title."\0".$description));

        if (!is_file($path)) {
            $this->write($path, $this->generate($title, $description));
        }

        $response = new BinaryFileResponse($path);
        $response->headers->set('Content-Type', 'image/png');
        $response->setAutoEtag();
        $response->setAutoLastModified();
        $response->setPublic();
        $response->setMaxAge(3600);
        $response->setSharedMaxAge(30 * 86400);

        return $response;
    }

    private function generate(string $title, string $description): string
    {
        $process = new Process(['node', 'render.mjs', $title, $description], $this->ogDir, timeout: 20);
        $process->mustRun();

        return $process->getOutput();
    }

    private function write(string $path, string $content): void
    {
        if (!is_dir($this->cacheDir) && !@mkdir($this->cacheDir, 0o777, true) && !is_dir($this->cacheDir)) {
            throw new RuntimeException(sprintf('Unable to create the Open Graph cache directory "%s".', $this->cacheDir));
        }

        // Atomic write so concurrent requests never serve a partial file
        $tmp = sprintf('%s.%s.tmp', $path, bin2hex(random_bytes(6)));
        if (false === file_put_contents($tmp, $content) || !rename($tmp, $path)) {
            @unlink($tmp);
            throw new RuntimeException(sprintf('Unable to write the Open Graph image "%s".', $path));
        }
    }
}
