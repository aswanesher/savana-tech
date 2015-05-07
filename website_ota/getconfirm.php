<?PHP
	require ('config/hotel.conn.php');
	$qrycheckguest 	= $conn->query("SELECT * FROM guest_book WHERE book_kode_encrypt = '".$_COOKIE['crv']."' AND flag_batal = 0");
	$qrycheckguest 	= $qrycheckguest->fetch(PDO::FETCH_ASSOC);
	if($qrycheckguest['flag_confirm'] == 1){
?>
		<div class="col-md-12 offset-0">
			<table width="100%">
				<tr>
					<td align="center"><img src="images/confirm.png" /></td>
				</tr>
				<tr>
					<td align="center">Terimakasih permintaan anda telah kami proses, silahkan unduh bukti pemesanan anda <a href="javascript:;" style="color: orange;text-decoration: none" onclick="location.href='aprove.php?code=<?PHP echo $_COOKIE['crv']?>'" ><b>disini</b></a>, untuk melihat detail konfirmasi pembayaran bisa lihat di bawah halaman ini.</td>
				</tr>
			</table>
		</div>
<?PHP
	}else{
?>
		<div class="col-md-12 offset-0">
			<table width="100%">
				<tr>
					<td align="center"><img src="images/warning.png" /></td>
				</tr>
				<tr>
					<td align="center">Maaf pemesanan masih dalam tahap pemeriksaan, cobalah beberapa saat lagi</td>
				</tr>
			</table>
		</div>
<?PHP	
	}
?>