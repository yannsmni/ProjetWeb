<?php

namespace App\Controller;

use App\Entity\UserSecurity;
use App\Form\InscriptionType;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SecurityController extends AbstractController
{

    // public function index()
    // {
    //     return $this->render('security/index.html.twig', [
    //         'controller_name' => 'La sécurité !'
    //     ]);
    // }

    public function login(){
        return $this->render('security/connexion.html.twig');
    }

    public function inscription(Request $request){

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

       // $user = new UserSecurity();

        // $defaultData = ['message' => 'Type your message here'];
        // $form = $this->createFormBuilder($defaultData)
        //     ->add('prenom', TextType::class)
        //     ->add('nom', TextType::class)
        //     ->add('localisation', TextType::class)
        //     ->add('email', EmailType::class)
        //     ->add('password', TextType::class)
        //     ->add('confirm_password', TextType::class)
        //     ->add('send', SubmitType::class)
        //     ->getForm();

        $form = $this->createForm(InscriptionType::class);

       // $request = Request::createFromGlobals();
        
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            //$form->remove("confirm_password");
            //$data = $form->getData();
           // $username = $form['prenom']->getData() . $form['nom']->getData();
          // $date = new DateTime();
           //var_dump($date);
            $data = [
                'id' => null,
                'nom' => $form['nom']->getData(),
                'prenom' => $form['prenom']->getData(),
                'localisation' => $form['localisation']->getData(),
                'email' => $form['email']->getData(),
                'mot_de_passe' => $form['password']->getData(),
                'date_creation' => "2019-11-05",
                'role' => "eleve"
            ];

            // $test = $form->getData()->getPrenom();
            //var_dump($data);
            // var_dump($test);
            //remove($data["confirm_password"]);
           // var_dump($data);
           // $formserialize = $serializer->serialize($data, 'json');
            //echo $formserialize;

           $api = HttpClient::create();
            
            $response = $api->request('POST', 'http://127.0.0.1:9000/users', ['body' => [
                'id' => null,
                'nom' => $form['nom']->getData(),
                'prenom' => $form['prenom']->getData(),
                'localisation' => $form['localisation']->getData(),
                'email' => $form['email']->getData(),
                'mot_de_passe' => $form['password']->getData(),
                'date_creation' => "2019-11-05",
                'role' => "eleve"
            ]]);
            //var_dump($api);

            return $this->redirectToRoute('security_connexion');
        }

        return $this->render('security/inscription.html.twig',[
            'form' => $form->createView()
        ]);
    }
}