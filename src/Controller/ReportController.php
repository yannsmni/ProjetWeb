<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Evenement;
use App\Entity\Commentaire;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReportController extends AbstractController {  

    public function __construct(ObjectManager $manager) {
        $this->manager = $manager;
    }

    public function reportEvent(Evenement $evenement, $manager): Response
    {
        $evenement->setVisible(false);

        $manager->persist($evenement);
        $manager->flush();

        return $this->redirectToRoute('evenementsAll');
    }

    public function reportImage(Image $image, $manager): Response
    {
        $image->setVisible(false);

        $manager->persist($image);
        $manager->flush();

        return $this->redirectToRoute('photos');
    }

    public function reportComment(Commentaire $commentaire, $manager): Response
    {
        $image = $commentaire->getImage();
        $commentaire->setVisible(false);

        $manager->persist($commentaire);
        $manager->flush();

        return $this->redirectToRoute('photosId', ['id' => $image->getId()]);
    }
}

