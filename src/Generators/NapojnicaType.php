<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing NapojnicaType
 *
 *
 * XSD Type: NapojnicaType
 */
class NapojnicaType
{
    /**
     * @var string $iznosNapojnice
     */
    private $iznosNapojnice = null;

    /**
     * @var string $nacinPlacanjaNapojnice
     */
    private $nacinPlacanjaNapojnice = null;

    /**
     * Gets as iznosNapojnice
     *
     * @return string
     */
    public function getIznosNapojnice()
    {
        return $this->iznosNapojnice;
    }

    /**
     * Sets a new iznosNapojnice
     *
     * @param string $iznosNapojnice
     * @return self
     */
    public function setIznosNapojnice($iznosNapojnice)
    {
        $this->iznosNapojnice = $iznosNapojnice;
        return $this;
    }

    /**
     * Gets as nacinPlacanjaNapojnice
     *
     * @return string
     */
    public function getNacinPlacanjaNapojnice()
    {
        return $this->nacinPlacanjaNapojnice;
    }

    /**
     * Sets a new nacinPlacanjaNapojnice
     *
     * @param string $nacinPlacanjaNapojnice
     * @return self
     */
    public function setNacinPlacanjaNapojnice($nacinPlacanjaNapojnice)
    {
        $this->nacinPlacanjaNapojnice = $nacinPlacanjaNapojnice;
        return $this;
    }
}

