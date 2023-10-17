<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing DSAKeyValueType
 *
 *
 * XSD Type: DSAKeyValueType
 */
class DSAKeyValueType
{
    /**
     * @var string $p
     */
    private $p = null;

    /**
     * @var string $q
     */
    private $q = null;

    /**
     * @var string $g
     */
    private $g = null;

    /**
     * @var string $y
     */
    private $y = null;

    /**
     * @var string $j
     */
    private $j = null;

    /**
     * @var string $seed
     */
    private $seed = null;

    /**
     * @var string $pgenCounter
     */
    private $pgenCounter = null;

    /**
     * Gets as p
     *
     * @return string
     */
    public function getP()
    {
        return $this->p;
    }

    /**
     * Sets a new p
     *
     * @param string $p
     * @return self
     */
    public function setP($p)
    {
        $this->p = $p;
        return $this;
    }

    /**
     * Gets as q
     *
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * Sets a new q
     *
     * @param string $q
     * @return self
     */
    public function setQ($q)
    {
        $this->q = $q;
        return $this;
    }

    /**
     * Gets as g
     *
     * @return string
     */
    public function getG()
    {
        return $this->g;
    }

    /**
     * Sets a new g
     *
     * @param string $g
     * @return self
     */
    public function setG($g)
    {
        $this->g = $g;
        return $this;
    }

    /**
     * Gets as y
     *
     * @return string
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Sets a new y
     *
     * @param string $y
     * @return self
     */
    public function setY($y)
    {
        $this->y = $y;
        return $this;
    }

    /**
     * Gets as j
     *
     * @return string
     */
    public function getJ()
    {
        return $this->j;
    }

    /**
     * Sets a new j
     *
     * @param string $j
     * @return self
     */
    public function setJ($j)
    {
        $this->j = $j;
        return $this;
    }

    /**
     * Gets as seed
     *
     * @return string
     */
    public function getSeed()
    {
        return $this->seed;
    }

    /**
     * Sets a new seed
     *
     * @param string $seed
     * @return self
     */
    public function setSeed($seed)
    {
        $this->seed = $seed;
        return $this;
    }

    /**
     * Gets as pgenCounter
     *
     * @return string
     */
    public function getPgenCounter()
    {
        return $this->pgenCounter;
    }

    /**
     * Sets a new pgenCounter
     *
     * @param string $pgenCounter
     * @return self
     */
    public function setPgenCounter($pgenCounter)
    {
        $this->pgenCounter = $pgenCounter;
        return $this;
    }
}

