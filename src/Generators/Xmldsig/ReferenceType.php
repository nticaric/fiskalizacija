<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing ReferenceType
 *
 *
 * XSD Type: ReferenceType
 */
class ReferenceType
{
    /**
     * @var string $id
     */
    private $id = null;

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
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\DigestMethod $digestMethod
     */
    private $digestMethod = null;

    /**
     * @var string $digestValue
     */
    private $digestValue = null;

    /**
     * Gets as id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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

    /**
     * Gets as digestMethod
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\DigestMethod
     */
    public function getDigestMethod()
    {
        return $this->digestMethod;
    }

    /**
     * Sets a new digestMethod
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\DigestMethod $digestMethod
     * @return self
     */
    public function setDigestMethod(\Nticaric\Fiskalizacija\Generators\Xmldsig\DigestMethod $digestMethod)
    {
        $this->digestMethod = $digestMethod;
        return $this;
    }

    /**
     * Gets as digestValue
     *
     * @return string
     */
    public function getDigestValue()
    {
        return $this->digestValue;
    }

    /**
     * Sets a new digestValue
     *
     * @param string $digestValue
     * @return self
     */
    public function setDigestValue($digestValue)
    {
        $this->digestValue = $digestValue;
        return $this;
    }
}

