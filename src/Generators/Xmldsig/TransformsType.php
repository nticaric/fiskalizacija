<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing TransformsType
 *
 *
 * XSD Type: TransformsType
 */
class TransformsType
{
    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform[] $transform
     */
    private $transform = [
        
    ];

    /**
     * Adds as transform
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform $transform
     */
    public function addToTransform(\Nticaric\Fiskalizacija\Generators\Xmldsig\Transform $transform)
    {
        $this->transform[] = $transform;
        return $this;
    }

    /**
     * isset transform
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTransform($index)
    {
        return isset($this->transform[$index]);
    }

    /**
     * unset transform
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTransform($index)
    {
        unset($this->transform[$index]);
    }

    /**
     * Gets as transform
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform[]
     */
    public function getTransform()
    {
        return $this->transform;
    }

    /**
     * Sets a new transform
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform[] $transform
     * @return self
     */
    public function setTransform(array $transform)
    {
        $this->transform = $transform;
        return $this;
    }
}

