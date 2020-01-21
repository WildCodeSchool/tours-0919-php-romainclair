<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use App\Repository\SubjectRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Meeting;
use App\Entity\Subject;

class Theme2Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $theme2 = new Theme();
        $theme2->setName('Sécurité');
        $theme2->setDescription('Description de la thématique sur la sécurité');

        $subject3 = new Subject();
        $subject3->setName('Cryptographie');
        $subject3->setDescription('Description du sujet Cryptographie');
        $subject3->setRequirements('requirements');
        $subject3->setTheme($theme2);

        $manager->persist($subject3);

        $subject4 = new Subject();
        $subject4->setName('Sécuriser son réseau');
        $subject4->setDescription('Description du sujet sécuriser son réseau');
        $subject4->setRequirements('requirements');
        $subject4->setTheme($theme2);
        $manager->persist($subject4);

        $theme2->addSubject($subject3);
        $theme2->addSubject($subject4);

        $manager->persist($theme2);

        $meetings3 = new Meeting();
        $meetings3->setName('L\'encodage');
        $meetings3->setSubject($subject3);
        $meetings3->setDescription('exemple');
        $meetings3->setRequired('Les Variables');
        $meetings3->setParticipating('5');

        $manager->persist($meetings3);

        $meetings4 = new Meeting();
        $meetings4->setName('Gérer les droits');
        $meetings4->setSubject($subject4);
        $meetings4->setDescription('exemple');
        $meetings4->setRequired('Required for this meetings');
        $meetings4->setParticipating('2');

        $manager->persist($meetings4);

        $manager->flush();
    }
}
