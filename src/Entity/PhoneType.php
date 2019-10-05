<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhoneTypeRepository")
 */
class PhoneType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubsidiaryPhone", mappedBy="phoneType", orphanRemoval=true)
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
            $subsidiaryPhone->setPhoneType($this);
        }

        return $this;
    }

    public function removeSubsidiaryPhone(SubsidiaryPhone $subsidiaryPhone): self
    {
        if ($this->subsidiaryPhones->contains($subsidiaryPhone)) {
            $this->subsidiaryPhones->removeElement($subsidiaryPhone);
            // set the owning side to null (unless already changed)
            if ($subsidiaryPhone->getPhoneType() === $this) {
                $subsidiaryPhone->setPhoneType(null);
            }
        }

        return $this;
    }
}
