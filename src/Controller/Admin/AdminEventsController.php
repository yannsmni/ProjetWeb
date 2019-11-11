<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Entity\EvenementFiltre;
use App\Form\EvenementFiltreType;
use App\Repository\EvenementRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEventsController extends AbstractController {

    public function __construct(EvenementRepository $repository, ObjectManager $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index(PaginatorInterface $paginator, Request $request): Response 
    {        
        $search = new EvenementFiltre();
        $form = $this->createForm(EvenementFiltreType::class, $search);
        $form->handleRequest($request);
        
        $allEvents = $paginator->paginate(
            $this->repository->findAllVisible(),
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('adminPages/evenements.html.twig', [
            'allEvents' => $allEvents,
            'form' => $form->createView()
        ]);
    }

    /*public function add(Request $request)
    {        
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->persist($evenement);
            $this->em->flush();
            return $this->redirectToRoute('adminEventsHome');
        }

        return $this->render('adminPages/evenement_add.html.twig', [
            'Evenement' => $evenement,
            'form' => $form->createView()
        ]);    
    }

    public function edit(Evenement $evenement, Request $request)
    {        
        $form = $this->createForm(EvenementtType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form-> isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('adminEventsHome');
        }

        return $this->render('adminPages/evenement_update.html.twig', [
            'Evenement' => $evenement,
            'form' => $form->createView()
        ]);
    }

    public function delete(Evenement $evenement) {
        
        $this->em->remove($evenement);
        $this->em->flush();

        return $this->redirectToRoute('adminEventsHome');
    }*/

}