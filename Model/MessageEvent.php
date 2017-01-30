<?php

namespace Ds\Bundle\TransportBundle\Model;

use Ds\Bundle\EntityBundle\Entity\Attribute;

/**
 * Class MessageEvent
 */
class MessageEvent extends AbstractMessageEvent
{
    public function __construct($type )
    {
        parent::__construct($type);
    }
}
