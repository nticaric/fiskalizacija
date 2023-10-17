<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing SignatureMethodType
 *
 *
 * XSD Type: SignatureMethodType
 */
class SignatureMethodType
{
    /**
     * @var string $algorithm
     */
    private $algorithm = null;

    /**
     * @var int $hMACOutputLength
     */
    private $hMACOutputLength = null;

    /**
     * Gets as algorithm
     *
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Sets a new algorithm
     *
     * @param string $algorithm
     * @return self
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    /**
     * Gets as hMACOutputLength
     *
     * @return int
     */
    public function getHMACOutputLength()
    {
        return $this->hMACOutputLength;
    }

    /**
     * Sets a new hMACOutputLength
     *
     * @param int $hMACOutputLength
     * @return self
     */
    public function setHMACOutputLength($hMACOutputLength)
    {
        $this->hMACOutputLength = $hMACOutputLength;
        return $this;
    }
}

