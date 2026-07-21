<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function sprintf;

final class ImageController extends AbstractController
{
    private const array EXTENSIONS = ['avif', 'webp', 'png', 'jpg', 'jpeg', 'svg'];

    public function __construct(
        #[Autowire('%kernel.project_dir%/public/media')]
        private readonly string $mediaDir,
    ) {
    }

    #[Route('/img/{name}', name: 'app_image', requirements: ['name' => '[a-z0-9-]+'])]
    public function show(string $name): Response
    {
        foreach (self::EXTENSIONS as $extension) {
            $path = sprintf('%s/%s.%s', $this->mediaDir, $name, $extension);

            if (!is_file($path)) {
                continue;
            }

            $response = new BinaryFileResponse($path);
            $response->setAutoEtag();
            $response->setAutoLastModified();
            $response->setPublic();
            $response->setMaxAge(3600);
            $response->setSharedMaxAge(30 * 86400);

            return $response;
        }

        throw $this->createNotFoundException(sprintf('Image "%s" not found.', $name));
    }
}
