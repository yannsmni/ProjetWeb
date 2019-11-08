<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventsController extends AbstractController {

    public function __construct(EvenementRepository $repository) {
        $this->repository = $repository;
        //$this->$date = new \Datetime();
        //$this->$mois = $date->format('m');
    }

    public function index(): Response 
    {        
        $allEvents = $this->repository->findAll();
        //$latestEvents = $this->repository->findLatestEvents($date);
        //$upcommingEvents = $this->repository->findUpcommingEvents($date);
        $bestEvents = $this->repository->findBestEvents();

        return $this->render('publicPages/evenements/evenements_home.html.twig', [
            'allEvents' => $allEvents,
            //'latestEvents' => $latestEvents,
            //'upcommingEvents' => $upcommingEvents,
            'bestEvents' => $bestEvents
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
        //$monthlyEvents = $this->repository->findMonthlyEvents($mois);

        return $this->render('publicPages/evenements/evenements_mois.html.twig', [
            //'monthlyEvents' => $monthlyEvents
        ]);
    }

    public function my(): Response 
    {        
        $myEvents = $this->repository->findMyEvents();

        return $this->render('publicPages/evenements/evenements_perso.html.twig', [
            'myEvents' => $myEvents
        ]);
    }
}