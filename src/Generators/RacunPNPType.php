<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing RacunPNPType
 *
 *
 * XSD Type: RacunPNPType
 */
class RacunPNPType
{
    /**
     * Osobni identifikacijski broj obveznika fiskalizacije.
     *
     * @var string $oib
     */
    private $oib = null;

    /**
     * U sustavu PDV. Oznaka je li obveznik fiskalizacije u sustavu PDV ili nije.
     *
     * @var bool $uSustPdv
     */
    private $uSustPdv = null;

    /**
     * Datum i vrijeme izdavanja racuna koji se ispisuju na racunu.
     *
     * @var string $datVrijeme
     */
    private $datVrijeme = null;

    /**
     * Oznaka slijednosti izdavanja racuna. Slijednost izdavanja racuna moze biti na razini poslovnog prostora ili naplatnog uredjaja.
     *
     * @var string $oznSlijed
     */
    private $oznSlijed = null;

    /**
     * Broj racuna.
     *
     * @var \Nticaric\Fiskalizacija\Generators\BrojRacunaType $brRac
     */
    private $brRac = null;

    /**
     * Porez na dodanu vrijednost.
     *
     * @var \Nticaric\Fiskalizacija\Generators\PorezType[] $pdv
     */
    private $pdv = null;

    /**
     * Porez na potrosnju.
     *
     * @var \Nticaric\Fiskalizacija\Generators\PorezType[] $pnp
     */
    private $pnp = null;

    /**
     * Ostali porezi.
     *  Navode se ostali porezi koji se mogu pojaviti na racunu osim PDV-a i poreza na potrosnju.
     *  Npr. porez na luksuz.
     *
     * @var \Nticaric\Fiskalizacija\Generators\PorezOstaloType[] $ostaliPor
     */
    private $ostaliPor = null;

    /**
     * Iznos oslobodjenja na racunu.
     *  Ako se isporucuju dobra ili obavljaju usluge koje su oslobodjene od placanja PDV-a,
     *  potrebno je poslati ukupan iznos oslobodjenja na racunu.
     *
     * @var string $iznosOslobPdv
     */
    private $iznosOslobPdv = null;

    /**
     * Iznos na koji se odnosi posebni postupka oporezivanja marze na racunu.
     *  Marza za rabljena dobra, umjetnicka djela, kolekcionarske ili antikne predmete (clanak 22.a Zakona o PDV-u).
     *
     * @var string $iznosMarza
     */
    private $iznosMarza = null;

    /**
     * Iznos koji ne podlijeze oporezivanju na racunu.
     *
     * @var string $iznosNePodlOpor
     */
    private $iznosNePodlOpor = null;

    /**
     * Naknade koje se mogu pojaviti na racunu tipa povratna naknada za ambalazu i sl.
     *
     * @var \Nticaric\Fiskalizacija\Generators\NaknadaType[] $naknade
     */
    private $naknade = null;

    /**
     * Ukupan iznos koji se iskazuje na racunu.
     *
     * @var string $iznosUkupno
     */
    private $iznosUkupno = null;

    /**
     * Moguce vrijednosti su G - gotovina, K - kartice, C - cek, T - transakcijski racun, O – ostalo.
     *  U slucaju vise nacina placanja po jednom racunu, isto je potrebno prijaviti pod O - ostalo.
     *  Za sve nacine placanja koji nisu propisani koristiti ce se oznaka O – ostalo.
     *
     * @var string $nacinPlac
     */
    private $nacinPlac = null;

    /**
     * Osobni identifikacijski broj operatera na naplatnom uredjaju koji izdaje racun.
     *
     * @var string $oibOper
     */
    private $oibOper = null;

    /**
     * Zastitni kod izdavatelja.
     *  Zastitni kod izdavatelja obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog racuna. Zastitni kod generira obveznik fiskalizacije.
     *
     * @var string $zastKod
     */
    private $zastKod = null;

