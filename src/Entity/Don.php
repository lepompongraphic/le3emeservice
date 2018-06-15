<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DonRepository")
 */
class Don
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idAssociation;

    /**
     * @ORM\Column(type="integer")
     */
    private $idProfessionnel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEntree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reserver;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heureCollecte;

    public function getId()
    {
        return $this->id;
    }

    public function getIdAssociation(): ?int
    {
        return $this->idAssociation;
    }

    public function setIdAssociation(int $idAssociation): self
    {
        $this->idAssociation = $idAssociation;

        return $this;
    }

    public function getIdProfessionnel(): ?int
    {
        return $this->idProfessionnel;
    }

    public function setIdProfessionnel(int $idProfessionnel): self
    {
        $this->idProfessionnel = $idProfessionnel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getReserver(): ?string
    {
        return $this->reserver;
    }

    public function setReserver(string $reserver): self
    {
        $this->reserver = $reserver;

        return $this;
    }

    public function getHeureCollecte(): ?string
    {
        return $this->heureCollecte;
    }

    public function setHeureCollecte(string $heureCollecte): self
    {
        $this->heureCollecte = $heureCollecte;

        return $this;
    }
}
