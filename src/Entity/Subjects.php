<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubjectsRepository")
 */
class Subjects
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Thematiques", inversedBy="subjects")
     */
    private $thematiques;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $participate;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Meetings", mappedBy="subjects")
     */
    private $meetings;

    public function __construct()
    {
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

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(?string $requirements): self
    {
        $this->requirements = $requirements;

        retemplates/subjects/_form.html.twigturn $this;
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

    public function getThematiques(): ?Thematiques
    {
        return $this->thematiques;
    }

    public function setThematiques(?Thematiques $thematiques): self
    {
        $this->thematiques = $thematiques;

        return $this;
    }

    public function getParticipate(): ?bool
    {
        return $this->participate;
    }

    public function setParticipate(?bool $participate): self
    {
        $this->participate = $participate;
    }
    /**
     * @return Collection|Meetings[]
     */
    public function getMeetings(): Collection
    {
        return $this->meetings;
    }

    public function addMeeting(Meetings $meeting): self
    {
        if (!$this->meetings->contains($meeting)) {
            $this->meetings[] = $meeting;
            $meeting->setSubjects($this);
        }

        return $this;
    }

    public function removeMeeting(Meetings $meeting): self
    {
        if ($this->meetings->contains($meeting)) {
            $this->meetings->removeElement($meeting);
            // set the owning side to null (unless already changed)
            if ($meeting->getSubjects() === $this) {
                $meeting->setSubjects(null);
            }
        }

        return $this;
    }
}
