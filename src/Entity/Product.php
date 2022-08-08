<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
*@ORM\Entity
* @ORM\Table(name="product")
**/
class Product
{

    /**
     *@ORM\id
     *@ORM\Column(type="integer")
     *@ORM\GeneratesValue
     ***/

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $id;

    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturer_id",nullable=false, referencedColumnName="id")
     *
     */

    private $manufacturer;


}