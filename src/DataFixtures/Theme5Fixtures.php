<?php

namespace App\DataFixtures;

use App\Entity\MeetingDate;
use App\Entity\Theme;
use App\Repository\SubjectRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Meeting;
use App\Entity\Subject;
use \DateTime;

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
        $subject9->setRequirements('requirements');
        $subject9->setTheme($theme5);

        $manager->persist($subject9);

        $subject10 = new Subject();
        $subject10->setName('MacOS');
        $subject10->setDescription('Description du sujet MacOS');
        $subject10->setRequirements('requirements');
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

        $meetingDate9 = new MeetingDate();
        $date9 = new DateTime('2020-01-15T21:01:00Z');
        $date9->setTime(21, 1, 20);
        $meetingDate9->setDate($date9);
        $meetingDate9->setMeeting($meetings9);

        $manager->persist($meetingDate9);

        $meetingDate10 = new MeetingDate();
        $date10 = new DateTime('2001-02-02');
        $date10->setTime(21, 1, 20);
        $meetingDate10->setDate($date10);
        $meetingDate10->setMeeting($meetings10);

        $manager->persist($meetingDate10);

        $manager->flush();
    }
}
