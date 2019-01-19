<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\EventSubscriber;

use Jeppos\ShopifySDK\Model\InventoryItem;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\JsonSerializationVisitor;

class InventoryItemSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            ['event' => 'serializer.post_serialize', 'method' => 'postSerialize', 'class' => InventoryItem::class],
        ];
    }

    /**
     * @param ObjectEvent $event
     */
    public function postSerialize(ObjectEvent $event): void
    {
        /** @var JsonSerializationVisitor $visitor */
        $visitor = $event->getVisitor();
        /** @var InventoryItem $object */
        $object = $event->getObject();

        if ($object->getCost() === null) {
            $visitor->setData('cost', null);
        }
    }
}
