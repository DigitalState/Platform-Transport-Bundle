<?php

namespace Ds\Bundle\TransportBundle\Model;

use Ds\Bundle\CommunicationBundle\Entity\Message as MessageEntity;
use Ds\Bundle\EntityBundle\Entity\Attribute;

/**
 * Class AbstractMessageEvent
 */
abstract class AbstractMessageEvent
{
    use Attribute\CreatedAt;

    public function __construct($type)
    {
        $this->setEventType($type);
    }

    /**
     * @var \DateTime
     */
    protected $occurredAt; # region accessors

    /**
     * Get created at date
     *
     * @return \DateTime
     */
    public function getOccurredAt()
    {
        return $this->occurredAt;
    }

    /**
     * Set created at date
     *
     * @param \DateTime $createdAt
     * @return object
     */
    public function setOccurredAt(\DateTime $occurredAt = null)
    {
        $this->occurredAt = $occurredAt;

        return $this;
    }

    /**
     * @var MessageEntity
     */
    protected $message;

    /**
     * @return MessageEntity
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param MessageEntity $message
     *
     * @return AbstractMessageEvent
     */
    public function setMessage(MessageEntity $message)
    {
        $this->message = $message;

        return $this;
    }


    /**
     * @var string
     */
    protected $eventType = '';

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     *
     * @return AbstractMessageEvent
     */
    public function setEventType(string $eventType)
    {
        $this->eventType = $eventType;

        return $this;
    }

    # endregion
}
