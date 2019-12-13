<?php

namespace App\Controller;

use App\Form\DateType;
use App\Entity\Subjects;
use App\Form\SubjectsType;
use App\Repository\SubjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetingsController extends AbstractController
{
    /**
     * @Route("/meetings/", name="show_meetings", methods={"GET"})
     */
    public function meetings(SubjectsRepository $subjectsRepository) :Response
    {
        return $this->render('meetings_display/meetings.html.twig', [
            'subjects' => $subjectsRepository->findAll(),
        ]);
    }
}
