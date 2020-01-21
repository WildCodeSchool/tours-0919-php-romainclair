<?php

namespace App\Controller;

use App\Entity\Meeting;
use App\Form\MeetingType;
use App\Entity\Subject;
use App\Repository\MeetingDateRepository;
use App\Repository\MeetingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \DateTime;

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
     * @Route("/show/{id}", name="show_meeting", methods={"GET"})
     * @param MeetingRepository $meetingRepository
     * @param int $id
     * @param MeetingDateRepository $meetingDateRepo
     * @return Response A response instance
     * @throws \Exception
     */
    public function meeting(
        MeetingRepository $meetingRepository,
        int $id,
        MeetingDateRepository $meetingDateRepo
    ) :Response {
        $meeting = $meetingRepository->findOneById($id);
        $dates = $meetingDateRepo->findByMeeting($meeting);
        $pastDates = [];
        $nextDates = [];
        $nowDate = new DateTime();
        $nowTimestamp = $nowDate->getTimestamp();
        foreach ($dates as $meetingDate) {
            $date = $meetingDate->getDate();
            $timestamp = $date->getTimestamp();
            if ($timestamp < $nowTimestamp) {
                $pastDates[] = $date->format('Y-m-d H:i');
            } else {
                $pastDates[] = $date->format('Y-m-d H:i');
            }
        }
        return $this->render('meeting_display/meeting.html.twig', [
            'meeting' => $meeting,
            'pastDates' => $pastDates,
            'nextDates' => $nextDates
        ]);
    }

    /**
     * @Route("/new", name="meeting_new", methods={"GET","POST"})
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
     * @Route("/delete/{id}", name="meeting_delete", methods={"DELETE"})
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
