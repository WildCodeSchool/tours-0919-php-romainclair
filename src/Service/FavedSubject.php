<?php


namespace App\Service;

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
use App\Entity\User;

class FavedSubject
{
    public function getFavedSubjectArray(User $user)
    {
        $allSubjects = $user->getFavoriteSubjects();
        $allSubjectsID = [];
        foreach ($allSubjects as $value) {
            $allSubjectsID[] = $value->getId();
        }
        return $allSubjectsID;
    }

    public function setFavedSubject(
        SubjectRepository $subjectRepository,
        int $id,
        User $user
    ): void {
        $subj = $subjectRepository->findOneByid($id);
        $user->addFavoriteSubjects($subj);
    }
    public function unfavedSubject(
        SubjectRepository $subjectRepository,
        int $id,
        User $user
    ): void {
        $subj = $subjectRepository->findOneByid($id);
        $user->removeFavoriteSubjects($subj);
    }
}
