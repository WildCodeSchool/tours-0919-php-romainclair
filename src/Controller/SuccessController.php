<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuccessController extends AbstractController
{
    /**
     * @Route("/success", name="success")
     */
    public function index()
    {
        return $this->render('success/index.html.twig', [
            'controller_name' => 'SuccessController',
        ]);
    }

    /**
     * @Route("/danger", name="danger")
     */
    public function danger()
    {
        return $this->render('success/danger.html.twig');
    }
}
