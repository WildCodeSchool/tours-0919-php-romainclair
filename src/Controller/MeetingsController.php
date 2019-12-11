<?php

namespace App\Controller;

use App\Form\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MeetingsController extends AbstractController
{
    /**
     * @Route ("/meetings", name="show_meetings")
     * @return Response A response instance
     */
    public function meetings(Request $request) :Response
    {
        return $this->render('meetings_display/meetings.html.twig');
    }
}
