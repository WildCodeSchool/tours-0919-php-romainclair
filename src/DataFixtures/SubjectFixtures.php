<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Subject;

class SubjectFixtures extends Fixture
{
    // need to remove all the s of the subjects
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $subject1 = new Subject();
        $subject1->setName('C');
        $subject1->setDescription('exemple');
        $subject1->setRequirements('[NULL]');
        # $subject1->setTheme(1);
        $subject1->setImage('[NULL]');
        $subject1->setParticipation('[NULL]');

        $manager->persist($subject1);

        $subject2 = new Subject();
        $subject2->setName('PHP');
        $subject2->setDescription('exemple');
        $subject2->setRequirements('[NULL]');
        # $subject2->setTheme(1);
        $subject2->setImage('[NULL]');
        $subject2->setParticipation('[NULL]');

        $manager->persist($subject2);

        $subject3 = new Subject();
        $subject3->setName('Java');
        $subject3->setDescription('exemple');
        $subject3->setRequirements('[NULL]');
        # $subject3->setTheme(1);
        $subject3->setImage('[NULL]');
        $subject3->setParticipation('[NULL]');

        $manager->persist($subject3);

        $subject4 = new Subject();
        $subject4->setName('C++');
        $subject4->setDescription('exemple');
        $subject4->setRequirements('[NULL]');
        # $subject4->setTheme(1);
        $subject4->setImage('[NULL]');
        $subject4->setParticipation('[NULL]');
        $manager->persist($subject4);

        $subject5 = new Subject();
        $subject5->setName('Javascript');
        $subject5->setDescription('exemple');
        $subject5->setRequirements('[NULL]');
        # $subject5->setTheme(1);
        $subject5->setImage('[NULL]');
        $subject5->setParticipation('[NULL]');

        $manager->persist($subject5);

        $subject6 = new Subject();
        $subject6->setName('Rust');
        $subject6->setDescription('exemple');
        $subject6->setRequirements('[NULL]');
        # $subject6->setTheme(1);
        $subject6->setImage('[NULL]');
        $subject6->setParticipation('[NULL]');

        $manager->persist($subject6);
    }
}
