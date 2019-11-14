<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Entity\EvenementFiltre;
use App\Entity\EvenementSearch;
use App\Form\EvenementFiltreType;
use App\Form\EvenementSearchType;
use App\Repository\EvenementRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEventsController extends AbstractController {

    public function __construct(EvenementRepository $repository, ObjectManager $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index(PaginatorInterface $paginator, Request $request): Response 
    {        
        $recherche = new EvenementSearch();
        $search = new EvenementFiltre();
        $formFiltre = $this->createForm(EvenementFiltreType::class, $search);
        $formFiltre->handleRequest($request);
        $formRecherche = $this->createForm(EvenementSearchType::class, $recherche);
        $formRecherche->handleRequest($request);

        $allEvents = $paginator->paginate(
            $this->repository->findAllBySearch($search),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('adminPages/evenements.html.twig', [
            'allEvents' => $allEvents,
            'formFiltre' => $formFiltre->createView(),
            'formRecherche' => $formRecherche->createView()
        ]);
    }

    public function add(Request $request)
    {        
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->persist($evenement);
            $this->em->flush();
            return $this->redirectToRoute('adminEventsHome');
        }

        return $this->render('adminPages/evenements_add.html.twig', [
            'Evenement' => $evenement,
            'form' => $form->createView()
        ]);   
    }

    public function edit(Evenement $evenement, Request $request)
    {        
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('adminEventsHome');
        }

        return $this->render('adminPages/evenements_edit.html.twig', [
            'Evenement' => $evenement,
            'form' => $form->createView()
        ]);
    }

    public function delete(Evenement $evenement) {
        
        $this->em->remove($evenement);
        $this->em->flush();

        return $this->redirectToRoute('adminEventsHome');
    }

    public function search($search): JsonResponse
    {
        $evenements = $this->repository->findBySearch($search);

        $jsonEvents = null;
        foreach ($evenements as $key => $evenement)
        {
        $jsonEvents[$key]['Id'] = $evenements[$key]->getId();
        $jsonEvents[$key]['nom'] = $evenements[$key]->getNom();
        $jsonEvents[$key]['prix'] = $evenements[$key]->getPrix();
        $jsonEvents[$key]['statut'] = $evenements[$key]->getStatut();
        $jsonEvents[$key]['date'] = $evenements[$key]->getDate();
        $jsonEvents[$key]['dateCreation'] = $evenements[$key]->getDateCreation();
        }
        return $this->json($jsonEvents, 200, ['Content-Type' => 'application/json']);
    }
}