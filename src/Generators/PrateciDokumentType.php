<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing PrateciDokumentType
 *
 *
 * XSD Type: PrateciDokumentType
 */
class PrateciDokumentType
{
    /**
     * Osobni identifikacijski broj obveznika fiskalizacije.
     *
     * @var string $oib
     */
    private $oib = null;

    /**
     * Datum i vrijeme izdavanja racuna koji se ispisuju na racunu.
     *
     * @var string $datVrijeme
     */
    private $datVrijeme = null;

    /**
     * Broj prateceg dokumenta.
     *
     * @var \Nticaric\Fiskalizacija\Generators\BrojPDType $brPratecegDokumenta
     */
    private $brPratecegDokumenta = null;

    /**
     * Ukupan iznos koji se iskazuje na racunu.
     *
     * @var string $iznosUkupno
     */
    private $iznosUkupno = null;

    /**
     * Zastitni kod izdavatelja.
     *  Zastitni kod izdavatelja obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog racuna. Zastitni kod generira obveznik fiskalizacije.
     *
     * @var string $zastKodPD
     */
    private $zastKodPD = null;

    /**
     * Oznaka naknadne dostave racuna.
     *  Obvezno se dostavlja u slucaju naknadne dostave racuna kad je isti prethodno izdan kupcu
     *  bez JIR-a (prekid Internet veze ili potpuni prestanak rada naplatnog uredjaja).
     *
     * @var bool $nakDost
     */
    private $nakDost = null;

    /**
     * Gets as oib
     *
     * Osobni identifikacijski broj obveznika fiskalizacije.
     *
     * @return string
     */
    public function getOib()
    {
        return $this->oib;
    }

    /**
     * Sets a new oib
     *
     * Osobni identifikacijski broj obveznika fiskalizacije.
     *
     * @param string $oib
     * @return self
     */
    public function setOib($oib)
    {
        $this->oib = $oib;
        return $this;
    }

    /**
     * Gets as datVrijeme
     *
     * Datum i vrijeme izdavanja racuna koji se ispisuju na racunu.
     *
     * @return string
     */
    public function getDatVrijeme()
    {
        return $this->datVrijeme;
    }

    /**
     * Sets a new datVrijeme
     *
     * Datum i vrijeme izdavanja racuna koji se ispisuju na racunu.
     *
     * @param string $datVrijeme
     * @return self
     */
    public function setDatVrijeme($datVrijeme)
    {
        $this->datVrijeme = $datVrijeme;
        return $this;
    }

    /**
     * Gets as brPratecegDokumenta
     *
     * Broj prateceg dokumenta.
     *
     * @return \Nticaric\Fiskalizacija\Generators\BrojPDType
     */
    public function getBrPratecegDokumenta()
    {
        return $this->brPratecegDokumenta;
    }

    /**
     * Sets a new brPratecegDokumenta
     *
     * Broj prateceg dokumenta.
     *
     * @param \Nticaric\Fiskalizacija\Generators\BrojPDType $brPratecegDokumenta
     * @return self
     */
    public function setBrPratecegDokumenta(\Nticaric\Fiskalizacija\Generators\BrojPDType $brPratecegDokumenta)
    {
        $this->brPratecegDokumenta = $brPratecegDokumenta;
        return $this;
    }

    /**
     * Gets as iznosUkupno
     *
     * Ukupan iznos koji se iskazuje na racunu.
     *
     * @return string
     */
    public function getIznosUkupno()
    {
        return $this->iznosUkupno;
    }

    /**
     * Sets a new iznosUkupno
     *
     * Ukupan iznos koji se iskazuje na racunu.
     *
     * @param string $iznosUkupno
     * @return self
     */
    public function setIznosUkupno($iznosUkupno)
    {
        $this->iznosUkupno = number_format($iznosUkupno, 2, '.', '');
        return $this;
    }

    /**
     * Gets as zastKodPD
     *
     * Zastitni kod izdavatelja.
     *  Zastitni kod izdavatelja obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog racuna. Zastitni kod generira obveznik fiskalizacije.
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
     * Zastitni kod izdavatelja.
     *  Zastitni kod izdavatelja obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog racuna. Zastitni kod generira obveznik fiskalizacije.
     *
     * @param string $zastKodPD
     * @return self
     */
    public function setZastKodPD($zastKodPD)
    {
        $this->zastKodPD = $zastKodPD;
        return $this;
    }

    /**
     * Gets as nakDost
     *
     * Oznaka naknadne dostave racuna.
     *  Obvezno se dostavlja u slucaju naknadne dostave racuna kad je isti prethodno izdan kupcu
     *  bez JIR-a (prekid Internet veze ili potpuni prestanak rada naplatnog uredjaja).
     *
     * @return bool
     */
    public function getNakDost()
    {
        return $this->nakDost;
    }

    /**
     * Sets a new nakDost
     *
     * Oznaka naknadne dostave racuna.
     *  Obvezno se dostavlja u slucaju naknadne dostave racuna kad je isti prethodno izdan kupcu
     *  bez JIR-a (prekid Internet veze ili potpuni prestanak rada naplatnog uredjaja).
     *
     * @param bool $nakDost
     * @return self
     */
    public function setNakDost($nakDost)
    {
        $this->nakDost = $nakDost;
        return $this;
    }
}
