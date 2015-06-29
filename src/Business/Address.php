<?php namespace Nticaric\Fiskalizacija\Business;

use XMLWriter;

class Address 
{

    public $street;
    
    public $houseNumber;
    
    public $extrahouseNumber;
    
    public $zipCode;
    
    public $settlement;
    
    public $city;

    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();
 
        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->startElementNs($ns, 'Adresa', null);
        $writer->writeElementNs($ns, 'Ulica', null, $this->street);
        if($this->houseNumber != null) {
            $writer->writeElementNs($ns, 'KucniBroj', null, $this->houseNumber);
        }
        if($this->extrahouseNumber != null) {
            $writer->writeElementNs($ns, 'KucniBrojDodatak', null, $this->extrahouseNumber);
        }
        $writer->writeElementNs($ns, 'BrojPoste', null, $this->zipCode);
        $writer->writeElementNs($ns, 'Naselje', null, $this->settlement);
        $writer->writeElementNs($ns, 'Opcina', null, $this->city);
        $writer->endElement();

        return $writer->outputMemory();
    }
}
