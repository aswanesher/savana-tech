<?PHP
	session_start();
	require ('../config/hotel.conn.php');
	$_SESSION['cdt'] = $_POST['tiketKode'];
	$qryguestreserv 		= "INSERT INTO guest_book_wisata_detail SET guest_book_wisata_detail_kode = ?, tiket_id = ?";
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['tiketKode']);
		$stmtguestreserv->bindParam(2, $_POST['tiketId']);
		$stmtguestreserv->execute();
?>