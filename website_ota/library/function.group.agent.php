<?PHP
	function groupBerlangganan($conn, $akses, $var){
		$kategoryAgent 	= $conn->query("SELECT b.kategori_agent,b.potongan FROM mst_karyawan a INNER JOIN mst_kategori_agent b ON a.id_kat_agent = b.id_kat_agent WHERE a.kar_id = '".$akses."' LIMIT 0,1");
		$kategoryAgent	= $kategoryAgent->fetch(PDO::FETCH_ASSOC);
		return $kategoryAgent[$var];
	}
?>