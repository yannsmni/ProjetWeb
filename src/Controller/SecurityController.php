<?php

namespace App\Controller;

use DateTime;
use App\Entity\Utilisateur;
use App\Form\ConnexionType;
use App\Entity\UserSecurity;
use App\Form\InscriptionType;
use App\Security\User\WebserviceUser;
use App\Security\WebserviceUserProvider;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpClient\Exception\TransportException;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class SecurityController extends AbstractController
{

    // public function index()
    // {
    //     return $this->render('security/index.html.twig', [
    //         'controller_name' => 'La sécurité !'
    //     ]);
    // }

    public function login(Request $request){
       // $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

       $encoders = array(new JsonEncoder());
       $normalizers = array(new ObjectNormalizer());
 
       $serializer = new Serializer($normalizers, $encoders);

      // $user = new UserSecurity();
/*
       $date = new \DateTime();
       $user->setNom('Szymanski');
       $user->setPrenom('Yann');
       $user->setMotDePasse('lolilol');
       $user->setEmail('yann.szymanski@viacesi.fr');
       $user->setLocalisation('strass');
       $user->setRole('user');
       $user->setDateCreation('20/11/2019');

       $jsonContent = $serializer->serialize($user, 'json');

       

        
       $person = $serializer->deserialize($jsonContent, UserSecurity::class, 'json');
       var_dump($person);

*/



       
       
/*
        $form = $this->createForm(ConnexionType::class);
        
        $form->handleRequest($request);

        $api = HttpClient::create();

        $email = str_replace('"', "", $form['email']->getData());
        //var_dump($email);

        $response = $api->request('GET', "http://127.0.0.1:9000/users/$email");
        //echo gettype($response);
        //$content = $response->getContent();
         $content = $response->toArray();
        //var_dump($content);
       // var_dump($content[0]);
        //echo($content[0]['nom']);
        //var_dump($content[0]['nom']);
        //$nom = $content["nom"];
        
        //$content = $serializer->serialize($content, 'json');
        
        //$data_ar = explode(',', $data);
        // $person = $serializer->deserialize($response, UserSecurity::class, 'json');
        // var_dump($person);
         //var_dump($data['id']);

        // echo($data_ar[1]);

        //
         
       // echo gettype($content);

        if (1/*($content[0]['mot_de_passe']) == ($form['password']->getData())*///){
          /*  echo('oui');
            // $_username = "luc.antoni@viacesi.fr";
            // $_password = "ouiouioui";
            $user = new UserSecurity();
            $user = $user->setEmail("luc.antoni@viacesi.fr");
            $user = $user->setMotDePasse("ouiouioui");
            $user->setNom('Szymanski');
            $user->setPrenom('Yann');
            $user->setLocalisation('strass');
            $user->setRole('user');
            $user->setDateCreation('20/11/2019');

            
            $token = new UsernamePasswordToken($user, $user->getMotDePasse(), "main", $user->getRoles());
            var_dump($token);
            /*$this->get('security.token_storage')->setToken($token);

            // // // If the firewall name is not main, then the set value would be instead:
            // // // $this->get('session')->set('_security_XXXFIREWALLNAMEXXX', serialize($token));
            $this->get('session')->set('_security_main', serialize($token));
            
            // // Fire the login event manually
            $event = new InteractiveLoginEvent($request, $token);
            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
            
            // /*
            // * Now the user is authenticated !!!! 
            // * Do what you need to do now, like render a view, redirect to route etc.
            // */
        //}
        





/*

        // This data is most likely to be retrieven from the Request object (from Form)
        // But to make it easy to understand ...
        $_username = "yann.szymanski@viacesi.fr";
        $_password = "jerigolebeaucoup";

        // Retrieve the security encoder of symfony
        $factory = $this->get('security.encoder_factory');

        /// Start retrieve user
        // Let's retrieve the user by its username:
        // If you are using FOSUserBundle:
        $user_manager = $this->get('fos_user.user_manager');
        $user = $user_manager->findUserByUsername($_username);
        // Or by yourself
        $user = $this->getDoctrine()->getManager()->getRepository("userBundle:User")
                ->findOneBy(array('username' => $_username));
        /// End Retrieve user

        // Check if the user exists !
        if(!$user){
            return new Response(
                'Username doesnt exists',
                Response::HTTP_UNAUTHORIZED,
                array('Content-type' => 'application/json')
            );
        }

        /// Start verification
        $encoder = $factory->getEncoder($user);
        $salt = $user->getSalt();

        if(!$encoder->isPasswordValid($user->getPassword(), $_password, $salt)) {
            return new Response(
                'Username or Password not valid.',
                Response::HTTP_UNAUTHORIZED,
                array('Content-type' => 'application/json')
            );
        } 
        /// End Verification

        // The password matches ! then proceed to set the user in session
        
        //Handle getting or creating the user entity likely with a posted form
        // The third parameter "main" can change according to the name of your firewall in security.yml
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $this->get('security.token_storage')->setToken($token);

        // If the firewall name is not main, then the set value would be instead:
        // $this->get('session')->set('_security_XXXFIREWALLNAMEXXX', serialize($token));
        $this->get('session')->set('_security_main', serialize($token));
        
        // Fire the login event manually
        $event = new InteractiveLoginEvent($request, $token);
        $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
        */
        /*
         * Now the user is authenticated !!!! 
         * Do what you need to do now, like render a view, redirect to route etc.
         */
        // return new Response(
        //     'Welcome '. $user->getUsername(),
        //     Response::HTTP_OK,
        //     array('Content-type' => 'application/json')
        // );




















        // ,[
        //     'form' => $form->CreateView()
        // ]


/*
        $provider = new WebserviceUserProvider();
        $provider->loadUserByUsername("yann.szymanski@viacesi.fr");
        var_dump($provider);
        */
        //try{
        // $querry = 'http://127.0.0.1:9000/users/'. $userMail;
        // var_dump($userMail);
        
        // $api_email = HttpClient::create();

        // $getid = $api_email->request('GET', $querry );
        // //var_dump($getid);

        // $reponse = $getid->toArray();
        // var_dump($reponse);
        // $em = $this->getDoctrine()->getManager();
        // $connection = $em->getConnection();

        // $query = $connection->prepare("INSERT INTO utilisateur (id) VALUES (:userId)");
        // $query->bindValue('userId', $reponse[0]['id']);
        // $query->execute();

        //} catch(\Exception $e){
           // echo "utilisateur déjà existant";
        //}

        return $this->render('security/connexion.html.twig');
    }

    public function inscription(Request $request, UserPasswordEncoderInterface $encoder){
        
        
        
        
        // $encoders = [new XmlEncoder(), new JsonEncoder()];
        // $normalizers = [new ObjectNormalizer()];

        // $serializer = new Serializer($normalizers, $encoders);

        $user = new WebserviceUser(null, null, null, []);

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

        $form = $this->createForm(InscriptionType::class, $user);

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

           $webserviceUser = new WebserviceUser($form['email']->getData(), $form['password']->getData(), null, ['USER_ROLES']);


           $hash = $encoder->encodePassword($webserviceUser, $webserviceUser->getPassword());
           //var_dump($hash);
           //echo($hash);
           //$user = $webserviceUser->setPassword($hash);

            // $data = [
            //     'id' => null,
            //     'nom' => $form['nom']->getData(),
            //     'prenom' => $form['prenom']->getData(),
            //     'localisation' => $form['localisation']->getData(),
            //     'email' => $form['email']->getData(),
            //     'mot_de_passe' => $hash,
            //     'date_creation' => "2019-11-05",
            //     'role' => "eleve"
            // ];

            // $test = $form->getData()->getPrenom();
            //var_dump($data);
            // var_dump($test);
            //remove($data["confirm_password"]);
           // var_dump($data);
           // $formserialize = $serializer->serialize($data, 'json');
            //echo $formserialize;

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

                // var_dump($api);

                // $querry = 'http://127.0.0.1:9000/users/' . $webserviceUser->getUsername();
                // //var_dump($email);
                
                // $api_email = HttpClient::create();
        
                // $getid = $api_email->request('GET', $querry );
                // //var_dump($getid);
        
                // $reponse = $getid->toArray();
                // var_dump($reponse);
                // // echo($reponse[0]['id']);
        
                // if(isset($rep[0]['id'])){
                //     echo("oui mamen");

        
                // }
                // echo ("nonono");

                // $apidatabaselinker = new ApiDatabaseController($webserviceUser);
                // $apidatabaselinker->linkApiToLocalDatabase();
            

            } else {
                return $this->redirectToRoute('security_inscription');
            }
            //$this->addIdApi($email);
            return $this->redirectToRoute('security_connexion');
        }
            
        return $this->render('security/inscription.html.twig',[
            'form' => $form->createView()
        ]);
        
    }

    // public function addIdApi(string $userMail){
        
        
    //     $querry = 'http://127.0.0.1:9000/users/'. $userMail;
    //     var_dump($userMail);
        
    //     $api_email = HttpClient::create();

    //     $getid = $api_email->request('GET', $querry );
    //     //var_dump($getid);

    //     $reponse = $getid->toArray();
    //     var_dump($reponse);
    //     // echo($reponse[0]['id']);

    //     if(isset($reponse[0]['id'])){
    //         echo("oui mamen");

    //         // $manager = new ObjectManager();
    //         // $setUserId = new Utilisateur();
    //         // $setUserId->setId((int) $resp[0]['id']);

    //         // var_dump($setUserId);
    //         // $manager->persist($setUserId);
    //         // $manager->flush();

    //     }
    //     echo ("nonono");

    // }

    public function deconnexion(){}


}

