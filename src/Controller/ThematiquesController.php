<?php

namespace App\Controller;

use App\Entity\Thematiques;
use App\Form\ThematiquesType;
use App\Repository\ThematiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/thematiques")
 */
class ThematiquesController extends AbstractController
{
    /**
     * @Route("/", name="thematiques_index", methods={"GET"})
     * @param ThematiquesRepository $themaRepository
     * @return Response
     */
    public function index(ThematiquesRepository $themaRepository): Response
    {
        return $this->render('thematiques/index.html.twig', [
            'themes' => $themaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="thematiques_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $thematique = new Thematiques();
        $form = $this->createForm(ThematiquesType::class, $thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($thematique);
            $entityManager->flush();

            return $this->redirectToRoute('thematiques_index');
        }

        return $this->render('thematiques/new.html.twig', [
            'thematique' => $thematique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="thematiques_show", methods={"GET"})
     */
    public function show(Thematiques $thematique): Response
    {
        return $this->render('thematiques/show.html.twig', [
            'thematique' => $thematique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="thematiques_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Thematiques $thematique): Response
    {
        $form = $this->createForm(ThematiquesType::class, $thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('thematiques_index');
        }

        return $this->render('thematiques/edit.html.twig', [
            'thematique' => $thematique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="thematiques_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Thematiques $thematique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$thematique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($thematique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('thematiques_index');
    }
}
