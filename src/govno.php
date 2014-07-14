<?php
/**
 * @author Branko Ajzele <ajzele@gmail.com, http://foggyline.net>
 */

$XMLRequestType = 'PoslovniProstorZahtjev'; /* RacunZahtjev OR PoslovniProstorZahtjev */










/*************************************************************************************/
/********** STEP_1: Handle the FINA aplikativni certificate in .pfx format  **********/
/*************************************************************************************/
$certificate = null;
$certificatePass = 'TNTStudi0';
$pfxCertificate = './../tests/demo.pfx';

openssl_pkcs12_read(file_get_contents($pfxCertificate), $certificate, $certificatePass);

$publicCertificate = $certificate['cert'];
$privateKey = $certificate['pkey'];

$privateKeyResource = openssl_pkey_get_private($privateKey, $certificatePass);
$publicCertificateData = openssl_x509_parse($publicCertificate);










/****************************************************************************/
/********** STEP_2: Handle the FINA CA certificate in .cer format  **********/
/****************************************************************************/
$certificateCAcer = './../tests/democacert.cer';
$certificateCAcerContent = file_get_contents($certificateCAcer);

/* Convert .cer to .pem, cURL uses .pem */
$certificateCApemContent =  '-----BEGIN CERTIFICATE-----'.PHP_EOL
    .chunk_split(base64_encode($certificateCAcerContent), 64, PHP_EOL)
    .'-----END CERTIFICATE-----'.PHP_EOL;

$certificateCApem = $certificateCAcer.'.pem';
file_put_contents($certificateCApem, $certificateCApemContent);








 date_default_timezone_set ( 'Europe/Paris' );

/*****************************************************/
/********** STEP_3: Calculate Zastitni Kod  **********/
/*****************************************************/
$oib = '32314900695';
$dt = new DateTime('now');
$datumVrijemeIzdavanjaRacuna = $dt->format('d.m.Y H:i:s'); /* use invoice created_at datetime here */
$brojcanaOznakaRacuna = '23'; /* 23/MAGE5/1 */
$oznakaPoslovnogProstora = 'MAGE5'; /* 23/MAGE5/1 */
$oznakaNaplatnogUredaja = '1'; /* 23/MAGE5/1 */
$ukupniIznosRacuna = '182.50';

$ZastKodUnsigned = '';

$ZastKodUnsigned .= $oib;
$ZastKodUnsigned .= $datumVrijemeIzdavanjaRacuna;
$ZastKodUnsigned .= $brojcanaOznakaRacuna;
$ZastKodUnsigned .= $oznakaPoslovnogProstora;
$ZastKodUnsigned .= $oznakaNaplatnogUredaja;
$ZastKodUnsigned .= $ukupniIznosRacuna;

$ZastKodSignature = null;

openssl_sign($ZastKodUnsigned, $ZastKodSignature, $privateKeyResource, OPENSSL_ALGO_SHA1);

$ZastKod = md5($ZastKodSignature);










/************************************************/
/********** STEP_4: Calculate UUID v4  **********/
/************************************************/
function UUIDv4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

$UUID = UUIDv4();










/*****************************************************************************************************/
/********** STEP_5: Prepare/Build pure request XML (RacunZahtjev OR PoslovniProstorZahtjev) **********/
/*****************************************************************************************************/
$UriId = uniqid();

if ($XMLRequestType == 'RacunZahtjev') {

    $ns = 'tns';

    $writer = new XMLWriter();
    $writer->openMemory();
//$writer->startDocument('1.0', 'UTF-8');

    $writer->setIndent(4);
    $writer->startElementNs($ns, 'RacunZahtjev', 'http://www.apis-it.hr/fin/2012/types/f73');
    $writer->writeAttribute('Id', $UriId);

    $writer->startElementNs($ns, 'Zaglavlje', null);
    $writer->writeElementNs($ns, 'IdPoruke', null, $UUID);
    $writer->writeElementNs($ns, 'DatumVrijeme', null, date('d.m.Y\Th:i:s'));
    $writer->endElement(); /* #Zaglavlje */


    $writer->startElementNs($ns, 'Racun', null);
    $writer->writeElementNs($ns, 'Oib', null, $oib);
    $writer->writeElementNs($ns, 'USustPdv', null, '1');
    $writer->writeElementNs($ns, 'DatVrijeme', null, $dt->format('d.m.Y\Th:i:s'));
    $writer->writeElementNs($ns, 'OznSlijed', null, 'P'); /* P ili N => P na nivou Poslovnog prostora, N na nivou naplatnog uredaja */


    $writer->startElementNs($ns, 'BrRac', null);
    $writer->writeElementNs($ns, 'BrOznRac', null, $brojcanaOznakaRacuna);
    $writer->writeElementNs($ns, 'OznPosPr', null, $oznakaPoslovnogProstora);
    $writer->writeElementNs($ns, 'OznNapUr', null, $oznakaNaplatnogUredaja);
    $writer->endElement(); /* #BrRac */

    $writer->startElementNs($ns, 'Pdv', null);
    $writer->startElementNs($ns, 'Porez', null);
    $writer->writeElementNs($ns, 'Stopa', null, '25.00');
    $writer->writeElementNs($ns, 'Osnovica', null, '100.00');
    $writer->writeElementNs($ns, 'Iznos', null, '125.00');
    $writer->endElement(); /* #Porez */

    $writer->startElementNs($ns, 'Porez', null);
    $writer->writeElementNs($ns, 'Stopa', null, '5.00');
    $writer->writeElementNs($ns, 'Osnovica', null, '50.00');
    $writer->writeElementNs($ns, 'Iznos', null, '57.50');
    $writer->endElement(); /* #Porez */
    $writer->endElement(); /* #Pdv */

    $writer->writeElementNs($ns, 'IznosUkupno', null, $ukupniIznosRacuna);

    $writer->writeElementNs($ns, 'NacinPlac', null, 'G');
    $writer->writeElementNs($ns, 'OibOper', null, $oib);

    $writer->writeElementNs($ns, 'ZastKod', null, $ZastKod);
    $writer->writeElementNs($ns, 'NakDost', null, '0');

    $writer->endElement(); /* #Racun */

    $writer->endElement(); /* #RacunZahtjev */

//$writer->endDocument();

    $XMLRequest = $writer->outputMemory();
}

