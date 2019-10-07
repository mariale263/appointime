<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Position", inversedBy="employees")
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subsidiary", inversedBy="employees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subsidiary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $gender;

    public function __construct()
    {
        $this->position = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Position[]
     */
    public function getPosition(): Collection
    {
        return $this->position;
    }

    public function addPosition(Position $position): self
    {
        if (!$this->position->contains($position)) {
            $this->position[] = $position;
        }

        return $this;
    }

    public function removePosition(Position $position): self
    {
        if ($this->position->contains($position)) {
            $this->position->removeElement($position);
        }

        return $this;
    }

    public function getSubsidiary(): ?Subsidiary
    {
        return $this->subsidiary;
    }

    public function setSubsidiary(?Subsidiary $subsidiary): self
    {
        $this->subsidiary = $subsidiary;

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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }
}
