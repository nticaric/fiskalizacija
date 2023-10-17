<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing X509IssuerSerialType
 *
 *
 * XSD Type: X509IssuerSerialType
 */
class X509IssuerSerialType
{
    /**
     * @var string $x509IssuerName
     */
    private $x509IssuerName = null;

    /**
     * @var int $x509SerialNumber
     */
    private $x509SerialNumber = null;

    /**
     * Gets as x509IssuerName
     *
     * @return string
     */
    public function getX509IssuerName()
    {
        return $this->x509IssuerName;
    }

    /**
     * Sets a new x509IssuerName
     *
     * @param string $x509IssuerName
     * @return self
     */
    public function setX509IssuerName($x509IssuerName)
    {
        $this->x509IssuerName = $x509IssuerName;
        return $this;
    }

    /**
     * Gets as x509SerialNumber
     *
     * @return int
     */
    public function getX509SerialNumber()
    {
        return $this->x509SerialNumber;
    }

    /**
     * Sets a new x509SerialNumber
     *
     * @param int $x509SerialNumber
     * @return self
     */
    public function setX509SerialNumber($x509SerialNumber)
    {
        $this->x509SerialNumber = $x509SerialNumber;
        return $this;
    }
}

