<?php

namespace App\Controller;

use App\Form\SubjectType;
use App\Repository\SubjectRepository;
use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\Subject;

/**
 * @Route("/subjects")
 */
class SubjectsController extends AbstractController
{
    /*  index utilisateurs */

    /**
     * Show all rows from Subject’s entity
     *
     * @Route("/sujets/{id}", name="list_subject")
     * @param SubjectRepository $subjectRepository
     * @param int $id
     * @return Response A response instance
     */
    public function subject(
        SubjectRepository $subjectRepository,
        int $id,
        ThemeRepository $themeRepository
    ): Response {
        $theme = $themeRepository->findOneByid($id);
        $subjects = $subjectRepository->findBytheme($id);
        return $this->render('subjects_display/display_list.html.twig', [
            'subjects' => $subjects,
            'theme' => $theme
        ]);
    }

    /* ajouts utilisateurs */

    /**
     * @Route("/new", name="subjects_new", methods={"GET","POST"})
     */
    public function new(Request $request, MailerInterface $mailer): Response
    {
        $subject = new Subject();
        $form = $this->createForm(SubjectType::class, $subject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form['image']->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
    
                try {
                    $imageFile->move(
                        $this->getParameter('subjects_image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // return exception
                }
                $subject->setImage($newFilename);

                $email = (new Email())
                    ->from($this->getParameter('mailer_from'))
                    ->to('romainculleron12@gmail.com')
                    ->subject('Un sujet a etait soumis')
                    ->text('Sending emails is fun again!')
                    ->html($this->renderView('email/email.html.twig'));
    
                    /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
                    $mailer->send($email);
    
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($subject);
                $entityManager->flush();
    
                return $this->redirect($this->generateUrl('succes'));
            }
        }
        return $this->render('subjects/new.html.twig', [
            'subject' => $subject,
            'form' => $form->createView(),
        ]);
    }
}
