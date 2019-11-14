<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Evenement;
use App\Repository\ProduitRepository;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {



    public function __construct(EvenementRepository $evenementsRepository, ProduitRepository $produitsRepository) {
        $this->evenementsRepository = $evenementsRepository;
        $this->produitsRepository = $produitsRepository;
    }

    public function index(Request $request): Response
    {        
        $date = new \DateTime();
        $upcommingEvents = $this->evenementsRepository->findLatestEvents($date);
        $bestProducts = $this->produitsRepository->findBestProducts();

        $responseNom = new Response();
        $responseEmail = new Response();
        $responseRole = new Response();
        $first_visit = $request->cookies->has("name");

        $this->render('base.html.twig', [
            'first_visit' => $first_visit
        ]);

        if(!empty($this->getUser())){
            $user = $this->getUser();
            $userEmail = $user->getUsername();
            $req = 'http://127.0.0.1:9000/users/' . $userEmail;
            $api = HttpClient::create();
            $response = $api->request('GET', $req);
            $rep = $response->toArray();
            $userName = $rep[0]["nom"];
            $userEmail = $rep[0]["email"];
            $userRole = $rep[0]["role"];

            $cookieNom = Cookie::create('name', $userName, time() + 365*24*3600);
            $cookieEmail = Cookie::create('e-mail', $userEmail, time() + 365*24*3600);
            $cookieRole = Cookie::create('role', $userRole, time() + 365*24*3600);   

            $responseNom->headers->setCookie($cookieNom);
            $responseEmail->headers->setCookie($cookieEmail);
            $responseRole->headers->setCookie($cookieRole);

            $responseNom->send();
            $responseEmail->send();
            $responseRole->send();
        }
        
        

        return $this->render('publicPages/accueil.html.twig', [
            'upcommingEvents' => $upcommingEvents,
            'bestProducts' => $bestProducts
        ]);
    }

    /*public function cookies(): Response
    {
        return $responseNom;
    }*/

    public function legislation(): Response
    {
        return $this->render('publicPages/legislation.home.html.twig', [

        ]);
    }
}