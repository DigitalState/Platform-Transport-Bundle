<?php

namespace Ds\Bundle\TransportBundle\Model;

use Ds\Bundle\EntityBundle\Entity\Attribute;

/**
 * Class Message
 */
class Message
{
    const STATUS_UNKNOWN = 'unknown';

    const STATUS_QUEUED = 'queued';

    const STATUS_SENDING = 'sending';

    const STATUS_SENT = 'sent';

    const STATUS_CANCELLED = 'cancelled';

    const STATUS_OPEN = 'open';

    const STATUS_FAILED = 'failed';

    use Attribute\SentAt;
    use \Ds\Bundle\TransportBundle\Entity\Attribute\DeliveryStatus;

    protected $message_uid = ''; #region accessors

    /**
     * @return string
     */
    public function getMessageUID()
    {
        return $this->message_uid;
    }

    /**
     * @param string $message_uid
     *
     * @return Message
     */
    public function setMessageUID(string $message_uid)
    {
        $this->message_uid = $message_uid;

        return $this;
    }
    # endregion


    /**
     * @var mixed
     */
    protected $recipient; # region accessors

    /**
     * Set recipient
     *
     * @param mixed $recipient
     *
     * @return \Ds\Bundle\TransportBundle\Model\Message
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get recipient
     *
     * @return mixed
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    # endregion

    /**
     * @var string
     */
    protected $from; # region accessors

    /**
     * Set from
     *
     * @param string $from
     *
     * @return \Ds\Bundle\TransportBundle\Model\Message
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    # endregion

    /**
     * @var string
     */
    protected $title; # region accessors

    /**
     * Set title
     *
     * @param string $title
     *
     * @return \Ds\Bundle\TransportBundle\Model\Message
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

    # endregion

    /**
     * @var string
     */
    protected $content; # region accessors

    /**
     * Set content
     *
     * @param string $content
     *
     * @return \Ds\Bundle\TransportBundle\Model\Message
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

    # endregion
}
