<?php

namespace App\DataFixtures;

use App\Entity\Diy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class DiyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {

            $property = new Diy();
            $property
                ->setTitle($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setLink($faker->freeEmailDomain);
            $manager->persist($property);
        }

        $manager->flush();
    }
}
