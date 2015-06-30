<?php namespace Nticaric\Fiskalizacija\Business;

use Nticaric\Fiskalizacija\Request;

class BusinessAreaRequest extends Request
{
    public function __construct(BusinessArea $businessArea)
    {
        $this->request = $businessArea;
        $this->requestName = 'PoslovniProstorZahtjev';
    }
}
