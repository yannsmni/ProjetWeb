<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminHomeController extends AbstractController {

    public function index(): Response 
    {        
        return $this->render('adminPages/dashboard.html.twig');
    }
}