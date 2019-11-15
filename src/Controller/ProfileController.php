<?php

namespace App\Controller;

use Twig\Environment;
use App\Repository\ProduitRepository;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpClient\HttpClient;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{   
    public function index(SessionInterface $session, ProduitRepository $produitRepository, EvenementRepository $evenementRepository, ObjectManager $manager)
    {
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

            $allEvents = $evenementRepository->findAll();
            $date = new \DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $index = 0;
            $connection = $manager->getConnection();

            foreach ($allEvents as $evenement) {
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

            $query = $connection->prepare("SELECT * FROM produit_utilisateur WHERE utilisateur_id = :userId");
            $query->bindValue('userId', $userId);
            $query->execute();
            $panierCourant = $query->fetchAll();

            $panier = [];

            for ($i=0; $i<count($panierCourant); $i++){
                if (!isset($panier[$panierCourant[$i]["produit_id"]])) {
                    $panier[$panierCourant[$i]["produit_id"]] = 1;
                } else{
                    $panier[$panierCourant[$i]["produit_id"]] += 1;
                }
            };

            $panierWithData = [];
            foreach($panier as $id => $quantity){
                $panierWithData[] = [
                    'produit' => $produitRepository->find($id),
                    'quantity' => $quantity
                ];
            }

            $total = 0;

            foreach($panierWithData as $item){
                $totalItem = $item['produit']->getPrix() * $item['quantity'];
                $total += $totalItem;
            }
        }
        
        return $this->render('publicPages/profil.html.twig', [
            'id' => $userId,
            'mail' => $userEmail,
            'nom' => $userNom,
            'prenom' => $userPrenom,
            'username' => $username,
            'items' => $panierWithData,
            'total' => $total,
            'myNextEvents' => $myNextEvents,
            'myPreviousEvents' => $myPreviousEvents,
            'nombreParticipants' => $nombreParticipants,
            'allEvents' => $allEvents
        ]);
    }
}