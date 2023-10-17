<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing GreskeType
 *
 *
 * XSD Type: GreskeType
 */
class GreskeType
{
    /**
     * @var \Nticaric\Fiskalizacija\Generators\GreskaType[] $greska
     */
    private $greska = [
        
    ];

    /**
     * Adds as greska
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\GreskaType $greska
     */
    public function addToGreska(\Nticaric\Fiskalizacija\Generators\GreskaType $greska)
    {
        $this->greska[] = $greska;
        return $this;
    }

    /**
     * isset greska
     *
     * @param int|string $index
     * @return bool
     */
    public function issetGreska($index)
    {
        return isset($this->greska[$index]);
    }

    /**
     * unset greska
     *
     * @param int|string $index
     * @return void
     */
    public function unsetGreska($index)
    {
        unset($this->greska[$index]);
    }

    /**
     * Gets as greska
     *
     * @return \Nticaric\Fiskalizacija\Generators\GreskaType[]
     */
    public function getGreska()
    {
        return $this->greska;
    }

    /**
     * Sets a new greska
     *
     * @param \Nticaric\Fiskalizacija\Generators\GreskaType[] $greska
     * @return self
     */
    public function setGreska(array $greska)
    {
        $this->greska = $greska;
        return $this;
    }
}

