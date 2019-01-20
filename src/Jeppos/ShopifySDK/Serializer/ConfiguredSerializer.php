<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Serializer;

use Consistence\JmsSerializer\Enum\EnumSerializerHandler;
use Jeppos\ShopifySDK\EventSubscriber\CustomerSubscriber;
use Jeppos\ShopifySDK\EventSubscriber\InventoryItemSubscriber;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class ConfiguredSerializer
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer = null)
    {
        if ($serializer === null) {
            $serializer = SerializerBuilder::create()
                ->addDefaultHandlers()
                ->configureHandlers(function (HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new EnumSerializerHandler());
                })
                ->configureListeners(function (EventDispatcher $dispatcher) {
                    $dispatcher->addSubscriber(new CustomerSubscriber());
                    $dispatcher->addSubscriber(new InventoryItemSubscriber());
                })
                ->build()
            ;
        }

        $this->serializer = $serializer;
    }

    /**
     * @param array $array
     * @param string $className
     *
     * @return mixed
     */
    public function deserialize(array $array, string $className)
    {
        $context = DeserializationContext::create();
        $context->setGroups(['get']);

        return $this->serializer->fromArray($array, $className, $context);
    }

    /**
     * @param array $array
     * @param string $className
     *
     * @return array
     */
    public function deserializeList(array $array, string $className): array
    {
        return array_map(
            function ($response) use ($className) {
                $context = DeserializationContext::create();
                $context->setGroups(['get']);

                return $this->serializer->fromArray($response, $className, $context);
            },
            $array
        );
    }

    /**
     * @param $object
     * @param null|string $key
     * @param array $groups
     *
     * @return string
     */
    public function serialize($object, ?string $key, array $groups): string
    {
        $serializationContent = SerializationContext::create();
        $serializationContent->setGroups($groups);

        $serializedObject = $this->serializer->serialize($object, 'json', $serializationContent);

        if ($key === null) {
            return $serializedObject;
        }

        return '{"' . $key . '":' . $serializedObject . '}';
    }
}
