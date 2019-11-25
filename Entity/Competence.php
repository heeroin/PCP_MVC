<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="competence")
 */

class Competence
{
   /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
      * @ORM\Column(type="string", nullable=true) 
      */
    protected $code;
    /**
      * @ORM\Column(type="string") 
      */
    protected $Lib;  

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code.
     *
     * @param string $code
     *
     * @return Competence
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set lib.
     *
     * @param string $lib
     *
     * @return Competence
     */
    public function setLib($lib)
    {
        $this->Lib = $lib;

        return $this;
    }

    /**
     * Get lib.
     *
     * @return string
     */
    public function getLib()
    {
        return $this->Lib;
    }  
}
