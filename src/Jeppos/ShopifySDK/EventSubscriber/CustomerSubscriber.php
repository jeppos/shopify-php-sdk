<?php

namespace Jeppos\ShopifySDK\EventSubscriber;

use Jeppos\ShopifySDK\Model\Customer;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\JsonSerializationVisitor;

class CustomerSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            ['event' => 'serializer.post_serialize', 'method' => 'postSerialize', 'class' => Customer::class],
        ];
    }

    /**
     * @param ObjectEvent $event
     */
    public function postSerialize(ObjectEvent $event): void
    {
        /** @var JsonSerializationVisitor $visitor */
        $visitor = $event->getVisitor();
        /** @var Customer $object */
        $object = $event->getObject();

        if ($object->getNote() === null) {
            $visitor->setData('note', null);
        }

        if ($object->getMultipassIdentifier() === null) {
            $visitor->setData('multipass_identifier', null);
        }
    }
}
