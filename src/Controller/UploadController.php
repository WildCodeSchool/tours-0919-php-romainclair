<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ThematiquesRepository;
use App\Service\FileUploader;
use Psr\Log\LoggerInterface;

class UploadController extends AbstractController
{
    /**
     * @Route("/thematiques/doUpload", name="upload")
     */
    public function index(
        Request $request,
        string $uploadDir,
        FileUploader $uploader,
        LoggerInterface $logger,
        ThematiquesRepository $themaRepository
    ) {
        $token = $request->get("token");

        if (!$this->isCsrfTokenValid('upload', $token)) {
            $logger->info("CSRF failure");
            // add render
        }

        $file = $request->files->get('myfile');

        if (empty($file)) {
            // add render
        }

        $filename = $file->getClientOriginalName();
        $uploader->upload($uploadDir, $file, $filename);

        return $this->render('thematiques/index.html.twig', [
            'themes' => $themaRepository->findAll(),
        ]);
    }
}
