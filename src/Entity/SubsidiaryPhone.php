<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubsidiaryPhoneRepository")
 */
class SubsidiaryPhone
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
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PhoneType", inversedBy="subsidiaryPhones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $phoneType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subsidiary", inversedBy="subsidiaryPhones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subsidiary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPhoneType(): ?PhoneType
    {
        return $this->phoneType;
    }

    public function setPhoneType(?PhoneType $phoneType): self
    {
        $this->phoneType = $phoneType;

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
}
