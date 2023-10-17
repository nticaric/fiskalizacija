<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing PorezType
 *
 *
 * XSD Type: PorezType
 */
class PorezType
{
    /**
     * Iznos porezne stope.
     *
     * @var string $stopa
     */
    private $stopa = null;

    /**
     * Iznos osnovice.
     *
     * @var string $osnovica
     */
    private $osnovica = null;

    /**
     * Iznos poreza.
     *
     * @var string $iznos
     */
    private $iznos = null;

    public function __construct($stopa, $osnovica, $iznos)
    {
        $this->stopa    = $stopa;
        $this->osnovica = $osnovica;
        $this->iznos    = $iznos;
    }

    /**
     * Gets as stopa
     *
     * Iznos porezne stope.
     *
     * @return string
     */
    public function getStopa()
    {
        return $this->stopa;
    }

    /**
     * Sets a new stopa
     *
     * Iznos porezne stope.
     *
     * @param string $stopa
     * @return self
     */
    public function setStopa($stopa)
    {
        $this->stopa = $stopa;
        return $this;
    }

    /**
     * Gets as osnovica
     *
     * Iznos osnovice.
     *
     * @return string
     */
    public function getOsnovica()
    {
        return $this->osnovica;
    }

    /**
     * Sets a new osnovica
     *
     * Iznos osnovice.
     *
     * @param string $osnovica
     * @return self
     */
    public function setOsnovica($osnovica)
    {
        $this->osnovica = $osnovica;
        return $this;
    }

    /**
     * Gets as iznos
     *
     * Iznos poreza.
     *
     * @return string
     */
    public function getIznos()
    {
        return $this->iznos;
    }

    /**
     * Sets a new iznos
     *
     * Iznos poreza.
     *
     * @param string $iznos
     * @return self
     */
    public function setIznos($iznos)
    {
        $this->iznos = $iznos;
        return $this;
    }
}
