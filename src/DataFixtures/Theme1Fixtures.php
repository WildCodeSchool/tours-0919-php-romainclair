<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use App\Repository\SubjectRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Meeting;
use App\Entity\Subject;

class Theme1Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $theme = new Theme();
        $theme->setName('Développement');
        $theme->setDescription('Description de la thématique sur le développement');

        $manager->persist($theme);

        $subject1 = new Subject();
        $subject1->setName('PHP');
        $subject1->setDescription('Description du sujet PHP');
        $subject1->setRequirements('requirements');
        $subject1->setTheme($theme);

        $manager->persist($subject1);

        $subject2 = new Subject();
        $subject2->setName('JavaScript');
        $subject2->setDescription('Description du sujet JavaScript');
        $subject2->setRequirements('requirements');
        $subject2->setTheme($theme);
        $manager->persist($subject2);

        $theme->addSubject($subject1);
        $theme->addSubject($subject2);

        $manager->persist($theme);

        $meetings1 = new Meeting();
        $meetings1->setName('Les fonctions');
        $meetings1->setSubject($subject1);
        $meetings1->setDescription('exemple');
        $meetings1->setRequired('Les Variables');
        $meetings1->setParticipating('12');

        $manager->persist($meetings1);

        $meetings2 = new Meeting();
        $meetings2->setName('Les Variables');
        $meetings2->setSubject($subject2);
        $meetings2->setDescription('exemple');
        $meetings2->setRequired('Les fonctions');
        $meetings2->setParticipating('12');

        $manager->persist($meetings2);

        $manager->flush();
    }
}
