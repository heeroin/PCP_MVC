<?php

namespace Entity;

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
     * @ORM\ManyToMany(targetEntity="Competence", inversedBy="taches")
     */
    private $competences;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competences = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Tache
     */
    public function setDate($date)
    {
        $this->Date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Tache
     */
    public function setDescription($description)
    {
        $this->Description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Add competence.
     *
     * @param \Entity\Competence $competence
     *
     * @return Tache
     */
    public function addCompetence(\Entity\Competence $competence)
    {
        $this->competences[] = $competence;

        return $this;
    }
    public function addCompetences($competences)
    {
      foreach ($competences as $competence) {
        $this->addCompetence($competence);
      }
      return($this);
    }

    /**
     * Remove competence.
     *
     * @param \Entity\Competence $competence
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCompetence(\Entity\Competence $competence)
    {
        return $this->competences->removeElement($competence);
    }

    /**
     * Get competences.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetences()
    {
        return $this->competences;
    }
}
