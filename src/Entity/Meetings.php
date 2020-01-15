<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MeetingsRepository")
 */
class Meetings
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Subject", inversedBy="meetings")
     */
    private $subject;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Meetings", inversedBy="meetings")
     */
    private $requiredMeetings;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Meetings", mappedBy="requiredMeetings")
     */
    private $meetings;

    public function __construct()
    {
        $this->requiredMeetings = new ArrayCollection();
        $this->meetings = new ArrayCollection();
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
    public function getRequiredMeetings(): Collection
    {
        return $this->requiredMeetings;
    }

    public function addRequiredMeeting(self $requiredMeeting): self
    {
        if (!$this->requiredMeetings->contains($requiredMeeting)) {
            $this->requiredMeetings[] = $requiredMeeting;
        }

        return $this;
    }

    public function removeRequiredMeeting(self $requiredMeeting): self
    {
        if ($this->requiredMeetings->contains($requiredMeeting)) {
            $this->requiredMeetings->removeElement($requiredMeeting);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getMeetings(): Collection
    {
        return $this->meetings;
    }

    public function addMeeting(self $meeting): self
    {
        if (!$this->meetings->contains($meeting)) {
            $this->meetings[] = $meeting;
            $meeting->addRequiredMeeting($this);
        }

        return $this;
    }

    public function removeMeeting(self $meeting): self
    {
        if ($this->meetings->contains($meeting)) {
            $this->meetings->removeElement($meeting);
            $meeting->removeRequiredMeeting($this);
        }

        return $this;
    }
}
