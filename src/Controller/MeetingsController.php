<?php

namespace App\Controller;

use App\Form\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class MeetingsController extends AbstractController
{
    /**
     * @Route ("/meetings", name="show_meetings")
     * @return Response A response instance
     */
    public function meetings(HttpFoundationRequest $request) :Response
    {
        $form = $this->createForm(
            DateType::class
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $date = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            dump($entityManager);
            $entityManager->persist($date);
            $entityManager->flush();
        }
        return $this->render('meetings_display/meetings.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
