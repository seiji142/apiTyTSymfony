<?php

namespace App\Entity;

class PaisDto
{

    private int $id;

    private string $nombre;

    private int $cant_dias;

    private float $precio;

    private string $imagen;

    /**
     * @param int $id
     * @param string $nombre
     * @param int $cant_dias
     * @param float $precio
     * @param string $imagen
     */
    public function __construct(int $id, string $nombre, int $cant_dias, float $precio, string $imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cant_dias = $cant_dias;
        $this->precio = $precio;
        $this->imagen = $imagen;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return int
     */
    public function getCantDias(): int
    {
        return $this->cant_dias;
    }

    /**
     * @param int $cant_dias
     */
    public function setCantDias(int $cant_dias): void
    {
        $this->cant_dias = $cant_dias;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return string
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     */
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }


    public static function construirPais(Pais $p): PaisDto{
        $pais = new PaisDto($p->getId(), $p->getNombre(),
            $p->getCantDias(), $p->getPrecio(), $p->getImagen());

        return $pais;
    }

}