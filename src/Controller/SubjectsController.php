<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubjectsController extends AbstractController
{
    /**
     * Show all rows from Subject’s entity
     *
     * @Route("/sujet", name="list_subject")
     * @return Response A response instance
     */
    public function index(): Response
    {
        return $this->render('subjects_display/display_list.html.twig');
    }
}