if ($XMLRequestType == 'PoslovniProstorZahtjev') {
    $ns = 'tns';

    $writer = new XMLWriter();
    $writer->openMemory();
    //$writer->startDocument('1.0', 'UTF-8');

    $writer->setIndent(4);
    $writer->startElementNs($ns, 'PoslovniProstorZahtjev', 'http://www.apis-it.hr/fin/2012/types/f73');
    $writer->writeAttribute('Id', $UriId);

    $writer->startElementNs($ns, 'Zaglavlje', null);
    $writer->writeElementNs($ns, 'IdPoruke', null, UUIDv4());
    $writer->writeElementNs($ns, 'DatumVrijeme', null, date('d.m.Y\Th:i:s'));
    $writer->endElement(); /* #Zaglavlje */


    $writer->startElementNs($ns, 'PoslovniProstor', null);
    $writer->writeElementNs($ns, 'Oib', null, $oib);
    $writer->writeElementNs($ns, 'OznPoslProstora', null, $oznakaPoslovnogProstora);

    $writer->startElementNs($ns, 'AdresniPodatak', null);
    $writer->startElementNs($ns, 'Adresa', null);
    $writer->writeElementNs($ns, 'Ulica', null, 'Otokara Kersovanija 5');
    $writer->writeElementNs($ns, 'KucniBroj', null, '45');
    $writer->writeElementNs($ns, 'KucniBrojDodatak', null, 'B');
    $writer->writeElementNs($ns, 'BrojPoste', null, '31000');
    $writer->writeElementNs($ns, 'Naselje', null, 'Osijek');
    $writer->writeElementNs($ns, 'Opcina', null, 'Osijek');
    $writer->endElement(); /* #Adresa */
    $writer->endElement(); /* #AdresniPodatak */

    $writer->writeElementNs($ns, 'RadnoVrijeme', null, 'Pon-Sub: 08:00-21:00, Ned: 09:00-14:00');
    $writer->writeElementNs($ns, 'DatumPocetkaPrimjene', null, '04.01.2013');

    $writer->writeElementNs($ns, 'SpecNamj', null, '79343687407'); /* YOUR DEVELOPMENT COMPANY OIB ALWAYS */

    $writer->endElement(); /* #PoslovniProstor */


    $writer->endElement(); /* #PoslovniProstorZahtjev */

    //$writer->endDocument();

    $XMLRequest = $writer->outputMemory();
}


/*******************************************************************/
/********** STEP_6: Sign $XMLRequest XML via certificate **********/
/*******************************************************************/
$XMLRequestDOMDoc = new DOMDocument();
$XMLRequestDOMDoc->loadXML($XMLRequest);

$canonical = $XMLRequestDOMDoc->C14N();
$DigestValue = base64_encode(hash('sha1', $canonical, true));

$rootElem = $XMLRequestDOMDoc->documentElement;

$SignatureNode = $rootElem->appendChild(new DOMElement('Signature'));
$SignatureNode->setAttribute('xmlns','http://www.w3.org/2000/09/xmldsig#');

$SignedInfoNode = $SignatureNode->appendChild(new DOMElement('SignedInfo'));
$SignedInfoNode->setAttribute('xmlns','http://www.w3.org/2000/09/xmldsig#');

$CanonicalizationMethodNode = $SignedInfoNode->appendChild(new DOMElement('CanonicalizationMethod'));
$CanonicalizationMethodNode->setAttribute('Algorithm','http://www.w3.org/2001/10/xml-exc-c14n#');

$SignatureMethodNode = $SignedInfoNode->appendChild(new DOMElement('SignatureMethod'));
$SignatureMethodNode->setAttribute('Algorithm','http://www.w3.org/2000/09/xmldsig#rsa-sha1');

