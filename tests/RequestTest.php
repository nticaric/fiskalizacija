<?php

use Nticaric\Fiskalizacija\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testGenerateUUID()
    {
        $request = new Request;
        $res = $request->generateUUID();
        $this->assertMatchesRegularExpression("/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/", $res, 'Invalid UUID');
    }
}
