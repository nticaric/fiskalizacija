<?php

use Carbon\Carbon;
use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Generators\BrojRacunaType;
use Nticaric\Fiskalizacija\Generators\NapojnicaType;
use Nticaric\Fiskalizacija\Generators\NapojnicaZahtjev;
use Nticaric\Fiskalizacija\Generators\PorezOstaloType;
use Nticaric\Fiskalizacija\Generators\PorezType;
use Nticaric\Fiskalizacija\Generators\RacunNapojnicaType;
use Nticaric\Fiskalizacija\Generators\RacunType;
use Nticaric\Fiskalizacija\Generators\RacunZahtjev;
use Nticaric\Fiskalizacija\Generators\ZaglavljeType;
use Nticaric\Fiskalizacija\XMLSerializer;
use PHPUnit\Framework\TestCase;

class NapojnicaRequestTest extends TestCase
{
    public function testBillSNapojnicom()
    {
        $bill = $this->generateNapojnicaBill();

        $napojnica = new NapojnicaType(2.00, "T");
        $bill->setNapojnica($napojnica);

        $napojnicaZahtjev = new NapojnicaZahtjev;
        $napojnicaZahtjev->setZaglavlje(new ZaglavljeType);
        $napojnicaZahtjev->setRacun($bill);

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $serializer = new XMLSerializer($napojnicaZahtjev);
        $xml        = $serializer->toXml();

        $signed       = $fis->signXML($xml);
        $napojnicaRes = $fis->sendSoap($signed);

        $sifraPoruke = $napojnicaRes->query('/soap:Envelope/soap:Body/tns:NapojnicaOdgovor/tns:PorukaOdgovora/tns:SifraPoruke')[0]->nodeValue;
        $poruka      = $napojnicaRes->query('/soap:Envelope/soap:Body/tns:NapojnicaOdgovor/tns:PorukaOdgovora/tns:Poruka')[0]->nodeValue;

        $this->assertEquals($sifraPoruke, "p002");
        $this->assertEquals($poruka, "Uspješna dostava podataka o napojnici.");
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
        $bill = $this->generateNapojnicaBill();

        $napojnica = new NapojnicaType(2.00, "T");
        $bill->setNapojnica($napojnica);

        $napojnicaZahtjev = new NapojnicaZahtjev;
        $napojnicaZahtjev->setZaglavlje(new ZaglavljeType);
        $napojnicaZahtjev->setRacun($bill);

        $serializer = new XMLSerializer($napojnicaZahtjev);
        return $serializer->toXml();
    }

    public function generateNapojnicaBill()
    {
        $billNumber = new BrojRacunaType(1, "ODV1", "1");

        $listPdv   = [];
        $listPdv[] = new PorezType(25.1, 400.1, 20.1, null);
        $listPdv[] = new PorezType(10.1, 500.1, 15.444, null);

        $listPnp   = [];
        $listPnp[] = new PorezType(30.1, 100.1, 10.1, null);
        $listPnp[] = new PorezType(20.1, 200.1, 20.1, null);

        $listOtherTaxRate   = [];
        $listOtherTaxRate[] = new PorezOstaloType("Naziv1", 40.1, 453.3, 12.1);
        $listOtherTaxRate[] = new PorezOstaloType("Naziv2", 27.1, 445.1, 50.1);
        $bill               = new RacunNapojnicaType();

        $bill->setOib("32314900695");
        $bill->setOznSlijed("P");
        $bill->setUSustPdv(true);
        $bill->setDatVrijeme(\Carbon\Carbon::yesterday()->format('d.m.Y\TH:i:s'));

        $bill->setBrRac($billNumber);
        $bill->setPdv($listPdv);
        $bill->setPnp($listPnp);
        $bill->setOstaliPor($listOtherTaxRate);
        $bill->setIznosOslobPdv(23.5);
        $bill->setIznosMarza(32.0);
        $bill->setIznosNePodlOpor(5.1);
        $bill->setIznosUkupno(456.1);
        $bill->setNacinPlac("G");
        $bill->setOibOper("34562123431");

        $fis = new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS", true);

        $bill->setZastKod(
            $bill->generirajZastKod(
                $fis->getPrivateKey(),
                $bill->getOib(),
                $bill->getDatVrijeme(),
                $billNumber->getBrOznRac(),
                $billNumber->getOznPosPr(),
                $billNumber->getOznNapUr(),
                $bill->getIznosUkupno()
            )
        );
        $bill->setNakDost(false);

        return $bill;
    }
}
