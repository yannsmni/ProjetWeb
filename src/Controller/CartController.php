<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\ProduitRepository;
use App\Repository\UtilisateurRepository;
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
        $panier = $session->get('panier', []); 
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
        // $user = $this->getUser();
        // $userId = $user->getId();
        // $produit = $produitRepository->find($id);
        // $produitId = $produit->getId();
        // $produit->setAcheteur($user);
        // $manager->persist($produit);
        // $manager->flush();

        // $entityManager = $this->getEntityManager();

        // $query = $entityManager->createQuery(
        //     'SELECT *
        //     FROM produit_utilisateur
        //     WHERE utilisateur_id = :userId'
        // )->setParameter('id', $id, 'userId', $userId);

        // $panierCourant = $query->getResult();
        
        //$panier = $session->get('panier', $panierCourant);


        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session, ProduitRepository $produitRepository, ObjectManager $manager){
        // $user = $this->getUser();
        // $userId = $user->getId();
        // $produit = $produitRepository->find($id);
        // $produit->removeAcheteur($userId); 
        // $manager->persist($produit);
        // $manager->flush();

        // $entityManager = $this->getEntityManager();

        // $query = $entityManager->createQuery(
        //     'SELECT *
        //     FROM produit_utilisateur
        //     WHERE utilisateur_id = :userId'
        // )->setParameter('id', $id, 'userId', $userId);

        // $panierCourant = $query->getResult();
        
        //$panier = $session->get('panier', $panierCourant);

        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            if($panier[$id] = 0 || $panier[$id] = -1){
                unset($panier[$id]);
            } else{
                $panier[$id]--;
            }
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/commander", name="cart_command")
     */
    public function email(\Swift_Mailer $mailer, SessionInterface $session, ProduitRepository $produitRepository, ObjectManager $manager)
    {
        // $user = $this->getUser();
        // $userId = $user->getId();
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

        $message = (new \Swift_Message('Commande de l\'utilisateur ' . 'oui'/*$userId*/))
            ->setFrom('noreply@server.com')
            ->setTo('bde@cesi.fr')
            ->setBody($panierString);

        $mailer->send($message);

        $session->set('panier', []);

        return $this->redirectToRoute("cart_index");
    }
}