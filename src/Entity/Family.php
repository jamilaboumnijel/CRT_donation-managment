<?php

namespace App\Entity;

use App\Repository\FamilyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilyRepository::class)]
class Family
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $familyName = null;

    #[ORM\Column(length: 255)]
    private ?string $Adress = null;

    #[ORM\Column]
    private ?int $Phone = null;

    #[ORM\Column]
    private ?int $composition = null;

    #[ORM\Column(length: 255)]
    private ?string $Accommodation = null;

    #[ORM\Column(length: 255)]
    private ?string $Father_Profession = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mother_Profession = null;

    #[ORM\Column(length: 255)]
    private ?string $Insurance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Health_Status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(string $familyName): static
    {
        $this->familyName = $familyName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): static
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->Phone;
    }

    public function setPhone(int $Phone): static
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getComposition(): ?int
    {
        return $this->composition;
    }

    public function setComposition(int $composition): static
    {
        $this->composition = $composition;

        return $this;
    }

    public function getAccommodation(): ?string
    {
        return $this->Accommodation;
    }

    public function setAccommodation(string $Accommodation): static
    {
        $this->Accommodation = $Accommodation;

        return $this;
    }

    public function getFatherProfession(): ?string
    {
        return $this->Father_Profession;
    }

    public function setFatherProfession(string $Father_Profession): static
    {
        $this->Father_Profession = $Father_Profession;

        return $this;
    }

    public function getMotherProfession(): ?string
    {
        return $this->mother_Profession;
    }

    public function setMotherProfession(?string $mother_Profession): static
    {
        $this->mother_Profession = $mother_Profession;

        return $this;
    }

    public function getInsurance(): ?string
    {
        return $this->Insurance;
    }

    public function setInsurance(string $Insurance): static
    {
        $this->Insurance = $Insurance;

        return $this;
    }

    public function getHealthStatus(): ?string
    {
        return $this->Health_Status;
    }

    public function setHealthStatus(?string $Health_Status): static
    {
        $this->Health_Status = $Health_Status;

        return $this;
    }
}
