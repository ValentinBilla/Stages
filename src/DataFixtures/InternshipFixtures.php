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
        $faker = \Faker\Factory::create('fr_FR');

        $countries = [
            "Madagascar", "Bolivie", "Zimbabwe",
            "Québec", "Bretagne", "Corse",
            "Corée du Nord", "Empire Germanique"
        ];
        $companies = [
            "GInfo", "Dassault", "foder",
            "Biologieland", "Economieland"
        ];

        for($i=0; $i<50; $i++) {
            $internship = new Internship();

            $title = $faker->sentence(3, false);
            $description = $faker->text($faker->numberBetween(1000, 1500));
            $city = $faker->city();
            $postalCode = $faker->postcode();
            $country = $faker->randomElement($countries);
            $company = $faker->randomElement($companies);
            $contact = $faker->email();
            $startedOn = $faker->dateTime();
            $finishedOn = $faker->dateTimeInInterval($startedOn, '6 months');

            $query = $manager->createQuery('SELECT u FROM App\Entity\User u');
            $users = $query->getResult();
            $author = $faker->randomElement($users);

            $query = $manager->createQuery('SELECT u FROM App\Entity\Category u');
            $categories = $query->getResult();
            $category = $faker->randomElement($categories);

            $internship->setTitle($title)
                ->setDescription($description)
                ->setCity($city)
                ->setPostalCode($postalCode)
                ->setCountry($country)
                ->setCompany($company)
                ->setContact($contact)
                ->setStartedOn($startedOn)
                ->setFinishedOn($finishedOn)
                ->setAuthor($author)
                ->setCategory($category);

            $manager->persist($internship);
        }

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
