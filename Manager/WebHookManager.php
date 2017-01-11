<?php

namespace Ds\Bundle\TransportBundle\Manager;

use Ds\Bundle\CommunicationBundle\Channel\Channel;
use Ds\Bundle\TransportBundle\Entity\WebHookData;
use Ds\Bundle\TransportBundle\Transport\Transport;
use Ds\Bundle\TransportBundle\Transport\WebHookHandler;
use Oro\Bundle\SoapBundle\Entity\Manager\ApiEntityManager;
use Doctrine\Common\Persistence\ObjectManager;
use Ds\Bundle\CommunicationBundle\Collection\ChannelCollection;
use Ds\Bundle\TransportBundle\Collection\TransportCollection;
use Ds\Bundle\CommunicationBundle\Entity\Message;
use Ds\Bundle\TransportBundle\Entity\Profile;
use DateTime;
use Psr\Log\AbstractLogger;
use Psr\Log\NullLogger;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MessageManager
 */
class WebHookManager
{


    /**
     * @var \Ds\Bundle\TransportBundle\Collection\TransportCollection
     */
    protected $transportCollection;

    /**
     * @var ObjectManager $om
     */
    protected $om;

    /** @var  AbstractLogger */
    private $logger;

    /**
     * Constructor
     *
     * @param \Doctrine\Common\Persistence\ObjectManager                  $om
     * @param \Ds\Bundle\CommunicationBundle\Collection\ChannelCollection $channelCollection
     */
    public function __construct(ObjectManager $om, TransportCollection $transportCollection)
    {
        $this->om                  = $om;
        $this->transportCollection = $transportCollection;
        $this->logger              = new NullLogger();
    }

    /**
     * @param AbstractLogger $logger
     *
     * @return $this
     */
    public function setLogger(AbstractLogger $logger)
    {
        $this->logger = $logger;

        return $this;

    }

    /**
     * @param Profile $profile
     *
     * @return WebHookHandler
     */
    public function getHandler(Profile $profile)
    {
        /** @var WebHookHandler $transport */
        $transport = $this->transportCollection->filter(function ($item) use ($profile)
        {
            return $item['implementation'] == $profile->getTransport()->getImplementation();
        })->first()['transport'];

        if ( !$transport)
            throw new \InvalidArgumentException(sprintf("There is no transport for the implementation  %s", $profile->getTransport()->getImplementation()));

        if ( !( $transport instanceof WebHookHandler ))
            throw new \InvalidArgumentException(sprintf("The transport '%s' does not implement'WebHookHandler' ", $profile->getTransport()->getTitle(), $profile->getTransport()->getImplementation()));

        return $transport;
    }

    public function handleWehHook(Profile $profile, Request $request)
    {
        $handler = $this->getHandler($profile);

        $hookData = $handler->parseRequest($request);

        if ($hookData === null)
            return;

        if ( !is_array($hookData))
            $hookData = [ $hookData ];

        /** @var WebHookData $webHook */
        foreach ($hookData as $data)
        {
            $webHook = new WebHookData();

            $webHook
                ->setProfile($profile)
                ->setOrganization($profile->getOrganization())
                ->setOwner($profile->getOwner())
                ->setData($data);


            $this->om->persist($webHook);
        }
        $this->om->flush();
    }


}
