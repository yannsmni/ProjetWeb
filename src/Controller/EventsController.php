<?php

namespace App\Controller;

require_once '../vendor/autoload.php';

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
use Spipu\Html2Pdf\Html2Pdf;

class EventsController extends AbstractController {  

    public function __construct(EvenementRepository $repository) {
        $this->repository = $repository;
    }

    public function index(ObjectManager $manager): Response 
    {        
        $date = new \DateTime();
        $allEvents = $this->repository->findAll();
        $latestEvents = $this->repository->findLatestEvents($date);
        $upcommingEvents = $this->repository->findUpcommingEvents($date);
        $bestEvents = $this->repository->findBestEvents();
        $index = 0;

        foreach ($allEvents as $evenement) {
            $connection = $manager->getConnection();
            $statement = $connection->prepare("SELECT COUNT(participant) FROM evenement_utilisateur WHERE evenement_id = :evenement");
            $statement->bindValue('evenement', $evenement->getId());
            $statement->execute();            
            $nombreParticipants[$index] = $statement->fetchAll();
            $index += 1;
        }

        return $this->render('publicPages/evenements/evenements_home.html.twig', [
            'allEvents' => $allEvents,
            'latestEvents' => $latestEvents,
            'upcommingEvents' => $upcommingEvents,
            'bestEvents' => $bestEvents,
            'nombreParticipants' => $nombreParticipants,
        ]);
    }

    public function show(Evenement $evenement, Request $request, ObjectManager $manager): Response
    {
        $date = new \DateTime();
        $image = new Image();
        $imageForm = $this->createForm(ImageType::class, $image);
        $imageForm->handleRequest($request);

        if (!empty($this->getUser())) {
            $user = $this->getUser();
            $userEmail = $user->getUsername();
            $req = 'http://127.0.0.1:9000/users/' . $userEmail;

            $api = HttpClient::create();
            $response = $api->request('GET', $req);
            $rep = $response->toArray();
            $userId = $rep[0]["id"];
            $userNom = $rep[0]["nom"];
            $userPrenom = $rep[0]["prenom"];
            $username = $userPrenom . " " . $userNom;
        }

        $connection = $manager->getConnection();
        $statement2 = $connection->prepare("SELECT * FROM evenement_utilisateur WHERE evenement_id = :evenement");
        $statement3 = $connection->prepare("SELECT COUNT(participant) FROM evenement_utilisateur WHERE evenement_id = :evenement");
        $statement2->bindValue('evenement', $evenement->getId());
        $statement3->bindValue('evenement', $evenement->getId());
        $statement2->execute();
        $statement3->execute();
            
        $participants = $statement2->fetchAll();
        $nombreParticipants = $statement3->fetchAll();

        if($imageForm->isSubmitted() && $imageForm->isValid()){
            $image->setEvenement($evenement);
            $manager->persist($image);
            $manager->flush();

            $connection = $manager->getConnection();
            $statement = $connection->prepare("UPDATE image SET utilisateur_id = :user WHERE filename = :fichier");
            $statement->bindValue('user', $userId);
            $statement->bindValue('fichier', $image->getFilename());
            $statement->execute();

            return $this->redirectToRoute('evenementId', ['id' => $evenement->getId()]);
        }

        return $this->render('publicPages/evenements/evenements_show.html.twig', [
            'evenement' => $evenement,
            'participants' => $participants,
            'nombreParticipants' => $nombreParticipants,
            'imageForm' => $imageForm->createView(),
            'now' => $date,
            'utilisateurParticipant' => $username
        ]);
    }

    public function all(PaginatorInterface $paginator, Request $request, ObjectManager $manager): Response 
    {        
        $search = new EvenementFiltre();
        $form = $this->createForm(EvenementFiltreType::class, $search);
        $form->handleRequest($request);

        $allEvents = $paginator->paginate(
            $this->repository->findAllBySearch($search),
            $request->query->getInt('page', 1),
            10
        );

        $index = 0;

        foreach ($allEvents as $evenement) {
            $connection = $manager->getConnection();
            $statement = $connection->prepare("SELECT COUNT(participant) FROM evenement_utilisateur WHERE evenement_id = :evenement");
            $statement->bindValue('evenement', $evenement->getId());
            $statement->execute();            
            $nombreParticipants[$index] = $statement->fetchAll();
            $index += 1;
        }

        return $this->render('publicPages/evenements/evenements_tous.html.twig', [
            'allEvents' => $allEvents,
            'nombreParticipants' => $nombreParticipants,
            'form' => $form->createView()
        ]);
    }

    public function month(ObjectManager $manager): Response 
    {       
        $date = new \DateTime();
        $formattedDate = $date->format('Y-m');
        $monthlyEvents = $this->repository->findMonthlyEvents($formattedDate);
        $index = 0;

        foreach ($monthlyEvents as $evenement) {
            $connection = $manager->getConnection();
            $statement = $connection->prepare("SELECT COUNT(participant) FROM evenement_utilisateur WHERE evenement_id = :evenement");
            $statement->bindValue('evenement', $evenement->getId());
            $statement->execute();            
            $nombreParticipants[$index] = $statement->fetchAll();
            $index += 1;
        }

        return $this->render('publicPages/evenements/evenements_mois.html.twig', [
            'nombreParticipants' => $nombreParticipants,
            'monthlyEvents' => $monthlyEvents
        ]);
    }

