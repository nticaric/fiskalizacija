<?php

namespace Nticaric\Fiskalizacija\Generators\ProvjeraZahtjev;

/**
 * Class representing ProvjeraZahtjevAType
 */
class ProvjeraZahtjevAType
{
    /**
     * @var string $id
     */
    private $id = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\ZaglavljeType $zaglavlje
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
     * @return \Nticaric\Fiskalizacija\Generators\ZaglavljeType
     */
    public function getZaglavlje()
    {
        return $this->zaglavlje;
    }

    /**
     * Sets a new zaglavlje
     *
     * @param \Nticaric\Fiskalizacija\Generators\ZaglavljeType $zaglavlje
     * @return self
     */
    public function setZaglavlje(\Nticaric\Fiskalizacija\Generators\ZaglavljeType $zaglavlje)
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

