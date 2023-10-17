<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing PorukaOdgovoraType
 *
 *
 * XSD Type: PorukaOdgovoraType
 */
class PorukaOdgovoraType
{
    /**
     * @var string $sifraPoruke
     */
    private $sifraPoruke = null;

    /**
     * @var string $poruka
     */
    private $poruka = null;

    /**
     * Gets as sifraPoruke
     *
     * @return string
     */
    public function getSifraPoruke()
    {
        return $this->sifraPoruke;
    }

    /**
     * Sets a new sifraPoruke
     *
     * @param string $sifraPoruke
     * @return self
     */
    public function setSifraPoruke($sifraPoruke)
    {
        $this->sifraPoruke = $sifraPoruke;
        return $this;
    }

    /**
     * Gets as poruka
     *
     * @return string
     */
    public function getPoruka()
    {
        return $this->poruka;
    }

    /**
     * Sets a new poruka
     *
     * @param string $poruka
     * @return self
     */
    public function setPoruka($poruka)
    {
        $this->poruka = $poruka;
        return $this;
    }
}

