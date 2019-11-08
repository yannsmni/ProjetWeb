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

    public function goodies() : Response
    {
        $allProducts = $this->repository->findAll();
        return $this->render('publicPages/boutique.goodies.html.twig', [
            'allProducts' => $allProducts
        ]);
    }

    public function tshirts() : Response
    {
        $allProducts = $this->repository->findAll();
        return $this->render('publicPages/boutique.tshirts.html.twig', [
            'allProducts' => $allProducts
        ]);
    }

    public function pulls() : Response
    {
        $allProducts = $this->repository->findAll();
        return $this->render('publicPages/boutique.pulls.html.twig', [
            'allProducts' => $allProducts
        ]);
    }

    public function autres() : Response
    {
        $allProducts = $this->repository->findAll();
        return $this->render('publicPages/boutique.autres.html.twig', [
            'allProducts' => $allProducts
        ]);
    }
}