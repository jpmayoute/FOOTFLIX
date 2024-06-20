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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_of_birth = null;

    #[ORM\Column(length: 255)]
    private ?string $player_picture = null;

    /**
     * @var Collection<int, Goals>
     */
    #[ORM\ManyToMany(targetEntity: Goals::class, inversedBy: 'players')]
    private Collection $goals;

    /**
     * @var Collection<int, DecisifPass>
     */
    #[ORM\ManyToMany(targetEntity: DecisifPass::class, inversedBy: 'players')]
    private Collection $decisif_pass;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'player')]
    private Collection $comments;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Position $position = null;

    /**
     * @var Collection<int, Club>
     */
    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'players')]
    private Collection $clubs;

    /**
     * @var Collection<int, PlayerClubYear>
     */
    #[ORM\ManyToMany(targetEntity: PlayerClubYear::class, inversedBy: 'players')]
    private Collection $player_club_year;

    public function __construct()
    {
        $this->goals = new ArrayCollection();
        $this->decisif_pass = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->clubs = new ArrayCollection();
        $this->player_club_year = new ArrayCollection();
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

    public function setPlayerPicture(string $player_picture): static
    {
        $this->player_picture = $player_picture;

        return $this;
    }

    /**
     * @return Collection<int, Goals>
     */
    public function getGoals(): Collection
    {
        return $this->goals;
    }

    public function addGoal(Goals $goal): static
    {
        if (!$this->goals->contains($goal)) {
            $this->goals->add($goal);
        }

        return $this;
    }

    public function removeGoal(Goals $goal): static
    {
        $this->goals->removeElement($goal);

        return $this;
    }

    /**
     * @return Collection<int, DecisifPass>
     */
    public function getDecisifPass(): Collection
    {
        return $this->decisif_pass;
    }

    public function addDecisifPass(DecisifPass $decisifPass): static
    {
        if (!$this->decisif_pass->contains($decisifPass)) {
            $this->decisif_pass->add($decisifPass);
        }

        return $this;
    }

    public function removeDecisifPass(DecisifPass $decisifPass): static
    {
        $this->decisif_pass->removeElement($decisifPass);

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

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClubs(): Collection
    {
        return $this->clubs;
    }

    public function addClub(Club $club): static
    {
        if (!$this->clubs->contains($club)) {
            $this->clubs->add($club);
        }

        return $this;
    }

    public function removeClub(Club $club): static
    {
        $this->clubs->removeElement($club);

        return $this;
    }

    /**
     * @return Collection<int, PlayerClubYear>
     */
    public function getPlayerClubYear(): Collection
    {
        return $this->player_club_year;
    }

    public function addPlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        if (!$this->player_club_year->contains($playerClubYear)) {
            $this->player_club_year->add($playerClubYear);
        }

        return $this;
    }

    public function removePlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        $this->player_club_year->removeElement($playerClubYear);

        return $this;
    }
}