    /**
     * Oznaka naknadne dostave racuna.
     *  Obvezno se dostavlja u slucaju naknadne dostave racuna kad je isti prethodno izdan kupcu
     *  bez JIR-a (prekid Internet veze ili potpuni prestanak rada naplatnog uredjaja).
     *
     * @var bool $nakDost
     */
    private $nakDost = null;

    /**
     * Oznaka paragon racuna.
     *  Obavezno se dostavlja u slucaju potpunog prestanka rada naplatnog uredjaja kada obveznik fiskalizacije
     *  mora prepisati izdane paragon racune i prijaviti ih putem poruke Poreznoj upravi.
     *
     * @var string $paragonBrRac
     */
    private $paragonBrRac = null;

    /**
     * Specificna namjena.
     *  Predvidjeno za slucaj da se naknadno pojavi potreba za dostavom podataka koji nisu prepoznati tokom analize.
     *
     * @var string $specNamj
     */
    private $specNamj = null;

    /**
     * @var \Nticaric\Fiskalizacija\Generators\RacunPNPType\PrateciDokumentAType $prateciDokument
     */
    private $prateciDokument = null;

    /**
     * Moguce vrijednosti su G - gotovina, K - kartice, C - cek, T - transakcijski racun, O – ostalo.
     *  U slucaju vise nacina placanja po jednom racunu, isto je potrebno prijaviti pod O - ostalo.
     *  Za sve nacine placanja koji nisu propisani koristiti ce se oznaka O – ostalo.
     *
     * @var string $promijenjeniNacinPlac
     */
    private $promijenjeniNacinPlac = null;

    /**
     * Gets as oib
     *
     * Osobni identifikacijski broj obveznika fiskalizacije.
     *
     * @return string
     */
    public function getOib()
    {
        return $this->oib;
    }

    /**
     * Sets a new oib
     *
     * Osobni identifikacijski broj obveznika fiskalizacije.
     *
     * @param string $oib
     * @return self
     */
    public function setOib($oib)
    {
        $this->oib = $oib;
        return $this;
    }

    /**
     * Gets as uSustPdv
     *
     * U sustavu PDV. Oznaka je li obveznik fiskalizacije u sustavu PDV ili nije.
     *
     * @return bool
     */
    public function getUSustPdv()
    {
        return $this->uSustPdv;
    }

    /**
     * Sets a new uSustPdv
     *
     * U sustavu PDV. Oznaka je li obveznik fiskalizacije u sustavu PDV ili nije.
     *
     * @param bool $uSustPdv
     * @return self
     */
    public function setUSustPdv($uSustPdv)
    {
        $this->uSustPdv = $uSustPdv;
        return $this;
    }

    /**
     * Gets as datVrijeme
     *
     * Datum i vrijeme izdavanja racuna koji se ispisuju na racunu.
     *
     * @return string
     */
    public function getDatVrijeme()
    {
        return $this->datVrijeme;
    }

    /**
     * Sets a new datVrijeme
     *
     * Datum i vrijeme izdavanja racuna koji se ispisuju na racunu.
     *
     * @param string $datVrijeme
     * @return self
     */
    public function setDatVrijeme($datVrijeme)
    {
        $this->datVrijeme = $datVrijeme;
        return $this;
    }

    /**
     * Gets as oznSlijed
     *
     * Oznaka slijednosti izdavanja racuna. Slijednost izdavanja racuna moze biti na razini poslovnog prostora ili naplatnog uredjaja.
     *
     * @return string
     */
    public function getOznSlijed()
    {
        return $this->oznSlijed;
    }

    /**
     * Sets a new oznSlijed
     *
     * Oznaka slijednosti izdavanja racuna. Slijednost izdavanja racuna moze biti na razini poslovnog prostora ili naplatnog uredjaja.
     *
     * @param string $oznSlijed
     * @return self
     */
    public function setOznSlijed($oznSlijed)
    {
        $this->oznSlijed = $oznSlijed;
        return $this;
    }

    /**
     * Gets as brRac
     *
     * Broj racuna.
     *
     * @return \Nticaric\Fiskalizacija\Generators\BrojRacunaType
     */
    public function getBrRac()
    {
        return $this->brRac;
    }

