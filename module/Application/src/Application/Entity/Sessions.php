<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
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
     */
    public function jsonSerialize()
    {   
        $values = get_object_vars($this);
        $values['date'] = "From {$values['dateStart']->format('d/m/Y')} to {$values['dateEnd']->format('d/m/Y')}";
        $values['duration'] = $values['dateStart']->diff($values['dateEnd'])->format('%d days');
        unset($values['dateStart']);
        unset($values['dateEnd']);
        unset($values['course']);
        return $values;
    }
}
