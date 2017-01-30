<?php

namespace Ds\Bundle\TransportBundle\Transport\Email;

use Ds\Bundle\TransportBundle\Transport\AbstractTransport;
use Ds\Bundle\TransportBundle\Model\Message;
use Ds\Bundle\TransportBundle\Entity\Profile;
use Oro\Bundle\EmailBundle\Model\EmailHolderInterface;
use Oro\Bundle\LocaleBundle\Model\FirstNameInterface;
use Oro\Bundle\LocaleBundle\Model\LastNameInterface;
use UnexpectedValueException;

/**
 * Class MailTransport
 */
class MailTransport extends AbstractTransport
{
    /**
     * {@inheritdoc}
     */
    public function send(Message $message, Profile $profile = null)
    {
        $profile = $profile ?: $this->profile;
        $message->setFrom($profile->getData('from'));

        /** @var EmailHolderInterface|FirstNameInterface|LastNameInterface $recipient */
        $recipient = $message->getRecipient();

        $success = mail($recipient->getEmail(), $message->getTitle(), $message->getContent(), 'From: ' . $message->getFrom());


        if ($success) {
            $message->setDeliveryStatus(Message::STATUS_SENT);
            $message->setSentAt(new \DateTime);
        }
        else
        {
            $message->setDeliveryStatus(Message::STATUS_FAILED);
        }


        return $message;
    }
}
