<?PHP
	require ('../config/hotel.conn.php');
	require ('../library/function.convert.date.php');
	$Qry 		= "SELECT COUNT(book_id) AS jumlah, MONTH(date_input) AS bulan_pesan FROM guest_book WHERE rinci_id IS NULL AND book_kode IS NOT NULL AND hotel_id IS NOT NULL GROUP BY MONTH(date_input)";
	$statement 	= $conn->prepare( $Qry );
	$statement->execute();
	while ($rows = $statement->fetch(PDO::FETCH_ASSOC)){
	extract($rows);
		echo mount($bulan_pesan) . "/" . $jumlah. "/";
	}
?>