<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DocsController extends AbstractController
{
    #[Route('/docs/{path}', name: 'app_docs', requirements: ['path' => '.+'])]
    public function show(string $path): Response
    {
        $segments = explode('/', $path);

        dd($segments);
    }
}
