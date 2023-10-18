<?php

use Nticaric\Fiskalizacija\Generators\EchoRequest;
use Nticaric\Fiskalizacija\SoapClient;
use Nticaric\Fiskalizacija\XMLSerializer;
use PHPUnit\Framework\TestCase;

class EchoRequestTest extends TestCase
{
    public function testMakeEchoRequest()
    {
        $message = "proizvoljan tekst";

        $echoRequest = new EchoRequest($message);

        $serializer = new XMLSerializer($echoRequest);
        $xml        = $serializer->toXml();

        $soapClient  = new SoapClient("https://cistest.apis-it.hr:8449/FiskalizacijaServiceTest");
        $xmlEnvelope = $soapClient->addEnvelope($xml);

        $res = $soapClient->send($xmlEnvelope);

        $this->assertEquals($message, $res->body()->nodeValue);
    }
}
