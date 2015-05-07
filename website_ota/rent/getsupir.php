<?PHP
	require ('../config/hotel.conn.php');
	session_start();
	if(isset($_GET['supirno']) && $_GET['supirno'] == '0'){
		unset($_SESSION['spr']);
		echo '
						
							<td><h4><b>&nbsp;</b></h4></td>
							<td>&nbsp;</td>
							<td align="right"><h4><b>&nbsp;</b></h3></td>
						
		';
	}else if(isset($_GET['carid']) && isset($_GET['supirno']) && $_GET['supirno'] == '1'){
		$_SESSION['spr'] 	= $_GET['supirno'];
		$qryCars 			= $conn->query("SELECT hotel_avg,rent_harga_supir FROM m_hotel WHERE hotel_id = '".$_GET['carid']."'");
		$strCars 			= $qryCars->fetch(PDO::FETCH_ASSOC);
		echo '
						
							<td><h4><b>Tarif Supir</b></h4></td>
							<td>&nbsp;</td>
							<td align="right"><h4><b>Rp. '.number_format($strCars['rent_harga_supir'],2,",",".").'</b></h4></td>
						
		';
	}
?>