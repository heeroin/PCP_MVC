<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tache_MVC")
 */

class Tache
{
   /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
      * @ORM\Column(type="date") 
      */
    protected $Date;
    /**
      * @ORM\Column(type="string") 
      */
    protected $Description;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}