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
        $meetings1 = new Meetings();
        $meetings1->setName('Les fonctions');
        $meetings1->setDescription('exemple');
        $meetings1->setRequired('Les Variables');
        $meetings1->setParticipating('12');
        # $meetings1->setSubjects(3);

        $manager->persist($meetings1);

        $meetings2 = new Meetings();
        $meetings2->setName('Les Variables');
        $meetings2->setDescription('exemple');
        $meetings2->setRequired('Les fonctions');
        $meetings2->setParticipating('12');
        # $meetings2->setSubjects(1);

        $manager->persist($meetings2);


        $meetings3 = new Meetings();
        $meetings3->setName('Symfony');
        $meetings3->setDescription('exemple');
        $meetings3->setRequired('Les Variables');
        $meetings3->setParticipating('12');
        # $meetings3->setSubjects(2);

        $manager->persist($meetings3);

        $meetings4 = new Meetings();
        $meetings4->setName('Les Boucles');
        $meetings4->setDescription('exemple');
        $meetings4->setRequired('Les Variables');
        $meetings4->setParticipating('12');
        # $meetings4->setSubjects(4);

        $manager->persist($meetings4);

        $meetings5 = new Meetings();
        $meetings5->setName('Node.js');
        $meetings5->setDescription('exemple');
        $meetings5->setRequired('Base de javascript');
        $meetings5->setParticipating('12');
        # $meetings5->setSubjects(5);

        $manager->persist($meetings5);


        $meetings6 = new Meetings();
        $meetings6->setName('Rust pour les nuls');
        $meetings6->setDescription('exemple');
        $meetings6->setRequired('Aucune');
        $meetings6->setParticipating('12');
        # $meetings6->setSubjects(6);

        $manager->persist($meetings6);


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
