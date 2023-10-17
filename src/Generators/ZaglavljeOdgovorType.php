<?php

namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing ZaglavljeOdgovorType
 *
 *
 * XSD Type: ZaglavljeOdgovorType
 */
class ZaglavljeOdgovorType
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
     * Datum i vrijeme obrade poruke.
     *
     * @var string $datumVrijeme
     */
    private $datumVrijeme = null;

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
     * Datum i vrijeme obrade poruke.
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
     * Datum i vrijeme obrade poruke.
     *
     * @param string $datumVrijeme
     * @return self
     */
    public function setDatumVrijeme($datumVrijeme)
    {
        $this->datumVrijeme = $datumVrijeme;
        return $this;
    }
}

