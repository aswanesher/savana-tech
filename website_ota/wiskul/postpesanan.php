<?PHP
	require ('../config/hotel.conn.php');
	require_once ('../library/function.cracked.php');
	require_once ('../library/function.convert.date.php');
	require_once ('../library/function.number.php');
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	$now	= date("Y-m-d H:i:s");
	if(isset($_SESSION['bks']) && isset($_POST['menuId']) && isset($_POST['wiskulId']) && isset($_SESSION['cmj'])){
		$qryguestreserv 		= "INSERT INTO m_menu_pesanan SET 
									menu_masakan_id		= ?, 
									hotel_id			= ?, 
									meja_nomor			= ?, 
									meja_nomor_pesanan	= ?, 
									pesanan_tgl			= ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['menuId']);
		$stmtguestreserv->bindParam(2, $_POST['wiskulId']);
		$stmtguestreserv->bindParam(3, $_SESSION['cmj']);
		$stmtguestreserv->bindParam(4, $_SESSION['bks']);
		$stmtguestreserv->bindParam(5, $now);
		$stmtguestreserv->execute();
	}
?>