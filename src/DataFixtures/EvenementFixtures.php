<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use App\Entity\Evenement;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Code\Scanner\Util;

class EvenementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($j = 1; $j < 15; $j++) {
            $utilisateur = new Utilisateur();

            $utilisateur->setId($j);
            $manager->persist($utilisateur);

            for ($i = 0; $i < 3; $i++) {
                $evenement = new Evenement();
    
                $chance = random_int(0, 1);
                if($chance == 0){
                    $statut="Recurent";
                }else{
                    $statut="ponctuel";
                }
    
                $evenement->setNom($faker->sentence($nbWords = 6, $variableNbWords = true))
                          ->setDescription($faker->realText($maxNbChars = 254))
                          ->setDate($faker->dateTimeBetween('-18 months'))
                          ->setDateCreation($faker->dateTime($max = '-18 months'))
                          ->setVisible($faker->boolean($chanceOfGettingTrue = 50))
                          ->setPrix(random_int(0, 5))
                          ->setStatut($statut);
    
                $manager->persist($evenement);
                
                for($k=1; $k<2; $k++){
                    $commentaire = new Commentaire();
    
                    $now=new \DateTime();
                    $interval = $now->diff($evenement->getDate());
                    $days = $interval->days;
                    $minimum = '-' . $days . 'days';
    
                    $commentaire->setEvenement($evenement)
                                ->setContenu($faker->realText($maxNbChars = 254))
                                ->setVisible($faker->boolean($chanceOfGettingTrue = 50))
                                ->setAuteur($utilisateur)
                                ->setDate($faker->dateTimeBetween($minimum));
                    
                    $manager->persist($commentaire);
                }
            }
        }

        $manager->flush();
    }
}