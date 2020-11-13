<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
{
    /**
     * @ORM\id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeVehicule;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbStock;

    /**
     * @ORM\Column(type="text")
     */
    private $caractVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatLocation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoVehicule;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateurs::class, inversedBy="vehicules")
     */
    private $Utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="Vehicule")
     */
    private $facturations;

    /**
     * @ORM\Column(type="float")
     */
    private $PrixVehicule;

    public function __construct()
    {
        $this->facturations = new ArrayCollection();
    }

    public function getid(): ?int
    {
        return $this->id;
    }

    public function getTypeVehicule(): ?string
    {
        return $this->typeVehicule;
    }

    public function setTypeVehicule(string $typeVehicule): self
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }

    public function getNbStock(): ?int
    {
        return $this->nbStock;
    }

    public function setNbStock(?int $nbStock): self
    {
        $this->nbStock = $nbStock;

        return $this;
    }

    public function getCaractVehicule(): ?string
    {
        return $this->caractVehicule;
    }

    public function setCaractVehicule(string $caractVehicule): self
    {
        $this->caractVehicule = $caractVehicule;

        return $this;
    }

    public function getEtatLocation(): ?string
    {
        return $this->etatLocation;
    }

    public function setEtatLocation(string $etatLocation): self
    {
        $this->etatLocation = $etatLocation;

        return $this;
    }

    public function getPhotoVehicule(): ?string
    {
        return $this->photoVehicule;
    }

    public function setPhotoVehicule(string $photoVehicule): self
    {
        $this->photoVehicule = $photoVehicule;

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

    /**
     * @return Collection|Facturation[]
     */
    public function getFacturations(): Collection
    {
        return $this->facturations;
    }

    public function addFacturation(Facturation $facturation): self
    {
        if (!$this->facturations->contains($facturation)) {
            $this->facturations[] = $facturation;
            $facturation->setVehicule($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): self
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getVehicule() === $this) {
                $facturation->setVehicule(null);
            }
        }

        return $this;
    }

    public function getPrixVehicule(): ?float
    {
        return $this->PrixVehicule;
    }

    public function setPrixVehicule(float $PrixVehicule): self
    {
        $this->PrixVehicule = $PrixVehicule;

        return $this;
    }
}
