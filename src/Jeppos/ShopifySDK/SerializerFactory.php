<?php

namespace Jeppos\ShopifySDK;

use Consistence\JmsSerializer\Enum\EnumSerializerHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

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
