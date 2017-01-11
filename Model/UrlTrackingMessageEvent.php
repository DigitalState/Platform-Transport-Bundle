<?php

namespace Ds\Bundle\TransportBundle\Model;

use Ds\Bundle\EntityBundle\Entity\Attribute;

/**
 * Class ClickMessageEvent
 */
class UrlTrackingMessageEvent extends MessageEvent
{
    public function __construct($type)
    {
        parent::__construct($type);
    }

    protected $targetLinkText = '';


    /**
     * @return string
     */
    public function getTargetLinkText()
    {
        return $this->targetLinkText;
    }

    /**
     * @param string $targetLinkText
     *
     * @return AbstractMessageEvent
     */
    public function setTargetLinkText(string $targetLinkText)
    {
        $this->targetLinkText = $targetLinkText;

        return $this;
    }

    protected $targetLinkUrl = '';

    /**
     * @return string
     */
    public function getTargetLinkUrl()
    {
        return $this->targetLinkUrl;
    }

    /**
     * @param string $targetLinkUrl
     *
     * @return AbstractMessageEvent
     */
    public function setTargetLinkUrl(string $targetLinkUrl)
    {
        $this->targetLinkUrl = $targetLinkUrl;

        return $this;
    }


    # endregion
}
