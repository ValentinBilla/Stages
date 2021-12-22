<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Internship;

use App\DataFixtures\UserFixtures;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class InternshipFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class
        ];
    }
}