    /**
     * Sets a new brRac
     *
     * Broj racuna.
     *
     * @param \Nticaric\Fiskalizacija\Generators\BrojRacunaType $brRac
     * @return self
     */
    public function setBrRac(\Nticaric\Fiskalizacija\Generators\BrojRacunaType $brRac)
    {
        $this->brRac = $brRac;
        return $this;
    }

    /**
     * Adds as porez
     *
     * Porez na dodanu vrijednost.
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\PorezType $porez
     */
    public function addToPdv(\Nticaric\Fiskalizacija\Generators\PorezType $porez)
    {
        $this->pdv[] = $porez;
        return $this;
    }

    /**
     * isset pdv
     *
     * Porez na dodanu vrijednost.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPdv($index)
    {
        return isset($this->pdv[$index]);
    }

    /**
     * unset pdv
     *
     * Porez na dodanu vrijednost.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPdv($index)
    {
        unset($this->pdv[$index]);
    }

    /**
     * Gets as pdv
     *
     * Porez na dodanu vrijednost.
     *
     * @return \Nticaric\Fiskalizacija\Generators\PorezType[]
     */
    public function getPdv()
    {
        return $this->pdv;
    }

    /**
     * Sets a new pdv
     *
     * Porez na dodanu vrijednost.
     *
     * @param \Nticaric\Fiskalizacija\Generators\PorezType[] $pdv
     * @return self
     */
    public function setPdv(array $pdv = null)
    {
        $this->pdv = $pdv;
        return $this;
    }

    /**
     * Adds as porez
     *
     * Porez na potrosnju.
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\PorezType $porez
     */
    public function addToPnp(\Nticaric\Fiskalizacija\Generators\PorezType $porez)
    {
        $this->pnp[] = $porez;
        return $this;
    }

    /**
     * isset pnp
     *
     * Porez na potrosnju.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPnp($index)
    {
        return isset($this->pnp[$index]);
    }

    /**
     * unset pnp
     *
     * Porez na potrosnju.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPnp($index)
    {
        unset($this->pnp[$index]);
    }

    /**
     * Gets as pnp
     *
     * Porez na potrosnju.
     *
     * @return \Nticaric\Fiskalizacija\Generators\PorezType[]
     */
    public function getPnp()
    {
        return $this->pnp;
    }

    /**
     * Sets a new pnp
     *
     * Porez na potrosnju.
     *
     * @param \Nticaric\Fiskalizacija\Generators\PorezType[] $pnp
     * @return self
     */
    public function setPnp(array $pnp = null)
    {
        $this->pnp = $pnp;
        return $this;
    }

    /**
     * Adds as porez
     *
     * Ostali porezi.
     *  Navode se ostali porezi koji se mogu pojaviti na racunu osim PDV-a i poreza na potrosnju.
     *  Npr. porez na luksuz.
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\PorezOstaloType $porez
     */
    public function addToOstaliPor(\Nticaric\Fiskalizacija\Generators\PorezOstaloType $porez)
    {
        $this->ostaliPor[] = $porez;
        return $this;
    }

    /**
     * isset ostaliPor
     *
     * Ostali porezi.
     *  Navode se ostali porezi koji se mogu pojaviti na racunu osim PDV-a i poreza na potrosnju.
     *  Npr. porez na luksuz.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOstaliPor($index)
    {
        return isset($this->ostaliPor[$index]);
    }

    /**
     * unset ostaliPor
     *
     * Ostali porezi.
     *  Navode se ostali porezi koji se mogu pojaviti na racunu osim PDV-a i poreza na potrosnju.
     *  Npr. porez na luksuz.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOstaliPor($index)
    {
        unset($this->ostaliPor[$index]);
    }

    /**
     * Gets as ostaliPor
     *
     * Ostali porezi.
     *  Navode se ostali porezi koji se mogu pojaviti na racunu osim PDV-a i poreza na potrosnju.
     *  Npr. porez na luksuz.
     *
     * @return \Nticaric\Fiskalizacija\Generators\PorezOstaloType[]
     */
    public function getOstaliPor()
    {
        return $this->ostaliPor;
    }

