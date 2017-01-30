<?php

namespace Ds\Bundle\TransportBundle\Entity;

use Ds\Bundle\EntityBundle\Entity\Attribute;
use Oro\Bundle\OrganizationBundle\Entity\Ownership;

use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\ConfigField;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as ORMAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class WebHookData
 * @ORM\Entity
 * @ORM\Table(name="ds_transport_webhook_data")
 * @ORM\HasLifecycleCallbacks()
 */
class WebHookData
{
    use Attribute\Id;
    use Attribute\CreatedAt;
    use Attribute\UpdatedAt;
    use Attribute\Data;

    use Ownership\BusinessUnitAwareTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @var bool
     * @ORM\Column(name="processed" , type="boolean")
     */

    protected $processed = false; # region accessors

    /**
     * @return bool
     */
    public function isProcessed()
    {
        return $this->processed;
    }

    /**
     * @param bool $processed
     *
     * @return WebHookData
     */
    public function setProcessed(bool $processed)
    {
        $this->processed = $processed;

        return $this;
    }
    # endregion


    /**
     * @var \Ds\Bundle\TransportBundle\Entity\Profile
     * @ORM\ManyToOne(targetEntity="Ds\Bundle\TransportBundle\Entity\Profile")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    protected $profile; # region accessors

    /**
     * Set profile
     *
     * @param \Ds\Bundle\TransportBundle\Entity\Profile $profile
     * @return \Ds\Bundle\TransportBundle\Entity\WebHookData
     */
    public function setProfile(Profile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Ds\Bundle\TransportBundle\Entity\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    # endregion


}
