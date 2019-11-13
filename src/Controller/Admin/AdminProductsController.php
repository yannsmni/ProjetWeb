<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminProductsController extends AbstractController {

    public function __construct(ProduitRepository $repository, ObjectManager $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index(Request $request): Response 
    {  
        $allProducts = $this->repository->findAllProducts();

        return $this->render('adminPages/produits.html.twig', [
            'allProducts' => $allProducts
        ]);
    }

    public function add(Request $request)
    {        
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->persist($produit);
            $this->em->flush();
            return $this->redirectToRoute('adminProductsHome');
        }

        return $this->render('adminPages/produits_add.html.twig', [
            'Produit' => $produit,
            'form' => $form->createView()
        ]);   
    }

    public function edit(Produit $produit, Request $request)
    {        
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->persist($produit);
            $this->em->flush();
            return $this->redirectToRoute('adminProductsHome');
        }

        return $this->render('adminPages/produits_edit.html.twig', [
            'Produit' => $produit,
            'form' => $form->createView()
        ]); 
    }

    public function delete(Produit $produit) {
        
        $this->em->remove($produit);
        $this->em->flush();

        return $this->redirectToRoute('adminProductsHome');
    }

}