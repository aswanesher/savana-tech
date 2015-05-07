<?PHP
	session_start();
	require ('../config/hotel.conn.php');
	$totalPembayaran = $_GET['totalBayar'];
	if(isset($_SESSION['cdt'])){
		$qryRent 	= "SELECT b.tiket_nama,b.tiket_harga_permainan FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$_SESSION['cdt']."'";
		$stmtRent 	= $conn->prepare( $qryRent );
		$stmtRent->execute();
		while ($rowRent = $stmtRent->fetch(PDO::FETCH_ASSOC))
		{
		extract($rowRent);
			echo '
			<table width="100%">
				<tr>
					<td width="50%"><h4><b>'.$tiket_nama.'</b></h4></td>
					<td align="right"><h4><b>Rp. '.number_format($tiket_harga_permainan,2,",",".").'</b></h3></td>
				</tr>
			</table>
			
			';
		}
		//TOTAL tiket
		$qryWisata 		= $conn->query("SELECT SUM(b.tiket_harga_permainan) AS totalTiket FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$_SESSION['cdt']."'");
		$strWisata 		= $qryWisata->fetch(PDO::FETCH_ASSOC);
		$totalPembayaranTiket = $strWisata['totalTiket'] + $totalPembayaran;
		echo '
		<table width="100%" id="view-mount">
			<tr>
				<td style="border-top: 2px solid"><h4><b>Total Pembayaran</b></h4><td>
				<td style="border-top: 2px solid" align="right"><h4><b>Rp. '. number_format($totalPembayaranTiket,2,",",".").'</b></h4><td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;<div id="loadvoc"></div><td>
				<input type="hidden" name="totprice" value="'.$totalPembayaranTiket.'" />
			</tr>
		</table>
		
		';
	}else{
		echo '
		<table width="100%" id="view-mount">
			<tr>
				<td style="border-top: 2px solid"><h4><b>Total Pembayaran</b></h4><td>
				<td style="border-top: 2px solid" align="right"><h4><b>Rp. '. number_format($totalPembayaran,2,",",".").'</b></h4><td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;<div id="loadvoc"></div><td>
				<input type="hidden" name="totprice" value="'.$totalPembayaran.'" />
			</tr>
		</table>
		
		';
	}
?>