<?php namespace Nticaric\Fiskalizacija;

use DOMDocument;
use DOMXPath;
use Exception;

class ResponseParser
{
    private $document;
    private $xpath;

    public function __construct($response)
    {
        $this->document = new DOMDocument();
        $this->document->loadXML($response);
        $this->xpath = new DOMXPath($this->document);
        // Register the namespaces used in the SOAP response
        $this->xpath->registerNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $this->xpath->registerNamespace('tns', 'http://www.apis-it.hr/fin/2012/types/f73');
    }

    public function getJir()
    {
        $query   = '/soap:Envelope/soap:Body/tns:RacunOdgovor/tns:Jir';
        $entries = $this->xpath->query($query);
        if ($entries->length > 0) {
            return $entries->item(0)->nodeValue;
        }
        throw new Exception('JIR value not found in the response');
    }

    public function body()
    {
        // Query for the SOAP body
        $query   = '/soap:Envelope/soap:Body/*';
        $entries = $this->xpath->query($query);

        if ($entries->length > 0) {
            // Return the first child node's value within the SOAP body
            return $entries->item(0);
        }

        throw new Exception('No response body found in the SOAP response');
    }

    public function document()
    {
        return $this->document;
    }
}
