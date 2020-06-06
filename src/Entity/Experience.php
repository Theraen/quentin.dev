<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
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
    private $nameTrade;

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
    private $enterprise;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=DescExperience::class, mappedBy="experience")
     */
    private $descExperiences;

    public function __construct()
    {
        $this->descExperiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTrade(): ?string
    {
        return $this->nameTrade;
    }

    public function setNameTrade(string $nameTrade): self
    {
        $this->nameTrade = $nameTrade;

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

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getEnterprise(): ?string
    {
        return $this->enterprise;
    }

    public function setEnterprise(string $enterprise): self
    {
        $this->enterprise = $enterprise;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|DescExperience[]
     */
    public function getDescExperiences(): Collection
    {
        return $this->descExperiences;
    }

    public function addDescExperience(DescExperience $descExperience): self
    {
        if (!$this->descExperiences->contains($descExperience)) {
            $this->descExperiences[] = $descExperience;
            $descExperience->setExperience($this);
        }

        return $this;
    }

    public function removeDescExperience(DescExperience $descExperience): self
    {
        if ($this->descExperiences->contains($descExperience)) {
            $this->descExperiences->removeElement($descExperience);
            // set the owning side to null (unless already changed)
            if ($descExperience->getExperience() === $this) {
                $descExperience->setExperience(null);
            }
        }

        return $this;
    }
}
