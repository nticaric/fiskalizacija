<?php

use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Business\Address;
use Nticaric\Fiskalizacija\Business\AddressData;
use Nticaric\Fiskalizacija\Business\BusinessArea;
use Nticaric\Fiskalizacija\Business\BusinessAreaRequest;
use Carbon\Carbon;

class FiskalizacijaTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateUUID()
    {
    	$fis = new Fiskalizacija("./tests/demo.pfx", "password");
    	$res = $fis->generateUUID();
    	$this->assertRegExp("/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/", $res, 'Invalid UUID');
    }

    public function testReadCertificateFromDisk()
    {
    	$fis = new Fiskalizacija("./tests/demo.pfx", "password");
    	$pathToDemoCert = "./tests/demo.pfx";
    	$res = $fis->readCertificateFromDisk($pathToDemoCert);
    	$this->assertTrue($res != false);
    }

    public function testSetCertificate()
    {
    	$fis = new Fiskalizacija("./tests/demo.pfx", "password");
    	$pathToDemoCert = "./tests/demo.pfx";
    	$fis->setCertificate($pathToDemoCert, "password");
    	$this->assertNotNull($fis->certificate, 'Certificate must not be null');
    }

    public function testSetCertificateWithWrongPassword()
    {
    	$fis = new Fiskalizacija("./tests/demo.pfx", "wrong_password");
    	$this->assertNull($fis->certificate, 'Certificate must not be null');
    }

    public function testSignXML()
    {
        $businessAreaRequest = $this->setBusinessAreaRequest();

        $fis = new Fiskalizacija("./tests/demo.pfx", "password");
        $soapMessage = $fis->signXML($businessAreaRequest->toXML());

        $this->assertNotNull($soapMessage);

    }

    public function testSendSoap()
    {
        $businessAreaRequest = $this->setBusinessAreaRequest();

        $fis = new Fiskalizacija("./tests/demo.pfx", "password");
        $soapMessage = $fis->signXML($businessAreaRequest->toXML());

        $res = $fis->sendSoap($soapMessage);
        $this->assertContains('PoslovniProstorOdgovor', $res);
    }

    public function setBusinessAreaRequest()
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

        return $businessAreaRequest;
    }
}