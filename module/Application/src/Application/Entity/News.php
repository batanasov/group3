<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="Application\Repository\NewsRepository")
 */
class News implements JsonSerializable
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \Application\Entity\Administrators
     * @ORM\ManyToOne(targetEntity="Application\Entity\Administrators", inversedBy="news")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author", referencedColumnName="username")
     * })
     */
    private $author;

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
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

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
     * Set content
     *
     * @param string $content
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return News
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set iduser
     *
     * @param \Application\Entity\Users $iduser
     * @return News
     */
    public function setUser(\Application\Entity\Administrators $user = null)
    {
        $this->author = $user;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Application\Entity\Administrators 
     */
    public function getUser()
    {
        return $this->author;
    }

    public function jsonSerialize() {
        $values = get_object_vars($this);
        $values['date'] = $values['date']->format('d/m/Y');
        $values['user'] = $values['author'];
        unset($values['author']);
        return $values;
    }

}
