<?php namespace Nticaric\Fiskalizacija\Bill;

use XMLWriter;

class BillNumber 
{
    public $numberNoteBill;
    
    public $noteOfBusinessArea;

    public $noteOfExcangeDevice;
    
    public function __construct($numberNoteBill, $noteOfBusinessArea, $noteOfExcangeDevice) 
    {
        $this->numberNoteBill = $numberNoteBill;
        $this->noteOfBusinessArea = $noteOfBusinessArea;
        $this->noteOfExcangeDevice = $noteOfExcangeDevice;
    }
    
    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();
    
        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->startElementNs($ns, 'BrRac', null);
        $writer->writeElementNs($ns, 'BrOznRac', null, $this->numberNoteBill);
        $writer->writeElementNs($ns, 'OznPosPr', null, $this->noteOfBusinessArea);
        $writer->writeElementNs($ns, 'OznNapUr', null, $this->noteOfExcangeDevice);
        $writer->endElement();

        return $writer->outputMemory();
    }
}
