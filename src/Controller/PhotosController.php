<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\ImageRepository;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PhotosController extends AbstractController {

    public function __construct(ImageRepository $repository) {
        $this->repository = $repository;
    }

    public function index(Image $image, Request $request, ObjectManager $manager): Response 
    {        
        $allImages = $this->repository->findAll();
        $commentaire = new Commentaire();

        $commentaireForm = $this->createForm(CommentaireType::class, $commentaire);
        $commentaireForm->handleRequest($request);

        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];

        if($commentaireForm->isSubmitted() && $commentaireForm->isValid())
        {
            $commentaire->setImage($image);
            $manager->persist($commentaire);
            $manager->flush();

            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("UPDATE commentaire SET auteur_id = :user WHERE contenu = :contenu");
            $statement->bindValue('user', $userId);
            $statement->bindValue('commentaire', $commentaire->getContenu());
            $statement->execute();

            return $this->redirectToRoute('photos');
        }

        return $this->render('publicPages/photos.html.twig', [
            'allImages' => $allImages,
            'commentaireForm' => $commentaireForm->createView()
        ]);
    }

    /**
     * @Route("/images/{id}/like", name="image_like")
     */
    public function like(Request $request, Image $image){
        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;
        $imageId = $image->getId();

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        try{
            $query = $connection->prepare("INSERT INTO image_utilisateur (utilisateur_id, image_id) VALUES (:userId, :imageId)");
            $query->bindValue('userId', $userId);
            $query->bindValue('imageId', $imageId);
            $query->execute();
        } catch (\Exception $e){
            echo "Vous ne pouvez pas liker plusieurs fois la même photo";
        };
        

        $referer = $request->headers->get('referer');
        return new RedirectResponse($referer);
    }
}