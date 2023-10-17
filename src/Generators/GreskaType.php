<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing GreskaType
 *
 *
 * XSD Type: GreskaType
 */
class GreskaType
{
    /**
     * @var string $sifraGreske
     */
    private $sifraGreske = null;

    /**
     * @var string $porukaGreske
     */
    private $porukaGreske = null;

    /**
     * Gets as sifraGreske
     *
     * @return string
     */
    public function getSifraGreske()
    {
        return $this->sifraGreske;
    }

    /**
     * Sets a new sifraGreske
     *
     * @param string $sifraGreske
     * @return self
     */
    public function setSifraGreske($sifraGreske)
    {
        $this->sifraGreske = $sifraGreske;
        return $this;
    }

    /**
     * Gets as porukaGreske
     *
     * @return string
     */
    public function getPorukaGreske()
    {
        return $this->porukaGreske;
    }

    /**
     * Sets a new porukaGreske
     *
     * @param string $porukaGreske
     * @return self
     */
    public function setPorukaGreske($porukaGreske)
    {
        $this->porukaGreske = $porukaGreske;
        return $this;
    }
}

