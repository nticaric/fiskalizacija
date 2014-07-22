<?php

use Nticaric\Fiskalizacija\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
	public function testGenerateUUID()
    {
    	$request = new Request;
    	$res = $request->generateUUID();
    	$this->assertRegExp("/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/", $res, 'Invalid UUID');
    }
}