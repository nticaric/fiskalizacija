<?php

use Nticaric\Fiskalizacija\Business\Address;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    public function testAddressClass()
    {
    	$address = new Address;
    	$address->street = "Sv. Mateja";
    	$address->houseNumber = "19";
    	$address->extrahouseNumber = "";
    	$address->zipCode = "10000";
    	$address->settlement = "Zagreb";
    	$address->city = "Zagreb";

    	$res = $address->toXML();

    	$this->assertStringEqualsFile('./tests/xml/address.xml', $res);
    }
}