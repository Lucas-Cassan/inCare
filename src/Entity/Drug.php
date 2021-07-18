<?php

namespace App\Entity;

use App\Repository\DrugRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrugRepository::class)
 */
class Drug
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
    private $patient;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $drug;

    /**
     * @ORM\Column(type="json")
     */
    private $administration = [];

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $doctor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?string
    {
        return $this->patient;
    }

    public function setPatient(string $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDrug(): ?string
    {
        return $this->drug;
    }

    public function setDrug(string $drug): self
    {
        $this->drug = $drug;

        return $this;
    }

    public function getAdministration(): ?array
    {
        return $this->administration;
    }

    public function setAdministration(array $administration): self
    {
        $this->administration = $administration;

        return $this;
    }

    public function getDoctor(): ?string
    {
        return $this->doctor;
    }

    public function setDoctor(string $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }
}
