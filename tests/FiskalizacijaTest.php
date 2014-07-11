<?php

class FiskalizacijaTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateUUID()
    {
    	$fis = new Fiskalizacija;
    	$res = $fis->generateUUID();
    	$this->assertRegExp("/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/", $res, 'Invalid UUID');
    }

    public function testReadCertificateFromDisk()
    {
    	$fis = new Fiskalizacija;
    	$pathToDemoCert = "./tests/demo.pfx";
    	$res = $fis->readCertificateFromDisk($pathToDemoCert);
    	$this->assertTrue($res != false);
    }

    public function testSetCertificate()
    {
    	$fis = new Fiskalizacija;
    	$pathToDemoCert = "./tests/demo.pfx";
    	$fis->setCertificate($pathToDemoCert, "TNTStudi0");
    	$this->assertNotNull($fis->certificate, 'Certificate must not be null');
    }

    public function testSetCertificateWithWrongPassword()
    {
    	$fis = new Fiskalizacija;
    	$pathToDemoCert = "./tests/demo.pfx";
    	$fis->setCertificate($pathToDemoCert, "wrong_password");
    	$this->assertNull($fis->certificate, 'Certificate must not be null');
    }
}