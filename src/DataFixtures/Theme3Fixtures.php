<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use App\Repository\SubjectRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Meeting;
use App\Entity\Subject;

class Theme3Fixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {

        $theme3 = new Theme();
        $theme3->setName('Réseau');
        $theme3->setDescription('Description de la thématique sur le réseau');

        $subject5 = new Subject();
        $subject5->setName('Administrer son réseau');
        $subject5->setDescription('Description du sujet Administrer son réseau');
        $subject5->setTheme($theme3);

        $manager->persist($subject5);

        $subject6 = new Subject();
        $subject6->setName('Sécuriser son réseau');
        $subject6->setDescription('Description du sujet sécuriser son réseau');
        $subject6->setTheme($theme3);
        $manager->persist($subject6);

        $theme3->addSubject($subject5);
        $theme3->addSubject($subject6);

        $manager->persist($theme3);

        $meetings5 = new Meeting();
        $meetings5->setName('Les droits');
        $meetings5->setSubject($subject5);
        $meetings5->setDescription('exemple');
        $meetings5->setRequired('Les prérequis');
        $meetings5->setParticipating('15');

        $manager->persist($meetings5);

        $meetings6 = new Meeting();
        $meetings6->setName('Encrypter son réseau');
        $meetings6->setSubject($subject6);
        $meetings6->setDescription('exemple');
        $meetings6->setRequired('Required for this meetings');
        $meetings6->setParticipating('2');

        $manager->persist($meetings6);

        $manager->flush();
    }
}
