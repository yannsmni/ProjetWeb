<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use App\Entity\Evenement;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Entity\EvenementFiltre;
use App\Form\EvenementFiltreType;
use App\Repository\EvenementRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
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

    public function show(Evenement $evenement, Request $request, ObjectManager $manager): Response
    {
        $image = new Image();
        $imageForm = $this->createForm(ImageType::class, $image);
        $imageForm->handleRequest($request);

        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];

        if($imageForm->isSubmitted() && $imageForm->isValid()){
            $image->setEvenement($evenement);
            $manager->persist($image);
            $manager->flush();

            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("UPDATE image SET utilisateur_id = :user WHERE filename = :fichier");
            $statement->bindValue('user', $userId);
            $statement->bindValue('fichier', $image->getFilename());
            $statement->execute();

            return $this->redirectToRoute('evenementId', ['id' => $evenement->getId()]);
        }

        return $this->render('publicPages/evenements/evenements_show.html.twig', [
            'evenement' => $evenement,
            'imageForm' => $imageForm->createView()
        ]);
    }

    public function all(PaginatorInterface $paginator, Request $request): Response 
    {        
        $search = new EvenementFiltre();
        $form = $this->createForm(EvenementFiltreType::class, $search);
        $form->handleRequest($request);

        $allEvents = $paginator->paginate(
            $this->repository->findAllBySearch($search),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('publicPages/evenements/evenements_tous.html.twig', [
            'allEvents' => $allEvents,
            'form' => $form->createView()
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

    public function register(Evenement $evenement, ObjectManager $manager): Response
    {
        $user = $this->getUser();

        $evenement->addParticipant($user);
        $manager->persist($evenement);
        $manager->flush();

        return $this->redirectToRoute('evenementId', ['id' => $evenement->getId()]);
    }

    public function report(Evenement $evenement, ObjectManager $manager): Response
    {
        $evenement->setVisible(false);

        $manager->persist($evenement);
        $manager->flush();

        return $this->redirectToRoute('evenementsAll');
    }
}