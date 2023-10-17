<?php

namespace Nticaric\Fiskalizacija\Generators\RacunPDType;

/**
 * Class representing PrateciDokumentAType
 */
class PrateciDokumentAType
{
    /**
     * @var string $jirPD
     */
    private $jirPD = null;

    /**
     * Zastitni kod izdavatelja prateceg dokumenta.
     *  Zastitni kod izdavatelja prateceg dokumenta obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog prateceg dokumenta. Zastitni kod generira obveznik fiskalizacije.
     *
     * @var string $zastKodPD
     */
    private $zastKodPD = null;

    /**
     * Gets as jirPD
     *
     * @return string
     */
    public function getJirPD()
    {
        return $this->jirPD;
    }

    /**
     * Sets a new jirPD
     *
     * @param string $jirPD
     * @return self
     */
    public function setJirPD($jirPD)
    {
        $this->jirPD = $jirPD;
        return $this;
    }

    /**
     * Gets as zastKodPD
     *
     * Zastitni kod izdavatelja prateceg dokumenta.
     *  Zastitni kod izdavatelja prateceg dokumenta obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog prateceg dokumenta. Zastitni kod generira obveznik fiskalizacije.
     *
     * @return string
     */
    public function getZastKodPD()
    {
        return $this->zastKodPD;
    }

    /**
     * Sets a new zastKodPD
     *
     * Zastitni kod izdavatelja prateceg dokumenta.
     *  Zastitni kod izdavatelja prateceg dokumenta obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog prateceg dokumenta. Zastitni kod generira obveznik fiskalizacije.
     *
     * @param string $zastKodPD
     * @return self
     */
    public function setZastKodPD($zastKodPD)
    {
        $this->zastKodPD = $zastKodPD;
        return $this;
    }
}

