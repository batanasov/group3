<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

/**
 * Courses
 *
 * @ORM\Table(name="sessions")
 * @ORM\Entity(repositoryClass="Application\Repository\SessionRepository")
 */
class Sessions implements JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Application\Entity\Courses
     * @ORM\ManyToOne(targetEntity="Application\Entity\Courses", inversedBy="sessions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcourse", referencedColumnName="id")
     * })
     */
    private $course;
    
    /**
     * 
     * @return \Application\Entity\Courses
     */
    public function getCourse() {
        return $this->course;
    }
    
    /**
     * 
     * @param \Application\Entity\Courses $course
     */
    public function setCourse(Courses $course) {
        $this->course = $course;
        return $this;
    }
    
    /**
     * @var \Application\Entity\Venues
     * @ORM\ManyToOne(targetEntity="Application\Entity\Venues", inversedBy="sessions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idvenue", referencedColumnName="id")
     * })
     */
    private $venue;
    
    /**
     * 
     * @return \Application\Entity\Venues
     */
    public function getVenue() {
        return $this->venue;
    }
    
    /**
     * 
     * @param \Application\Entity\Venues $venue
     */
    public function setVenue(Venues $venue) {
        $this->venue = $venue;
        return $this;
    }
    
        /**
     * 
     * @return DateTime
     */
    public function getDateStart() {
        return $this->dateStart;
    }
    
    /**
     * 
     * @param DateTime $dateStart
     */
    public function setDateStart(DateTime $dateStart) {
        $this->dateStart = $dateStart;
        return $this;
    }
    /**
     * 
     * @return DateTime
     */
    public function getDateEnd() {
        return $this->dateEnd;
    }
    
    /**
     * 
     * @param DateTime $dateEnd
     */
    public function setDateEnd(DateTime $dateEnd) {
        $this->dateEnd = $dateEnd;
        return $this;
    }    
    
    /**
     * 
     * @param boolean $cancelled
     */
    public function setCancelled($cancelled) {
        $this->cancelled = $cancelled;
        return $this;
    }
    /**
     * 
     * @return boolean
     */
    public function getCancelled() {
        return $this->cancelled;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=false)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=false)
     */
    private $dateEnd;
    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $cancelled = false;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     *
     * @var type 
     * @ORM\ManyToMany(targetEntity="Application\Entity\Users", mappedBy="sessions")
     */
    private $users;

    public function __construct() {
        $this->dateStart = new DateTime();
        $this->dateEnd = new DateTime();
        $this->users = new ArrayCollection();
    }
    
    /**
     * 
     */
    public function jsonSerialize()
    {   
        $values = get_object_vars($this);
        $values['date'] = "From {$values['dateStart']->format('d/m/Y')} to {$values['dateEnd']->format('d/m/Y')}";
        $values['duration'] = $values['dateStart']->diff($values['dateEnd'])->format('%d days') + 1;
        $values['users'] = $this->users->toArray();
        $values['dateStart'] = $values['dateStart']->format('d/m/Y');
        $values['dateEnd'] = $values['dateEnd']->format('d/m/Y');
        unset($values['course']);
        return $values;
    }
}
