<?php namespace Nticaric\Fiskalizacija\Business;

use XMLWriter;

class BusinessArea
{
    
    public $oib;
    
    public $noteOfBusinessArea;
    
    public $addressData;
    
    public $workingTime;
    
    public $dateOfusage;
    
    public $noteOfClosing = null;

    public $specificPurpose;

    public function setAddressData($addressData)
    {
        $this->addressData = $addressData;
    }

    public function setDateOfusage($dateOfusage) {
        $this->dateOfusage = $dateOfusage;
    }

    public function setNoteOfBusinessArea($noteOfBusinessArea)
    {
        $this->noteOfBusinessArea = $noteOfBusinessArea;
    }

    public function setOib($oib)
    {
        $this->oib = $oib;
    }

    public function setNoteOfClosing($noteOfClosing)
    {
        $this->noteOfClosing = $noteOfClosing;
    }

    public function setSpecificPurpose($purpose)
    {
        $this->specificPurpose = $purpose;
    }

    public function setWorkingTime($workingTime)
    {
        $this->workingTime = $workingTime;
    }

    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();
 
        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->startElementNs($ns, 'PoslovniProstor', null);
        $writer->writeElementNs($ns, 'Oib', null, $this->oib);
        $writer->writeElementNs($ns, 'OznPoslProstora', null, $this->noteOfBusinessArea);
        //AdresniPodatak
        $writer->writeRaw($this->addressData->toXML());
        $writer->writeElementNs($ns, 'RadnoVrijeme', null, $this->workingTime);
        $writer->writeElementNs($ns, 'DatumPocetkaPrimjene', null, $this->dateOfusage);
        
        if($this->noteOfClosing != NULL) {
            $writer->writeElementNs($ns, 'OznakaZatvaranja', null, $this->noteOfClosing);
        }
        
        $writer->writeElementNs($ns, 'SpecNamj', null, $this->specificPurpose);
        $writer->endElement();
        
        return $writer->outputMemory();
    }

}
