<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscriptions
 *
 * @ORM\Table(name="subscriptions", indexes={@ORM\Index(name="users", columns={"iduser"}), @ORM\Index(name="fk_subscriptions_venues", columns={"idvenue"}), @ORM\Index(name="fk_subscription_course", columns={"idcourse"})})
 * @ORM\Entity
 */
class Subscriptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="paymentid", type="integer", nullable=true)
     */
    private $paymentid;

    /**
     * @var \Application\Entity\Venues
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Application\Entity\Venues")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idvenue", referencedColumnName="id")
     * })
     */
    private $idvenue;

    /**
     * @var \Application\Entity\Users
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Application\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var \Application\Entity\Courses
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Application\Entity\Courses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcourse", referencedColumnName="id")
     * })
     */
    private $idcourse;



    /**
     * Set paymentid
     *
     * @param integer $paymentid
     * @return Subscriptions
     */
    public function setPaymentid($paymentid)
    {
        $this->paymentid = $paymentid;

        return $this;
    }

    /**
     * Get paymentid
     *
     * @return integer 
     */
    public function getPaymentid()
    {
        return $this->paymentid;
    }

    /**
     * Set idvenue
     *
     * @param \Application\Entity\Venues $idvenue
     * @return Subscriptions
     */
    public function setIdvenue(\Application\Entity\Venues $idvenue)
    {
        $this->idvenue = $idvenue;

        return $this;
    }

    /**
     * Get idvenue
     *
     * @return \Application\Entity\Venues 
     */
    public function getIdvenue()
    {
        return $this->idvenue;
    }

    /**
     * Set iduser
     *
     * @param \Application\Entity\Users $iduser
     * @return Subscriptions
     */
    public function setIduser(\Application\Entity\Users $iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Application\Entity\Users 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idcourse
     *
     * @param \Application\Entity\Courses $idcourse
     * @return Subscriptions
     */
    public function setIdcourse(\Application\Entity\Courses $idcourse)
    {
        $this->idcourse = $idcourse;

        return $this;
    }

    /**
     * Get idcourse
     *
     * @return \Application\Entity\Courses 
     */
    public function getIdcourse()
    {
        return $this->idcourse;
    }
}
