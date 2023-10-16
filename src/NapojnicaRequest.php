<?php namespace Nticaric\Fiskalizacija;

use Nticaric\Fiskalizacija\Bill\Bill;
use Nticaric\Fiskalizacija\Request;
use XMLWriter;

class NapojnicaRequest extends Request
{

    public function __construct(Bill $bill)
    {
        $this->request     = $bill;
        $this->requestName = 'NapojnicaZahtjev';
    }
}
