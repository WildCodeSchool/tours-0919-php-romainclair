<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use App\Repository\SubjectRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Meeting;
use App\Entity\Subject;

class Theme5Fixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {

        $theme5 = new Theme();
        $theme5->setName('Systeme');
        $theme5->setDescription('Description de la thématique sur les systemes');

        $subject9 = new Subject();
        $subject9->setName('Linux');
        $subject9->setDescription('Description du sujet Linux');
        $subject9->setTheme($theme5);

        $manager->persist($subject9);

        $subject10 = new Subject();
        $subject10->setName('MacOS');
        $subject10->setDescription('Description du sujet MacOS');
        $subject10->setTheme($theme5);
        $manager->persist($subject10);

        $theme5->addSubject($subject10);
        $theme5->addSubject($subject10);

        $manager->persist($theme5);

        $meetings9 = new Meeting();
        $meetings9->setName('Ubuntu');
        $meetings9->setSubject($subject9);
        $meetings9->setDescription('exemple');
        $meetings9->setRequired('Installer un OS');
        $meetings9->setParticipating('1');

        $manager->persist($meetings9);

        $meetings10 = new Meeting();
        $meetings10->setName('Migrer MacOS vers Linux');
        $meetings10->setSubject($subject10);
        $meetings10->setDescription('exemple');
        $meetings10->setRequired('Required for this meetings');
        $meetings10->setParticipating('200');

        $manager->persist($meetings10);

        $manager->flush();
    }
}
