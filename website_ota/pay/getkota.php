<?PHP
	require ('../config/hotel.conn.php');
	if(isset($_GET['strProv']) && $_GET['strProv'] != ''){
		$qrycountry 	= "SELECT * FROM m_kota";
		$stmtcountry 	= $conn->prepare( $qrycountry );
		$stmtcountry->execute();		 
		while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
		extract($rowcountry);
			if($_GET['strProv'] == $prov_id){
				echo '<option value="'.$kota_id.'" >'.$kota_nama.'</option>';
			}
		}
	}else{
			echo '<option value="" >-- Pilih Negara --</option>';
	}
?>