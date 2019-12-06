<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController 
{
    /**
     *@Route ("/theme", name="show_theme")
     *@return Response A response instance
     */

    public function theme() : Response
    {
       return $this->render('theme.html.twig');
    }
        
}

