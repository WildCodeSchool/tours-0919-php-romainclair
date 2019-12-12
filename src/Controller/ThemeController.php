<?php

namespace App\Controller;

use App\Repository\ThematiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    /**
     * @Route ("/", name="show_theme")
     * @param ThematiquesRepository $themaRepo
     * @return Response A response instance
     */

    public function theme(ThematiquesRepository $themaRepo) : Response
    {
        $allTheme = $themaRepo->findAll();
        return $this->render('theme.html.twig', [
            'themes' => $allTheme
        ]);
    }
}
