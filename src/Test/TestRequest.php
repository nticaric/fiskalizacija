<?php namespace Nticaric\Fiskalizacija\Test;

use Nticaric\Fiskalizacija\Request;
use XMLWriter;

class TestRequest extends Request
{
    public function __construct(Test $test)
    {
        $this->request     = $test;
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
        $writer->writeRaw($this->request->toXML());
        $writer->endElement();
        
        return $writer->outputMemory();

    }
}
