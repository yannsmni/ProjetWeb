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

    public function index(): Response 
    {        
        $allImages = $this->repository->findAll();

        return $this->render('publicPages/photos.html.twig', [
            'allImages' => $allImages
        ]);
    }

    public function show(Image $image, Request $request, ObjectManager $manager): Response
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if (!empty($this->getUser())) {
            $user = $this->getUser();
            $userEmail = $user->getUsername();
            $req = 'http://127.0.0.1:9000/users/' . $userEmail;

            $api = HttpClient::create();
            $response = $api->request('GET', $req);
            $rep = $response->toArray();
            $userNom = $rep[0]["nom"];
            $userPrenom = $rep[0]["prenom"];
            $username = $userPrenom . " " . $userNom;
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $commentaire->setAuteur($username);
            $commentaire->setImage($image);
            $manager->persist($commentaire);
            $manager->flush();

            $connection = $manager->getConnection();
            $statement = $connection->prepare("UPDATE commentaire SET auteur = :user WHERE contenu = :contenu");
            $statement->bindValue('user', $username);
            $statement->bindValue('contenu', $commentaire->getContenu());
            $statement->execute();

            return $this->redirectToRoute('photosId', ['id' => $image->getId()]);
        }

        return $this->render('publicPages/photos_show.html.twig', [
            'image' => $image,
            'form' => $form->createView()
        ]);
    }

    public function report(Image $image, ObjectManager $manager): Response
    {
        $image->setVisible(false);

        $manager->persist($image);
        $manager->flush();

        return $this->redirectToRoute('photos');
    }

    /**
     * @Route("/images/{id}/like", name="image_like")
     */
    public function like(Request $request, Image $image, ObjectManager $manager){
        $user = $this->getUser();
        $userEmail = $user->getUsername();
        $req = 'http://127.0.0.1:9000/users/' . $userEmail;
        $imageId = $image->getId();

        $api = HttpClient::create();
        $response = $api->request('GET', $req);
        $rep = $response->toArray();
        $userId = $rep[0]["id"];

        $connection = $manager->getConnection();

        try{
            $query = $connection->prepare("INSERT INTO image_utilisateur (utilisateur_id, image_id) VALUES (:userId, :imageId)");
            $query->bindValue('userId', $userId);
            $query->bindValue('imageId', $imageId);
            $query->execute();
        } catch (\Exception $e){
            $queryMinus = $connection->prepare("DELETE FROM image_utilisateur WHERE utilisateur_id = :userId AND image_id = :imageId");
            $queryMinus->bindValue('userId', $userId);
            $queryMinus->bindValue('imageId', $imageId);
            $queryMinus->execute();
        };
        

        $referer = $request->headers->get('referer');
        return new RedirectResponse($referer);
    }
}