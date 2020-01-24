<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MeetingRepository")
 */
class Meeting
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $required;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $participating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subject", inversedBy="meeting")
     */
    private $subject;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Meeting", inversedBy="meeting")
     */
    private $requiredMeeting;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Meeting", mappedBy="requiredMeeting")
     */
    private $meeting;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MeetingDate", mappedBy="meeting", orphanRemoval=true)
     */
    private $meetingDates;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="meeting")
     */
    private $users;

    public function __construct()
    {
        $this->requiredMeeting = new ArrayCollection();
        $this->meeting = new ArrayCollection();
        $this->meetingDates = new ArrayCollection();
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

    public function getRequired(): ?string
    {
        return $this->required;
    }

    public function setRequired(?string $required): self
    {
        $this->required = $required;

        return $this;
    }

    public function getParticipating(): ?int
    {
        return $this->participating;
    }

    public function setParticipating(?int $participating): self
    {
        $this->participating = $participating;

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getRequiredMeeting(): Collection
    {
        return $this->requiredMeeting;
    }

    public function addRequiredMeeting(self $requiredMeeting): self
    {
        if (!$this->requiredMeeting->contains($requiredMeeting)) {
            $this->requiredMeeting[] = $requiredMeeting;
        }

        return $this;
    }

    public function removeRequiredMeeting(self $requiredMeeting): self
    {
        if ($this->requiredMeeting->contains($requiredMeeting)) {
            $this->requiredMeeting->removeElement($requiredMeeting);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getMeeting(): Collection
    {
        return $this->meeting;
    }

    public function addMeeting(self $meeting): self
    {
        if (!$this->meeting->contains($meeting)) {
            $this->meeting[] = $meeting;
            $meeting->addRequiredMeeting($this);
        }

        return $this;
    }

    public function removeMeeting(self $meeting): self
    {
        if ($this->meeting->contains($meeting)) {
            $this->meeting->removeElement($meeting);
            $meeting->removeRequiredMeeting($this);
        }

        return $this;
    }

    /**
     * @return Collection|MeetingDate[]
     */
    public function getMeetingDates(): Collection
    {
        return $this->meetingDates;
    }

    public function addMeetingDate(MeetingDate $meetingDate): self
    {
        if (!$this->meetingDates->contains($meetingDate)) {
            $this->meetingDates[] = $meetingDate;
            $meetingDate->setMeeting($this);
        }

        return $this;
    }

    public function removeMeetingDate(MeetingDate $meetingDate): self
    {
        if ($this->meetingDates->contains($meetingDate)) {
            $this->meetingDates->removeElement($meetingDate);
            // set the owning side to null (unless already changed)
            if ($meetingDate->getMeeting() === $this) {
                $meetingDate->setMeeting(null);
            }
        }

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
            $user->addMeeting($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeMeeting($this);
        }

        return $this;
    }
}
