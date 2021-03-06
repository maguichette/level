<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\DataFixtures\FormateurFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FormateurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $Fm=new FORMATEUR();
        $Fm->setEmail($faker->email());
        $Fm->setPrenom($faker->firstName());
        $Fm->setNom($faker->lastName);
        $Fm->setArchive(0);
        $Fm->setPRofil($this->getReference(ProfilFixtures::Fm_REFERENCE));
        $Fm->setPassword(122);
        $manager->persist($Cm);
    
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        ); 
    }
}