    /**
     * Sets a new ostaliPor
     *
     * Ostali porezi.
     *  Navode se ostali porezi koji se mogu pojaviti na racunu osim PDV-a i poreza na potrosnju.
     *  Npr. porez na luksuz.
     *
     * @param \Nticaric\Fiskalizacija\Generators\PorezOstaloType[] $ostaliPor
     * @return self
     */
    public function setOstaliPor(array $ostaliPor = null)
    {
        $this->ostaliPor = $ostaliPor;
        return $this;
    }

    /**
     * Gets as iznosOslobPdv
     *
     * Iznos oslobodjenja na racunu.
     *  Ako se isporucuju dobra ili obavljaju usluge koje su oslobodjene od placanja PDV-a,
     *  potrebno je poslati ukupan iznos oslobodjenja na racunu.
     *
     * @return string
     */
    public function getIznosOslobPdv()
    {
        return $this->iznosOslobPdv;
    }

    /**
     * Sets a new iznosOslobPdv
     *
     * Iznos oslobodjenja na racunu.
     *  Ako se isporucuju dobra ili obavljaju usluge koje su oslobodjene od placanja PDV-a,
     *  potrebno je poslati ukupan iznos oslobodjenja na racunu.
     *
     * @param string $iznosOslobPdv
     * @return self
     */
    public function setIznosOslobPdv($iznosOslobPdv)
    {
        $this->iznosOslobPdv = number_format($iznosOslobPdv, 2, '.', '');
        return $this;
    }

    /**
     * Gets as iznosMarza
     *
     * Iznos na koji se odnosi posebni postupka oporezivanja marze na racunu.
     *  Marza za rabljena dobra, umjetnicka djela, kolekcionarske ili antikne predmete (clanak 22.a Zakona o PDV-u).
     *
     * @return string
     */
    public function getIznosMarza()
    {
        return $this->iznosMarza;
    }

    /**
     * Sets a new iznosMarza
     *
     * Iznos na koji se odnosi posebni postupka oporezivanja marze na racunu.
     *  Marza za rabljena dobra, umjetnicka djela, kolekcionarske ili antikne predmete (clanak 22.a Zakona o PDV-u).
     *
     * @param string $iznosMarza
     * @return self
     */
    public function setIznosMarza($iznosMarza)
    {
        $this->iznosMarza = number_format($iznosMarza, 2, '.', '');
        return $this;
    }

    /**
     * Gets as iznosNePodlOpor
     *
     * Iznos koji ne podlijeze oporezivanju na racunu.
     *
     * @return string
     */
    public function getIznosNePodlOpor()
    {
        return $this->iznosNePodlOpor;
    }

    /**
     * Sets a new iznosNePodlOpor
     *
     * Iznos koji ne podlijeze oporezivanju na racunu.
     *
     * @param string $iznosNePodlOpor
     * @return self
     */
    public function setIznosNePodlOpor($iznosNePodlOpor)
    {
        $this->iznosNePodlOpor = number_format($iznosNePodlOpor, 2, '.', '');
        return $this;
    }

    /**
     * Adds as naknada
     *
     * Naknade koje se mogu pojaviti na racunu tipa povratna naknada za ambalazu i sl.
     *
     * @return self
     * @param \Nticaric\Fiskalizacija\Generators\NaknadaType $naknada
     */
    public function addToNaknade(\Nticaric\Fiskalizacija\Generators\NaknadaType $naknada)
    {
        $this->naknade[] = $naknada;
        return $this;
    }

    /**
     * isset naknade
     *
     * Naknade koje se mogu pojaviti na racunu tipa povratna naknada za ambalazu i sl.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNaknade($index)
    {
        return isset($this->naknade[$index]);
    }

    /**
     * unset naknade
     *
     * Naknade koje se mogu pojaviti na racunu tipa povratna naknada za ambalazu i sl.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNaknade($index)
    {
        unset($this->naknade[$index]);
    }

    /**
     * Gets as naknade
     *
     * Naknade koje se mogu pojaviti na racunu tipa povratna naknada za ambalazu i sl.
     *
     * @return \Nticaric\Fiskalizacija\Generators\NaknadaType[]
     */
    public function getNaknade()
    {
        return $this->naknade;
    }

