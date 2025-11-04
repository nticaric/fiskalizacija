<?php

use Carbon\Carbon;
use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Generators\BrojRacunaType;
use Nticaric\Fiskalizacija\Generators\PorezOstaloType;
use Nticaric\Fiskalizacija\Generators\PorezType;
use Nticaric\Fiskalizacija\Generators\RacunType;
use Nticaric\Fiskalizacija\Generators\RacunZahtjev;
use Nticaric\Fiskalizacija\Generators\ZaglavljeType;
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

    private function initializeFiskalizacija(): Fiskalizacija
    {
        return new Fiskalizacija(
            $_ENV['CERTIFICATE_PATH'],
            $_ENV['CERTIFICATE_PASSWORD'],
            "TLS",
            true
        );
    }

    public function testSetCertificate()
    {
        $pathToDemoCert = $_ENV['CERTIFICATE_PATH'];

        $fis = $this->initializeFiskalizacija();

        $fis->setCertificate($pathToDemoCert, $_ENV['CERTIFICATE_PASSWORD']);
        $this->assertNotNull($fis->certificate, 'Certificate must not be null');
    }

    public function testBillRequestSignatureAndSending()
    {
        $config      = $this->config();
        $billRequest = $this->getRacunZahtjev();

        $fis = $this->initializeFiskalizacija();

        $res = $fis->signAndSend($billRequest);

        $this->assertEquals('tns:RacunOdgovor', $res->body()->nodeName);
    }

    public function testJirGeneration()
    {
        $billRequest = $this->getRacunZahtjev();

        $fis = $this->initializeFiskalizacija();

        $res = $fis->signAndSend($billRequest);

        $jir = $res->getJir();

        $this->assertSame(36, strlen($jir));
    }

    public function getRacunZahtjev()
    {
        $billNumber = new BrojRacunaType(1, "ODV1", "1");

        $listPdv   = [];
        $listPdv[] = new PorezType(25.0, 400.1, 20.1, null);
        $listPdv[] = new PorezType(25.0, 500.1, 15.444, null);

        $listPnp   = [];
        $listPnp[] = new PorezType(2.1, 100.1, 10.1, null);
        $listPnp[] = new PorezType(2.1, 200.1, 20.1, null);

        $listOtherTaxRate   = [];
        $listOtherTaxRate[] = new PorezOstaloType("Naziv1", 40.1, 453.3, 12.1);
        $listOtherTaxRate[] = new PorezOstaloType("Naziv2", 27.1, 445.1, 50.1);
        $bill               = new RacunType();

        $bill->setOib($_ENV['OIB']);
        $bill->setOznSlijed("P");
        $bill->setUSustPdv(true);
        $bill->setDatVrijeme(Carbon::yesterday()->format('d.m.Y\TH:i:s'));

        $bill->setBrRac($billNumber);
        $bill->setPdv($listPdv);
        $bill->setPnp($listPnp);
        $bill->setOstaliPor($listOtherTaxRate);
        $bill->setIznosOslobPdv(23.5);
        $bill->setIznosMarza(32.0);
        $bill->setIznosNePodlOpor(5.1);
        $bill->setIznosUkupno(456.1);
        $bill->setNacinPlac("G");
        $bill->setOibOper("07851002909");

        $fis = $this->initializeFiskalizacija();

        $zastKod = $bill->generirajZastKod(
            $fis->getPrivateKey(),
            $bill->getOib(),
            $bill->getDatVrijeme(),
            $billNumber->getBrOznRac(),
            $billNumber->getOznPosPr(),
            $billNumber->getOznNapUr(),
            $bill->getIznosUkupno()
        );

        $bill->setZastKod($zastKod);
        $bill->setNakDost(false);

        $billRequest = new RacunZahtjev();
        $billRequest->setRacun($bill);

        $zaglavlje = new ZaglavljeType;

        $billRequest->setZaglavlje($zaglavlje);

        return $billRequest;
    }

    public function testDumpCertificate()
    {
        $fis = $this->initializeFiskalizacija();

        $info = $fis->certificateInfo();

        $this->assertEquals("Financijska agencija", $info['issuer']['O']);
    }

}
