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
    public function validateInput(Request  $request);


    /**
     * @param WebHookData $webHookData
     *
     * @return bool
     */
    public function process(WebHookData $webHookData);
}
