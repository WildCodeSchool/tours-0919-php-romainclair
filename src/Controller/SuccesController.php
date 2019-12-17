<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuccesController extends AbstractController
{
    /**
     * @Route("/succes", name="succes")
     */
    public function index()
    {
        return $this->render('succes/index.html.twig', [
            'controller_name' => 'SuccesController',
        ]);
    }
}
