Fiskalizacija
=============
[![Build Status](https://travis-ci.org/nticaric/fiskalizacija.svg?branch=master)](https://travis-ci.org/nticaric/fiskalizacija)
[![Total Downloads](https://img.shields.io/packagist/dt/nticaric/fiskalizacija.svg)](https://packagist.org/packages/nticaric/fiskalizacija)

PHP API za fiskalizaciju računa

###Primjer računa:

Ukoliko se radi o testnoj okolini sa demo certifikatom, treci parametar konustruktora je 
potrebno postaviti u `true`

	$fis = new Fiskalizacija("./path/to/certificate.pfx", "password", true);

Ukoliko se radi o produkcijkoj okolini, treci parametar se moze izostaviti

	$fis = new Fiskalizacija("./path/to/certificate.pfx", "password");

```php

<?php

use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Bill\Bill;
use Nticaric\Fiskalizacija\Bill\Refund;
use Nticaric\Fiskalizacija\Bill\BillNumber;
use Nticaric\Fiskalizacija\Bill\TaxRate;
use Nticaric\Fiskalizacija\Bill\BillRequest;

$billNumber = new BillNumber(1, "ODV1", "1");

$istPdv = array();
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

$fis = new Fiskalizacija("path/to/demo.pfx", "password", true);

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
$res = $fis->sendSoap($soapMessage);
var_dump($res);
```

###Primjer poslovnog prostora:

```php

<?php

use Nticaric\Fiskalizacija\Fiskalizacija;
use Nticaric\Fiskalizacija\Business\Address;
use Nticaric\Fiskalizacija\Business\AddressData;
use Nticaric\Fiskalizacija\Business\BusinessArea;
use Nticaric\Fiskalizacija\Business\BusinessAreaRequest;
use Carbon\Carbon;

$address = new Address;
$address->street = "Sv. Mateja";
$address->houseNumber = "19";
$address->zipCode = "10000";
$address->settlement = "Zagreb";
$address->city = "Zagreb";

$addressData = new AddressData;
$addressData->setAddress($address);

$businessArea = new BusinessArea;
$businessArea->setAddressData($addressData);

$date = Carbon::now()->format("d.m.Y");
$businessArea->setDateOfusage($date);

$businessArea->setNoteOfBusinessArea("ODV1");
//$businessArea->setNoteOfClosing("Z");
$businessArea->setOib("32314900695");
$businessArea->setSpecificPurpose("spec namjena");

$businessArea->setWorkingTime("Pon:08-11h Uto:15-17");
$businessAreaRequest = new BusinessAreaRequest($businessArea);

$fis = new Fiskalizacija("./path/to/demo.pfx", "password", true);

$soapMessage = $fis->signXML($businessAreaRequest->toXML());

$res = $fis->sendSoap($soapMessage);
var_dump($res);
```
