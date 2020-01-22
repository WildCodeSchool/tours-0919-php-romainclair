<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ThemeRepository;
use App\Service\FileUploader;
use Psr\Log\LoggerInterface;

class UploadController extends AbstractController
{
    /**
     * @Route("/theme/do-upload", name="upload")
     */
    public function index(
        Request $request,
        string $uploadDir,
        FileUploader $uploader,
        LoggerInterface $logger,
        ThemeRepository $themeRepository
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

        return $this->render('theme/index.html.twig', [
            'themes' => $themeRepository->findAll(),
        ]);
    }
}
