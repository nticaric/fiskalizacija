<?php namespace Nticaric\Fiskalizacija;

use DateTime;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

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
        // Unlike the Builder, the QrCode constructor and PngWriter::write() work the same in endroid/qr-code 5 and 6
        $url    = $this->generateUrl();
        $qrCode = new QrCode($url, new Encoding('UTF-8'), ErrorCorrectionLevel::Medium, 135);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        return $result->getDataUri();
    }
}
