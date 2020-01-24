<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Creating normal user
        $subscriber = new User();
        $subscriber->setUsername('user');
        $subscriber->setMail('subscriber@monsite.com');
        $subscriber->setRoles(['ROLE_SUBSCRIBER']);
        $subscriber->setPassword($this->passwordEncoder->encodePassword(
            $subscriber,
            'user'
        ));

        $manager->persist($subscriber);

        // Creating an Admin
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setMail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'admin'
        ));
        $manager->persist($admin);
        $manager->flush();
    }
}