    /**
     * Sets a new naknade
     *
     * Naknade koje se mogu pojaviti na racunu tipa povratna naknada za ambalazu i sl.
     *
     * @param \Nticaric\Fiskalizacija\Generators\NaknadaType[] $naknade
     * @return self
     */
    public function setNaknade(array $naknade = null)
    {
        $this->naknade = $naknade;
        return $this;
    }

    /**
     * Gets as iznosUkupno
     *
     * Ukupan iznos koji se iskazuje na racunu.
     *
     * @return string
     */
    public function getIznosUkupno()
    {
        return $this->iznosUkupno;
    }

    /**
     * Sets a new iznosUkupno
     *
     * Ukupan iznos koji se iskazuje na racunu.
     *
     * @param string $iznosUkupno
     * @return self
     */
    public function setIznosUkupno($iznosUkupno)
    {
        $this->iznosUkupno = number_format($iznosUkupno, 2, '.', '');
        return $this;
    }

    /**
     * Gets as nacinPlac
     *
     * Moguce vrijednosti su G - gotovina, K - kartice, C - cek, T - transakcijski racun, O – ostalo.
     *  U slucaju vise nacina placanja po jednom racunu, isto je potrebno prijaviti pod O - ostalo.
     *  Za sve nacine placanja koji nisu propisani koristiti ce se oznaka O – ostalo.
     *
     * @return string
     */
    public function getNacinPlac()
    {
        return $this->nacinPlac;
    }

    /**
     * Sets a new nacinPlac
     *
     * Moguce vrijednosti su G - gotovina, K - kartice, C - cek, T - transakcijski racun, O – ostalo.
     *  U slucaju vise nacina placanja po jednom racunu, isto je potrebno prijaviti pod O - ostalo.
     *  Za sve nacine placanja koji nisu propisani koristiti ce se oznaka O – ostalo.
     *
     * @param string $nacinPlac
     * @return self
     */
    public function setNacinPlac($nacinPlac)
    {
        $this->nacinPlac = $nacinPlac;
        return $this;
    }

    /**
     * Gets as oibOper
     *
     * Osobni identifikacijski broj operatera na naplatnom uredjaju koji izdaje racun.
     *
     * @return string
     */
    public function getOibOper()
    {
        return $this->oibOper;
    }

    /**
     * Sets a new oibOper
     *
     * Osobni identifikacijski broj operatera na naplatnom uredjaju koji izdaje racun.
     *
     * @param string $oibOper
     * @return self
     */
    public function setOibOper($oibOper)
    {
        $this->oibOper = $oibOper;
        return $this;
    }

    /**
     * Gets as zastKod
     *
     * Zastitni kod izdavatelja.
     *  Zastitni kod izdavatelja obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog racuna. Zastitni kod generira obveznik fiskalizacije.
     *
     * @return string
     */
    public function getZastKod()
    {
        return $this->zastKod;
    }

    /**
     * Sets a new zastKod
     *
     * Zastitni kod izdavatelja.
     *  Zastitni kod izdavatelja obveznika fiskalizacije je alfanumericki zapis kojim se potvrdjuje veza izmedju obveznika fiskalizacije
     *  i izdanog racuna. Zastitni kod generira obveznik fiskalizacije.
     *
     * @param string $zastKod
     * @return self
     */
    public function setZastKod($zastKod)
    {
        $this->zastKod = $zastKod;
        return $this;
    }

    /**
     * Gets as nakDost
     *
     * Oznaka naknadne dostave racuna.
     *  Obvezno se dostavlja u slucaju naknadne dostave racuna kad je isti prethodno izdan kupcu
     *  bez JIR-a (prekid Internet veze ili potpuni prestanak rada naplatnog uredjaja).
     *
     * @return bool
     */
    public function getNakDost()
    {
        return $this->nakDost;
    }

