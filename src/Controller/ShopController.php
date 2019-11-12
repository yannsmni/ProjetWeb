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

    /**
     * @return Response
     */
    /*
     * Index comprenant tous les types possibles de filtres
     */
    public function index(): Response 
    {        
        $allProducts = $this->repository->findAll();
        $ITProducts = $this->repository->findITProducts();
        $goodies = $this->repository->findGoodies();
        $clothes = $this->repository->findClothes();
        $reductions = $this->repository->findReductions();

        return $this->render('publicPages/boutique.html.twig', [
            'allProducts' => $allProducts,
            'goodies' => $goodies,
            'clothes' => $clothes,
            'reductions' => $reductions,
            'ITProducts' => $ITProducts
        ]);
    }

   /* public function show(Produit $produit) : Response
    {
        $produit = $this->repository->findByID($id);
        return $this->render('publicPages/boutique.show.html.twig', [
            'produit' => $produit
        ]);
    }*/

    /**
     * @return Response
     */
    public function goodies() : Response
    {
        $goodies = $this->repository->findGoodies();
        return $this->render('publicPages/boutique.goodies.html.twig', [
            'goodies' => $goodies
        ]);
    }
    public function tousProduits() : Response
    {
        $allProducts = $this->repository->findAll();
        return $this->render('publicPages/boutique.all.html.twig', [
            'allProducts' => $allProducts
        ]);
    }
    /**
     * @return Response
     */
    public function produitsIT() : Response
    {
        $ITProducts = $this->repository->findITProducts();
        return $this->render('publicPages/boutique.produitsIT.html.twig', [
            'ITProducts' => $ITProducts
        ]);
    }

    /**
     * @return Response
     */
    public function habits() : Response
    {
        $clothes = $this->repository->findClothes();
        return $this->render('publicPages/boutique.habits.html.twig', [
            'clothes' => $clothes
        ]);
    }

    /**
     * @return Response
     */
    public function reduction() : Response
    {
        $reductions = $this->repository->findReductions();
        return $this->render('publicPages/boutique.reduction.html.twig', [
            'reductions' => $reductions
        ]);
    }
}