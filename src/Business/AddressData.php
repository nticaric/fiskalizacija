<?php namespace Nticaric\Fiskalizacija\Business;

use XMLWriter;

class AddressData
{

	public $address;

	public $otherTypeOfBusinessArea;

	public function setAddress(Address $address)
	{
		$this->address = $address;
	}

	public function setOtherTypeOfBusinessArea($otherTypeOfBusinessArea)
	{
		$this->otherTypeOfBusinessArea = $otherTypeOfBusinessArea;
	}

	public function toXML()
	{
		$ns = 'tns';

		$writer = new XMLWriter();
    	$writer->openMemory();
 
    	$writer->setIndent(true);
    	$writer->setIndentString("    ");
		$writer->startElementNs($ns, 'AdresniPodatak', null);

		if($this->address) {
			$writer->writeRaw($this->address->toXML());
		}

		if($this->otherTypeOfBusinessArea) {
			$writer->writeElementNs($ns, 'OstaliTipoviPP', null, $this->otherTypeOfBusinessArea);
		}

		$writer->endElement();

		return $writer->outputMemory();
	}
}
