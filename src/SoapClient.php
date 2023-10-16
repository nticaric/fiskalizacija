<?php namespace Nticaric\Fiskalizacija;

use DOMDocument;
use DOMElement;
use Exception;
use Nticaric\Fiskalizacija\ResponseParser;

class SoapClient
{
    protected $url;
    protected $security;

    public function __construct($url, $security = "TLS")
    {
        $this->url      = $url;
        $this->security = $security;
    }

    public function send($payload)
    {
        $ch = curl_init();

        $options = [
            CURLOPT_URL            => $this->url,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT        => 5,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        switch ($this->security) {
            case 'SSL':
                break;
            case 'TLS':
                curl_setopt($ch, CURLOPT_SSLVERSION, 6);
                break;
            default:
                throw new \InvalidArgumentException(
                    'Treći parametar konstruktora klase Fiskalizacija mora biti SSL ili TLS!'
                );
        }

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $code     = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($response) {
            curl_close($ch);
            return $this->parseResponse($response, $code);
        } else {
            throw new Exception(curl_error($ch));
            curl_close($ch);
        }
    }

    public function addEnvelope($xml)
    {
        $XMLRequestDOMDoc = new DOMDocument();
        $XMLRequestDOMDoc->loadXML($xml);

        $envelope = new DOMDocument();

        $envelope->loadXML('<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
            <soapenv:Body></soapenv:Body>
        </soapenv:Envelope>');

        $envelope->encoding = 'UTF-8';
        $envelope->version  = '1.0';
        $XMLRequestType     = $XMLRequestDOMDoc->documentElement->localName;
        $XMLRequestTypeNode = $XMLRequestDOMDoc->getElementsByTagName($XMLRequestType)->item(0);
        $XMLRequestTypeNode = $envelope->importNode($XMLRequestTypeNode, true);

        $envelope->getElementsByTagName('Body')->item(0)->appendChild($XMLRequestTypeNode);
        return $envelope->saveXML();
    }

    public function parseResponse($response, $code = 4)
    {
        if ($code === 200) {
            return new ResponseParser($response);
        } else {
            $DOMResponse = new DOMDocument();
            $DOMResponse->loadXML($response);

            $SifraGreske  = $DOMResponse->getElementsByTagName('SifraGreske')->item(0);
            $PorukaGreske = $DOMResponse->getElementsByTagName('PorukaGreske')->item(0);

            if ($SifraGreske && $PorukaGreske) {
                throw new Exception(sprintf('%s: %s', $SifraGreske->nodeValue, $PorukaGreske->nodeValue));
            } else {
                throw new Exception(print_r($response, true), $code);
            }
        }

    }
}
