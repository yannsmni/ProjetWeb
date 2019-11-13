<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;

/**
 * 
 *  @UniqueEntity(
 *  fields={"email"},
 *  message="L'email est déjà utilisé, veuillez saisir une autre adresse email."
 * )
 */
class UserSecurity //implements UserInterface
{


    private $id;


    private $nom;


    private $prenom;
    

    private $localisation;

    /**
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\Length(min="8", minMessage="Minimum 8 caractères")
     */
    private $motDePasse;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Ce n'est pas le même mot de passe")
     */
   /* public $confirm_password; */

    private $dateCreation;
    
    private $role;

    private $apiToken;
/*
    public function __construct(string $username, string $password, string $roles)
    {
        if (empty($username))
        {
            throw new \InvalidArgumentException('No username provided.');
        }
 
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }
*/
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getDateCreation()//: ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(/*\DateTimeInterface*/String $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function eraseCredentials() {}

    public function getSalt() {}

    public function getRoles(){
        return['ROLES_USER'];
    }

    public function getUsername(){

    }

    public function getPassword(){
        return getMotDePasse();
    }
}
