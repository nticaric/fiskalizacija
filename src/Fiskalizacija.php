<?php 

/**
*
* PHP API za fiskalizaciju računa
*
* @version 1.0
* @author Nenad Tičarić <nticaric@gmail.com>
* @project Fiskalizacija
*/

class Fiskalizacija {

	private $uuid;
	//privatni kljuc iz certifikata
	private $pk;
	public $certificate;

	public function setCertificate($path, $pass)
	{
		$pkcs12 = $this->readCertificateFromDisk($path);
		openssl_pkcs12_read ( $pkcs12 , $this->certificate , $pass );
	}

	public function readCertificateFromDisk($path) {
		$cert = @file_get_contents($path);
		if(FALSE === $cert) {
			throw new \Exception("Ne mogu procitati certifikat sa lokacije: " . 
				$path, 1);	
		}
		return $cert;
	}
	
	public function generateUUID() {
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand(0, 0xffff), mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000,
			mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
		);
	}

	public function getUUID() {
		return $this->uuid;
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
	public function generateZastitniKod($pkey, $oib, $dt, $bor, $opp, $onu, $uir) {
		$medjurezultat  = $pkey;
		$medjurezultat .= $oib;
		$medjurezultat .= $dt;
		$medjurezultat .= $opp;
		$medjurezultat .= $bor;
		$medjurezultat .= $onu;
		$medjurezultat .= $uir;
		return md5($medjurezultat);
	}

}
?>