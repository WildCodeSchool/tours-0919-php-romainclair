<?php

namespace App\Controller;

use App\Form\DateType;
use App\Entity\Subjects;
use App\Form\SubjectsType;
use App\Repository\MeetingsRepository;
use App\Repository\SubjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetingsController extends AbstractController
{
    /**
     * @Route("/meetings/{id}", name="show_meetings", methods={"GET"})
     * @param MeetingsRepository $meetingsRepository
     * @param int $id
     * @return Response A response instance
     */
    public function meetings(MeetingsRepository $meetingsRepository, int $id) :Response
    {
        return $this->render('meetings_display/meetings.html.twig', [
            'meetings' => $meetingsRepository->findOneByid($id)
        ]);
    }
}
