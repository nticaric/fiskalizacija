<?php

namespace Nticaric\Fiskalizacija\Generators\ProvjeraOdgovor;

/**
 * Class representing ProvjeraOdgovorAType
 */
class ProvjeraOdgovorAType
{
    /**
     * @var string $id
     */
    private $id = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\ZaglavljeOdgovorType $zaglavlje
     */
    private $zaglavlje = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\RacunType $racun
     */
    private $racun = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\RacunPDType $racunPD
     */
    private $racunPD = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\GreskaType[] $greske
     */
    private $greske = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\Signature $signature
     */
    private $signature = null;

    /**
     * Gets as id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets as zaglavlje
     *
     * @return \Nticaric\Fiskalizacija\Generators\ZaglavljeOdgovorType
     */
    public function getZaglavlje()
    {
        return $this->zaglavlje;
    }

    /**
     * Sets a new zaglavlje
     *
     * @param \Nticaric\Fiskalizacija\Generators\ZaglavljeOdgovorType $zaglavlje
     * @return self
     */
    public function setZaglavlje(\Nticaric\Fiskalizacija\Generators\ZaglavljeOdgovorType $zaglavlje)
    {
        $this->zaglavlje = $zaglavlje;
        return $this;
    }

    /**
     * Gets as racun
     *
     * @return \Nticaric\Fiskalizacija\Generators\RacunType
     */
    public function getRacun()
    {
        return $this->racun;
    }

    /**
     * Sets a new racun
     *
     * @param \Nticaric\Fiskalizacija\Generators\RacunType $racun
     * @return self
     */
    public function setRacun(?\Nticaric\Fiskalizacija\Generators\RacunType $racun = null)
    {
        $this->racun = $racun;
        return $this;
    }

    /**
     * Gets as racunPD
     *
     * @return \Nticaric\Fiskalizacija\Generators\RacunPDType
     */
    public function getRacunPD()
    {
        return $this->racunPD;
    }

    /**
     * Sets a new racunPD
     *
     * @param \Nticaric\Fiskalizacija\Generators\RacunPDType $racunPD
     * @return self
     */
    public function setRacunPD(?\Nticaric\Fiskalizacija\Generators\RacunPDType $racunPD = null)
    {
        $this->racunPD = $racunPD;
        return $this;
    }

    /**
     * Adds as greska
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\GreskaType $greska
     */
    public function addToGreske(\Nticaric\Fiskalizacija\Generators\GreskaType $greska)
    {
        $this->greske[] = $greska;
        return $this;
    }

    /**
     * isset greske
     *
     * @param int|string $index
     * @return bool
     */
    public function issetGreske($index)
    {
        return isset($this->greske[$index]);
    }

    /**
     * unset greske
     *
     * @param int|string $index
     * @return void
     */
    public function unsetGreske($index)
    {
        unset($this->greske[$index]);
    }

    /**
     * Gets as greske
     *
     * @return \Nticaric\Fiskalizacija\Generators\GreskaType[]
     */
    public function getGreske()
    {
        return $this->greske;
    }

    /**
     * Sets a new greske
     *
     * @param \Nticaric\Fiskalizacija\Generators\GreskaType[] $greske
     * @return self
     */
    public function setGreske(array $greske = null)
    {
        $this->greske = $greske;
        return $this;
    }

    /**
     * Gets as signature
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\Signature
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Sets a new signature
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\Signature $signature
     * @return self
     */
    public function setSignature(?\Nticaric\Fiskalizacija\Generators\Xmldsig\Signature $signature = null)
    {
        $this->signature = $signature;
        return $this;
    }
}

