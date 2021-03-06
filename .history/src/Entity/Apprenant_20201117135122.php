<?php

namespace App\Entity;

use Faker\Factory;
use Doctrine\ORM\Mapping as ORM;
use App\DataFixtures\ProfilFixtures;
use App\Repository\ApprenantRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 */
class Apprenant extends Fixture implements DependentFixtureInterface
{  
public function load(ObjectManager $manager)
{
    $faker = Factory::create('fr_FR');
    $Cm=new APPRENANT();
    $Cm->setEmail($faker->email());
    $Cm->setPrenom($faker->firstName());
    $Cm->setNom($faker->lastName);
    $Cm->setArchive(0);
    $Cm->setPRofil($this->getReference(ProfilFixtures::APPRENANT_REFERENCE));
    $Cm->setPassword(122);
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