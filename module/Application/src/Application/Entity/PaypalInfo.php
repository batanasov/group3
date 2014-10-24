<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaypalInfo
 *
 * @ORM\Table(name="paypal_info", indexes={@ORM\Index(name="fk_paypal_payments", columns={"paymentId"})})
 * @ORM\Entity
 */
class PaypalInfo
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
     * @ORM\Column(name="buyer_email", type="string", length=255, nullable=false)
     */
    private $buyerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="txnid", type="string", length=30, nullable=false)
     */
    private $txnid;

    /**
     * @var string
     *
     * @ORM\Column(name="mc_gross", type="string", length=6, nullable=false)
     */
    private $mcGross;

    /**
     * @var string
     *
     * @ORM\Column(name="paymentstatus", type="string", length=15, nullable=false)
     */
    private $paymentstatus;

    /**
     * @var string
     *
     * @ORM\Column(name="custom", type="string", length=255, nullable=false)
     */
    private $custom;

    /**
     * @var integer
     *
     * @ORM\Column(name="paymentId", type="integer", nullable=false)
     */
    private $paymentid;

    /**
     * @var string
     *
     * @ORM\Column(name="receiver_email", type="string", length=255, nullable=false)
     */
    private $receiverEmail;



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
     * Set buyerEmail
     *
     * @param string $buyerEmail
     * @return PaypalInfo
     */
    public function setBuyerEmail($buyerEmail)
    {
        $this->buyerEmail = $buyerEmail;

        return $this;
    }

    /**
     * Get buyerEmail
     *
     * @return string 
     */
    public function getBuyerEmail()
    {
        return $this->buyerEmail;
    }

    /**
     * Set txnid
     *
     * @param string $txnid
     * @return PaypalInfo
     */
    public function setTxnid($txnid)
    {
        $this->txnid = $txnid;

        return $this;
    }

    /**
     * Get txnid
     *
     * @return string 
     */
    public function getTxnid()
    {
        return $this->txnid;
    }

    /**
     * Set mcGross
     *
     * @param string $mcGross
     * @return PaypalInfo
     */
    public function setMcGross($mcGross)
    {
        $this->mcGross = $mcGross;

        return $this;
    }

    /**
     * Get mcGross
     *
     * @return string 
     */
    public function getMcGross()
    {
        return $this->mcGross;
    }

    /**
     * Set paymentstatus
     *
     * @param string $paymentstatus
     * @return PaypalInfo
     */
    public function setPaymentstatus($paymentstatus)
    {
        $this->paymentstatus = $paymentstatus;

        return $this;
    }

    /**
     * Get paymentstatus
     *
     * @return string 
     */
    public function getPaymentstatus()
    {
        return $this->paymentstatus;
    }

    /**
     * Set custom
     *
     * @param string $custom
     * @return PaypalInfo
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;

        return $this;
    }

    /**
     * Get custom
     *
     * @return string 
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * Set paymentid
     *
     * @param integer $paymentid
     * @return PaypalInfo
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
     * Set receiverEmail
     *
     * @param string $receiverEmail
     * @return PaypalInfo
     */
    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;

        return $this;
    }

    /**
     * Get receiverEmail
     *
     * @return string 
     */
    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }
}
