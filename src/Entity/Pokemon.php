<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Type;

    /**
     * @ORM\ManyToOne(targetEntity=Dresseurs::class, inversedBy="pokemon")
     */
    private $possede;

    /**
     * @ORM\ManyToMany(targetEntity=Attaque::class, inversedBy="pokemon")
     */
    private $Attaque_id;

    public function __construct()
    {
        $this->Attaque_id = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getPossede(): ?Dresseurs
    {
        return $this->possede;
    }

    public function setPossede(?Dresseurs $possede): self
    {
        $this->possede = $possede;

        return $this;
    }

    /**
     * @return Collection<int, Attaque>
     */
    public function getAttaqueId(): Collection
    {
        return $this->Attaque_id;
    }

    public function addAttaqueId(Attaque $attaqueId): self
    {
        if (!$this->Attaque_id->contains($attaqueId)) {
            $this->Attaque_id[] = $attaqueId;
        }

        return $this;
    }

    public function removeAttaqueId(Attaque $attaqueId): self
    {
        $this->Attaque_id->removeElement($attaqueId);

        return $this;
    }


}
