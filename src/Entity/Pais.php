<?php

namespace App\Entity;

use App\Repository\PaisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaisRepository::class)]
class Pais
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $cant_dias = null;

    #[ORM\Column]
    private ?float $precio = null;

    #[ORM\Column(length: 200)]
    private ?string $imagen = null;

    #[ORM\OneToMany(mappedBy: 'origen', targetEntity: Conexion::class)]
    private Collection $conexiones;

    #[ORM\OneToMany(mappedBy: 'destino', targetEntity: Conexion::class)]
    private Collection $conexions;

    public function __construct(string $nombre,int $dias,float $precio,string $imagen)
    {
        $this->nombre = $nombre;
        $this->precio= $precio;
        $this->cant_dias= $dias;
        $this->imagen= $imagen;
        $this->conexiones = new ArrayCollection();
        $this->conexions = new ArrayCollection();
    }

   /* public function __construct(string $nombre,int $dias,float $precio,string $imagen)
    {
        $this->nombre = $nombre;
        $this->precio= $precio;
        $this->cant_dias= $dias;
        $this->imagen= $imagen;
    }*/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCantDias(): ?int
    {
        return $this->cant_dias;
    }

    public function setCantDias(int $cant_dias): self
    {
        $this->cant_dias = $cant_dias;

        return $this;
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

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * @return Collection<int, Conexion>
     */
    public function getConexiones(): Collection
    {
        return $this->conexiones;
    }

    public function addConexione(Conexion $conexione): self
    {
        if (!$this->conexiones->contains($conexione)) {
            $this->conexiones->add($conexione);
            $conexione->setOrigen($this);
        }

        return $this;
    }

    public function removeConexione(Conexion $conexione): self
    {
        if ($this->conexiones->removeElement($conexione)) {
            // set the owning side to null (unless already changed)
            if ($conexione->getOrigen() === $this) {
                $conexione->setOrigen(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Conexion>
     */
    public function getConexions(): Collection
    {
        return $this->conexions;
    }

    public function addConexion(Conexion $conexion): self
    {
        if (!$this->conexions->contains($conexion)) {
            $this->conexions->add($conexion);
            $conexion->setDestino($this);
        }

        return $this;
    }

    public function removeConexion(Conexion $conexion): self
    {
        if ($this->conexions->removeElement($conexion)) {
            // set the owning side to null (unless already changed)
            if ($conexion->getDestino() === $this) {
                $conexion->setDestino(null);
            }
        }

        return $this;
    }
}
