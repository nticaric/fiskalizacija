<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing BrojPDType
 *
 *
 * XSD Type: BrojPDType
 */
class BrojPDType
{
    /**
     * Brojcana oznaka prateceg dokumenta.
     *
     * @var string $brOznPD
     */
    private $brOznPD = null;

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

    /**
     * Gets as brOznPD
     *
     * Brojcana oznaka prateceg dokumenta.
     *
     * @return string
     */
    public function getBrOznPD()
    {
        return $this->brOznPD;
    }

    /**
     * Sets a new brOznPD
     *
     * Brojcana oznaka prateceg dokumenta.
     *
     * @param string $brOznPD
     * @return self
     */
    public function setBrOznPD($brOznPD)
    {
        $this->brOznPD = $brOznPD;
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

