<?PHP
	function formatTanggaldb($param) {
		$tgl = explode("/", $param);
		$tanggal = $tgl[2] . "-" . $tgl[0] . "-" . $tgl[1];
		return $tanggal;
	}
?>