# Platform-Transport-Bundle

The Transport bundle provides the foundation and common api for sending messages programmatically. It introduces two new entities to the system: Transport and Profile.

## Table of Contents

- [Transport Definition](#transport-definition)
- [Profile Definition](#profile-definition)
- [Todo](#todo)

## Transport Definition

Transports are in charge of sending messages to recipients. For example, the developer could define a Transport that knows how to send messages via Twilio SMS.

Internally, each Transport are associated with an actual code implementation. To create a Transport class implementation, the developer needs to implement the [Transport Interface](Transport/Transport.php).

```php
<?php

namespace Gov\Bundle\DemoBundle\Transport\Sms;

use Ds\Bundle\TransportBundle\Transport\Transport;
use Ds\Bundle\TransportBundle\Model\Message;
use Ds\Bundle\TransportBundle\Entity\Profile;
use UnexpectedValueException;

class TwilioTransport implements Transport
{
    // ...
    
    public function send(Message $message, Profile $profile = null)
    {
        // Use Twilio SDK to send message.
        // ...
        $success = true;
        //

        if (!$success) {
            throw new UnexpectedValueException('Message could not be sent.');
        }

        return $this;
    }
}
```

Also, a Transport class implementation needs to be registered as a service in the Symfony Service Container and be tagged with the `ds.transport` tag.

```yml
services:
    gov.demo.transport.sms.twilio:
        class: Gov\Bundle\DemoBundle\Transport\Sms\TwilioTransport
        tags:
            - { name: ds.transport, implementation: sms.twilio }
```

*The `implementation` attribute is a string value that identifies programmatically a Transport and should be unique.*

## Profile Definition

A Profile is associated to a Transport and defines the configurations needed by that Transport. Configurations such as hostname, username, password, api key, secret key, etc. For example, a manager could create a Profile via the administrative interface, associate it with the Twilio Transport created previously and provide the needed configurations such as the Twilio api key and credentials.

It is possible to create multiple Profiles for a single Transport. The manager may eventually choose which Profile to use when sending a specific message.

## Todo
