<?php

use Nticaric\Fiskalizacija\Bill\Bill;
use Nticaric\Fiskalizacija\Bill\BillNumber;
use Nticaric\Fiskalizacija\Bill\BillRequest;
use Nticaric\Fiskalizacija\Bill\Refund;
use Nticaric\Fiskalizacija\Bill\TaxRate;
use Nticaric\Fiskalizacija\Fiskalizacija;
use PHPUnit\Framework\TestCase;

class BillRequestTest extends TestCase
{
    public function testBillRequestClass()
    {
        $refund = new Refund("Naziv naknade", 5.44);

        $billNumber = new BillNumber(1, "ODV1", "1");

        $istPdv    = [];
        $listPdv[] = new TaxRate(25.1, 400.1, 20.1, null);
        $listPdv[] = new TaxRate(10.1, 500.1, 15.444, null);

        $listPnp   = [];
        $listPnp[] = new TaxRate(30.1, 100.1, 10.1, null);
        $listPnp[] = new TaxRate(20.1, 200.1, 20.1, null);

        $listOtherTaxRate   = [];
        $listOtherTaxRate[] = new TaxRate(40.1, 453.3, 12.1, "Naziv1");
        $listOtherTaxRate[] = new TaxRate(27.1, 445.1, 50.1, "Naziv2");

        $bill = new Bill();

        $bill->setOib("32314900695");
        $bill->setHavePDV(true);
        $bill->setDateTime("15.07.2014T20:00:00");
        //  $bill->setNoteOfOrder("P");
        $bill->setBillNumber($billNumber);
        $bill->setListPDV($listPdv);
        $bill->setListPNP($listPnp);
        $bill->setListOtherTaxRate($listOtherTaxRate);
        $bill->setTaxFreeValue(23.5);
        $bill->setMarginForTaxRate(32.0);
        $bill->setTaxFree(5.1);
        //$bill->setRefund(refund);
        $bill->setTotalValue(456.1);
        $bill->setTypeOfPlacanje("G");
        $bill->setOibOperative("34562123431");

        $fis = $this->mockFiskalizacijaClass();

        $bill->setSecurityCode(
            $bill->securityCode(
                $fis->getPrivateKey(),
                $bill->oib,
                $bill->dateTime,
                $billNumber->numberNoteBill,
                $billNumber->noteOfBusinessArea,
                $billNumber->noteOfExcangeDevice,
                $bill->totalValue
            )
        );
        $bill->setNoteOfRedelivary(false);

        $billRequest = new BillRequest($bill);

        $xml = new DOMDocument();
        $xml->loadXML($billRequest->toXML());

        $res = $xml->schemaValidate('./src/schema/FiskalizacijaSchema.xsd');

        $this->assertTrue($res);

    }

    public function mockFiskalizacijaClass()
    {
        $mock = $this->getMockBuilder('Nticaric\Fiskalizacija\Fiskalizacija')
            ->setMethods(['readCertificateFromDisk', 'signXML', 'sendSoap', 'getPrivateKey'])
            ->setConstructorArgs([
                'path' => "",
                'pass'        => "",
            ])
            ->getMock();

        $keyPair = openssl_pkey_new([
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ]);

        openssl_pkey_export($keyPair, $privateKeyPem);

        $mock->method('getPrivateKey')
            ->willReturn($privateKeyPem);

        return $mock;
    }
}
