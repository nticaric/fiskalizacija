<?php

use Carbon\Carbon;
use Nticaric\Fiskalizacija\Bill\Bill;
use Nticaric\Fiskalizacija\Bill\BillNumber;
use Nticaric\Fiskalizacija\Bill\BillRequest;
use Nticaric\Fiskalizacija\Bill\Refund;
use Nticaric\Fiskalizacija\Bill\TaxRate;
use Nticaric\Fiskalizacija\Business\Address;
use Nticaric\Fiskalizacija\Business\AddressData;
use Nticaric\Fiskalizacija\Business\BusinessArea;
use Nticaric\Fiskalizacija\Business\BusinessAreaRequest;
use Nticaric\Fiskalizacija\Fiskalizacija;
use PHPUnit\Framework\TestCase;

class FiskalizacijaTest extends TestCase
{
    public function config()
    {
        return [
            'path'     => $_ENV['CERTIFICATE_PATH'],
            'pass'     => $_ENV['CERTIFICATE_PASSWORD'],
            'security' => 'TLS',
            'demo'     => true
        ];
    }

    public function testSetCertificate()
    {
        $pathToDemoCert = $_ENV['CERTIFICATE_PATH'];

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $fis->setCertificate($pathToDemoCert, $_ENV['CERTIFICATE_PASSWORD']);
        $this->assertNotNull($fis->certificate, 'Certificate must not be null');
    }

    public function testSendSoapBillRequest()
    {
        $config      = $this->config();
        $billRequest = $this->setBillRequest();

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $xml = $billRequest->toXML();

        $xsdPath = dirname(__DIR__) . "/docs/Fiskalizacija-WSDL-EDUC_v1.7/schema/FiskalizacijaSchema.xsd";
        // Load the XML
        $dom = new DOMDocument();
        $dom->loadXML($xml);

        $soapMessage = $fis->signXML($xml);

        $res = $fis->sendSoap($soapMessage);
        $this->assertEquals('tns:RacunOdgovor', $res->body()->nodeName);
    }

    public function testJirGeneration()
    {
        $billRequest    = $this->setBillRequest();
        $billRequestXML = $billRequest->toXML();

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $signedXML = $fis->signXML($billRequestXML);

        $res = $fis->sendSoap($signedXML);
        $jir = $res->getJir();

        $this->assertSame(36, strlen($jir));
    }

    public function setBillRequest()
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

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

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
        return $billRequest;
    }
}
