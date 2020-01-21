<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Form\ThemeType;
use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    /**
     * @Route("/", name="show_theme", methods={"GET"})
     * @param ThemeRepository $themeRepo
     * @return Response
     */
    public function index(ThemeRepository $themeRepo): Response
    {
        $allTheme = $themeRepo->findAll();
        return $this->render('theme.html.twig', [
            'themes' => $allTheme
        ]);
    }

    /**
     * @Route("/theme/new", name="theme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $theme = new Theme();
        $form = $this->createForm(ThemeType::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form['image']->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // return exception
                }
                $theme->setImage($newFilename);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($theme);
                $entityManager->flush();

                return $this->redirect($this->generateUrl('success'));
            }
        }

        return $this->render('theme/new.html.twig', [
            'theme' => $theme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/theme/{id}", name="theme_show", methods={"GET"})
     */
    public function show(Theme $theme): Response
    {
        return $this->render('theme/show.html.twig', [
            'thematique' => $theme,
            ]);
    }

    /**
     * @Route("/theme/{id}/edit", name="theme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Theme $theme): Response
    {
        $form = $this->createForm(ThemeType::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('success');
        }

        return $this->render('theme/edit.html.twig', [
            'theme' => $theme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/theme/{id}", name="theme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Theme $theme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$theme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($theme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('show_theme');
    }
}
