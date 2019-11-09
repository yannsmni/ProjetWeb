<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventsController extends AbstractController {  

    public function __construct(EvenementRepository $repository) {
        $this->repository = $repository;
    }

    public function index(): Response 
    {        
        $date = new \DateTime();
        $allEvents = $this->repository->findAll();
        $latestEvents = $this->repository->findLatestEvents($date);
        $upcommingEvents = $this->repository->findUpcommingEvents($date);
        $bestEvents = $this->repository->findBestEvents();

        return $this->render('publicPages/evenements/evenements_home.html.twig', [
            'allEvents' => $allEvents,
            'latestEvents' => $latestEvents,
            'upcommingEvents' => $upcommingEvents,
            'bestEvents' => $bestEvents
        ]);
    }

    public function show(Evenement $evenement): Response
    {
        return $this->render('publicPages/evenements/evenements_show.html.twig', [
            'evenement' => $evenement
        ]);
    }

    public function all(): Response 
    {        
        $allEvents = $this->repository->findAll();

        return $this->render('publicPages/evenements/evenements_tous.html.twig', [
            'allEvents' => $allEvents
        ]);
    }

    public function month(): Response 
    {       
        $date = new \DateTime();
        $formattedDate = $date->format('Y-m');
        $monthlyEvents = $this->repository->findMonthlyEvents($formattedDate);

        return $this->render('publicPages/evenements/evenements_mois.html.twig', [
            'monthlyEvents' => $monthlyEvents
        ]);
    }

    public function my(): Response 
    {        
        //$myEvents = $this->repository->findMyEvents();

        return $this->render('publicPages/evenements/evenements_perso.html.twig', [
            //'myEvents' => $myEvents
        ]);
    }
}