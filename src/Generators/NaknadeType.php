<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing NaknadeType
 *
 *
 * XSD Type: NaknadeType
 */
class NaknadeType
{
    /**
     * @var \Nticaric\Fiskalizacija\Generators\NaknadaType[] $naknada
     */
    private $naknada = [
        
    ];

    /**
     * Adds as naknada
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\NaknadaType $naknada
     */
    public function addToNaknada(\Nticaric\Fiskalizacija\Generators\NaknadaType $naknada)
    {
        $this->naknada[] = $naknada;
        return $this;
    }

    /**
     * isset naknada
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNaknada($index)
    {
        return isset($this->naknada[$index]);
    }

    /**
     * unset naknada
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNaknada($index)
    {
        unset($this->naknada[$index]);
    }

    /**
     * Gets as naknada
     *
     * @return \Nticaric\Fiskalizacija\Generators\NaknadaType[]
     */
    public function getNaknada()
    {
        return $this->naknada;
    }

    /**
     * Sets a new naknada
     *
     * @param \Nticaric\Fiskalizacija\Generators\NaknadaType[] $naknada
     * @return self
     */
    public function setNaknada(array $naknada)
    {
        $this->naknada = $naknada;
        return $this;
    }
}

