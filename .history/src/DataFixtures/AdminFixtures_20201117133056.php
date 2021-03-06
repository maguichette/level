<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Admin;
use App\DataFixtures\ProfilFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AdminFixtures  extends Fixture implements DependentFixtureInterface
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $admin=new Admin();
        $admin->setEmail($faker->email());
        $admin->setPrenom($faker->firstName());
        $admin->setNom($faker->lastName);
        $admin->setArchive(0);
        $admin->setPRofil($this->getReference(ProfilFixtures::ADMIN_REFERENCE));
        $admin->setPassword($);
        $manager->persist($admin);

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
