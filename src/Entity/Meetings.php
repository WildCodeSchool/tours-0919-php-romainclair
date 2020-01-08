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
     * @ORM\ManyToOne(targetEntity="App\Entity\Subjects", inversedBy="meetings")
     */
    private $subjects;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Meetings", inversedBy="meetings")
     */
    private $meetings;

    public function __construct()
    {
        /* $this->meetings = new ArrayCollection();
        $this->Meetings = new ArrayCollection(); */
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

    public function getSubjects(): ?Subjects
    {
        return $this->subjects;
    }

    public function setSubjects(?Subjects $subjects): self
    {
        $this->subjects = $subjects;

        return $this;
    }

    public function getMeetings(): ?self
    {
        return $this->meetings;
    }

    public function setMeetings(?self $meetings): self
    {
        $this->meetings = $meetings;

        return $this;
    }

    public function addMeeting(self $meeting): self
    {
        if (!$this->Meetings->contains($meeting)) {
            $this->Meetings[] = $meeting;
            $meeting->setMeetings($this);
        }

        return $this;
    }

    public function removeMeeting(self $meeting): self
    {
        if ($this->Meetings->contains($meeting)) {
            $this->Meetings->removeElement($meeting);
            // set the owning side to null (unless already changed)
            if ($meeting->getMeetings() === $this) {
                $meeting->setMeetings(null);
            }
        }

        return $this;
    }
}
