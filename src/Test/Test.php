<?php namespace Nticaric\Fiskalizacija\Test;

use XMLWriter;

class Test
{
    
    public $message = "";

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();
 
        $writer->setIndent(true);
        $writer->setIndentString("    ");

        $writer->writeRaw($this->message);
        $writer->endElement();
        
        return $writer->outputMemory();
    }

}
