<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Subject", inversedBy="users")
     */
    private $favoriteSubjects;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Meeting", inversedBy="users")
     */
    private $meeting;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\MeetingDate", inversedBy="users")
     */
    private $date;

    public function __construct()
    {
        $this->favoriteSubjects = new ArrayCollection();
        $this->meeting = new ArrayCollection();
        $this->date = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Subject[]
     */
    public function getFavoriteSubjects(): Collection
    {
        return $this->favoriteSubjects;
    }

    public function addFavoriteSubjects(Subject $favoriteSubjects): self
    {
        if (!$this->favoriteSubjects->contains($favoriteSubjects)) {
            $this->favoriteSubjects[] = $favoriteSubjects;
        }

        return $this;
    }

    public function removeFavoriteSubjects(Subject $favoriteSubjects): self
    {
        if ($this->favoriteSubjects->contains($favoriteSubjects)) {
            $this->favoriteSubjects->removeElement($favoriteSubjects);
        }

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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
        }

        return $this;
    }

    public function removeMeeting(Meeting $meeting): self
    {
        if ($this->meeting->contains($meeting)) {
            $this->meeting->removeElement($meeting);
        }

        return $this;
    }

    /**
     * @return Collection|MeetingDate[]
     */
    public function getDate(): Collection
    {
        return $this->date;
    }

    public function addDate(MeetingDate $date): self
    {
        if (!$this->date->contains($date)) {
            $this->date[] = $date;
        }

        return $this;
    }

    public function removeDate(MeetingDate $date): self
    {
        if ($this->date->contains($date)) {
            $this->date->removeElement($date);
        }

        return $this;
    }
}
