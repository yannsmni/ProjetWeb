<?php
// src/Security/User/WebserviceUser.php
namespace App\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Validator\Constraints as Assert;

class WebserviceUser implements UserInterface, EquatableInterface
{
    private $username;

    /**
     * @Assert\Length(min="8", minMessage="Minimum 8 caractères")
     * @Assert\NotBlank(message="Ce champ ne peut être vide !")
     * @Assert\Regex("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", message="Votre mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et doit avoir une longueur de huit caratères.")
     */
    public $password;
    private $salt;
    private $roles;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les mots de passes doivent être identique !")
     * @Assert\NotBlank(message="Ce champ ne peut être vide !")
     */
    public $confirm_password;
    
    /**
     * @Assert\Email(message="Veuillez fournir une adresse email valide, sous la forme xx@viacesi.fr ou xx@cesi.fr")
     * @Assert\NotBlank(message="Ce champ ne peut être vide !")
     * @Assert\Regex("/([^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@viacesi\.fr$)|([^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@cesi\.fr$)/", message="Veuillez fournir une adresse email valide, sous la forme xx@viacesi.fr ou xx@cesi.fr")
     */
    public $email;
    
    /**
     * @Assert\NotBlank(message="Ce champ ne peut être vide !")
     */
    public $prenom;
    
    /**
     * @Assert\NotBlank(message="Ce champ ne peut être vide !")
     */
    public $nom;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut être vide !")
     * @Assert\Regex("/(^Strasbourg$)|(^Arras$)|(^Caen$)|(^Lille$)|(^Rouen$)|(^Angoulême$)|(^Brest$)|(^La Rochelle$)|(^Le Mains$)|(^Nantes$)|(^Saint-Nazaire$)|(^Paris$)|(^Orléans$)|(^Dijon$)|(^Nancy$)|(^Reims$)|(^Bordeaux$)|(^Montpellier$)|(^Pau$)|(^Toulouse$)|(^Aix-En-Provence$)|(^Grenoble$)|(^Lyon$)|(^Nice$)/", message="Veuillez choisir parmis l'un des centres suivants : Strasbourg, Arras, Caen, Lille, Rouen, Angoulême, Brest, La Rochelle, Le Mains, Nantes, Saint-Nazaire, Paris, Orléans, Dijon, Nancy, Reims, Bordeaux, Montpellier, Pau, Toulouse, Aix-En-Provence, Grenoble, Lyon, Nice.")
     */
    public $localisation;

    public function __construct($username, $password, $salt, array $roles)
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPrenom(){}

    public function getNom(){}

    public function getEmail(){
        return $this->getUsername();
    }

    public function getConfirmPassword(){}

    public function getLocalisation(){}

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}