<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
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

        //dd($panierWithData);
        return $this->render('publicPages/panier/panier.html.twig', [
            'items' => $panierWithData,
            'total' => $total
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session)
    {
        //$session->set('panier', []);
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);
        //echo $session->get('panier');
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session){
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
}