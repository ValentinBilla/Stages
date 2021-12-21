<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sciences = new Category();
        $sciences->setName("Sciences");
        $manager->persist($scienses);
        
        $sub_sciences = new Category();
        $sub_sciences->setParent($sciences);
        $sub_names = array("Mathématiques", "Mécanique", "Chimie", "Physique", "Biologie");
        foreach ($sub_names as $sub_name) {
            $sub_sciences->setName($sub_name);
            $manager->persist($sub_sciences);
        }

        $economy = new Category();
        $economy->setName("Economie");
        $manager->persist($economy);

        $management = new Category();
        $management->setName("Management");
        $manager->persist($management);

        $manager->flush();
    }
}
