<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetingsController extends AbstractController
{
    /**
     * @Route ("/meetings", name="show_meetings")
     * @return Response A response instance
     */
    public function Meetings() :Response
    {
        return $this->render('meetings.html.twig');
    }

}