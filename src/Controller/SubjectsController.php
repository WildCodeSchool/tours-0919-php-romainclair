<?php

namespace App\Controller;

use App\Form\SubjectType;
use App\Repository\SubjectRepository;
use App\Repository\ThemeRepository;
use App\Service\FavedSubject;
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

    /**
     * Show all rows from Subject’s entity
     *
     * @Route("/sujets/{id}", name="list_subject")
     * @param SubjectRepository $subjectRepository
     * @param int $id
     * @param ThemeRepository $themeRepository
     * @return Response A response instance
     */
    public function subject(
        SubjectRepository $subjectRepository,
        int $id,
        ThemeRepository $themeRepository,
        FavedSubject $favedSubject
    ): Response {
        $theme = $themeRepository->findOneByid($id);
        $subjects = $subjectRepository->findBytheme($id);
        $user = $this->getUser();
        $allSubjectsID = [];
        if ($user) {
            if (isset($_POST['favSubj'])) {
                $favedSubject->setFavedSubject($subjectRepository, $_POST['favSubj'], $user);
            }
            if (isset($_POST['unfavedSubj'])) {
                $favedSubject->unfavedSubject($subjectRepository, $_POST['unfavedSubj'], $user);
            }
            $allSubjectsID = $favedSubject->getFavedSubjectArray($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('subjects_display/display_list.html.twig', [
            'subjects' => $subjects,
            'theme' => $theme,
            'favedSubjectsID' => $allSubjectsID
        ]);
    }

    /**
     * @Route("/{id}/edit", name="subject_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Subject $subject): Response
    {
        $form = $this->createForm(SubjectType::class, $subject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('success');
        }

        return $this->render('subject/edit.html.twig', [
            'subject' => $subject,
            'form' => $form->createView(),
        ]);
    }

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
                $imageFile->move(
                    $this->getParameter('subjects_image_directory'),
                    $newFilename
                );

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
    
                return $this->redirect($this->generateUrl('success'));
            }
        }
        return $this->render('subject/new.html.twig', [
            'subject' => $subject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subject_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Subject $subject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subject->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subject);
            $entityManager->flush();
        }

        return $this->redirectToRoute('show_theme');
    }

    /**
     * @Route("/chemin", name="chemin", methods={"GET"})
     */
    public function chemin(SubjectRepository $subjectRepository): Response
    {
        $subjects = $subjectRepository->findAll();
        $varUlterieure = [];
        foreach ($subjects as $subject) {
            $varUlterieure[] = ['userName' => $subject->getName(), 'userNumber'=> $subject->getUsers()->toArray()];
        }
        $columns = array_column($varUlterieure, 'userNumber');
        array_multisort($columns, SORT_DESC, $varUlterieure);
        return $this->render('subject/sorted.html.twig', [
            'subjects' => $varUlterieure
        ]);
    }
}
