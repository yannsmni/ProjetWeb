<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($i=0; $i<4; $i++){
            $categorie = new Categorie();
            if($i=0){
                $categorie->setNom('Habit');
                $manager->persist($categorie);
                for($j=0; $j<3; $j++){
                    $produit = new Categorie();
                    if($i=0){
                        $produit->setCategorie($categorie);
                        $produit->setNom('Tshirt');
                        $produit->setDescription('Tshirt à l\'effigie du BDE du CESI');
                        $produit->setPrix(15);
                        $produit->setImageChemin('./public/image/tshirt.png');
                    }
                    else if($i=1){

                    }
                    else if($i=2){

                    }
                }
            }
            else if($i=1){
                $categorie->setNom('Goodies');
                $manager->persist($categorie);
                for($j=0; $j<3; $j++){
                    $produit = new Produit();
                    if($i=0){

                    }
                    else if($i=1){

                    }
                    else if($i=2){

                    }
                }
            }
            else if($i=2){
                $categorie->setNomVALUES ('Produit IT');
                $manager->persist($categorie);
                for($j=0; $j<3; $j++){
                    $produit = new Produit();
                    if($i=0){

                    }
                    else if($i=1){

                    }
                    else if($i=2){

                    }
                }
            }
            else if($i=3){
                $categorie->setNom('Réduction');
                $manager->persist($categorie);
                for($j=0; $j<3; $j++){
                    $produit = new Produit();
                    if($i=0){

                    }
                    else if($i=1){

                    }
                    else if($i=2){

                    }
                }
            }
        }

        $manager->flush();
    }
}
