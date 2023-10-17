<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing TransformType
 *
 *
 * XSD Type: TransformType
 */
class TransformType
{
    /**
     * @var string $algorithm
     */
    private $algorithm = null;

    /**
     * @var string $xPath
     */
    private $xPath = null;

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
     * Gets as xPath
     *
     * @return string
     */
    public function getXPath()
    {
        return $this->xPath;
    }

    /**
     * Sets a new xPath
     *
     * @param string $xPath
     * @return self
     */
    public function setXPath($xPath)
    {
        $this->xPath = $xPath;
        return $this;
    }
}

