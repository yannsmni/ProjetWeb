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
        $allEvents = $this->repository->findAll();
        //$latestEvents = $this->repository->findLatestEvents();
        //$upcommingEvents = $this->repository->findUpcommingEvents();
        //$monthlyEvents = $this->repository->findMonthlyEvents();
        //$bestEvents = $this->repository->findBestEvents();

        return $this->render('publicPages/evenements.html.twig', [
            'allEvents' => $allEvents
        //    'latestEvents' => $latestEvents,
        //    'upcommingEvents' => $upcommingEvents,
        //    'monthlyEvents' => $monthlyEvents,
        //    'bestEvents' => $bestEvents
        ]);
    }
}