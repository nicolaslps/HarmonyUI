<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ThemesController extends AbstractController
{
    #[Route('/themes', name: 'app_themes')]
    public function index(): Response
    {
        return $this->render('themes/index.html.twig');
    }
}
