<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
{
    $faker = Factory::create('fr_FR');
    $App=new Apprenant();
    $App->setEmail($faker->email());
    $App->setPrenom($faker->firstName());
    $App->setNom($faker->lastName);
    $App->setTelephone($faker->phoneNumber);
    $App->($faker->phoneNumber);
    $App->setArchive(0);
    $App->setPRofil($this->getReference(ProfilFixtures::APPRENANT_REFERENCE));
    $App->setPassword(122);
    $manager->persist($App);

    $manager->flush();
}
public function getDependencies()
{
    return array(
        UserFixtures::class,
    ); 
}
}