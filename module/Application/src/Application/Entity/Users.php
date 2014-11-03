<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="fk_users_title", columns={"title"})})
 * @ORM\Entity
 */
class Users implements JsonSerializable
{
    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }
    
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
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=45, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=45, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=45, nullable=true)
     */
    private $tel;

    /**
     * @var \Application\Entity\Titles
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Titles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="title", referencedColumnName="title")
     * })
     */
    private $title;

    /**
     *
     * @var type 
     * @ORM\ManyToMany(targetEntity="Application\Entity\Sessions", inversedBy="users")
     */
    private $sessions;

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
     * Set address
     *
     * @param string $address
     * @return Users
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

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

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Users
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set title
     *
     * @param \Application\Entity\Titles $title
     * @return Users
     */
    public function setTitle(\Application\Entity\Titles $title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return \Application\Entity\Titles 
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function addSession(Sessions $session)
    {
        $this->sessions->add($session);
        return $this;
    }
    
    public function jsonSerialize()
    {
        $values = get_object_vars($this);
        unset($values['sessions']);
        return $values;
    }
}
