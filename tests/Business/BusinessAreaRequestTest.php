<?php

use Carbon\Carbon;
use Nticaric\Fiskalizacija\Business\Address;
use Nticaric\Fiskalizacija\Business\AddressData;
use Nticaric\Fiskalizacija\Business\BusinessArea;
use Nticaric\Fiskalizacija\Business\BusinessAreaRequest;

class BusinessAreaRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testBusinessAreaRequestClass()
    {
        $address = new Address;
        $address->street = "Sv. Mateja";
        $address->houseNumber = "19";
        $address->zipCode = "10000";
        $address->settlement = "Zagreb";
        $address->city = "Zagreb";

        $addressData = new AddressData;
        $addressData->setAddress($address);

        $businessArea = new BusinessArea;
        $businessArea->setAddressData($addressData);

        $date = Carbon::now()->format("d.m.Y");
        $businessArea->setDateOfusage($date);

        $businessArea->setNoteOfBusinessArea("ODV1");
        //$businessArea->setNoteOfClosing("Z");
        $businessArea->setOib("32314900695");
        $businessArea->setSpecificPurpose("spec namjena");

        $businessArea->setWorkingTime("Pon:08-11h Uto:15-17");
        $businessAreaRequest = new BusinessAreaRequest($businessArea);

        $xml = new DOMDocument();
        $xml->loadXML($businessAreaRequest->toXML());

        $res = $xml->schemaValidate('./src/schema/FiskalizacijaSchema.xsd');

        $this->assertTrue($res);
    }
}
