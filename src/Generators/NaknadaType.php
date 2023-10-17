<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing NaknadaType
 *
 *
 * XSD Type: NaknadaType
 */
class NaknadaType
{
    /**
     * Naziv naknade.
     *
     * @var string $nazivN
     */
    private $nazivN = null;

    /**
     * Iznos naknade.
     *
     * @var string $iznosN
     */
    private $iznosN = null;

    /**
     * Gets as nazivN
     *
     * Naziv naknade.
     *
     * @return string
     */
    public function getNazivN()
    {
        return $this->nazivN;
    }

    /**
     * Sets a new nazivN
     *
     * Naziv naknade.
     *
     * @param string $nazivN
     * @return self
     */
    public function setNazivN($nazivN)
    {
        $this->nazivN = $nazivN;
        return $this;
    }

    /**
     * Gets as iznosN
     *
     * Iznos naknade.
     *
     * @return string
     */
    public function getIznosN()
    {
        return $this->iznosN;
    }

    /**
     * Sets a new iznosN
     *
     * Iznos naknade.
     *
     * @param string $iznosN
     * @return self
     */
    public function setIznosN($iznosN)
    {
        $this->iznosN = $iznosN;
        return $this;
    }
}

