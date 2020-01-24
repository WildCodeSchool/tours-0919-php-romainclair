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

        $meetingDate1 = new MeetingDate();
        $date1 = new DateTime('2001-02-02');
        $date1->setTime(14, 1, 20);
        $meetingDate1->setDate($date1);
        $meetingDate1->setMeeting($meetings1);

        $manager->persist($meetingDate1);

        $meetingDate2 = new MeetingDate();
        $date2 = new DateTime('2002-03-03');
        $date2->setTime(4, 10, 20);
        $meetingDate2->setDate($date2);
        $meetingDate2->setMeeting($meetings2);

        $manager->persist($meetingDate2);

        $manager->flush();
    }
}
