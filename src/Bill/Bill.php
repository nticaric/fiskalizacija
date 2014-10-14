<?php namespace Nticaric\Fiskalizacija\Bill;

use XMLWriter;

class Bill
{

    public $oib;

    public $havePDV;

    public $dateTime;
    
    public $noteOfOrder = "N";
    
    public $billNumber;
    
    public $listPDV;
    
    public $listPNP;
    
    public $listOtherTaxRate;
    
    public $taxFreeValuePdv;

    public $marginForTaxRate;
    
    public $taxFreeValue;
    
    public $refund = array();
    
    public $totalValue;
    
    public $typeOfPaying;

    public $oibOperative;
    
    public $securityCode;
    
    public $noteOfRedelivary = false;
    
    public $noteOfParagonBill;
    
    public $specificPurpose;

    public function setOib($oib)
    {
        $this->oib = $oib;
    }

    public function setHavePDV($havePDV)
    {
        $this->havePDV = $havePDV;
    }

    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function setNoteOfOrder($noteOfOrder)
    {
        $this->noteOfOrder = $noteOfOrder;
    }

    public function setBillNumber($billNumber)
    {
        $this->billNumber = $billNumber;
    }

    public function setListPDV($listPDV)
    {
        $this->listPDV = $listPDV;
    }

    public function setListPNP($listPNP)
    {
        $this->listPNP = $listPNP;
    }

    public function setListOtherTaxRate($listOtherTaxRate)
    {
        $this->listOtherTaxRate = $listOtherTaxRate;
    }

    public function setTaxFreeValue($taxFreeValuePdv)
    {
        $this->taxFreeValuePdv = $taxFreeValuePdv;
    }

    public function setMarginForTaxRate($marginForTaxRate) 
    {
        $this->marginForTaxRate = $marginForTaxRate;
    }

    public function setTaxFree($taxFreeValue)
    {
        $this->taxFreeValue = $taxFreeValue;
    }

    public function setRefund($refund)
    {
        $this->refund = $refund;
    }

    public function setTotalValue($totalValue)
    {
        $this->totalValue = $totalValue;
    }

    public function setTypeOfPlacanje($typeOfPaying)
    {
        $this->typeOfPaying = $typeOfPaying;
    }

    public function setOibOperative($oibOperative)
    {
        $this->oibOperative = $oibOperative;
    }

    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;
    }

    public function setNoteOfRedelivary($noteOfRedelivary)
    {
        $this->noteOfRedelivary = $noteOfRedelivary;
    }

    public function setNoteOfParagonBill($noteOfParagonBill)
    {
        $this->noteOfParagonBill = $noteOfParagonBill;
    }

    public function setSpecificPurpose($specificPurpose)
    {
        $this->specificPurpose = $specificPurpose;
    }

    /**
     * Generiranje zaštitnog koda na temelju ulaznih parametara
     * @param  [type] $pkey privatni kljuc iz certifikata
     * @param  [type] $oib  oib
     * @param  [type] $dt   datum i vrijeme izdavanja računa zapisan kao tekst u formatu 'dd.mm.gggg hh:mm:ss'
     * @param  [type] $bor  brojčana oznaka računa
     * @param  [type] $opp  oznaka poslovnog prostora
     * @param  [type] $onu  oznaka naplatnog uređaja
     * @param  [type] $uir  ukupni iznos računa
     * @return [type]       md5 hash
     */
    public function securityCode($pkey, $oib, $dt, $bor, $opp, $onu, $uir) {
        $medjurezultat  = $pkey;
        $medjurezultat .= $oib;
        $medjurezultat .= $dt;
        $medjurezultat .= $opp;
        $medjurezultat .= $bor;
        $medjurezultat .= $onu;
        $medjurezultat .= $uir;
        return $this->securityCode = md5($medjurezultat);
    }

    public function toXML()
    {
        $ns = 'tns';

        $writer = new XMLWriter();
        $writer->openMemory();
    
        $writer->setIndent(true);
        $writer->setIndentString("    ");
        $writer->startElementNs($ns, 'Racun', null);
        $writer->writeElementNs($ns, 'Oib', null, $this->oib);
        $writer->writeElementNs($ns, 'USustPdv', null, $this->havePDV ? "true" : "false");
        $writer->writeElementNs($ns, 'DatVrijeme', null, $this->dateTime);
        $writer->writeElementNs($ns, 'OznSlijed', null, $this->noteOfOrder);

        $writer->writeRaw($this->billNumber->toXML());

        /*********** PDV *****************************/
        $writer->startElementNs($ns, 'Pdv', null);
            foreach ($this->listPDV as $pdv) {
                $writer->writeRaw($pdv->toXML());
            }
        $writer->endElement();
        /*********************************************/

        /*********** PNP *****************************/
        if (!empty($this->listPNP)) {
            $writer->startElementNs($ns, 'Pnp', null);
            foreach ($this->listPNP as $pnp) {
                $writer->writeRaw($pnp->toXML());
            }
            $writer->endElement();
        }
        /*********************************************/

        /*********** Ostali Porez ********************/
        if (!empty($this->listOtherTaxRate)) {
            $writer->startElementNs($ns, 'OstaliPor', null);
                foreach ($this->listOtherTaxRate as $ostali) {
                    $writer->writeRaw($ostali->toXML());
                }
            $writer->endElement();
        }
        /*********************************************/

        $writer->writeElementNs($ns, 'IznosOslobPdv', null, number_format($this->taxFreeValuePdv, 2));
        $writer->writeElementNs($ns, 'IznosMarza', null, number_format($this->marginForTaxRate, 2));
        $writer->writeElementNs($ns, 'IznosNePodlOpor', null, number_format($this->taxFreeValue, 2));

        /*********** Naknada *************************/
        if (!empty($this->refund)) {
            $writer->startElementNs($ns, 'Naknade', null);
                foreach ($this->refund as $naknada) {
                    $writer->writeRaw($naknada->toXML());
                }
            $writer->endElement();
        }
        /*********************************************/

        $writer->writeElementNs($ns, 'IznosUkupno', null, number_format($this->totalValue, 2));
        $writer->writeElementNs($ns, 'NacinPlac', null, $this->typeOfPaying);
        $writer->writeElementNs($ns, 'OibOper', null, $this->oibOperative);
        $writer->writeElementNs($ns, 'ZastKod', null, $this->securityCode);
        $writer->writeElementNs($ns, 'NakDost', null, $this->noteOfRedelivary ? "true" : "false");

        if($this->noteOfParagonBill)
            $writer->writeElementNs($ns, 'ParagonBrRac', null, $this->noteOfParagonBill);
        if($this->specificPurpose)
        $writer->writeElementNs($ns, 'SpecNamj', null, $this->specificPurpose);

        $writer->endElement();

        return $writer->outputMemory();
    }

}
