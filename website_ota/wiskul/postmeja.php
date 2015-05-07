<?PHP
	require ('../config/hotel.conn.php');
	require_once ('../library/function.cracked.php');
	require_once ('../library/function.convert.date.php');
	require_once ('../library/function.number.php');
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	$now	= date("Y-m-d H:i:s");
	if(isset($_POST['wiskulId']) && isset($_POST['mejaId']) && isset($_POST['noBooking'])){
		
			//CEK APAKAH SUDAH ADA BOOKINGAN MEJA
			$qryCekNoBook	= $conn->query("SELECT meja_id FROM m_wiskul_meja WHERE hotel_id = '".$_POST['wiskulId']."' AND meja_id = '".$_POST['mejaId']."' AND meja_nomor_pesanan = '".$_POST['noBooking']."'");
			$strCekNoBook	= $qryCekNoBook->fetch(PDO::FETCH_ASSOC);
			
			
			//CEK APAKAH PEMESANAN UNTUK KE 2 KALI NYA
			$qryJumlahBook	= $conn->query("SELECT count(meja_nomor_pesanan) as jumlah FROM m_wiskul_meja WHERE hotel_id = '".$_POST['wiskulId']."' AND meja_nomor_pesanan = '".$_POST['noBooking']."'");
			$strJumlahBook	= $qryJumlahBook->fetch(PDO::FETCH_ASSOC);
		
			
			if($strCekNoBook['meja_id'] == '' && $strJumlahBook['jumlah'] == 0){
			//MASUKAN NO BOOKING KE MEJA
			$QryMasukanNoBook	= "UPDATE m_wiskul_meja SET meja_nomor_pesanan = '".$_POST['noBooking']."', meja_tgl_pesanan = '".$now."' WHERE hotel_id = '".$_POST['wiskulId']."' AND meja_id = '".$_POST['mejaId']."'";
			$stmtMasukNoBook 	= $conn->prepare($QryMasukanNoBook);
			$stmtMasukNoBook->execute();
			//MASUKAN SESSION NO BOOKING
			$_SESSION['bks'] = $_POST['noBooking'];
			
			//AMBIL NO MEJA
			$qryJumlahBook	= $conn->query("SELECT meja_nomor FROM m_wiskul_meja WHERE meja_nomor_pesanan = '".$_POST['noBooking']."'");
			$strJumlahBook	= $qryJumlahBook->fetch(PDO::FETCH_ASSOC);
			
				echo $strJumlahBook['meja_nomor'];
				$_SESSION['cmj'] = $strJumlahBook['meja_nomor'];
			}else if($strJumlahBook['jumlah'] == 1){
				echo '2';
			}else if($strCekNoBook['meja_id'] != ''){
				echo '1';
			}
	}
?>