    /**
     * Sets a new nakDost
     *
     * Oznaka naknadne dostave racuna.
     *  Obvezno se dostavlja u slucaju naknadne dostave racuna kad je isti prethodno izdan kupcu
     *  bez JIR-a (prekid Internet veze ili potpuni prestanak rada naplatnog uredjaja).
     *
     * @param bool $nakDost
     * @return self
     */
    public function setNakDost($nakDost)
    {
        $this->nakDost = $nakDost;
        return $this;
    }

    /**
     * Gets as paragonBrRac
     *
     * Oznaka paragon racuna.
     *  Obavezno se dostavlja u slucaju potpunog prestanka rada naplatnog uredjaja kada obveznik fiskalizacije
     *  mora prepisati izdane paragon racune i prijaviti ih putem poruke Poreznoj upravi.
     *
     * @return string
     */
    public function getParagonBrRac()
    {
        return $this->paragonBrRac;
    }

    /**
     * Sets a new paragonBrRac
     *
     * Oznaka paragon racuna.
     *  Obavezno se dostavlja u slucaju potpunog prestanka rada naplatnog uredjaja kada obveznik fiskalizacije
     *  mora prepisati izdane paragon racune i prijaviti ih putem poruke Poreznoj upravi.
     *
     * @param string $paragonBrRac
     * @return self
     */
    public function setParagonBrRac($paragonBrRac)
    {
        $this->paragonBrRac = $paragonBrRac;
        return $this;
    }

    /**
     * Gets as specNamj
     *
     * Specificna namjena.
     *  Predvidjeno za slucaj da se naknadno pojavi potreba za dostavom podataka koji nisu prepoznati tokom analize.
     *
     * @return string
     */
    public function getSpecNamj()
    {
        return $this->specNamj;
    }

    /**
     * Sets a new specNamj
     *
     * Specificna namjena.
     *  Predvidjeno za slucaj da se naknadno pojavi potreba za dostavom podataka koji nisu prepoznati tokom analize.
     *
     * @param string $specNamj
     * @return self
     */
    public function setSpecNamj($specNamj)
    {
        $this->specNamj = $specNamj;
        return $this;
    }

    /**
     * Gets as prateciDokument
     *
     * @return \Nticaric\Fiskalizacija\Generators\RacunPNPType\PrateciDokumentAType
     */
    public function getPrateciDokument()
    {
        return $this->prateciDokument;
    }

    /**
     * Sets a new prateciDokument
     *
     * @param \Nticaric\Fiskalizacija\Generators\RacunPNPType\PrateciDokumentAType $prateciDokument
     * @return self
     */
    public function setPrateciDokument(?\Nticaric\Fiskalizacija\Generators\RacunPNPType\PrateciDokumentAType $prateciDokument = null)
    {
        $this->prateciDokument = $prateciDokument;
        return $this;
    }

    /**
     * Gets as promijenjeniNacinPlac
     *
     * Moguce vrijednosti su G - gotovina, K - kartice, C - cek, T - transakcijski racun, O – ostalo.
     *  U slucaju vise nacina placanja po jednom racunu, isto je potrebno prijaviti pod O - ostalo.
     *  Za sve nacine placanja koji nisu propisani koristiti ce se oznaka O – ostalo.
     *
     * @return string
     */
    public function getPromijenjeniNacinPlac()
    {
        return $this->promijenjeniNacinPlac;
    }

    /**
     * Sets a new promijenjeniNacinPlac
     *
     * Moguce vrijednosti su G - gotovina, K - kartice, C - cek, T - transakcijski racun, O – ostalo.
     *  U slucaju vise nacina placanja po jednom racunu, isto je potrebno prijaviti pod O - ostalo.
     *  Za sve nacine placanja koji nisu propisani koristiti ce se oznaka O – ostalo.
     *
     * @param string $promijenjeniNacinPlac
     * @return self
     */
    public function setPromijenjeniNacinPlac($promijenjeniNacinPlac)
    {
        $this->promijenjeniNacinPlac = $promijenjeniNacinPlac;
        return $this;
    }
}
