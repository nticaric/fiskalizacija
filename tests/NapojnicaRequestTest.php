<?php

use Nticaric\Fiskalizacija\Bill\Bill;
use Nticaric\Fiskalizacija\Bill\BillNumber;
use Nticaric\Fiskalizacija\Bill\BillRequest;
use Nticaric\Fiskalizacija\Bill\Napojnica;
use Nticaric\Fiskalizacija\Bill\TaxRate;
use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\NapojnicaRequest;
use PHPUnit\Framework\TestCase;

class NapojnicaRequestTest extends TestCase
{
    public function testNapojnicaRequest()
    {
        $napojnicaXML   = $this->generirajIspravanXML();
        $bill           = $this->generateBill();
        $billRequest    = new BillRequest($bill);
        $billRequestXML = $billRequest->toXML();

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $signedBillRequestXML = $fis->signXML($billRequestXML);
        $billRes              = $fis->sendSoap($signedBillRequestXML);

        $signedNapojnicaXML = $fis->signXML($napojnicaXML);
        $napojnicaRes       = $fis->sendSoap($signedNapojnicaXML);

        $sifraPoruke = $napojnicaRes->query('/soap:Envelope/soap:Body/tns:NapojnicaOdgovor/tns:PorukaOdgovora/tns:SifraPoruke')[0]->nodeValue;
        $poruka      = $napojnicaRes->query('/soap:Envelope/soap:Body/tns:NapojnicaOdgovor/tns:PorukaOdgovora/tns:Poruka')[0]->nodeValue;

        $this->assertEquals($sifraPoruke, "p002");
        $this->assertEquals($poruka, "Uspješna dostava podataka o napojnici.");
    }

    public function testBillSNapojnicom()
    {
        $bill = $this->generateBill();

        $napojnica = new Napojnica(2.00, "T");
        $bill->setNapojnica($napojnica);

        $billRequest = new BillRequest($bill);

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $signedBillRequestXML = $fis->signXML($billRequest->toXML());
        $billRes              = $fis->sendSoap($signedBillRequestXML);
        dd($billRes);
    }

    public function testValidateNapojnicaRequestXML()
    {
        $xml = $this->generirajIspravanXML();

        $xsdPath = dirname(__DIR__) . "/docs/Fiskalizacija-WSDL-EDUC_v1.7/schema/FiskalizacijaSchema.xsd";
        // Load the XML
        $dom = new DOMDocument();
        $dom->loadXML($xml);

        if ($dom->schemaValidate($xsdPath)) {
            $this->assertTrue(true, "XML je validan");
        } else {
            $this->assertTrue(false, "XML nije validan");
        }
    }

    public function generirajIspravanXML()
    {
        $bill = $this->generateBill();

        $napojnica = new Napojnica(2.00, "T");
        $bill->setNapojnica($napojnica);

        $napojnicaRequest = new NapojnicaRequest($bill);

        return $napojnicaRequest->toXML();
    }

    public function generateBill()
    {
        $billNumber = new BillNumber(1, "ODV1", "1");

        $listPdv   = [];
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
        $invoiceDate = (new DateTime())->format('d.m.Y\TH:i:s');
        $bill->setDateTime($invoiceDate);

        $bill->setBillNumber($billNumber);
        $bill->setListPDV($listPdv);
        $bill->setListPNP($listPnp);
        $bill->setListOtherTaxRate($listOtherTaxRate);
        $bill->setTaxFreeValue(23.5);
        $bill->setMarginForTaxRate(32.0);
        $bill->setTaxFree(5.1);

        $totalValue = 456.1;
        $bill->setTotalValue($totalValue);
        $bill->setTypeOfPlacanje("G");
        $bill->setOibOperative("34562123431");

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $zki = $bill->securityCode(
            $fis->getPrivateKey(),
            $bill->oib,
            $bill->dateTime,
            $billNumber->numberNoteBill,
            $billNumber->noteOfBusinessArea,
            $billNumber->noteOfExcangeDevice,
            $bill->totalValue
        );
        $bill->setSecurityCode($zki);

        return $bill;

    }
}
