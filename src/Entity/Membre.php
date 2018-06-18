<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity(repositoryClass="App\Repository\MembreRepository")
 */
class Membre implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idMembre;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $statut;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
    * @ORM\Column(type="array")
    */
    private $roles;


    // constructeur. Définit le statut actif et ajoute le role ADMIN automatiquement
    public function __construct()
    {
        $this->isActive = true;
        $this->roles[] = 'ROLE_USER';
    }

    public function getIMembre()
    {
        return $this->idMembre;
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

    //méthode imposée par l'interface
    public function getUsername(): ?string
    {
        return $this->email;
    }
    // méthode imposée par l'interface
    public function setUsername(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    //méthode imposée par l'interface
    public function getPassword(): ?string
    {
        return $this->mdp;
    }
    public function getMdp(): ?string
    {
        return $this->mdp;
    }
    //méthode imposée par l'interface
    public function setPassword(string $mdp): self
    {
        $this->mdp = $mdp;
        return $this;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }


    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }


    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }


    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }


    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }


    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }


    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }


    //récupération des rôles
    public function getRoles()
    {
        return $this->roles; //return ['ROLE_USER'];
    }
    //récupération du "salt" (null car bcript le fait automatiquement)
    public function getSalt()
    {
        return null;
    }
    //fonction imposée par l'interface user
    public function eraseCredentials()
    {
    }
    //sérialisation de l'utilisateur (pour stocker en session)
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->mdp,
            $this->isActive
        ));
    }
    //dé-sérialisation de l'objet (session)
    public function unserialize($serialized)
    {
        list($this->id, 
                 $this->email,
                 $this->mdp,
                 $this->isActive)
        = unserialize($serialized);
    }
    //ajout d'un role
    public function setRoles($val)
    {
        return $this->roles[] = $val;
    }
    //compte non expiré?
    public function isAccountNonExpired()
    {
        return true;
    }
    //Compte non vérouillé
    public function isAccountNonLocked()
    {
        return true;
    }
    //  identifiants non expirés
    public function isCredentialsNonExpired()
    {
        return true;
    }
    // est activé
    public function isEnabled()
    {
        return $this->isActive;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;


        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;

    }

    public function getIdMembre(): ?int
    {
        return $this->idMembre;
    }
}





