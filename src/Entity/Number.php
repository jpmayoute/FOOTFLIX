<?php

namespace App\Entity;

use App\Repository\NumberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NumberRepository::class)]
class Number
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $number = null;

    /**
     * @var Collection<int, Stats>
     */
    #[ORM\ManyToMany(targetEntity: Stats::class, mappedBy: 'number')]
    private Collection $stats;

    /**
     * @var Collection<int, Palmares>
     */
    #[ORM\ManyToMany(targetEntity: Palmares::class, mappedBy: 'number')]
    private Collection $palmares;

    public function __construct()
    {
        $this->stats = new ArrayCollection();
        $this->palmares = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): static
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, Stats>
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Stats $stat): static
    {
        if (!$this->stats->contains($stat)) {
            $this->stats->add($stat);
            $stat->addNumber($this);
        }

        return $this;
    }

    public function removeStat(Stats $stat): static
    {
        if ($this->stats->removeElement($stat)) {
            $stat->removeNumber($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Palmares>
     */
    public function getPalmares(): Collection
    {
        return $this->palmares;
    }

    public function addPalmare(Palmares $palmare): static
    {
        if (!$this->palmares->contains($palmare)) {
            $this->palmares->add($palmare);
            $palmare->addNumber($this);
        }

        return $this;
    }

    public function removePalmare(Palmares $palmare): static
    {
        if ($this->palmares->removeElement($palmare)) {
            $palmare->removeNumber($this);
        }

        return $this;
    }
}
