<?php

namespace App\Controller;

use App\Entity\Meeting;
use App\Form\MeetingType;
use App\Repository\MeetingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/meeting")
 */
class MeetingController extends AbstractController
{
    /**
     * @Route("/", name="meeting_index", methods={"GET"})
     * @param MeetingRepository $meetingRepository
     * @return Response
     */
    public function index(MeetingRepository $meetingRepository): Response
    {
        return $this->render('meeting/index.html.twig', [
            'meeting' => $meetingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/meet/new", name="meeting_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $meeting = new Meeting();
        $form = $this->createForm(MeetingType::class, $meeting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($meeting);
            $entityManager->flush();

            return $this->redirectToRoute('succes');
        }

        return $this->render('meeting/new.html.twig', [
            'meeting' => $meeting,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="meetings_show", methods={"GET"})
     * @param Meeting $meeting
     * @return Response
     */
    public function show(Meeting $meeting): Response
    {
        return $this->render('meeting/show.html.twig', [
            'meeting' => $meeting,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="meeting_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Meeting $meeting
     * @return Response
     */
    public function edit(Request $request, Meeting $meeting): Response
    {
        $form = $this->createForm(MeetingType::class, $meeting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('succes');
        }

        return $this->render('meeting/edit.html.twig', [
            'meeting' => $meeting,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="meeting_delete", methods={"DELETE"})
     * @param Request $request
     * @param Meeting $meeting
     * @return Response
     */
    public function delete(Request $request, Meeting $meeting): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meeting->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($meeting);
            $entityManager->flush();
        }

        return $this->redirectToRoute('succes');
    }
}
