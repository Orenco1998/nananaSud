<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {

            $property = new Service();
            $property
                ->setTitle($faker->words(3, true))
                ->setDescription($faker->sentences(3, true));
            $manager->persist($property);
        }

        $manager->flush();
    }
}
