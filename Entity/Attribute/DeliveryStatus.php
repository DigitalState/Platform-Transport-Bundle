<?php

namespace Ds\Bundle\TransportBundle\Entity\Attribute;


/**
 * Trait DeliveryStatus
 */
trait DeliveryStatus
{

    /**
     * @param $status
     *
     * @return bool
     */
    public static function isValidDeliveryStatus($status)
    {
        return $status == 'unknown'
            || $status == 'queued'
            || $status == 'sending'
            || $status == 'sent'
            || $status == 'open'
            || $status == 'cancelled'
            || $status == 'failed';
    }


    /**
     * @var string
     * @ORM\Column(name="delivery_status", type="string", length=255)
     */
    protected $deliveryStatus = 'unknown';  #region accessors

    /**
     * @return string
     */
    public function getDeliveryStatus(): string
    {
        return $this->deliveryStatus;
    }

    /**
     * @param string $deliveryStatus
     *
     * @return object
     */
    public function setDeliveryStatus(string $deliveryStatus)
    {
        if ( !self::isValidDeliveryStatus($deliveryStatus))
            throw new \InvalidArgumentException();
        $this->deliveryStatus = $deliveryStatus;

        return $this;
    }

    # endregion
}