    public function my(ObjectManager $manager): Response 
    {        
        if (!empty($this->getUser())) {
            $user = $this->getUser();
            $userEmail = $user->getUsername();
            $req = 'http://127.0.0.1:9000/users/' . $userEmail;

            $api = HttpClient::create();
            $response = $api->request('GET', $req);
            $rep = $response->toArray();
            $userNom = $rep[0]["nom"];
            $userPrenom = $rep[0]["prenom"];
            $username = $userPrenom . " " . $userNom;

            $allEvents = $this->repository->findAll();
            $date = new \DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $index = 0;

            foreach ($allEvents as $evenement) {
                $connection = $manager->getConnection();
                $statement = $connection->prepare("SELECT COUNT(participant) FROM evenement_utilisateur WHERE evenement_id = :evenement");
                $statement2 = $connection->prepare("SELECT * FROM evenement, evenement_utilisateur WHERE evenement_utilisateur.participant = :user AND evenement.date >= :dateNow AND evenement.id = evenement_utilisateur.evenement_id ORDER BY evenement.date DESC");
                $statement3 = $connection->prepare("SELECT * FROM evenement, evenement_utilisateur WHERE evenement_utilisateur.participant = :user AND evenement.date <= :dateNow AND evenement.id = evenement_utilisateur.evenement_id ORDER BY evenement.date DESC");
                $statement->bindValue('evenement', $evenement->getId());
                $statement2->bindValue('user', $username);
                $statement2->bindValue('dateNow', $date);
                $statement3->bindValue('user', $username);
                $statement3->bindValue('dateNow', $date);
                $statement->execute();  
                $statement2->execute();    
                $statement3->execute();      
                $nombreParticipants[$index] = $statement->fetchAll();
                $myNextEvents = $statement2->fetchAll();
                $myPreviousEvents = $statement3->fetchAll();
                $index += 1;
            }
        }

        return $this->render('publicPages/evenements/evenements_perso.html.twig', [
            'myNextEvents' => $myNextEvents,
            'myPreviousEvents' => $myPreviousEvents,
            'nombreParticipants' => $nombreParticipants,
            'allEvents' => $allEvents
        ]);
    }

    public function register(Evenement $evenement, ObjectManager $manager): Response
    {
        if (!empty($this->getUser())) {
            $user = $this->getUser();
            $userEmail = $user->getUsername();
            $req = 'http://127.0.0.1:9000/users/' . $userEmail;

            $api = HttpClient::create();
            $response = $api->request('GET', $req);
            $rep = $response->toArray();
            $userNom = $rep[0]["nom"];
            $userPrenom = $rep[0]["prenom"];
            $username = $userPrenom . " " . $userNom;

            $connection = $manager->getConnection();
            
            try{
                $statement = $connection->prepare("INSERT INTO evenement_utilisateur (evenement_id, participant) VALUES (:evenement, :user)");
                $statement->bindValue('evenement', $evenement->getId());
                $statement->bindValue('user', $username);
                $statement->execute();

            } catch (\Exception $e){
                $statementMinus = $connection->prepare("DELETE FROM evenement_utilisateur WHERE evenement_id = :evenement AND participant = :user");
                $statementMinus->bindValue('evenement', $evenement->getId());
                $statementMinus->bindValue('user', $username);
                $statementMinus->execute();
            };

            return $this->redirectToRoute('evenementId', ['id' => $evenement->getId()]);
        }
    }

    public function report(Evenement $evenement, ObjectManager $manager): Response
    {
        $evenement->setVisible(false);

        $manager->persist($evenement);
        $manager->flush();

        return $this->redirectToRoute('evenementsAll');
    }

    public function downloadCSV(Evenement $evenement, ObjectManager $manager): Response 
    {
        $connection = $manager->getConnection();
        $statement = $connection->prepare("SELECT participant FROM evenement_utilisateur WHERE evenement_id = :evenement");
        $statement->bindValue('evenement', $evenement->getId());
        $statement->execute();
        $participants = $statement->fetchAll();

        $fp = fopen('Liste-Inscrits-Evenement-'.$evenement->getId().".csv", 'w');
        foreach ($participants as $participants) {
            fputcsv($fp, $participants, ';');
        }
        fclose($fp);
        
        return $this->redirectToRoute('evenementId', ['id' => $evenement->getId()]);
    }

    public function downloadPDF(Evenement $evenement, ObjectManager $manager): Response 
    {
        $connection = $manager->getConnection();
        $statement = $connection->prepare("SELECT participant FROM evenement_utilisateur WHERE evenement_id = :evenement");
        $statement->bindValue('evenement', $evenement->getId());
        $statement->execute();
        $participants = $statement->fetchAll();

        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $html2pdf->pdf->SetTitle('Liste-Inscrits-Evenement-'.$evenement->getId().'.pdf');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML("<h1>Participants à l'événement: </h1>");
        foreach ($participants as $participants) {
            $html2pdf->writeHTML('<p>Nom du participant :</p>'.implode($participants));
        }
        $html2pdf->output("listeInscrits".$evenement->getId().".pdf", 'D');

        return $this->redirectToRoute('evenementId', ['id' => $evenement->getId()]);    
    }
}