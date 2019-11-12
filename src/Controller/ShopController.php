<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\ProduitFiltre;
use App\Form\ProduitFiltreType;
use App\Repository\ProduitRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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

        return $this->render('publicPages/boutique/boutique.html.twig', [
            'allProducts' => $allProducts,
            'goodies' => $goodies,
            'clothes' => $clothes,
            'reductions' => $reductions,
            'ITProducts' => $ITProducts
        ]);
    }

   public function show(Produit $produit) : Response
    {
        //$produit = $this->repository->findByID($id);
        return $this->render('publicPages/boutique/boutique.show.html.twig', [
            'produit' => $produit
        ]);
    }

    public function all(PaginatorInterface $paginator, Request $request) : Response
    {
        $search = new ProduitFiltre();
        $form = $this->createForm(ProduitFiltreType::class, $search);
        $form->handleRequest($request);

        $allProducts = $paginator->paginate($this->repository->findVisibleProducts($search),
            $request->query->getInt('page', 1),
            10);
        return $this->render('publicPages/boutique/boutique.all.html.twig', [
            'allProducts' => $allProducts,
            'form' => $form->createView()
        ]);
    }


    public function goodies(PaginatorInterface $paginator, Request $request) : Response
    {
        $search = new ProduitFiltre();
        $form = $this->createForm(ProduitFiltreType::class, $search);
        $form->handleRequest($request);
        $goodies = $paginator->paginate($this->repository->findGoodies($search),
            $request->query->getInt('page', 1), 10);
        return $this->render('publicPages/boutique/boutique.goodies.html.twig', [
            'goodies' => $goodies,
            'form' => $form->createView()
        ]);
    }

    public function produitsIT(PaginatorInterface $paginator, Request $request) : Response
    {
        $search = new ProduitFiltre();
        $form = $this->createForm(ProduitFiltreType::class, $search);
        $form->handleRequest($request);
        $ITProducts = $paginator->paginate($this->repository->findITProducts($search),
            $request->query->getInt('page', 1), 10);
        return $this->render('publicPages/boutique/boutique.produitsIT.html.twig', [
            'ITProducts' => $ITProducts,
            'form' => $form->createView()
        ]);
    }

    public function habits(PaginatorInterface $paginator, Request $request) : Response
    {
        $search = new ProduitFiltre();
        $form = $this->createForm(ProduitFiltreType::class, $search);
        $form->handleRequest($request);
        $clothes = $paginator->paginate($this->repository->findClothes($search),
            $request->query->getInt('page', 1), 10);
        return $this->render('publicPages/boutique/boutique.habits.html.twig', [
            'clothes' => $clothes,
            'form' => $form->createView()
        ]);
    }

    public function reduction(PaginatorInterface $paginator, Request $request) : Response
    {
        $search = new ProduitFiltre();
        $form = $this->createForm(ProduitFiltreType::class, $search);
        $form->handleRequest($request);
        $reductions = $paginator->paginate($this->repository->findReductions($search),
            $request->query->getInt('page', 1), 10);
        return $this->render('publicPages/boutique/boutique.reduction.html.twig', [
            'reductions' => $reductions,
            'form' => $form->createView()
        ]);
    }
}