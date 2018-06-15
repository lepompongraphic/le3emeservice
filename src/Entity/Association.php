<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssociationRepository")
 */
class Association
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idAssociation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emailAssociation;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $mdpAssociation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $raisonSocialAssociation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $siretAssociation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresseAssociation;

    /**
     * @ORM\Column(type="integer")
     */
    private $cpAssociation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $villeAssociation;

    /**
     * @ORM\Column(type="integer")
     */
    private $telAssociation;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $statutAssociation;

    public function getIdAssociation()
    {
        return $this->IdAssociation;
    }

    public function getEmailAssociation(): ?string
    {
        return $this->emailAssociation;
    }

    public function setEmailAssociation(string $emailAssociation): self
    {
        $this->emailAssociation = $emailAssociation;

        return $this;
    }

    public function getMdpAssociation(): ?string
    {
        return $this->mdpAssociation;
    }

    public function setMdpAssociation(string $mdpAssociation): self
    {
        $this->mdpAssociation = $mdpAssociation;

        return $this;
    }

    public function getRaisonSocialAssociation(): ?string
    {
        return $this->raisonSocialAssociation;
    }

    public function setRaisonSocialAssociation(string $raisonSocialAssociation): self
    {
        $this->raisonSocialAssociation = $raisonSocialAssociation;

        return $this;
    }

    public function getSiretAssociation(): ?string
    {
        return $this->siretAssociation;
    }

    public function setSiretAssociation(string $siretAssociation): self
    {
        $this->siretAssociation = $siretAssociation;

        return $this;
    }


    public function getAdresseAssociation(): ?string
    {
        return $this->adresseAssociation;
    }

    public function setAdresseAssociation(string $adresseAssociation): self
    {
        $this->adresseAssociation = $adresseAssociation;

        return $this;
    }

    public function getCpAssociation(): ?int
    {
        return $this->cpAssociation;
    }

    public function setCpAssociation(int $cpAssociation): self
    {
        $this->cpAssociation = $cpAssociation;

        return $this;
    }

    public function getVilleAssociation(): ?string
    {
        return $this->villeAssociation;
    }

    public function setVilleAssociation(string $villeAssociation): self
    {
        $this->villeAssociation = $villeAssociation;

        return $this;
    }

    public function getTelAssociation(): ?int
    {
        return $this->telAssociation;
    }

    public function setTelAssociation(int $telAssociation): self
    {
        $this->telAssociation = $telAssociation;

        return $this;
    }

    public function getStatutAssociation(): ?string
    {
        return $this->statutAssociation;
    }

    public function setStatutAssociation(string $statutAssociation): self
    {
        $this->statutAssociation = $statutAssociation;

        return $this;
    }
}
