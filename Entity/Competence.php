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
      * @ORM\Column(type="string") 
      */
    protected $code;
    /**
      * @ORM\Column(type="string") 
      */
    protected $Lib;
  
    /**
     * @ORM\ManyToMany(targetEntity="Entity\Tache", inversedBy="competences")
     */
    protected $taches;

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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taches = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tach.
     *
     * @param \Entity\Tache $tach
     *
     * @return Competence
     */
    public function addTach(\Entity\Tache $tach)
    {
        $this->taches[] = $tach;

        return $this;
    }

    /**
     * Remove tach.
     *
     * @param \Entity\Tache $tach
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTach(\Entity\Tache $tach)
    {
        return $this->taches->removeElement($tach);
    }

    /**
     * Get taches.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTaches()
    {
        return $this->taches;
    }
}
