<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use App\Repository\SubjectRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Meeting;
use App\Entity\Subject;

class Theme4Fixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {

        $theme4 = new Theme();
        $theme4->setName('Méthodologie');
        $theme4->setDescription('Description de la thématique sur la méthodologie');

        $subject7 = new Subject();
        $subject7->setName('Scrum');
        $subject7->setDescription('Description du sujet Scrum');
        $subject7->setTheme($theme4);

        $manager->persist($subject7);

        $subject8 = new Subject();
        $subject8->setName('Kanban');
        $subject8->setDescription('Description du sujet Kanban');
        $subject8->setTheme($theme4);
        $manager->persist($subject8);

        $theme4->addSubject($subject7);
        $theme4->addSubject($subject8);

        $manager->persist($theme4);

        $meetings7 = new Meeting();
        $meetings7->setName('Le Scrum board');
        $meetings7->setSubject($subject7);
        $meetings7->setDescription('exemple');
        $meetings7->setRequired('La méthode Scrum');
        $meetings7->setParticipating('25');

        $manager->persist($meetings7);

        $meetings8 = new Meeting();
        $meetings8->setName('Les rituels Kanban');
        $meetings8->setSubject($subject8);
        $meetings8->setDescription('exemple');
        $meetings8->setRequired('Required for this meetings');
        $meetings8->setParticipating('200');

        $manager->persist($meetings8);

        $manager->flush();
    }
}
