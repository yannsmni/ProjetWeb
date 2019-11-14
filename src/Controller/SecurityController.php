<?php

namespace App\Controller;

use App\Form\InscriptionType;
use App\Security\User\WebserviceUser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{

    public function login(){

        return $this->render('security/connexion.html.twig');
    }

    public function inscription(Request $request, UserPasswordEncoderInterface $encoder){
        
        $user = new WebserviceUser(null, null, null, []);

        $form = $this->createForm(InscriptionType::class, $user);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           $webserviceUser = new WebserviceUser($form['email']->getData(), $form['password']->getData(), null, ['USER_ROLES']);

           $hash = $encoder->encodePassword($webserviceUser, $webserviceUser->getPassword());

                $req = 'http://127.0.0.1:9000/users/' . $form['email']->getData() ;

                $api_email = HttpClient::create();
            
                $querry = $api_email->request('GET', $req);

                $rep = $querry->toArray();

                if (!isset($rep[0]['id'])){
                    $date = new \DateTime();
                    $date = $date->format('Y-m-d H:i:s');

                    $email = (string) $form['email']->getData();

                    $api = HttpClient::create();

                    
                    $response = $api->request('POST', 'http://127.0.0.1:9000/users', ['body' => [
                        'id' => null,
                        'nom' => $form['nom']->getData(),
                        'prenom' => $form['prenom']->getData(),
                        'localisation' => $form['localisation']->getData(),
                        'email' => $email,
                        'mot_de_passe' => $hash,
                        'date_creation' => $date,
                        'role' => "Eleve"
                    ]]);

            } else {
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'L\'adresse email que vous avez saisi est déjà existante' 
                );
                return $this->redirectToRoute('security_inscription');
            }

            return $this->redirectToRoute('security_connexion');
        }
            
        return $this->render('security/inscription.html.twig',[
            'form' => $form->createView()
        ]);
        
    }

    public function deconnexion(){}
}

