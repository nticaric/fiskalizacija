<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing PdvType
 *
 *
 * XSD Type: PdvType
 */
class PdvType
{
    /**
     * @var \Nticaric\Fiskalizacija\Generators\PorezType[] $porez
     */
    private $porez = [
        
    ];

    /**
     * Adds as porez
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\PorezType $porez
     */
    public function addToPorez(\Nticaric\Fiskalizacija\Generators\PorezType $porez)
    {
        $this->porez[] = $porez;
        return $this;
    }

    /**
     * isset porez
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPorez($index)
    {
        return isset($this->porez[$index]);
    }

    /**
     * unset porez
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPorez($index)
    {
        unset($this->porez[$index]);
    }

    /**
     * Gets as porez
     *
     * @return \Nticaric\Fiskalizacija\Generators\PorezType[]
     */
    public function getPorez()
    {
        return $this->porez;
    }

    /**
     * Sets a new porez
     *
     * @param \Nticaric\Fiskalizacija\Generators\PorezType[] $porez
     * @return self
     */
    public function setPorez(array $porez)
    {
        $this->porez = $porez;
        return $this;
    }
}

