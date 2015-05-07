<?PHP
	require ('../config/hotel.conn.php');
	session_start();
	
	$QryCekPay	= $conn->query("SELECT COUNT(flag_baca) AS jum1 FROM guest_book WHERE flag_baca ='0'");
	$QryCekPay 	= $QryCekPay->fetch(PDO::FETCH_ASSOC);
	$QryCekPay2	= $conn->query("SELECT COUNT(status_baca2) AS jum2 FROM trs_kebutuhan WHERE status_baca2 ='0'");
	$QryCekPay2 	= $QryCekPay2->fetch(PDO::FETCH_ASSOC);
	
	$jmlPay		= $QryCekPay['jum1'] + $QryCekPay['jum2'] ;
	echo $jmlPay;
?>