<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing ZaglavljeType
 *
 *
 * XSD Type: ZaglavljeType
 */
class ZaglavljeType
{
    /**
     * Odabrati:
     *  Version 1 (MAC address) - ne koristiti
     *  Version 2 (DCE Security) - bazirano vremenskoj komponenti i
     *  domeni
     *  Version 3 (MD5 hash) - osnovni podaci generirano u
     *  ovisnosti
     *  o URLu, domeni i sl.
     *  Version 4 (random) - ne govori
     *  mnogo
     *  Version 5 (SHA-1 hash) - preferirano umjesto V3
     *
     * @var string $idPoruke
     */
    private $idPoruke = null;

    /**
     * Datum i vrijeme slanja poruke.
     *
     * @var string $datumVrijeme
     */
    private $datumVrijeme = null;

    public function __construct()
    {
        $this->datumVrijeme = \Carbon\Carbon::now()->format('d.m.Y\TH:i:s');
        $this->idPoruke     = $this->generateUUID();
    }
    /**
     * Gets as idPoruke
     *
     * Odabrati:
     *  Version 1 (MAC address) - ne koristiti
     *  Version 2 (DCE Security) - bazirano vremenskoj komponenti i
     *  domeni
     *  Version 3 (MD5 hash) - osnovni podaci generirano u
     *  ovisnosti
     *  o URLu, domeni i sl.
     *  Version 4 (random) - ne govori
     *  mnogo
     *  Version 5 (SHA-1 hash) - preferirano umjesto V3
     *
     * @return string
     */
    public function getIdPoruke()
    {
        return $this->idPoruke;
    }

    /**
     * Sets a new idPoruke
     *
     * Odabrati:
     *  Version 1 (MAC address) - ne koristiti
     *  Version 2 (DCE Security) - bazirano vremenskoj komponenti i
     *  domeni
     *  Version 3 (MD5 hash) - osnovni podaci generirano u
     *  ovisnosti
     *  o URLu, domeni i sl.
     *  Version 4 (random) - ne govori
     *  mnogo
     *  Version 5 (SHA-1 hash) - preferirano umjesto V3
     *
     * @param string $idPoruke
     * @return self
     */
    public function setIdPoruke($idPoruke)
    {
        $this->idPoruke = $idPoruke;
        return $this;
    }

    /**
     * Gets as datumVrijeme
     *
     * Datum i vrijeme slanja poruke.
     *
     * @return string
     */
    public function getDatumVrijeme()
    {
        return $this->datumVrijeme;
    }

    /**
     * Sets a new datumVrijeme
     *
     * Datum i vrijeme slanja poruke.
     *
     * @param string $datumVrijeme
     * @return self
     */
    public function setDatumVrijeme($datumVrijeme)
    {
        $this->datumVrijeme = $datumVrijeme;
        return $this;
    }

    public function generateUUID()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
