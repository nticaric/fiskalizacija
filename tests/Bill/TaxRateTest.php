<?php

use Nticaric\Fiskalizacija\Bill\TaxRate;
use PHPUnit\Framework\TestCase;

class TaxRateTest extends TestCase
{
    public function testTaxRateClass()
    {
        $tax = new TaxRate(15.00, 10.00, 1.50, "Porez na luksuz");
        $res = $tax->toXML();
        $this->assertStringEqualsFile('./tests/xml/business_taxrate.xml', $res);
    }
}
