<?php

namespace App\Service;

use App\Repository\SubjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\Subject;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailMeeting extends AbstractController
{
    private $subjectRepository;
    private $mailer;

    public function __construct(SubjectRepository $subjectRepository, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        $this->subjectRepository = $subjectRepository;
    }
    public function ifFavoriteSubject($id)
    {
        $subject = $this->subjectRepository->findOneByid($id);
        $allUsers = $subject->getUsers();

        foreach ($allUsers as $user) {
            $email = (new Email())
            ->from($this->getParameter('mailer_from'))
            ->to($user->getMail())
            ->subject('Un sujet a etait soumis')
            ->text('Sending emails is fun again!')
            ->html($this->renderView('email/meetingEmail.html.twig'));

            /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
            $this->mailer->send($email);
        }
    }
}
