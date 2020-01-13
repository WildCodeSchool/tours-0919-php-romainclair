<?php

namespace App\Controller;

use App\Entity\Subjects;
use App\Form\SubjectsType;
use App\Repository\SubjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminSubjectsController extends AbstractController
{
    /**
     * @Route("/", name="subjects_index", methods={"GET"})
     */
    public function index(SubjectsRepository $subjectsRepository): Response
    {
        return $this->render('subjects/index.html.twig', [
            'subjects' => $subjectsRepository->findAll(),
        ]);
    }

    /* admin */
    /**
     * @Route("/{id}", name="subjects_show", methods={"GET"})
     */
    public function show(Subjects $subject): Response
    {
        return $this->render('subjects/show.html.twig', [
            'subject' => $subject,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="subjects_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Subjects $subject): Response
    {
        $form = $this->createForm(SubjectsType::class, $subject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('succes');
        }

        return $this->render('subjects/edit.html.twig', [
            'subject' => $subject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subjects_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Subjects $subject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subject->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subject);
            $entityManager->flush();
        }

        return $this->redirectToRoute('show_theme');
    }
}
