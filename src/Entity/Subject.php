<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Meeting;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubjectRepository")
 */
class Subject
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $requirements;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="subject")
     */
    private $theme;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Meeting", orphanRemoval=true, mappedBy="subject")
     */
    private $meeting;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $participation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="favoriteSubjects")
     */
    private $users;


    public function __construct()
    {
        $this->meeting = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(?string $requirements): self
    {
        $this->requirements = $requirements;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection|Meeting[]
     */
    public function getMeeting(): Collection
    {
        return $this->meeting;
    }

    public function addMeeting(Meeting $meeting): self
    {
        if (!$this->meeting->contains($meeting)) {
            $this->meeting[] = $meeting;
            $meeting->setSubject($this);
        }

        return $this;
    }

    public function removeMeeting(Meeting $meeting): self
    {
        if ($this->meeting->contains($meeting)) {
            $this->meeting->removeElement($meeting);
            // set the owning side to null (unless already changed)
            if ($meeting->getSubject() === $this) {
                $meeting->setSubject(null);
            }
        }

        return $this;
    }

    public function getParticipation(): ?string
    {
        return $this->participation;
    }

    public function setParticipation(string $participation): self
    {
        $this->participation = $participation;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addFavoriteSubjects($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeFavoriteSubjects($this);
        }

        return $this;
    }
}
