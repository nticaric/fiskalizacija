<?php namespace Nticaric\Fiskalizacija;

use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;

class XMLSerializer
{
    protected $object;

    public function __construct($object)
    {
        $this->object = $object;
    }

    public function toXml()
    {
        $serializerBuilder = SerializerBuilder::create();
        $metaDataDir       = dirname(__DIR__) . '/src/Metadata';

        $serializerBuilder->addMetadataDir($metaDataDir, 'Nticaric\Fiskalizacija\Generators');
        $serializerBuilder->configureHandlers(function (HandlerRegistryInterface $handler) use ($serializerBuilder) {
            $serializerBuilder->addDefaultHandlers();
            $handler->registerSubscribingHandler(new BaseTypesHandler()); // XMLSchema List handling
            $handler->registerSubscribingHandler(new XmlSchemaDateHandler()); // XMLSchema date handling

            // $handler->registerSubscribingHandler(new YourhandlerHere());
        });

        $serializer = $serializerBuilder->build();

        return $serializer->serialize($this->object, 'xml');
    }
}
