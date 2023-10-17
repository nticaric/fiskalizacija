<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing X509DataType
 *
 *
 * XSD Type: X509DataType
 */
class X509DataType
{
    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\X509IssuerSerialType $x509IssuerSerial
     */
    private $x509IssuerSerial = null;

    /**
     * @var string $x509SKI
     */
    private $x509SKI = null;

    /**
     * @var string $x509SubjectName
     */
    private $x509SubjectName = null;

    /**
     * @var string $x509Certificate
     */
    private $x509Certificate = null;

    /**
     * @var string $x509CRL
     */
    private $x509CRL = null;

    /**
     * Gets as x509IssuerSerial
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\X509IssuerSerialType
     */
    public function getX509IssuerSerial()
    {
        return $this->x509IssuerSerial;
    }

    /**
     * Sets a new x509IssuerSerial
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\X509IssuerSerialType $x509IssuerSerial
     * @return self
     */
    public function setX509IssuerSerial(?\Nticaric\Fiskalizacija\Generators\Xmldsig\X509IssuerSerialType $x509IssuerSerial = null)
    {
        $this->x509IssuerSerial = $x509IssuerSerial;
        return $this;
    }

    /**
     * Gets as x509SKI
     *
     * @return string
     */
    public function getX509SKI()
    {
        return $this->x509SKI;
    }

    /**
     * Sets a new x509SKI
     *
     * @param string $x509SKI
     * @return self
     */
    public function setX509SKI($x509SKI)
    {
        $this->x509SKI = $x509SKI;
        return $this;
    }

    /**
     * Gets as x509SubjectName
     *
     * @return string
     */
    public function getX509SubjectName()
    {
        return $this->x509SubjectName;
    }

    /**
     * Sets a new x509SubjectName
     *
     * @param string $x509SubjectName
     * @return self
     */
    public function setX509SubjectName($x509SubjectName)
    {
        $this->x509SubjectName = $x509SubjectName;
        return $this;
    }

    /**
     * Gets as x509Certificate
     *
     * @return string
     */
    public function getX509Certificate()
    {
        return $this->x509Certificate;
    }

    /**
     * Sets a new x509Certificate
     *
     * @param string $x509Certificate
     * @return self
     */
    public function setX509Certificate($x509Certificate)
    {
        $this->x509Certificate = $x509Certificate;
        return $this;
    }

    /**
     * Gets as x509CRL
     *
     * @return string
     */
    public function getX509CRL()
    {
        return $this->x509CRL;
    }

    /**
     * Sets a new x509CRL
     *
     * @param string $x509CRL
     * @return self
     */
    public function setX509CRL($x509CRL)
    {
        $this->x509CRL = $x509CRL;
        return $this;
    }
}

