<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AdminFixtures  extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $admin=new Admin();
        $user->setEmail($faker->email());
        $user->setPrenom($faker->prenom());
        $user->setNom($faker->nom());
        $user->setAdresse($faker->adresse());
        $user->setTelephone($faker->telephone());

        $manager->flush();
    }
}
