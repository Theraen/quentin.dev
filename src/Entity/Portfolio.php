<?php

namespace App\Entity;

use App\Repository\PortfolioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PortfolioRepository::class)
 */
class Portfolio
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
    private $name;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $images;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\OneToMany(targetEntity=TechnologyPortfolio::class, mappedBy="portfolio")
     */
    private $technologyPortfolios;

    public function __construct()
    {
        $this->technologyPortfolios = new ArrayCollection();
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|TechnologyPortfolio[]
     */
    public function getTechnologyPortfolios(): Collection
    {
        return $this->technologyPortfolios;
    }

    public function addTechnologyPortfolio(TechnologyPortfolio $technologyPortfolio): self
    {
        if (!$this->technologyPortfolios->contains($technologyPortfolio)) {
            $this->technologyPortfolios[] = $technologyPortfolio;
            $technologyPortfolio->setPortfolio($this);
        }

        return $this;
    }

    public function removeTechnologyPortfolio(TechnologyPortfolio $technologyPortfolio): self
    {
        if ($this->technologyPortfolios->contains($technologyPortfolio)) {
            $this->technologyPortfolios->removeElement($technologyPortfolio);
            // set the owning side to null (unless already changed)
            if ($technologyPortfolio->getPortfolio() === $this) {
                $technologyPortfolio->setPortfolio(null);
            }
        }

        return $this;
    }
}
