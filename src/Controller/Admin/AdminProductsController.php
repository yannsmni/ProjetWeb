<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Entity\ProduitSearch;
use App\Form\ProduitSearchType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminProductsController extends AbstractController {

    public function __construct(ProduitRepository $repository, ObjectManager $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index(Request $request): Response 
    {  
        $allProducts = $this->repository->findAllProducts();

        $search = new ProduitSearch();
        $form = $this->createForm(ProduitSearchType::class, $search);
        $form->handleRequest($request);

        return $this->render('adminPages/produits.html.twig', [
            'allProducts' => $allProducts,
            'form' => $form->createView()
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

    public function search($search): JsonResponse
    {
        $products = $this->repository->findBySearch($search);

        $jsonProducts = null;
        foreach ($products as $key => $product)
        {
        $jsonProducts[$key]['Id'] = $products[$key]->getId();
        $jsonProducts[$key]['nom'] = $products[$key]->getNom();
        $jsonProducts[$key]['description'] = $products[$key]->getDescription();
        $jsonProducts[$key]['prix'] = $products[$key]->getPrix();
        $jsonProducts[$key]['quantite_vendu'] = $products[$key]->getQuantiteVendu();
        }
        return $this->json($jsonProducts, 200, ['Content-Type' => 'application/json']);
    }
}