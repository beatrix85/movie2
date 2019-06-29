<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieGenreRepository")
 */
class MovieGenre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre")
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Movie")
     */
    private $movie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getMovie(): ?movie
    {
        return $this->movie;
    }

    public function setMovie(?movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }
}
