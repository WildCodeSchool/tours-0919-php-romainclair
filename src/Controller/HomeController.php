<?php

namespace App\Controller;

use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="show_theme")
     * @param ThemeRepository $themeRepo
     * @return Response A response instance
     */

    public function home(ThemeRepository $themeRepo) : Response
    {
        $allTheme = $themeRepo->findAll();
        return $this->render('theme.html.twig', [
            'themes' => $allTheme
        ]);
    }
}
