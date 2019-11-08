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
            'IT-Products' => $ITProducts
        ]);
    }

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

    /**
     * @return Response
     */
    public function produitsIT() : Response
    {
        $ITProducts = $this->repository->findITProducts();
        return $this->render('publicPages/boutique.produitsIT.html.twig', [
            'IT-Products' => $ITProducts
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