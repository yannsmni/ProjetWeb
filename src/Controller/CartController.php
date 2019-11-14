<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpClient\HttpClient;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{   
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

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
        
        return $this->render('publicPages/panier/panier.html.twig', [
            'items' => $panierWithData,
            'total' => $total
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session, ProduitRepository $produitRepository, ObjectManager $manager)
    {
        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];
        $produit = $produitRepository->find($id);
        $produitId = $produit->getId();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("INSERT INTO produit_utilisateur (produit_id, utilisateur_id) VALUES (:produit, :user)");
        $statement->bindValue('produit', $produitId);
        $statement->bindValue('user', $userId);
        $statement->execute();

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

        $session->set('panier', $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session, ProduitRepository $produitRepository, ObjectManager $manager){
        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];
        $produit = $produitRepository->find($id);
        $produitId = $produit->getId();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("DELETE FROM produit_utilisateur WHERE produit_id = :produit AND utilisateur_id = :user");
        $statement->bindValue('produit', $produitId);
        $statement->bindValue('user', $userId);
        $statement->execute();

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

        $session->set('panier', $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/commander", name="cart_command")
     */
    public function email(\Swift_Mailer $mailer, SessionInterface $session, ProduitRepository $produitRepository, ObjectManager $manager)
    {
        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];
        $userEmail = $rep[0]["email"];

        $panier = $session->get('panier', []); 

        $panierWithData = [];
        foreach($panier as $id => $quantity){
            $panierWithData[] = [
                'produit' => $produitRepository->find($id),
                'quantity' => $quantity
            ];
            $produit = $produitRepository->find($id);
            $quantite = $produit->getQuantiteVendu();
            $produit->setQuantiteVendu($quantite+$quantity);
            $manager->persist($produit);
            $manager->flush();
        }

        $total = 0;

        foreach($panierWithData as $item){
            // $totalItem = $item['produit']->getPrix() * $item['quantity'];
            // $total += $totalItem;
        }

        $produitNames = [];

        for ($i=0; $i<count($panierWithData); $i++) {
            $produitNames[$i]["produit"] = $panierWithData[$i]["produit"]->getNom();
            $produitNames[$i]["quantite"] = $panierWithData[$i]["quantity"];
        }

        $panierString =  json_encode($produitNames);

        $message = (new \Swift_Message('Commande de l\'utilisateur ' . $userEmail))
            ->setFrom('noreply@server.com')
            ->setTo('bde@cesi.fr')
            ->setBody($panierString);

        $mailer->send($message);

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("DELETE FROM produit_utilisateur WHERE utilisateur_id = :user");
        $statement->bindValue('user', $userId);
        $statement->execute();

        $session->set('panier', []);

        return $this->redirectToRoute("cart_index");
    }
}