<?php

namespace App\Entity;

use App\Repository\ConexionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConexionRepository::class)]
class Conexion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $precio = null;

    #[ORM\ManyToOne(inversedBy: 'conexiones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pais $origen = null;

    #[ORM\ManyToOne(inversedBy: 'conexions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pais $destino = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getOrigen(): ?Pais
    {
        return $this->origen;
    }

    public function setOrigen(?Pais $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?Pais
    {
        return $this->destino;
    }

    public function setDestino(?Pais $destino): self
    {
        $this->destino = $destino;

        return $this;
    }
}
