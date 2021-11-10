<?php

namespace App\Entity;

use App\Repository\MoviesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoviesRepository::class)
 */
class Movies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sumary;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     */
    private $release_year;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Director::class, inversedBy="filmography")
     * @ORM\JoinColumn(nullable=false)
     */
    private $director;

    /**
     * @ORM\ManyToMany(targetEntity=Actors::class, mappedBy="filmography")
     */
    private $actorss;

    public function __construct()
    {
        $this->actorss = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSumary(): ?string
    {
        return $this->sumary;
    }

    public function setSumary(string $sumary): self
    {
        $this->sumary = $sumary;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getReleaseYear(): ?\DateTimeInterface
    {
        return $this->release_year;
    }

    public function setReleaseYear(\DateTimeInterface $release_year): self
    {
        $this->release_year = $release_year;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDirector(): ?Director
    {
        return $this->director;
    }

    public function setDirector(?Director $director): self
    {
        $this->director = $director;

        return $this;
    }

    /**
     * @return Collection|Actors[]
     */
    public function getActorss(): Collection
    {
        return $this->actorss;
    }

    public function addActorss(Actors $actorss): self
    {
        if (!$this->actorss->contains($actorss)) {
            $this->actorss[] = $actorss;
            $actorss->addFilmography($this);
        }

        return $this;
    }

    public function removeActorss(Actors $actorss): self
    {
        if ($this->actorss->removeElement($actorss)) {
            $actorss->removeFilmography($this);
        }

        return $this;
    }



}
