<?php namespace Nticaric\Fiskalizacija;

use DateTime;
use Endroid\QrCode\QrCode;

class QRGenerator
{
    private $jir;
    private $date;
    private $amount;

    public function __construct($jir, $date, $amount)
    {
        $this->jir    = $jir;
        $this->date   = $date;
        $this->amount = $amount;
    }

    public function generateUrl()
    {
        $formattedDate   = DateTime::createFromFormat('d.m.Y\TH:i:s', $this->date)->format('Ymd_Hi');
        $formattedAmount = number_format($this->amount, 2, ',', '');
        $url             = sprintf(
            'https://porezna.gov.hr/rn?jir=%s&datv=%s&izn=%s',
            $this->jir,
            $formattedDate,
            $formattedAmount
        );
        return $url;
    }

    public function getQrCode()
    {
        $url    = $this->generateUrl();
        $qrCode = new QrCode($url);
        return base64_encode($qrCode->writeString());
    }
}
