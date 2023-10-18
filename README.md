Fiskalizacija
=============
[![Build Status](https://travis-ci.org/nticaric/fiskalizacija.svg?branch=master)](https://travis-ci.org/nticaric/fiskalizacija)
[![Total Downloads](https://img.shields.io/packagist/dt/nticaric/fiskalizacija.svg)](https://packagist.org/packages/nticaric/fiskalizacija)

PHP API za fiskalizaciju računa u Hrvatskoj

### Primjer računa:

Ako se radi o testnoj okolini s demo certifikatom, četvrti parametar konstruktora je
potrebno postaviti u `true`

	$fis = new Fiskalizacija("./path/to/certificate.pfx", "password", "security" , true);

Ako se radi o produkcijskoj okolini, četvrti parametar se treba postaviti na `false` 
ili se može izostaviti

	$fis = new Fiskalizacija("./path/to/certificate.pfx", "password");

Od 27. listopada 2015. napušta se SSL protokol pri komunikaciji fiskalnih blagajni s poslužiteljima i prelazi se na TLS protokol.
Kao treći parametar konstruktora treba se postaviti `TLS` umjesto `SSL`. Ako bi se treći parametar izostavio, koristio bi se `SSL` kao default protokol.

    $fis = new Fiskalizacija("./path/to/certificate.pfx", "password", "TLS", true);


```php

<?php

use Carbon\Carbon;
use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Generators\BrojRacunaType;
use Nticaric\Fiskalizacija\Generators\PorezOstaloType;
use Nticaric\Fiskalizacija\Generators\PorezType;
use Nticaric\Fiskalizacija\Generators\RacunType;
use Nticaric\Fiskalizacija\Generators\RacunZahtjev;
use Nticaric\Fiskalizacija\Generators\ZaglavljeType;

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
$bill               = new RacunType();

$bill->setOib("32314900695");
$bill->setOznSlijed("P");
$bill->setUSustPdv(true);
$bill->setDatVrijeme("15.07.2014T20:00:00");

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
    "TLS",
    true
);

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

$res = $fis->signAndSend($billRequest);
$jir = $res->getJir();
 
$qrGenerator = new QRGenerator($jir, "15.07.2014T20:00:00", 456.1);
echo $qrGenerator->generateUrl(); // Output the URL
//echo $qrGenerator->getQrCode(); // Output the base64-encoded QR code image
```

### OpenSSL 3

Ukoliko dobivate error:

`error:0308010C:digital envelope routines::unsupported`

Ova greška se obično pojavljuje kada koristite OpenSSL verziju 3.0, koja ne podržava neke od starijih algoritama za šifriranje koji su korišteni u prijašnjim verzijama OpenSSL-a. 
Na primjer, ako je vaša PKCS#12 datoteka šifrirana koristeći algoritam RC2-40-CBC, koji nije podržan u OpenSSL 3.0, dobit ćete ovu grešku.

Ako možete pristupiti sustavu sa starijom verzijom OpenSSL-a, možete konvertirati PKCS#12 datoteku u noviji PKCS#12 format koristeći jači algoritam za šifriranje.

`openssl pkcs12 -in FISKAL_1.p12 -out temp.pem -nodes -passin pass:<VašaLozinka>`

pa onda

`openssl pkcs12 -export -in temp.pem -out FISKAL_NEW.p12 -keypbe PBE-SHA1-3DES -certpbe PBE-SHA1-3DES`


### Primjer testne poruke:

```php

<?php
use Nticaric\Fiskalizacija\SoapClient;
use Nticaric\Fiskalizacija\XMLSerializer;
use Nticaric\Fiskalizacija\Generators\EchoRequest;

$message = "proizvoljan tekst";

$echoRequest = new EchoRequest($message);

$serializer = new XMLSerializer($echoRequest);
$xml        = $serializer->toXml();

$soapClient  = new SoapClient("https://cistest.apis-it.hr:8449/FiskalizacijaServiceTest");
$xmlEnvelope = $soapClient->addEnvelope($xml);

$res = $soapClient->send($xmlEnvelope);
```
