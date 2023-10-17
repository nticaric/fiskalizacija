<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing RSAKeyValueType
 *
 *
 * XSD Type: RSAKeyValueType
 */
class RSAKeyValueType
{
    /**
     * @var string $modulus
     */
    private $modulus = null;

    /**
     * @var string $exponent
     */
    private $exponent = null;

    /**
     * Gets as modulus
     *
     * @return string
     */
    public function getModulus()
    {
        return $this->modulus;
    }

    /**
     * Sets a new modulus
     *
     * @param string $modulus
     * @return self
     */
    public function setModulus($modulus)
    {
        $this->modulus = $modulus;
        return $this;
    }

    /**
     * Gets as exponent
     *
     * @return string
     */
    public function getExponent()
    {
        return $this->exponent;
    }

    /**
     * Sets a new exponent
     *
     * @param string $exponent
     * @return self
     */
    public function setExponent($exponent)
    {
        $this->exponent = $exponent;
        return $this;
    }
}