$ReferenceNode = $SignedInfoNode->appendChild(new DOMElement('Reference'));
$ReferenceNode->setAttribute('URI', sprintf('#%s', $UriId));

$TransformsNode = $ReferenceNode->appendChild(new DOMElement('Transforms'));

$Transform1Node = $TransformsNode->appendChild(new DOMElement('Transform'));
$Transform1Node->setAttribute('Algorithm','http://www.w3.org/2000/09/xmldsig#enveloped-signature');

$Transform2Node = $TransformsNode->appendChild(new DOMElement('Transform'));
$Transform2Node->setAttribute('Algorithm', 'http://www.w3.org/2001/10/xml-exc-c14n#');

$DigestMethodNode = $ReferenceNode->appendChild(new DOMElement('DigestMethod'));
$DigestMethodNode->setAttribute('Algorithm','http://www.w3.org/2000/09/xmldsig#sha1');

$ReferenceNode->appendChild(new DOMElement('DigestValue', $DigestValue));

$SignedInfoNode = $XMLRequestDOMDoc->getElementsByTagName('SignedInfo')->item(0);

$X509Issuer = $publicCertificateData['issuer'];
$X509IssuerName = sprintf('OU=%s,O=%s,C=%s', $X509Issuer['OU'], $X509Issuer['O'], $X509Issuer['C']);
$X509IssuerSerial = $publicCertificateData['serialNumber'];

$publicCertificatePureString = str_replace('-----BEGIN CERTIFICATE-----', '', $publicCertificate);
$publicCertificatePureString = str_replace('-----END CERTIFICATE-----', '', $publicCertificatePureString);

$SignedInfoSignature = null;

if (!openssl_sign($SignedInfoNode->C14N(true), $SignedInfoSignature, $privateKeyResource, OPENSSL_ALGO_SHA1)) {
    throw new Exception('Unable to sign the request');
}

$SignatureNode = $XMLRequestDOMDoc->getElementsByTagName('Signature')->item(0);
$SignatureValueNode = new DOMElement('SignatureValue', base64_encode($SignedInfoSignature));
$SignatureNode->appendChild($SignatureValueNode);

$KeyInfoNode = $SignatureNode->appendChild(new DOMElement('KeyInfo'));

$X509DataNode = $KeyInfoNode->appendChild(new DOMElement('X509Data'));
$X509CertificateNode = new DOMElement('X509Certificate', $publicCertificatePureString);
$X509DataNode->appendChild($X509CertificateNode);

$X509IssuerSerialNode = $X509DataNode->appendChild(new DOMElement('X509IssuerSerial'));

$X509IssuerNameNode = new DOMElement('X509IssuerName',$X509IssuerName);
$X509IssuerSerialNode->appendChild($X509IssuerNameNode);

$X509SerialNumberNode = new DOMElement('X509SerialNumber',$X509IssuerSerial);
$X509IssuerSerialNode->appendChild($X509SerialNumberNode);









/*************************************************************/
/********** STEP_7: Add SOAP envelope to signed XML **********/
/*************************************************************/
$envelope = new DOMDocument();

$envelope->loadXML('<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
    <soapenv:Body></soapenv:Body>
</soapenv:Envelope>');

$envelope->encoding = 'UTF-8';
$envelope->version = '1.0';

$XMLRequestTypeNode = $XMLRequestDOMDoc->getElementsByTagName($XMLRequestType)->item(0);
$XMLRequestTypeNode = $envelope->importNode($XMLRequestTypeNode, true);

$envelope->getElementsByTagName('Body')->item(0)->appendChild($XMLRequestTypeNode);

/* Final, signed XML request */
$payload = $envelope->saveXML();





//print_r($envelope->saveXML());
//die();




/******************************************************************************/
/********** STEP_8: Execute POST request with signed XML towards CIS **********/
/******************************************************************************/
$ch = curl_init();

$options = array(
    CURLOPT_URL => 'https://cistest.apis-it.hr:8449/FiskalizacijaServiceTest',
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 5,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_CAINFO => $certificateCApem,
);

curl_setopt_array($ch, $options);

$response = curl_exec($ch);

if ($response) {
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $DOMResponse = new DOMDocument();
    $DOMResponse->loadXML($response);

    if ($code === 200) {
        /* For RacunZahtjev */
        $Jir = $DOMResponse->getElementsByTagName('Jir')->item(0);
        if ($Jir) {
            echo $Jir->nodeValue;
        }
        /* For RacunZahtjev && PoslovniProstorZahtjev */
        echo $response;
    } else {
        $SifraGreske = $DOMResponse->getElementsByTagName('SifraGreske')->item(0);
        $PorukaGreske = $DOMResponse->getElementsByTagName('PorukaGreske')->item(0);

        if ($SifraGreske && $PorukaGreske) {
            throw new Exception(sprintf('%s: %s', $SifraGreske->nodeValue, $PorukaGreske->nodeValue));
        } else {
            throw new Exception(sprintf('HTTP response code %s not suited for further actions.', $code));
        }
    }
} else {
    throw new Exception(curl_error($ch));
}

curl_close($ch);