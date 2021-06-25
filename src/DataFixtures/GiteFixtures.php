<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use Faker;
use App\Entity\Gite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GiteFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $equipement = [];

        $eq1 = new Equipement();
        $eq1->setName('Machine à laver');
        
        $eq2 = new Equipement();
        $eq2->setName('Climatisation');
        
        $eq3 = new Equipement();
        $eq3->setName('TV');
        
        $eq4 = new Equipement();
        $eq4->setName('Terrasse');
        
        $eq5 = new Equipement();
        $eq5->setName('Piscine');
        
        $eq6 = new Equipement();
        $eq6->setName('BBQ');
        
        $eq7 = new Equipement();
        $eq7->setName('Ping Pong');
        
        array_push($equipement,$eq1,$eq2,$eq3,$eq4,$eq5,$eq6,$eq7);
        
        $manager->persist($eq1);
        $manager->persist($eq2);
        $manager->persist($eq3);
        $manager->persist($eq4);
        $manager->persist($eq5);
        $manager->persist($eq6);
        $manager->persist($eq7);
        $manager->flush();

        for ($i=0; $i <=100 ; $i++) { 
            $gite = new Gite();
            $gite
                ->setName($faker->sentence(5))
                ->setDescription($faker->text(100))
                ->setAddress($faker->address())
                ->setCity($faker->city())
                ->setRooms($faker->numberBetween(2,6))
                ->setSurface($faker->numberBetween(30,200))
                ->setPostalCode($faker->postcode())
                ->setAnimals($faker->boolean())
                ->setCreatedAt($faker->DateTimeThisYear())
                ->addEquipement($faker->randomElement($equipement));
            
                $manager->persist($gite);
        }
        

        $manager->flush();
    }
}
