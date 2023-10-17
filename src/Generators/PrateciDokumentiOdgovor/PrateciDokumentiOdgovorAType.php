<?php

namespace Nticaric\Fiskalizacija\Generators\PrateciDokumentiOdgovor;

/**
 * Class representing PrateciDokumentiOdgovorAType
 */
class PrateciDokumentiOdgovorAType
{
    /**
     * Atribut za potrebe digitalnog potpisa, u njega se stavlja referentni na koji se referencira digitalni potpis.
     *
     * @var string $id
     */
    private $id = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\ZaglavljeOdgovorType $zaglavlje
     */
    private $zaglavlje = null;

    /**
     * Jedinstveni identifikator prateceg dokumenta.
     *
     * @var string $jir
     */
    private $jir = null;

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
     * Atribut za potrebe digitalnog potpisa, u njega se stavlja referentni na koji se referencira digitalni potpis.
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
     * Atribut za potrebe digitalnog potpisa, u njega se stavlja referentni na koji se referencira digitalni potpis.
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
     * Gets as jir
     *
     * Jedinstveni identifikator prateceg dokumenta.
     *
     * @return string
     */
    public function getJir()
    {
        return $this->jir;
    }

    /**
     * Sets a new jir
     *
     * Jedinstveni identifikator prateceg dokumenta.
     *
     * @param string $jir
     * @return self
     */
    public function setJir($jir)
    {
        $this->jir = $jir;
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

