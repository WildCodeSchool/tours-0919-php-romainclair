<?php

namespace App\Controller;

use App\Entity\Subjects;
use App\Form\SubjectsType;
use App\Repository\SubjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Mime\Email;

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
     * @param SubjectsRepository $subjectsRepository
     * @param int $id
     * @param Subjects $subjectEntity
     * @return Response A response instance
     */
    public function subject(
        SubjectsRepository $subjectsRepository,
        int $id,
        Subjects $subjectEntity
    ): Response {
        $subjects = $subjectsRepository->findBythematiques($id);
        return $this->render('subjects_display/display_list.html.twig', [
            'subjects' => $subjects,
            'meeting' => $subjectEntity->getMeeting()
        ]);
    }

    /* ajouts utilisateurs */

    /**
     * @Route("/new", name="subjects_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $subject = new Subjects();
        $form = $this->createForm(SubjectsType::class, $subject);
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
