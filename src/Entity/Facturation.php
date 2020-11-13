<?php

namespace App\Entity;

use App\Repository\FacturationRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @ORM\Entity(repositoryClass=FacturationRepository::class)
 */
class Facturation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeurReglement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etatReglement;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateurs::class, inversedBy="facturations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Utilisateurs;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="facturations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Vehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getValeurReglement(): ?int
    {
        return $this->valeurReglement;
    }

    public function setValeurReglement(int $valeurReglement): self
    {
        $this->valeurReglement = $valeurReglement;

        return $this;
    }

    public function getEtatReglement(): ?bool
    {
        return $this->etatReglement;
    }

    public function setEtatReglement(bool $etatReglement): self
    {
        $this->etatReglement = $etatReglement;

        return $this;
    }

    public function getUtilisateurs(): ?Utilisateurs
    {
        return $this->Utilisateurs;
    }

    public function setUtilisateurs(?Utilisateurs $Utilisateurs): self
    {
        $this->Utilisateurs = $Utilisateurs;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->Vehicule;
    }

    public function setVehicule(?Vehicule $Vehicule): self
    {
        $this->Vehicule = $Vehicule;

        return $this;
    }
}
