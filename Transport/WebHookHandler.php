<?php

namespace Ds\Bundle\TransportBundle\Transport;

use Ds\Bundle\TransportBundle\Entity\WebHookData;
use Ds\Bundle\TransportBundle\Model\Message;
use Ds\Bundle\TransportBundle\Entity\Profile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface Transport
 */
interface WebHookHandler
{
    /**
     * @param Request $request
     *
     * @return string[]|null
     */
    public function parseRequest(Request  $request);


    /**
     * @param WebHookData $webHookData
     *
     * @return string|null
     */
    public function getMessageUID(WebHookData $webHookData);


    /**
     * @param WebHookData $webHookData
     *
     * @return bool
     */
    public function createEvent(WebHookData $webHookData);
}
