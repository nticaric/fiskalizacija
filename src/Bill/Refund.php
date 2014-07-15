<?php namespace Nticaric\Fiskalizacija\Bill;

use XMLWriter;

class Refund 
{
	public $nameRefund;

	public $valueRefund;

	public function __construct ($nameRefund, $valueRefund) 
	{
		$this->nameRefund  = $nameRefund;
		$this->valueRefund = $valueRefund;
	}

	public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();
    
        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->startElementNs($ns, 'Naknada', null);
        $writer->writeElementNs($ns, 'NazivN', null, $this->nameRefund);
        $writer->writeElementNs($ns, 'IznosN', null, $this->valueRefund);
        $writer->endElement();

        return $writer->outputMemory();
    }
}