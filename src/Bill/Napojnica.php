<?php namespace Nticaric\Fiskalizacija\Bill;

use XMLWriter;

class Napojnica
{

    protected $iznosNapojnice;
    protected $nacinPlacanja;

    protected $validNacinPlacanja = ['G', 'K', 'C', 'T', 'O'];

    public function __construct($iznosNapojnice, $nacinPlacanja)
    {
        $this->iznosNapojnice = $iznosNapojnice;
        $this->setNacinPlacanjaNapojnice($nacinPlacanja);
    }

    public function setIznosNapojnice($iznos)
    {
        $this->iznosNapojnice = $iznos;
    }

    public function setNacinPlacanjaNapojnice($nacinPlacanja)
    {
        if (!in_array($nacinPlacanja, $this->validNacinPlacanja)) {
            throw new InvalidArgumentException("Invalid nacinPlacanja value: $nacinPlacanja. Must be one of: " . implode(', ', $this->validNacinPlacanja));
        }
        $this->nacinPlacanja = $nacinPlacanja;
    }

    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();

        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->writeElementNs($ns, 'iznosNapojnice', null, number_format($this->iznosNapojnice, 2, '.', ''));
        $writer->writeElementNs($ns, 'nacinPlacanjaNapojnice', null, $this->nacinPlacanja);

        $writer->endElement();

        return $writer->outputMemory();
    }

}
