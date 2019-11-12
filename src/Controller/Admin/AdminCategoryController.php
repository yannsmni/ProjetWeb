<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminCategoryController extends AbstractController {

    public function __construct(CategorieRepository $repository, ObjectManager $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index(Request $request): Response 
    {  
        $allCategorie = $this->repository->findAll();

        return $this->render('adminPages/categories.html.twig', [
            'allCategorie' => $allCategorie
        ]);
    }

    public function add(Request $request)
    {        
        $categorie = new Category();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->persist($categorie);
            $this->em->flush();
            return $this->redirectToRoute('adminCategoryHome');
        }

        return $this->render('adminPages/categories_add.html.twig', [
            'Categorie' => $categorie,
            'form' => $form->createView()
        ]);   
    }

    public function edit(Categorie $categorie, Request $request)
    {        
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->persist($categorie);
            $this->em->flush();
            return $this->redirectToRoute('adminCategoryHome');
        }

        return $this->render('adminPages/categories_edit.html.twig', [
            'Categorie' => $categorie,
            'form' => $form->createView()
        ]); 
    }

    public function delete(Categorie $categorie) {
        
        $this->em->remove($categorie);
        $this->em->flush();

        return $this->redirectToRoute('adminCategoryHome');
    }

}