<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titles
 *
 * @ORM\Table(name="titles")
 * @ORM\Entity
 */
class Titles
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $title;

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set title
     * 
     * @param string $title
     * @return \Application\Entity\Titles
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}
