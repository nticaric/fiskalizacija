<?php namespace Nticaric\Fiskalizacija\Business;

use Nticaric\Fiskalizacija\Request;
use XMLWriter;

class BusinessAreaRequest extends Request
{
    public function __construct(BusinessArea $businessArea)
    {
        $this->request     = $businessArea;
        $this->requestName = 'PoslovniProstorZahtjev';
    }
}