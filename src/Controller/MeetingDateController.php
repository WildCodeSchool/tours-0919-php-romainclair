<?php

namespace App\Controller;

use App\Entity\MeetingDate;
use App\Form\MeetingDateType;
use App\Repository\MeetingDateRepository;
use App\Repository\MeetingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/meeting/date")
 */
class MeetingDateController extends AbstractController
{
    /**
     * @Route("{id}/new", name="meeting_date_new", methods={"GET","POST"})
     */
    public function new(Request $request, int $id, MeetingRepository $meetingRepo): Response
    {
        $meeting = $meetingRepo->findOneByid($id);
        $meetingDate = new MeetingDate();
        $form = $this->createForm(MeetingDateType::class, $meetingDate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $meetingDate->setMeeting($meeting);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($meetingDate);
            $entityManager->flush();

            return $this->redirectToRoute('show_meeting', ['id' => $id]);
        }

        return $this->render('meeting_date/new.html.twig', [
            'meeting_date' => $meetingDate,
            'meeting' => $meeting,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="meeting_date_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MeetingDate $meetingDate): Response
    {
        $form = $this->createForm(MeetingDateType::class, $meetingDate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('meeting_date_index');
        }

        return $this->render('meeting_date/edit.html.twig', [
            'meeting_date' => $meetingDate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="meeting_date_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MeetingDate $meetingDate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meetingDate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($meetingDate);
            $entityManager->flush();
        }
        return $this->redirectToRoute('success');
    }
}
