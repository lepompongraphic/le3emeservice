<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfessionnelRepository")
 */
class Professionnel implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idProfessionnel;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emailProfessionnel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mdpProfessionnel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $raisonSocialProfessionnel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $siretProfessionnel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresseProfessionnel;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cpProfessionnel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $villeProfessionnel;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telProfessionnel;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $statutProfessionnel;

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

    public function getIdProfessionnel()
    {
        return $this->idProfessionnel;
    }


    public function getEmailProfessionnel(): ?string
    {
        return $this->emailProfessionnel;
    }

    public function setEmailProfessionnel(string $emailProfessionnel): self
    {
        $this->emailProfessionnel = $emailProfessionnel;

        return $this;
    }

    //méthode imposée par l'interface
    public function getUsername(): ?string
    {
        return $this->emailProfessionnel;
    }
    // méthode imposée par l'interface
    public function setUsername(string $emailProfessionnel): self
    {
        $this->emailProfessionnel = $emailProfessionnel;
        return $this;
    }


    //méthode imposée par l'interface
    public function getPassword(): ?string
    {
        return $this->mdpProfessionnel;
    }
    public function getMdpProfessionnel(): ?string
    {
        return $this->mdpProfessionnel;
    }
    //méthode imposée par l'interface
    public function setPassword(string $mdpProfessionnel): self
    {
        $this->mdpProfessionnel = $mdpProfessionnel;
        return $this;
    }

    public function setMdpProfessionnel(string $mdpProfessionnel): self
    {
        $this->mdpProfessionnel = $mdpProfessionnel;

        return $this;
    }


    public function getRaisonSocialProfessionnel(): ?string
    {
        return $this->RaisonSocialProfessionnel;
    }

    public function setRaisonSocialProfessionnel(string $RaisonSocialProfessionnel): self
    {
        $this->RaisonSocialProfessionnel = $RaisonSocialProfessionnel;

        return $this;
    }


    public function getSiretProfessionnel(): ?string
    {
        return $this->SiretProfessionnel;
    }

    public function setSiretProfessionnel(string $SiretProfessionnel): self
    {
        $this->SiretProfessionnel = $SiretProfessionnel;

        return $this;
    }


    public function getAdresseProfessionnel(): ?string
    {
        return $this->adresseProfessionnel;
    }

    public function setAdresseProfessionnel(string $adresseProfessionnel): self
    {
        $this->adresseProfessionnel = $adresseProfessionnel;

        return $this;
    }


    public function getCpProfessionnel(): ?string
    {
        return $this->cpProfessionnel;
    }

    public function setCpProfessionnel(string $cpProfessionnel): self
    {
        $this->cpProfessionnel = $cpProfessionnel;

        return $this;
    }


    public function getVilleProfessionnel(): ?string
    {
        return $this->villeProfessionnel;
    }

    public function setVilleProfessionnel(string $villeProfessionnel): self
    {
        $this->villeProfessionnel = $villeProfessionnel;

        return $this;
    }


    public function getTelProfessionnel(): ?string
    {
        return $this->telProfessionnel;
    }

    public function setTelProfessionnel(string $telProfessionnel): self
    {
        $this->telProfessionnelt = $telProfessionnel;

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
            $this->emailProfessionnel,
            $this->mdpProfessionnel,
            $this->isActive
        ));
    }
    //dé-sérialisation de l'objet (session)
    public function unserialize($serialized)
    {
        list($this->id, 
                 $this->emailProfessionnel,
                 $this->mdpProfessionnel,
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
}

