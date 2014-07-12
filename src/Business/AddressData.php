<?php namespace Nticaric\Fiskalizacija\Business;

use XMLWriter;

class AddressData
{

	public $address;

	public function setAddress(Address $address)
	{
		$this->address = $address;
	}


	public function toXML()
	{
		$ns = 'tns';

		$writer = new XMLWriter();
    	$writer->openMemory();
 
    	$writer->setIndent(true);
    	$writer->setIndentString("    ");
		$writer->startElementNs($ns, 'AdresniPodatak', null);
		$writer->writeRaw($this->address->toXML());
		$writer->endElement();

		return $writer->outputMemory();
	}
}
