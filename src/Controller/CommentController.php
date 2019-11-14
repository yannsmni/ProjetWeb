<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Commentaire;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentController extends AbstractController { 

    public function report(Commentaire $commentaire, ObjectManager $manager): Response
    {
        $image = $commentaire->getImage();
        $commentaire->setVisible(false);

        $manager->persist($commentaire);
        $manager->flush();

        return $this->redirectToRoute('photosId', ['id' => $image->getId()]);
    }
}