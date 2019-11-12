<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Produit;
use App\Repository\EvenementRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    public function __construct(EvenementRepository $evenementsRepository, ProduitRepository $produitsRepository) {
        $this->evenementsRepository = $evenementsRepository;
        $this->produitsRepository = $produitsRepository;
    }

    public function index(): Response 
    {        
        $date = new \DateTime();
        $upcommingEvents = $this->evenementsRepository->findLatestEvents($date);
        $bestProducts = $this->produitsRepository->findBestProducts();

        return $this->render('publicPages/accueil.html.twig', [
            'upcommingEvents' => $upcommingEvents,
            'bestProducts' => $bestProducts
        ]);
    }

    public function legislation(): Response
    {
        return $this->render('publicPages/legislation.home.html.twig');
    }
}