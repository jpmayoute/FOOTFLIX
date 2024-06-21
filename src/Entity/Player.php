<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_of_birth = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $player_picture = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Position $position = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    /**
     * @var Collection<int, PlayerClubYear>
     */
    #[ORM\OneToMany(targetEntity: PlayerClubYear::class, mappedBy: 'player')]
    private Collection $playerClubYears;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'player')]
    private Collection $comments;

    /**
     * @var Collection<int, DecisifPass>
     */
    #[ORM\OneToMany(targetEntity: DecisifPass::class, mappedBy: 'player')]
    private Collection $decisifPasses;

    public function __construct()
    {
        $this->playerClubYears = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->decisifPasses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): static
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getPlayerPicture(): ?string
    {
        return $this->player_picture;
    }

    public function setPlayerPicture(?string $player_picture): static
    {
        $this->player_picture = $player_picture;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, PlayerClubYear>
     */
    public function getPlayerClubYears(): Collection
    {
        return $this->playerClubYears;
    }

    public function addPlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        if (!$this->playerClubYears->contains($playerClubYear)) {
            $this->playerClubYears->add($playerClubYear);
            $playerClubYear->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        if ($this->playerClubYears->removeElement($playerClubYear)) {
            // set the owning side to null (unless already changed)
            if ($playerClubYear->getPlayer() === $this) {
                $playerClubYear->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setPlayer($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getPlayer() === $this) {
                $comment->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DecisifPass>
     */
    public function getDecisifPasses(): Collection
    {
        return $this->decisifPasses;
    }

    public function addDecisifPass(DecisifPass $decisifPass): static
    {
        if (!$this->decisifPasses->contains($decisifPass)) {
            $this->decisifPasses->add($decisifPass);
            $decisifPass->setPlayer($this);
        }

        return $this;
    }

    public function removeDecisifPass(DecisifPass $decisifPass): static
    {
        if ($this->decisifPasses->removeElement($decisifPass)) {
            // set the owning side to null (unless already changed)
            if ($decisifPass->getPlayer() === $this) {
                $decisifPass->setPlayer(null);
            }
        }

        return $this;
    }
}
