<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Users
 *
 * @ORM\Table(name="oauth_users", indexes={@ORM\Index(name="PRIMARY", columns={"username"})})
 * @ORM\Entity
 */
class Administrators implements JsonSerializable
{
    public function __construct()
    {
        $this->news = new ArrayCollection();
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @ORM\Id
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=2000, nullable=false)
     */
    private $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     *
     * @var type 
     * @ORM\OneToMany(targetEntity="Application\Entity\News", mappedBy="author")
     */
    private $news;

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Users
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    public function addNews(News $news)
    {
        $this->news->add($news);
        return $this;
    }
    
    public function jsonSerialize()
    {   
        return [
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname
        ];
    }
}
