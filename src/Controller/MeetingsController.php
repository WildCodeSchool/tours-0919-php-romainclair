<?php

namespace App\Controller;

use App\Entity\Meetings;
use App\Form\MeetingsType;
use App\Repository\MeetingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/meetings")
 */
class MeetingsController extends AbstractController
{
    /**
     * @Route("/", name="meetings_index", methods={"GET"})
     * @param MeetingsRepository $meetingsRepository
     * @return Response
     */
    public function index(MeetingsRepository $meetingsRepository): Response
    {
        return $this->render('meetings/index.html.twig', [
            'meetings' => $meetingsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="meetings_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $meeting = new Meetings();
        $form = $this->createForm(MeetingsType::class, $meeting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($meeting);
            $entityManager->flush();

            return $this->redirectToRoute('meetings_index');
        }

        return $this->render('meetings/new.html.twig', [
            'meeting' => $meeting,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="meetings_show", methods={"GET"})
     * @param Meetings $meeting
     * @return Response
     */
    public function show(Meetings $meeting): Response
    {
        return $this->render('meetings/show.html.twig', [
            'meeting' => $meeting,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="meetings_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Meetings $meeting
     * @return Response
     */
    public function edit(Request $request, Meetings $meeting): Response
    {
        $form = $this->createForm(MeetingsType::class, $meeting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('meetings_index');
        }

        return $this->render('meetings/edit.html.twig', [
            'meeting' => $meeting,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="meetings_delete", methods={"DELETE"})
     * @param Request $request
     * @param Meetings $meeting
     * @return Response
     */
    public function delete(Request $request, Meetings $meeting): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meeting->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($meeting);
            $entityManager->flush();
        }

        return $this->redirectToRoute('meetings_index');
    }
}
