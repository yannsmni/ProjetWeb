<?php

namespace App\Controller;

use App\Entity\Image;
use Twig\Environment;
use App\Entity\Evenement;
use App\Entity\Commentaire;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReportController extends AbstractController {  

    public function __construct(ObjectManager $manager) {
        $this->manager = $manager;
    }

    public function reportEvent(Evenement $evenement, ObjectManager $manager, \Swift_Mailer $mailer, Environment $renderer): Response
    {
        $eventNom = $evenement->getNom();
        $message = (new \Swift_Message('Signalement de l\'évènement' . $eventNom))
            ->setFrom('noreply@server.com')
            ->setTo('bde@cesi.fr')
            ->setBody($renderer->render('emails/email.html.twig', [
                'variable' => $eventNom,
            ]), 'text/html');
            
        $mailer->send($message);
        $evenement->setVisible(false);

        $manager->persist($evenement);
        $manager->flush();

        return $this->redirectToRoute('evenementsAll');
    }

    public function reportImage(Image $image, ObjectManager $manager, \Swift_Mailer $mailer, Environment $renderer): Response
    {
        $imageNom = $image->getFilename();
        $message = (new \Swift_Message('Signalement de l\'image' . $imageNom))
            ->setFrom('noreply@server.com')
            ->setTo('bde@cesi.fr')
            ->setBody($renderer->render('emails/email.html.twig', [
                'variable' => $imageNom,
            ]), 'text/html');
            
        $mailer->send($message);

        $image->setVisible(false);

        $manager->persist($image);
        $manager->flush();

        return $this->redirectToRoute('photos');
    }

    public function reportComment(Commentaire $commentaire, ObjectManager $manager, \Swift_Mailer $mailer, Environment $renderer): Response
    {
        $commentaireNom = $commentaire->getContenu();
        $message = (new \Swift_Message('Signalement du commentaire' . $commentaireNom))
            ->setFrom('noreply@server.com')
            ->setTo('bde@cesi.fr')
            ->setBody($renderer->render('emails/email.html.twig', [
                'variable' => $commentaireNom,
            ]), 'text/html');
            
        $mailer->send($message);

        $image = $commentaire->getImage();
        $commentaire->setVisible(false);

        $manager->persist($commentaire);
        $manager->flush();

        return $this->redirectToRoute('photosId', ['id' => $image->getId()]);
    }
}

