<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subsidiary", mappedBy="company", orphanRemoval=true)
     */
    private $subsidiaries;

    public function __construct()
    {
        $this->subsidiaries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Subsidiary[]
     */
    public function getSubsidiaries(): Collection
    {
        return $this->subsidiaries;
    }

    public function addSubsidiary(Subsidiary $subsidiary): self
    {
        if (!$this->subsidiaries->contains($subsidiary)) {
            $this->subsidiaries[] = $subsidiary;
            $subsidiary->setCompany($this);
        }

        return $this;
    }

    public function removeSubsidiary(Subsidiary $subsidiary): self
    {
        if ($this->subsidiaries->contains($subsidiary)) {
            $this->subsidiaries->removeElement($subsidiary);
            // set the owning side to null (unless already changed)
            if ($subsidiary->getCompany() === $this) {
                $subsidiary->setCompany(null);
            }
        }

        return $this;
    }
}
