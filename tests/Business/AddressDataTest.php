<?php

use Nticaric\Fiskalizacija\Business\Address;
use Nticaric\Fiskalizacija\Business\AddressData;

class AddressDataTest extends \PHPUnit_Framework_TestCase
{
    public function testAddressClass()
    {
    	$address = new Address;
    	$address->street = "Sv. Mateja";
    	$address->houseNumber = "19";
    	$address->extrahouseNumber = "-";
    	$address->zipCode = "10000";
    	$address->settlement = "Zagreb";
    	$address->city = "Zagreb";

        $addressData = new AddressData();
        $addressData->setAddress($address);
        $res = $addressData->toXML();

    	$this->assertStringEqualsFile('./tests/xml/address_data.xml', $res);
    }
}