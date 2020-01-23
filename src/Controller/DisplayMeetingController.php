<?php

namespace App\Controller;

use App\Repository\MeetingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayMeetingController extends AbstractController
{
    /**
     * @Route("/meeting/show/{id}", name="show_meeting", methods={"GET"})
     * @param MeetingRepository $meetingRepository
     * @param int $id
     * @return Response A response instance
     */
    public function meeting(MeetingRepository $meetingRepository, int $id) :Response
    {
        return $this->render('meeting_display/meeting.html.twig', [
            'meeting' => $meetingRepository->findOneByid($id)
        ]);
    }
}
