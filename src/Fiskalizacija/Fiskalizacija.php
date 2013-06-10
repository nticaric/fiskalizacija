<?php 

/**
*
* PHP API za fiskalizaciju računa
*
* @version 1.0
* @author Nenad Tičarić <nticaric@gmail.com>
* @project Fiskalizacija
*/
namespace Fiskalizacija;

class Fiskalizacija {

	private $uuid;
	//privatni kljuc iz certifikata
	private $pk;
	private $certificate;

	public function __construct() {
		$certificate = null;
		$pass = $this->config("passphrase");
		$pkcs12 = $this->readCertificateFromDisk();

		openssl_pkcs12_read ( $pkcs12 , $this->certificate , $pass );
		var_dump( $this->certificate );
	}

	public function readCertificateFromDisk() {
		$cert = @file_get_contents($this->config("certificatePath"));
		if(FALSE === $cert) {
			throw new \Exception("Ne mogu procitati certifikat sa lokacije: " . 
				$this->config("certificatePath"), 1);	
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

	public function config( $index ) {
		$config = array();
		$dir = dirname(__FILE__);
		$config = array_merge($config, require $dir . '\config.php');
		if(!array_key_exists($index, $config)) {
			throw new \Exception("Ne nalazim ['$index'] u konfiguraciji", 1);
		}
		return $config[$index];
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
		$medjurezultat .= $dt;
		$medjurezultat .= $bor;
		$medjurezultat .= $onu;
		$medjurezultat .= $uir;
		return md5($medjurezultat);
	}

}
?>