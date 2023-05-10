<?php

namespace App\Entity;

use App\Repository\AdministrateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateursRepository::class)]
class Administrateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Mot_de_Passe = null;

    #[ORM\OneToMany(mappedBy: 'Administrateurs', targetEntity: Galeries::class)]
    private Collection $galeries;

    #[ORM\OneToMany(mappedBy: 'administrateurs', targetEntity: Cartes::class)]
    private Collection $Cartes;

    #[ORM\OneToMany(mappedBy: 'administrateurs', targetEntity: Menus::class)]
    private Collection $Menus;

    #[ORM\OneToMany(mappedBy: 'administrateurs', targetEntity: Horaires::class)]
    private Collection $Horaires;

    public function __construct()
    {
        $this->galeries = new ArrayCollection();
        $this->Cartes = new ArrayCollection();
        $this->Menus = new ArrayCollection();
        $this->Horaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->Mot_de_Passe;
    }

    public function setMotDePasse(string $Mot_de_Passe): self
    {
        $this->Mot_de_Passe = $Mot_de_Passe;

        return $this;
    }

    /**
     * @return Collection<int, Galeries>
     */
    public function getGaleries(): Collection
    {
        return $this->galeries;
    }

    public function addGalery(Galeries $galery): self
    {
        if (!$this->galeries->contains($galery)) {
            $this->galeries->add($galery);
            $galery->setAdministrateurs($this);
        }

        return $this;
    }

    public function removeGalery(Galeries $galery): self
    {
        if ($this->galeries->removeElement($galery)) {
            // set the owning side to null (unless already changed)
            if ($galery->getAdministrateurs() === $this) {
                $galery->setAdministrateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cartes>
     */
    public function getCartes(): Collection
    {
        return $this->Cartes;
    }

    public function addCarte(Cartes $carte): self
    {
        if (!$this->Cartes->contains($carte)) {
            $this->Cartes->add($carte);
            $carte->setAdministrateurs($this);
        }

        return $this;
    }

    public function removeCarte(Cartes $carte): self
    {
        if ($this->Cartes->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getAdministrateurs() === $this) {
                $carte->setAdministrateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Menus>
     */
    public function getMenus(): Collection
    {
        return $this->Menus;
    }

    public function addMenu(Menus $menu): self
    {
        if (!$this->Menus->contains($menu)) {
            $this->Menus->add($menu);
            $menu->setAdministrateurs($this);
        }

        return $this;
    }

    public function removeMenu(Menus $menu): self
    {
        if ($this->Menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getAdministrateurs() === $this) {
                $menu->setAdministrateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Horaires>
     */
    public function getHoraires(): Collection
    {
        return $this->Horaires;
    }

    public function addHoraire(Horaires $horaire): self
    {
        if (!$this->Horaires->contains($horaire)) {
            $this->Horaires->add($horaire);
            $horaire->setAdministrateurs($this);
        }

        return $this;
    }

    public function removeHoraire(Horaires $horaire): self
    {
        if ($this->Horaires->removeElement($horaire)) {
            // set the owning side to null (unless already changed)
            if ($horaire->getAdministrateurs() === $this) {
                $horaire->setAdministrateurs(null);
            }
        }

        return $this;
    }
}
