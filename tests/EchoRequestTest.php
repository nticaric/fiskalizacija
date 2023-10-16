<?php

use Nticaric\Fiskalizacija\EchoRequest;
use Nticaric\Fiskalizacija\SoapClient;
use PHPUnit\Framework\TestCase;

class EchoRequestTest extends TestCase
{
    public function testMakeEchoRequest()
    {
        $message = "proizvoljan tekst";

        $echoRequest = new EchoRequest($message);
        $xml         = $echoRequest->toXML();

        $soapClient = new SoapClient("https://cistest.apis-it.hr:8449/FiskalizacijaServiceTest");
        $res        = $soapClient->send($xml);

        $this->assertEquals($message, $res->body());
    }
}
