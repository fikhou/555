<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reeser
 *
 * @ORM\Table(name="reeser")
 * @ORM\Entity
 */
class Reeser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;

    /**
     * @ORM\Column(name="nomreser", type="string", length=255, nullable=false)
     */
    private $nomreser;

    /**
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reesers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getNomreser(): ?string
    {
        return $this->nomreser;
    }

    public function setNomreser(string $nomreser): self
    {
        $this->nomreser = $nomreser;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }
}
