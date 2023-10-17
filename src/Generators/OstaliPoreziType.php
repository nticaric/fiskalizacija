<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing OstaliPoreziType
 *
 *
 * XSD Type: OstaliPoreziType
 */
class OstaliPoreziType
{
    /**
     * @var \Nticaric\Fiskalizacija\Generators\PorezOstaloType[] $porez
     */
    private $porez = [
        
    ];

    /**
     * Adds as porez
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\PorezOstaloType $porez
     */
    public function addToPorez(\Nticaric\Fiskalizacija\Generators\PorezOstaloType $porez)
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
     * @return \Nticaric\Fiskalizacija\Generators\PorezOstaloType[]
     */
    public function getPorez()
    {
        return $this->porez;
    }

    /**
     * Sets a new porez
     *
     * @param \Nticaric\Fiskalizacija\Generators\PorezOstaloType[] $porez
     * @return self
     */
    public function setPorez(array $porez)
    {
        $this->porez = $porez;
        return $this;
    }
}

