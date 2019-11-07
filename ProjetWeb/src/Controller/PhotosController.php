<?php

namespace App\Controller;

use App\Entity\Image;
use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PhotosController extends AbstractController {

    public function __construct(ImageRepository $repository) {
        $this->repository = $repository;
    }

    public function index(): Response 
    {        
        $allImages = $this->repository->findAll();

        return $this->render('publicPages/photos.html.twig', [
            'allImages' => $allImages
        ]);
    }
}