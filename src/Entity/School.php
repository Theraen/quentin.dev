<?php

namespace App\Entity;

use App\Repository\SchoolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SchoolRepository::class)
 */
class School
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nameDegree;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $schoolName;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $specialisation;

    /**
     * @ORM\OneToMany(targetEntity=DescSchool::class, mappedBy="school")
     */
    private $descSchools;

    public function __construct()
    {
        $this->descSchools = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDegree(): ?string
    {
        return $this->nameDegree;
    }

    public function setNameDegree(string $nameDegree): self
    {
        $this->nameDegree = $nameDegree;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getSchoolName(): ?string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): self
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    public function getSpecialisation(): ?string
    {
        return $this->specialisation;
    }

    public function setSpecialisation(string $specialisation): self
    {
        $this->specialisation = $specialisation;

        return $this;
    }

    /**
     * @return Collection|DescSchool[]
     */
    public function getDescSchools(): Collection
    {
        return $this->descSchools;
    }

    public function addDescSchool(DescSchool $descSchool): self
    {
        if (!$this->descSchools->contains($descSchool)) {
            $this->descSchools[] = $descSchool;
            $descSchool->setSchool($this);
        }

        return $this;
    }

    public function removeDescSchool(DescSchool $descSchool): self
    {
        if ($this->descSchools->contains($descSchool)) {
            $this->descSchools->removeElement($descSchool);
            // set the owning side to null (unless already changed)
            if ($descSchool->getSchool() === $this) {
                $descSchool->setSchool(null);
            }
        }

        return $this;
    }
}
