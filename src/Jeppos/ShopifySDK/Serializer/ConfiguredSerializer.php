<?php

namespace Jeppos\ShopifySDK\Serializer;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;

class ConfiguredSerializer
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * Serializer constructor.
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param array $array
     * @param string $className
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
     * @param string $key
     * @param array $groups
     * @return string
     */
    public function serialize($object, string $key, array $groups): string
    {
        $serializationContent = SerializationContext::create();
        $serializationContent->setGroups($groups);
        $serializationContent->setSerializeNull(false);

        $serializedObject = $this->serializer->serialize($object, 'json', $serializationContent);

        return '{"' . $key . '":' . $serializedObject . '}';
    }
}
