<?PHP
	require ('../config/hotel.conn.php');
	if(isset($_GET['strCount']) && $_GET['strCount'] != ''){
		$qrycountry 	= "SELECT * FROM m_prov";
		$stmtcountry 	= $conn->prepare( $qrycountry );
		$stmtcountry->execute();		 
		while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
		extract($rowcountry);
			if($_GET['strCount'] == $count_id){
				echo '<option value="'.$prov_id.'" >'.$prov_nama.'</option>';
			}
		}
	}else{
			echo '<option value="" >-- Pilih Negara --</option>';
	}
?>