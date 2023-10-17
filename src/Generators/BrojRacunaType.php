<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing BrojRacunaType
 *
 *
 * XSD Type: BrojRacunaType
 */
class BrojRacunaType
{

    /**
     * Brojcana oznaka racuna.
     *
     * @var string $brOznRac
     */
    private $brOznRac = null;

    /**
     * Oznaka poslovnog prostora.
     *
     * @var string $oznPosPr
     */
    private $oznPosPr = null;

    /**
     * Oznaka naplatnog uredjaja.
     *
     * @var string $oznNapUr
     */
    private $oznNapUr = null;

    public function __construct($brOznRac, $oznPosPr, $oznNapUr)
    {
        $this->brOznRac = $brOznRac;
        $this->oznPosPr = $oznPosPr;
        $this->oznNapUr = $oznNapUr;
    }

    /**
     * Gets as brOznRac
     *
     * Brojcana oznaka racuna.
     *
     * @return string
     */
    public function getBrOznRac()
    {
        return $this->brOznRac;
    }

    /**
     * Sets a new brOznRac
     *
     * Brojcana oznaka racuna.
     *
     * @param string $brOznRac
     * @return self
     */
    public function setBrOznRac($brOznRac)
    {
        $this->brOznRac = $brOznRac;
        return $this;
    }

    /**
     * Gets as oznPosPr
     *
     * Oznaka poslovnog prostora.
     *
     * @return string
     */
    public function getOznPosPr()
    {
        return $this->oznPosPr;
    }

    /**
     * Sets a new oznPosPr
     *
     * Oznaka poslovnog prostora.
     *
     * @param string $oznPosPr
     * @return self
     */
    public function setOznPosPr($oznPosPr)
    {
        $this->oznPosPr = $oznPosPr;
        return $this;
    }

    /**
     * Gets as oznNapUr
     *
     * Oznaka naplatnog uredjaja.
     *
     * @return string
     */
    public function getOznNapUr()
    {
        return $this->oznNapUr;
    }

    /**
     * Sets a new oznNapUr
     *
     * Oznaka naplatnog uredjaja.
     *
     * @param string $oznNapUr
     * @return self
     */
    public function setOznNapUr($oznNapUr)
    {
        $this->oznNapUr = $oznNapUr;
        return $this;
    }
}
