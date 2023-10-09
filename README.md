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

use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Bill\Bill;
use Nticaric\Fiskalizacija\Bill\Refund;
use Nticaric\Fiskalizacija\Bill\BillNumber;
use Nticaric\Fiskalizacija\Bill\TaxRate;
use Nticaric\Fiskalizacija\Bill\BillRequest;

$billNumber = new BillNumber(1, "ODV1", "1");

$listPdv = array();
$listPdv[] = new TaxRate(25.1, 400.1, 20.1, null);
$listPdv[] = new TaxRate(10.1, 500.1, 15.444, null);

$listPnp = array();
$listPnp[] = new TaxRate(30.1, 100.1, 10.1, null);
$listPnp[] = new TaxRate(20.1, 200.1, 20.1, null);

$listOtherTaxRate = array();
$listOtherTaxRate[] = new TaxRate(40.1, 453.3, 12.1, "Naziv1");
$listOtherTaxRate[] = new TaxRate(27.1, 445.1, 50.1, "Naziv2");


$bill = new Bill();

$bill->setOib("32314900695");
$bill->setHavePDV(true);
$invoiceDate = "15.07.2014T20:00:00";
$bill->setDateTime($invoiceDate);
//  $bill->setNoteOfOrder("P");
$bill->setBillNumber($billNumber);
$bill->setListPDV($listPdv);
$bill->setListPNP($listPnp);
$bill->setListOtherTaxRate($listOtherTaxRate);
$bill->setTaxFreeValue(23.5);
$bill->setMarginForTaxRate(32.0);
$bill->setTaxFree(5.1);
//$bill->setRefund(refund);
$totalValue = 456.1;
$bill->setTotalValue($totalValue);
$bill->setTypeOfPlacanje("G");
$bill->setOibOperative("34562123431");

$fis = new Fiskalizacija("path/to/demo.pfx", "password", "TLS", true);

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

$soapMessage = $fis->signXML($billRequest->toXML());
$response    = $fis->sendSoap($soapMessage);

$parser = new ResponseParser($response);
$jir    = $parser->getJir();

$qrGenerator = new QRGenerator($jir, $invoiceDate, $totalValue);
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

use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Test\Test;
use Nticaric\Fiskalizacija\Test\TestRequest;
use Carbon\Carbon;

$test = new Test();
$test->setMessage("testna poruka");

$testRequest = new TestRequest($test);

$fis = new Fiskalizacija("./path/to/demo.pfx", "password", "TLS", true);

$soapMessage = $fis->plainXML($testRequest->toXML());

$res = $fis->sendSoap($soapMessage);
var_dump($res);
```
