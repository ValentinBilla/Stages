<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $usersData = [
            ["azabban", "Adrien", "Zabban", 2024],
            ["adubois", "Alessia", "Dubois", 2024],
            ["amenasria", "Alexandre", "Pilouf", 2022],
            ["clacour", "Clémence", "Lacour", 2024],
            ["foder", "François", "Oder", 2022],
            ["glouedec", "Glin", "Royale", 2023],
            ["jmercurio", "Juliette", "Mercurio", 2024],
            ["mle-goue", "Marie", "Le Goué", 2022],
            ["nbert", "Nicoco", "Bert", 2023],
            ["rgrondin", "Rom", "Grondin", 2021],
            ["vbilla", "Valentin", "Billa", 2024]
        ];

        foreach ($usersData as $userData) {
            $user = new User;
            $user->setUsername($userData[0])
                 ->setPassword($userData[0])
                 ->setRoles(array("ROLE_USER"))
                 ->setFirstName($userData[1])
                 ->setLastName($userData[2])
                 ->setEmail($userData[0]."@centrale-marseille.fr")
                 ->setPromo($userData[3]);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
