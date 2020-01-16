<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Subject;

class SecondSubjectFixtures extends Fixture
{
    // need to remove all the s of the subjects
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $subject7 = new Subject();
        $subject7->setName('Python');
        $subject7->setDescription('exemple');
        $subject7->setRequirements('[NULL]');
        # $subject7->setTheme(1);
        $subject7->setImage('[NULL]');
        $subject7->setParticipation('[NULL]');

        $manager->persist($subject7);

        $subject8 = new Subject();
        $subject8->setName('Cryptographie');
        $subject8->setDescription('exemple');
        $subject8->setRequirements('[NULL]');
        # $subject8->setTheme(2);
        $subject8->setImage('[NULL]');
        $subject8->setParticipation('[NULL]');

        $manager->persist($subject8);

        $subject9 = new Subject();
        $subject9->setName('Administrer son réseau');
        $subject9->setDescription('exemple');
        $subject9->setRequirements('[NULL]');
        # $subject9->setTheme(3);
        $subject9->setImage('[NULL]');
        $subject9->setParticipation('[NULL]');

        $manager->persist($subject9);

        $subject10 = new Subject();
        $subject10->setName('Scrum');
        $subject10->setDescription('exemple');
        $subject10->setRequirements('[NULL]');
        # $subject10->setTheme(4);
        $subject10->setImage('[NULL]');
        $subject10->setParticipation('[NULL]');

        $manager->persist($subject10);

        $subject11 = new Subject();
        $subject11->setName('Ubuntu');
        $subject11->setDescription('exemple');
        $subject11->setRequirements('[NULL]');
        # $subject11->setTheme(5);
        $subject11->setImage('[NULL]');
        $subject11->setParticipation('[NULL]');

        $manager->persist($subject11);

        $manager->flush();
    }
}
