<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing RetrievalMethodType
 *
 *
 * XSD Type: RetrievalMethodType
 */
class RetrievalMethodType
{
    /**
     * @var string $uRI
     */
    private $uRI = null;

    /**
     * @var string $type
     */
    private $type = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform[] $transforms
     */
    private $transforms = null;

    /**
     * Gets as uRI
     *
     * @return string
     */
    public function getURI()
    {
        return $this->uRI;
    }

    /**
     * Sets a new uRI
     *
     * @param string $uRI
     * @return self
     */
    public function setURI($uRI)
    {
        $this->uRI = $uRI;
        return $this;
    }

    /**
     * Gets as type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Adds as transform
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform $transform
     */
    public function addToTransforms(\Nticaric\Fiskalizacija\Generators\Xmldsig\Transform $transform)
    {
        $this->transforms[] = $transform;
        return $this;
    }

    /**
     * isset transforms
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTransforms($index)
    {
        return isset($this->transforms[$index]);
    }

    /**
     * unset transforms
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTransforms($index)
    {
        unset($this->transforms[$index]);
    }

    /**
     * Gets as transforms
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform[]
     */
    public function getTransforms()
    {
        return $this->transforms;
    }

    /**
     * Sets a new transforms
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\Transform[] $transforms
     * @return self
     */
    public function setTransforms(array $transforms = null)
    {
        $this->transforms = $transforms;
        return $this;
    }
}

