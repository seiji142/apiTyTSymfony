<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
*@ORM\Entity
 * @ORM\Table(name="manufacturer")
 **/


class Manufacturer
{

    /**
    *@ORM\id
     *@ORM\Column(type="integer")
     *@ORM\GeneratesValue
     ***/

private $id;
/**
*@ORM\Column(type="string")
 */
private $name;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="manufacturer")
     */

private $products;



}