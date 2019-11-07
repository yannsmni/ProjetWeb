<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShopController extends AbstractController {

    public function __construct(ProduitRepository $repository) {
        $this->repository = $repository;
    }

    public function index(): Response 
    {        
        $allProducts = $this->repository->findAll();

        return $this->render('publicPages/boutique.html.twig', [
            'allProducts' => $allProducts
        ]);
    }
}