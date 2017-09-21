<?php

namespace Jeppos\ShopifyApiClient;

use Consistence\JmsSerializer\Enum\EnumSerializerHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class SerializerFactory
 * @package Jeppos\ShopifyApiClient
 */
class SerializerFactory
{
    /**
     * @return Serializer
     */
    public static function create(): Serializer
    {
        return SerializerBuilder::create()
            ->addDefaultHandlers()
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new EnumSerializerHandler());
            })
            ->build();
    }
}
