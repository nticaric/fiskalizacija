<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing CanonicalizationMethodType
 *
 *
 * XSD Type: CanonicalizationMethodType
 */
class CanonicalizationMethodType
{
    /**
     * @var string $algorithm
     */
    private $algorithm = null;

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
}

