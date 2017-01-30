<?php

namespace Ds\Bundle\TransportBundle\Model;

use Ds\Bundle\EntityBundle\Entity\Attribute;

/**
 * Class Message
 */
class Message
{

    /**
     * Message is in a unknown state, this should probably cause some asserts to fire...
     */
    const STATUS_UNKNOWN = '';

    /**
     * The message has been added as being ready to be process and delivered
     * Next steps : PROCESSING, FAILED, CANCELLED
     */
    const STATUS_QUEUED = 'queued';

    /**
     * The message is currently being processed, either being generated, or given to the Transport
     * Next steps: SENDING, SENT, FAILED
     */
    const STATUS_PROCESSING = 'processing';

    /**
     * The message respondability is not in the hands of the Transport which is expected to deliver it
     * Next steps: SENT, FAILED
     */
    const STATUS_SENDING = 'sending';

    /**
     * The message was sent, and the Transport confirmed that the message has left the Transport servers
     * Next steps:  OPEN, FAILED
     */
    const STATUS_SENT = 'sent';

    /**
     * The delivery of this message has been cancelled for some reason.
     * Next steps:   This is a final state
     */
    const STATUS_CANCELLED = 'cancelled';

    /**
     * The message was opened by the recipient,
     * Next steps:   This is a final state
     */
    const STATUS_OPEN = 'open';

    /**
     * The generation or delivery has failed, or the message bounced. AKA The recipient did not received the message
     * Next steps:   This is a final state
     */
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
