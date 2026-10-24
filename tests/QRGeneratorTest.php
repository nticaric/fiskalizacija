<?php

use Nticaric\Fiskalizacija\QRGenerator;
use PHPUnit\Framework\TestCase;

class QRGeneratorTest extends TestCase
{
    public function testQrCodeIsPngDataUri()
    {
        $qrGenerator = new QRGenerator(str_repeat('a', 36), "15.07.2014T20:00:00", 456.1);

        $dataUri = $qrGenerator->getQrCode();

        $this->assertStringStartsWith('data:image/png;base64,', $dataUri);

        $image = getimagesizefromstring(base64_decode(substr($dataUri, strlen('data:image/png;base64,'))));

        // 135 px of code plus the default 10 px margin on each side
        $this->assertSame([155, 155], [$image[0], $image[1]]);
    }
}
