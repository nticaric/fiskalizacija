<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing SignaturePropertiesType
 *
 *
 * XSD Type: SignaturePropertiesType
 */
class SignaturePropertiesType
{
    /**
     * @var string $id
     */
    private $id = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\SignatureProperty[] $signatureProperty
     */
    private $signatureProperty = [
        
    ];

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
     * Adds as signatureProperty
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\SignatureProperty $signatureProperty
     */
    public function addToSignatureProperty(\Nticaric\Fiskalizacija\Generators\Xmldsig\SignatureProperty $signatureProperty)
    {
        $this->signatureProperty[] = $signatureProperty;
        return $this;
    }

    /**
     * isset signatureProperty
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSignatureProperty($index)
    {
        return isset($this->signatureProperty[$index]);
    }

    /**
     * unset signatureProperty
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSignatureProperty($index)
    {
        unset($this->signatureProperty[$index]);
    }

    /**
     * Gets as signatureProperty
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\SignatureProperty[]
     */
    public function getSignatureProperty()
    {
        return $this->signatureProperty;
    }

    /**
     * Sets a new signatureProperty
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\SignatureProperty[] $signatureProperty
     * @return self
     */
    public function setSignatureProperty(array $signatureProperty)
    {
        $this->signatureProperty = $signatureProperty;
        return $this;
    }
}

