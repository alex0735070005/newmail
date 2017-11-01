<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\User;

/**
 * Ttn
 *
 * @ORM\Table(name="ttn")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TtnRepository")
 */
class Ttn
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true, length=11)
     */

    private $user_id;


    /**
     * @var string
     *
     * @ORM\Column(name="ttn_number", type="string", unique=true, length=255)
     */
    private $ttn_number;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;

    /**
     * @var string
     *
     * @ORM\Column(name="payer_type", type="string", length=100)
     */
    private $payer_type;

    /**
     * @var string
     *
     * @ORM\Column(name="city_sender", type="string", length=100)
     */
    private $city_sender;

    /**
     * @var string
     *
     * @ORM\Column(name="city_recipient", type="string", length=100)
     */
    private $city_recipient;

    /**
     * @var string
     *
     * @ORM\Column(name="warehouse_recipient", type="string", length=255)
     */
    private $warehouse_recipient;

    /**
     * @var int
     *
     * @ORM\Column(name="recipient_number", type="integer", length=11)
     */
    private $recipient_number;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date_add", type="date")
     */
    private $date_add;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_up", type="datetime")
     */
    private $date_up;
    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scheduled_delivery_date", type="datetime")
     */
    private $scheduled_delivery_date;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=100)
     */
    private $payment_method;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=100)
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(name="status_code", type="integer", length=5)
     */
    private $status_code;
    
     /**
     * Many Ttns have One User.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="ttns")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set user
     *
     * @return Ttn
     */
    public function setUser(User $User)
    {
        $this->user = $User;

        return $this;
    }

     /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set ttnNumber
     *
     * @param string $ttnNumber
     *
     * @return Ttn
     */
    public function setTtnNumber($ttnNumber)
    {
        $this->ttn_number = $ttnNumber;

        return $this;
    }

    /**
     * Get ttnNumber
     *
     * @return string
     */
    public function getTtnNumber()
    {
        return $this->ttn_number;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Ttn
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }
    
    /**
     * Set dateUp
     *
     * @param \DateTime $dateUp
     *
     * @return Ttn
     */
    public function setDateUp()
    {
        $this->date_up = new \DateTime("now");

        return $this;
    }

    /**
     * Get date_up
     *
     * @return \DateTime
     */
    public function getDateUp()
    {
        return $this->date_up;
    }

    /**
     * Set payerType
     *
     * @param string $payerType
     *
     * @return Ttn
     */
    public function setPayerType($payerType)
    {
        $this->payer_type = $payerType;

        return $this;
    }

    /**
     * Get payerType
     *
     * @return string
     */
    public function getPayerType()
    {
        return $this->payer_type;
    }

    /**
     * Set citySender
     *
     * @param string $citySender
     *
     * @return Ttn
     */
    public function setCitySender($citySender)
    {
        $this->city_sender = $citySender;

        return $this;
    }

    /**
     * Get citySender
     *
     * @return string
     */
    public function getCitySender()
    {
        return $this->city_sender;
    }

    /**
     * Set cityRecipient
     *
     * @param string $cityRecipient
     *
     * @return Ttn
     */
    public function setCityRecipient($cityRecipient)
    {
        $this->city_recipient = $cityRecipient;

        return $this;
    }

    /**
     * Get cityRecipient
     *
     * @return string
     */
    public function getCityRecipient()
    {
        return $this->city_recipient;
    }

    /**
     * Set warehouseRecipient
     *
     * @param string $warehouseRecipient
     *
     * @return Ttn
     */
    public function setWarehouseRecipient($warehouseRecipient)
    {
        $this->warehouse_recipient = $warehouseRecipient;

        return $this;
    }

    /**
     * Get warehouseRecipient
     *
     * @return string
     */
    public function getWarehouseRecipient()
    {
        return $this->warehouse_recipient;
    }

    /**
     * Set recipientNumber
     *
     * @param integer $recipientNumber
     *
     * @return Ttn
     */
    public function setRecipientNumber($recipientNumber)
    {
        $this->recipient_number = $recipientNumber;

        return $this;
    }

    /**
     * Get recipientNumber
     *
     * @return int
     */
    public function getRecipientNumber()
    {
        return $this->recipient_number;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     *
     * @return Ttn
     */
    public function setDateAdd($dateAdd)
    {
        $this->date_add = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime
     */
    public function getDateAdd()
    {
        return $this->date_add;
    }

    /**
     * Set scheduledDeliveryDate
     *
     * @param \DateTime $scheduledDeliveryDate
     *
     * @return Ttn
     */
    public function setScheduledDeliveryDate($scheduledDeliveryDate)
    {
        $this->scheduled_delivery_date = $scheduledDeliveryDate;

        return $this;
    }

    /**
     * Get scheduledDeliveryDate
     *
     * @return \DateTime
     */
    public function getScheduledDeliveryDate()
    {
        return $this->scheduled_delivery_date;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     *
     * @return Ttn
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->payment_method = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Ttn
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statusCode
     *
     * @param integer $statusCode
     *
     * @return Ttn
     */
    public function setStatusCode($statusCode)
    {
        $this->status_code = $statusCode;

        return $this;
    }

    /**
     * Get statusCode
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }
    
    public function __construct() {
        $this->date_add = new \DateTime("now");
        $this->date_up  = new \DateTime("now");
    }
}

