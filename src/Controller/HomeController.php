<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    public function __construct(EvenementRepository $evenementsRepository) {
        $this->evenementsRepository = $evenementsRepository;
    }

    public function index(): Response 
    {        
        $date = new \DateTime();
        $upcommingEvents = $this->evenementsRepository->findLatestEvents($date);

        return $this->render('publicPages/accueil.html.twig', [
            'upcommingEvents' => $upcommingEvents
        ]);
    }
}