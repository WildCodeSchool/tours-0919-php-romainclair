<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Meetings;

class MeetingFixtures extends Fixture
{
    //need to remove the s
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $meetings7 = new Meetings();
        $meetings7->setName('Django');
        $meetings7->setDescription('exemple');
        $meetings7->setRequired('Base de python');
        $meetings7->setParticipating('12');
        # $meetings7->setSubjects(7);

        $manager->persist($meetings7);

        $meetings8 = new Meetings();
        $meetings8->setName('Hashage');
        $meetings8->setDescription('exemple');
        $meetings8->setRequired('Aucune');
        $meetings8->setParticipating('12');
        # $meetings8->setSubjects(8);

        $manager->persist($meetings8);

        $meetings9 = new Meetings();
        $meetings9->setName('Hashage');
        $meetings9->setDescription('exemple');
        $meetings9->setRequired('Aucune');
        $meetings9->setParticipating('12');
        # $meetings9->setSubjects(9);

        $manager->persist($meetings9);

        $meetings10 = new Meetings();
        $meetings10->setName('Gérer l\'accès par IP');
        $meetings10->setDescription('exemple');
        $meetings10->setRequired('Bases en réseaux');
        $meetings10->setParticipating('12');
        # $meetings10->setSubjects(10);

        $manager->persist($meetings10);

        $meetings11 = new Meetings();
        $meetings11->setName('Le scrum board');
        $meetings11->setDescription('exemple');
        $meetings11->setRequired('Connaisance de la methodologie agile');
        $meetings11->setParticipating('12');
        # $meetings11->setSubjects(11);

        $manager->persist($meetings11);
        $meetings12 = new Meetings();
        $meetings12->setName('Installation de sa version d\'ubuntu');
        $meetings12->setDescription('exemple');
        $meetings12->setRequired('Aucune');
        $meetings12->setParticipating('12');
        # $meetings12->setSubjects(12);
        
        $manager->persist($meetings12);

        $manager->flush();
    }
}
