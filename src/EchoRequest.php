<?php namespace Nticaric\Fiskalizacija;

use Nticaric\Fiskalizacija\Request;
use XMLWriter;

class EchoRequest extends Request
{
    protected $message;

    public function __construct(string $message)
    {
        $this->message     = $message;
        $this->requestName = 'EchoRequest';
    }

    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();

        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->startElementNs($ns, $this->requestName, 'http://www.apis-it.hr/fin/2012/types/f73');
        $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttribute('xsi:schemaLocation', 'http://www.apis-it.hr/fin/2012/types/f73 FiskalizacijaSchema.xsd');
        $writer->writeRaw($this->message);
        $writer->endElement();

        return $writer->outputMemory();

    }
}
