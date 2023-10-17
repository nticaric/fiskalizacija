<?php

namespace Nticaric\Fiskalizacija\Generators\Xmldsig;

/**
 * Class representing SPKIDataType
 *
 *
 * XSD Type: SPKIDataType
 */
class SPKIDataType
{
    /**
     * @var string[] $sPKISexp
     */
    private $sPKISexp = [
        
    ];

    /**
     * Adds as sPKISexp
     *
     * @return self
     * @param string $sPKISexp
     */
    public function addToSPKISexp($sPKISexp)
    {
        $this->sPKISexp[] = $sPKISexp;
        return $this;
    }

    /**
     * isset sPKISexp
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSPKISexp($index)
    {
        return isset($this->sPKISexp[$index]);
    }

    /**
     * unset sPKISexp
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSPKISexp($index)
    {
        unset($this->sPKISexp[$index]);
    }

    /**
     * Gets as sPKISexp
     *
     * @return string[]
     */
    public function getSPKISexp()
    {
        return $this->sPKISexp;
    }

    /**
     * Sets a new sPKISexp
     *
     * @param string[] $sPKISexp
     * @return self
     */
    public function setSPKISexp(array $sPKISexp)
    {
        $this->sPKISexp = $sPKISexp;
        return $this;
    }
}

