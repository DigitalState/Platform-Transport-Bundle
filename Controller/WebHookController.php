<?php

namespace Ds\Bundle\TransportBundle\Controller;

use Ds\Bundle\AdminBundle\Controller\BreadController;
use Ds\Bundle\TransportBundle\Entity\Profile;

use Ds\Bundle\TransportBundle\Entity\WebHookData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twilio\Rest\Api\V2010\Account\MessageList;

/**
 * Class ProfileController
 *
 * @Route("/transport/profile/webhook")
 */
class WebHookController extends Controller
{

    /**
     * View action
     *
     * @param \Ds\Bundle\TransportBundle\Entity\Profile $entity
     * @return Response
     * @Route("/{id}", requirements={"id"="\d+"})
     */
    public function viewAction(Request $request, Profile $profile)
    {
        $manager = $this->get('ds.transport.manager.webhook');


        $manager->handleWehHook($profile, $request);

        return new Response();
    }
}
