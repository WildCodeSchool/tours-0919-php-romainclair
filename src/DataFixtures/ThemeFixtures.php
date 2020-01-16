<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Theme;

class ThemeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $theme1 = new Theme();
        $theme1->setName('Développement');
        $theme1->setImage('developpement.jpg');
        $theme1->setDescription('[NULL]');

        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2->setName('Sécurité');
        $theme2->setImage('securite.jpg');
        $theme2->setDescription('[NULL]');

        $manager->persist($theme2);

        $theme3 = new Theme();
        $theme3->setName('Réseaux');
        $theme3->setImage('reseau.jpg');
        $theme3->setDescription('[NULL]');

        $manager->persist($theme3);

        $theme4 = new Theme();
        $theme4->setName('Méthodologie');
        $theme4->setImage('methodologie.jpg');
        $theme4->setDescription('[NULL]');

        $manager->persist($theme4);

        $theme5 = new Theme();
        $theme5->setName('Système');
        $theme5->setImage('systeme.png');
        $theme5->setDescription('[NULL]');


        $manager->persist($theme5);
        
        $manager->flush();
    }
}
