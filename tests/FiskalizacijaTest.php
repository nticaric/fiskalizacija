<?php

class FiskalizacijaTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateUUID()
    {
    	$fis = new Fiskalizacija;
    	$res = $fis->generateUUID();

    	$this->assertRegExp("/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/", $res, 'Invalid UUID');
    }
}