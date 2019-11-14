<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Cookie;
use App\Entity\Evenement;
use App\Entity\Produit;
use App\Repository\EvenementRepository;
use App\Repository\ProduitRepository;
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

        if(!$first_visit)
        {
            $cookieNom = new Cookie('name', 'test nom', time() + 365*24*3600, '/', true, true);
            $cookieEmail = new Cookie('e-mail', 'test email', time() + 365*24*3600, '/', true, true);
            $cookieRole = new Cookie('role', 'test role', time() + 365*24*3600, '/', true, true);
        }

        $responseNom->headers->setCookie($cookieNom);
        $responseEmail->headers->setCookie($cookieEmail);
        $responseRole->headers->setCookie($cookieRole);

        $responseNom->send();
        $responseEmail->send();
        $responseRole->send();

        return $this->render('publicPages/accueil.html.twig', [
            'upcommingEvents' => $upcommingEvents,
            'bestProducts' => $bestProducts,
            'cookieNom' => $cookieNom,
            'cookieEmail' => $cookieEmail,
            'cookieRole' => $cookieRole
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