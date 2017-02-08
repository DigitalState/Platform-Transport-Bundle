<?php

namespace Ds\Bundle\TransportBundle\Model;

use Oro\Bundle\UserBundle\Entity\User;

use Ds\Bundle\EntityBundle\Entity\Attribute;

/**
 * Class Message
 */
class Message
{
    use Attribute\Data;

    /**
     * @var string
     */
    protected $to; # region accessors

    /**
     * Set to
     *
     * @param string $to
     * @return \Ds\Bundle\TransportBundle\Model\Message
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return string
     */
    public function getTo()
    {
        return $this->to;
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

    /**
     * @var \Oro\Bundle\UserBundle\Entity\User
     */
    protected $user; # region accessors

    /**
     * Set user
     *
     * @param \Oro\Bundle\UserBundle\Entity\User $user
     * @return \Ds\Bundle\TransportBundle\Model\Message
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Oro\Bundle\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    # endregion

    /**
     * @var string
     */
    protected $template; # region accessors

    /**
     * Set template
     *
     * @param string $template
     * @return object
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    # endregion

}
