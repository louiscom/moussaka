<?php

namespace App\Artists\Domain\Entity;

use App\Artists\Domain\Repository\AlbumRepository;
use App\Customers\Domain\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\UuidV4;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
class Album
{
    #[
        ORM\Id,
        ORM\Column(type: 'uuid'),
    ]
    private string $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\OnetoMany(targetEntity: Song::class)]
    private ?Collection $songs = null;

    #[ORM\ManyToOne(targetEntity: Artist::class)]
    private Artist $artist;

    /**
     * @return Artist|null
     */
    public function getArtist(): Artist
    {
        return $this->artist;
    }

    /**
     * @param Artist|null $artist
     */
    public function setArtist(Artist $artist): void
    {
        $this->artist = $artist;
    }

    public function __construct()
    {
        $this->id = (string) (new UuidV4());
        $this->songs = new ArrayCollection();
    }

    /**
     * @return Collection|null
     */
    public function getSongs(): ?Collection
    {
        return $this->songs;
    }

    /**
     * @param Collection|null $songs
     */
    public function setSongs(?Collection $songs): void
    {
        $this->songs = $songs;
    }

    public function getId(): ?string
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
}




