<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 4; $i++) {
            $categorie = new Categorie();

            if ($i == 0) {
                $categorie->setNom('Habit');
                $manager->persist($categorie);

                for ($j = 0; $j < 3; $j++) {
                    $produit = new Produit();
                    if ($j == 0) {
                        $produit->setCategorie($categorie)
                                ->setNom('Tshirt')
                                ->setDescription('Tshirt à l\'effigie du BDE du CESI')
                                ->setPrix(15)
                                ->setQuantiteVendu(0);
                    } else if ($j == 1) {
                        $produit->setCategorie($categorie)
                                ->setNom('Hoodie')
                                ->setDescription('Hoodie à l\'effigie du BDE du CESI')
                                ->setPrix(35)
                                ->setQuantiteVendu(0);
                    } else if ($j == 2) {
                        $produit->setCategorie($categorie)
                                ->setNom('Sweatshirt')
                                ->setDescription('Sweatshirt à l\'effigie du BDE du CESI')
                                ->setPrix(25)
                                ->setQuantiteVendu(0);
                    }

                    $manager->persist($produit);
                }
            } else if ($i == 1) {
                $categorie->setNom('Goodies');
                $manager->persist($categorie);

                for ($k = 0; $k < 3; $k++) {
                    $produit = new Produit();
                    if ($k == 0) {
                        $produit->setCategorie($categorie)
                                ->setNom('Sticker BDE')
                                ->setDescription('Sticker reprrenant le logo du BDE pour vos PC')
                                ->setPrix(7)
                                ->setQuantiteVendu(0);
                    } else if ($k == 1) {
                        $produit->setCategorie($categorie)
                                ->setNom('Porte-clé')
                                ->setDescription('Porte-clé reprrenant le logo du BDE')
                                ->setPrix(4)
                                ->setQuantiteVendu(0);
                    } else if ($k == 2) {
                        $produit->setCategorie($categorie)
                                ->setNom('Peluche')
                                ->setDescription('Peluche cygogne du BDE')
                                ->setPrix(5)
                                ->setQuantiteVendu(0);
                    }

                    $manager->persist($produit);
                }
            } else if ($i == 2) {
                $categorie->setNom('Produit IT');
                $manager->persist($categorie);

                for ($p = 0; $p < 3; $p++) {
                    $produit = new Produit();
                    if ($p == 0) {
                        $produit->setCategorie($categorie)
                                ->setNom('Ventilateur USB')
                                ->setDescription('Ventilateur USB pour l\'été')
                                ->setPrix(13)
                                ->setQuantiteVendu(0);
                    } else if ($p == 1) {
                        $produit->setCategorie($categorie)
                                ->setNom('Clavier')
                                ->setDescription('Clavier BDE méchanique pour les plus grands G@merz')
                                ->setPrix(50)
                                ->setQuantiteVendu(0);
                    } else if ($p == 2) {
                        $produit->setCategorie($categorie)
                                ->setNom('RGBDE')
                                ->setDescription('Set RGB pour plus de style')
                                ->setPrix(52)
                                ->setQuantiteVendu(0);
                    }

                    $manager->persist($produit);
                }
            } else if ($i == 3) {
                $categorie->setNom('Réduction');
                $manager->persist($categorie);

                for ($l = 0; $l < 2; $l++) {
                    $produit = new Produit();
                    if ($l == 0) {
                        $produit->setCategorie($categorie)
                                ->setNom('Offre Bar')
                                ->setDescription('En partenariat avec les bars de Strasbourg')
                                ->setPrix(14)
                                ->setQuantiteVendu(0);
                    } else if ($l == 1) {
                        $produit->setCategorie($categorie)
                                ->setNom('Offre IT')
                                ->setDescription('En partenariat avec les entreprises IT de Strasbourg')
                                ->setPrix(90)
                                ->setQuantiteVendu(0);
                    }

                    $manager->persist($produit);
                }
            }
        }

        $manager->flush();
    }
}
