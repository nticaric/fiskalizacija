<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing KeyInfoType
 *
 *
 * XSD Type: KeyInfoType
 */
class KeyInfoType
{
    /**
     * @var string $id
     */
    private $id = null;

    /**
     * @var string $keyName
     */
    private $keyName = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\KeyValue $keyValue
     */
    private $keyValue = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\RetrievalMethod $retrievalMethod
     */
    private $retrievalMethod = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\X509Data $x509Data
     */
    private $x509Data = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\Xmldsig\PGPData $pGPData
     */
    private $pGPData = null;

    /**
     * @var string[] $sPKIData
     */
    private $sPKIData = null;

    /**
     * @var string $mgmtData
     */
    private $mgmtData = null;

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
     * Gets as keyName
     *
     * @return string
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    /**
     * Sets a new keyName
     *
     * @param string $keyName
     * @return self
     */
    public function setKeyName($keyName)
    {
        $this->keyName = $keyName;
        return $this;
    }

    /**
     * Gets as keyValue
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\KeyValue
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }

    /**
     * Sets a new keyValue
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\KeyValue $keyValue
     * @return self
     */
    public function setKeyValue(?\Nticaric\Fiskalizacija\Generators\Xmldsig\KeyValue $keyValue = null)
    {
        $this->keyValue = $keyValue;
        return $this;
    }

    /**
     * Gets as retrievalMethod
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\RetrievalMethod
     */
    public function getRetrievalMethod()
    {
        return $this->retrievalMethod;
    }

    /**
     * Sets a new retrievalMethod
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\RetrievalMethod $retrievalMethod
     * @return self
     */
    public function setRetrievalMethod(?\Nticaric\Fiskalizacija\Generators\Xmldsig\RetrievalMethod $retrievalMethod = null)
    {
        $this->retrievalMethod = $retrievalMethod;
        return $this;
    }

    /**
     * Gets as x509Data
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\X509Data
     */
    public function getX509Data()
    {
        return $this->x509Data;
    }

    /**
     * Sets a new x509Data
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\X509Data $x509Data
     * @return self
     */
    public function setX509Data(?\Nticaric\Fiskalizacija\Generators\Xmldsig\X509Data $x509Data = null)
    {
        $this->x509Data = $x509Data;
        return $this;
    }

    /**
     * Gets as pGPData
     *
     * @return \Nticaric\Fiskalizacija\Generators\Xmldsig\PGPData
     */
    public function getPGPData()
    {
        return $this->pGPData;
    }

    /**
     * Sets a new pGPData
     *
     * @param \Nticaric\Fiskalizacija\Generators\Xmldsig\PGPData $pGPData
     * @return self
     */
    public function setPGPData(?\Nticaric\Fiskalizacija\Generators\Xmldsig\PGPData $pGPData = null)
    {
        $this->pGPData = $pGPData;
        return $this;
    }

    /**
     * Adds as sPKISexp
     *
     * @return self
     * @param string $sPKISexp
     */
    public function addToSPKIData($sPKISexp)
    {
        $this->sPKIData[] = $sPKISexp;
        return $this;
    }

    /**
     * isset sPKIData
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSPKIData($index)
    {
        return isset($this->sPKIData[$index]);
    }

    /**
     * unset sPKIData
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSPKIData($index)
    {
        unset($this->sPKIData[$index]);
    }

    /**
     * Gets as sPKIData
     *
     * @return string[]
     */
    public function getSPKIData()
    {
        return $this->sPKIData;
    }

    /**
     * Sets a new sPKIData
     *
     * @param string[] $sPKIData
     * @return self
     */
    public function setSPKIData(array $sPKIData = null)
    {
        $this->sPKIData = $sPKIData;
        return $this;
    }

    /**
     * Gets as mgmtData
     *
     * @return string
     */
    public function getMgmtData()
    {
        return $this->mgmtData;
    }

    /**
     * Sets a new mgmtData
     *
     * @param string $mgmtData
     * @return self
     */
    public function setMgmtData($mgmtData)
    {
        $this->mgmtData = $mgmtData;
        return $this;
    }
}

