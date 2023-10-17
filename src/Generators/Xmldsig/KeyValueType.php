<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing KeyValueType
 *
 *
 * XSD Type: KeyValueType
 */
class KeyValueType
{
    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\DSAKeyValue $dSAKeyValue
     */
    private $dSAKeyValue = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\RSAKeyValue $rSAKeyValue
     */
    private $rSAKeyValue = null;

    /**
     * Gets as dSAKeyValue
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\DSAKeyValue
     */
    public function getDSAKeyValue()
    {
        return $this->dSAKeyValue;
    }

    /**
     * Sets a new dSAKeyValue
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\DSAKeyValue $dSAKeyValue
     * @return self
     */
    public function setDSAKeyValue(?\Nticaric\Fiskalizacija\Generators\Xmldsig\DSAKeyValue $dSAKeyValue = null)
    {
        $this->dSAKeyValue = $dSAKeyValue;
        return $this;
    }

    /**
     * Gets as rSAKeyValue
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\RSAKeyValue
     */
    public function getRSAKeyValue()
    {
        return $this->rSAKeyValue;
    }

    /**
     * Sets a new rSAKeyValue
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\RSAKeyValue $rSAKeyValue
     * @return self
     */
    public function setRSAKeyValue(?\Nticaric\Fiskalizacija\Generators\Xmldsig\RSAKeyValue $rSAKeyValue = null)
    {
        $this->rSAKeyValue = $rSAKeyValue;
        return $this;
    }
}

