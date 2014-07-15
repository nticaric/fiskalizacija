<?php namespace Nticaric\Fiskalizacija\Bill;

use XMLWriter;

class TaxRate
{
    public $name;

    public $rate;

    public $baseValue;
    
    public $value;
    
    public function __construct($rate, $baseValue, $value, $name) 
    {
        $this->name      = $name;
        $this->rate      = number_format($rate, 2);
        $this->baseValue = number_format($baseValue, 2);
        $this->value     = number_format($value, 2);
    }

    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();
    
        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->startElementNs($ns, 'Porez', null);
        if($this->name) {
            $writer->writeElementNs($ns, 'Naziv', null, $this->name);    
        }
        $writer->writeElementNs($ns, 'Stopa', null, number_format($this->rate, 2));
        $writer->writeElementNs($ns, 'Osnovica', null, number_format($this->baseValue, 2));
        $writer->writeElementNs($ns, 'Iznos', null, number_format($this->value, 2));
        $writer->endElement();

        return $writer->outputMemory();
    }
}
