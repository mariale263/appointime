<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubsidiaryRepository")
 */
class Subsidiary
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="subsidiaries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubsidiaryPhone", mappedBy="subsidiary", orphanRemoval=true)
     */
    private $subsidiaryPhones;

    public function __construct()
    {
        $this->subsidiaryPhones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|SubsidiaryPhone[]
     */
    public function getSubsidiaryPhones(): Collection
    {
        return $this->subsidiaryPhones;
    }

    public function addSubsidiaryPhone(SubsidiaryPhone $subsidiaryPhone): self
    {
        if (!$this->subsidiaryPhones->contains($subsidiaryPhone)) {
            $this->subsidiaryPhones[] = $subsidiaryPhone;
            $subsidiaryPhone->setSubsidiary($this);
        }

        return $this;
    }

    public function removeSubsidiaryPhone(SubsidiaryPhone $subsidiaryPhone): self
    {
        if ($this->subsidiaryPhones->contains($subsidiaryPhone)) {
            $this->subsidiaryPhones->removeElement($subsidiaryPhone);
            // set the owning side to null (unless already changed)
            if ($subsidiaryPhone->getSubsidiary() === $this) {
                $subsidiaryPhone->setSubsidiary(null);
            }
        }

        return $this;
    }
}
