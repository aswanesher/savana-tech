<?PHP
	session_start();
	require ('../config/hotel.conn.php');
	require_once ('../library/function.number.php');
	require_once ('../library/function.convert.date.php');
	require_once ('../library/function.mail.php');
	require_once ('../library/function.cracked.php');
	require ('../plugins/phpmailermaster/PHPMailerAutoload.php');
	date_default_timezone_set('Asia/Jakarta');
		
	if(isset($_POST['spec']) && $_POST['spec'] != ''){
		
		//INFORMASI CLIENT DESTINATION
			$menu 				= crackedSpec($_POST['spec'],0);
			$tujuanPerjalanan	= crackedSpec($_POST['spec'],1);
			$tglBerangkat 		= crackedSpec($_POST['spec'],2);
			$wisatawanDewasa 	= crackedSpec($_POST['spec'],3);
			$wisatawanAnak		= crackedSpec($_POST['spec'],4);
			$kodeKategory 		= crackedSpec($_POST['spec'],5);
			$wisataId	 		= crackedSpec($_POST['spec'],6);
		
		//CHECK AUTO NUMBER --------------------------------------------------------------------------------------------------
		$today	= date("Ymd");
		$now	= date("Y-m-d H:i:s");
		
		$StrkodeKategory	= $kodeKategory;
		$qryaoutonum 	= $conn->query("SELECT COUNT(book_kode) AS jumlah FROM guest_book WHERE book_kode IS NOT NULL AND kategory_item = '".$StrkodeKategory."'");
		$qryaoutonum 	= $qryaoutonum->fetch(PDO::FETCH_ASSOC);
		$lastnotransaksi 	= $qryaoutonum['jumlah'];
		$code_periode 		= $qryaoutonum['jumlah'];	
		
		$nextnourut 		 	= $lastnotransaksi;
		$nextbookcode 		 	= $today.sprintf('RWTCM%04s', $nextnourut);
		$nextbookcodeencrypt 	= crypt(md5($nextbookcode), md5($nextbookcode));
		//--------------------------------------------------------------------------------------------------------------------
		
		//PASSWORD YANG SUDAH DI ENCRYPT----------------------------------
		$passencrypt			= crypt(md5($_POST['password']), md5($_POST['password']));
		//----------------------------------------------------------------
		
		//CONDITION GENDER------------------------------------------------
		if ($_POST['gender'] == 'M'){
			$gender = "Laki-Laki";
		}else{
			$gender = "Perempuan";
		}
		//----------------------------------------------------------------
		
		//CONVERSI DATE BERANGKAT-------------------------------------
		$tglin 		= explode("/",$tglBerangkat);
		$check_in 	= $tglin[2]."-".$tglin[0]."-".$tglin[1];
		//----------------------------------------------------------------
		
		//SET SESSION-----------------------------------------------------
		$_SESSION['codrev']		= $nextbookcodeencrypt;
		//----------------------------------------------------------------
		
		//ACAK NOMOR------------------------------------------------------
		$autonum = acak(4);
		//----------------------------------------------------------------
		
		//VALIDATION MAIL JIKA MAIL BELUM TERDAFTAR-----------------------------------------------------------------------
		$qrycekmail 	= $conn->query("SELECT name,mail_name FROM mail_manager WHERE mail_name = '".$_POST['email']."' AND name = '".$_POST['name']."'");
		$datamail		= $qrycekmail->fetch(PDO::FETCH_ASSOC);
		
		if ($datamail['name'] == '' && $datamail['mail_name'] == ''){
			$QryPostMail	 =	"INSERT INTO mail_manager SET name	= ?, mail_name	= ?";
			$stmtPostMail	 = $conn->prepare($QryPostMail);
			$stmtPostMail->bindParam(1, $_POST['name']);
			$stmtPostMail->bindParam(2, $_POST['email']);
			$stmtPostMail->execute();
		}
		//----------------------------------------------------------------------------------------------------------------
		
		//CALUCATION TOTAL PAYMENT JIKA MENGGUNAKAN VOUCER----------------------------------------------------------------
		$qrycekvoc 	= $conn->query("SELECT * FROM `m_voucher` WHERE voc_code_encrypt = '".$_SESSION['xcd']."'");
		$datavoc	= $qrycekvoc->fetch(PDO::FETCH_ASSOC);
		
		//CALCULATION PAYMENT BEFORE DISC---------------------------------------------------------------------------------
			//AMBIL NILAI PERMAINAN--------------------------
			$qryWisata 		= $conn->query("SELECT SUM(b.tiket_harga_permainan) AS totalTiket FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$_SESSION['cdt']."'");
			$strWisata 		= $qryWisata->fetch(PDO::FETCH_ASSOC);
			$totalTiket		= $strWisata['totalTiket'];
			//-----------------------------------------------
			
			//AMBIL NILAI TIKET DEWASA DAN ANAK--------------
			
			//CEK HARI INI APAKAH WEEKEND
			$sekarang = date('N', strtotime($now));
			
			$qryCekTiketHoliday		= $conn->query("SELECT flag_hari_libur FROM m_tiket WHERE hotel_id = '".$wisataId."'");
			$strHargaTiketHoliday	= $qryCekTiketHoliday->fetch(PDO::FETCH_ASSOC);
			
			//JIKA HARI INI ADALAH WEEKEND
			if ($sekarang == 6 || $sekarang == 7 || $strHargaTiketHoliday['flag_hari_libur'] == 1){
				if($strHargaTiketHoliday['flag_hari_libur'] == 0){
				$qryHargaWeekEnd= $conn->query("SELECT tiket_nama,tiket_harga_dewasa_libur,tiket_harga_anak_libur FROM m_tiket WHERE hotel_id = '".$wisataId."'");
				$strHargaWeekEnd= $qryHargaWeekEnd->fetch(PDO::FETCH_ASSOC);
				$tiketNama		= $strHargaWeekEnd['tiket_nama'];
				$tiketDewasa	= $strHargaWeekEnd['tiket_harga_dewasa_libur'];
				$tiketAnak		= $strHargaWeekEnd['tiket_harga_anak_libur'];
				}else if($strHargaTiketHoliday['flag_hari_libur'] == 1){
				$qryHargaWeekEnd= $conn->query("SELECT tiket_nama,tiket_harga_dewasa_holiday,tiket_harga_anak_holiday FROM m_tiket WHERE hotel_id = '".$wisataId."'");
				$strHargaWeekEnd= $qryHargaWeekEnd->fetch(PDO::FETCH_ASSOC);
				$tiketNama		= $strHargaWeekEnd['tiket_nama'];
				$tiketDewasa	= $strHargaWeekEnd['tiket_harga_dewasa_holiday'];
				$tiketAnak		= $strHargaWeekEnd['tiket_harga_anak_holiday'];
				}
			}else{
				$qryHargaWeekEnd= $conn->query("SELECT tiket_nama,tiket_harga_dewasa_biasa,tiket_harga_anak_biasa FROM m_tiket WHERE hotel_id = '".$wisataId."'");
				$strHargaWeekEnd= $qryHargaWeekEnd->fetch(PDO::FETCH_ASSOC);
				$tiketNama		= $strHargaWeekEnd['tiket_nama'];
				$tiketDewasa	= $strHargaWeekEnd['tiket_harga_dewasa_biasa'];
				$tiketAnak		= $strHargaWeekEnd['tiket_harga_anak_biasa'];
			}
			
			//TOTAL PEMBAYARAN
			$totalPembarayaran	= ($tiketDewasa * $wisatawanDewasa) + ($tiketAnak * $wisatawanAnak);
			
			
			//GRAND TOTAL BEFORE DISCOUNT
			$totalBersih = $totalPembarayaran + $totalTiket;
			//--------------------------
			//-----------------------------------------------
		//----------------------------------------------------------------------------------------------------------------
		
		//INSERT GUEST RESERVATION----------------------------------------------------------------------------------------
		try{
		$qryguestreserv 		= "INSERT INTO guest_book SET 
										book_kode = ?, 
										book_kode_encrypt	= ?, 
										hotel_id = ?, 
										check_in	= ?, 
										obj_dewasa	= ?, 
										obj_anak	= ?, 
										obj_tujuan	= ?, 
										flag_hari_libur	= ?, 
										guest_book_wisata_detail_kode	= ?, 
										kategory_item = ?, 
										email = ?, 
										password	= ?, 
										password_encrypt	= ?, 
										name = ?, 
										gender = ?, 
										location	= ?, 
										country = ?, 
										phone	= ?, 
										totprice = ?, 
										very_code = ?, 
										date_input = ?, 
										xcode_voc	= ?, 
										total_stlh_disc = ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $nextbookcode);
		$stmtguestreserv->bindParam(2, $nextbookcodeencrypt);
		$stmtguestreserv->bindParam(3, $wisataId);
		$stmtguestreserv->bindParam(4, $check_in);
		$stmtguestreserv->bindParam(5, $wisatawanDewasa);
		$stmtguestreserv->bindParam(6, $wisatawanAnak);
		$stmtguestreserv->bindParam(7, $tujuanPerjalanan);
		$stmtguestreserv->bindParam(8, $strHargaTiketHoliday['flag_hari_libur']);
		$stmtguestreserv->bindParam(9, $_SESSION['cdt']);
		$stmtguestreserv->bindParam(10, $kodeKategory);
		$stmtguestreserv->bindParam(11, $_POST['email']);
		$stmtguestreserv->bindParam(12, $_POST['password']);
		$stmtguestreserv->bindParam(13, $passencrypt);
		$stmtguestreserv->bindParam(14, $_POST['name']);
		$stmtguestreserv->bindParam(15, $gender);
		$stmtguestreserv->bindParam(16, $_POST['location']);
		$stmtguestreserv->bindParam(17, $_POST['country']);
		$stmtguestreserv->bindParam(18, $_POST['phone']);
		$stmtguestreserv->bindParam(19, $totalBersih);
		$stmtguestreserv->bindParam(20, $autonum);
		$stmtguestreserv->bindParam(21, $now);
		$stmtguestreserv->bindParam(22, $_SESSION['xcd']);
		$stmtguestreserv->bindParam(23, $_POST['totprice']);
		$stmtguestreserv->execute();
		//-------------------------------------------------------------------------------------------------------------------
		
		//UPDATE FLAG VOUCHER JIKA VOUCHER DIGUNAKAN-------------------------------------------------------------------------
		$updtstatus	= "UPDATE `m_voucher` SET `flag_use`='1' WHERE `voc_code_encrypt`= '".$_SESSION['xcd']."'";
		$stmtupdt 	= $conn->prepare($updtstatus);
		$stmtupdt->execute();
		//-------------------------------------------------------------------------------------------------------------------
		
		//CLEAR SESSION-------------
		session_cache_expire(30);
		session_destroy();
		//--------------------------
		
		
		//AMBIL TAMU YANG SUDAH TERDAFTAR UNTUK TEMPALTE EMAIL--------------------------------------------
		$qrycek 	= $conn->query("SELECT a.obj_tujuan,b.hotel_nama,a.obj_dewasa,a.obj_anak,a.check_in,a.total_stlh_disc,a.guest_book_wisata_detail_kode FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.book_kode_encrypt = '".$nextbookcodeencrypt."'");
		$databook	= $qrycek->fetch(PDO::FETCH_ASSOC);
		//------------------------------------------------------------------------------------------------
		//CONVERT DATE RESERVATION---------------------------
		$tglPesan 	= convertDate($now);
		$hariPesan 	= dayChoice($now);
		//---------------------------------------------------
		//CONVERT DATE DESTINATION---------------------------
		$tglDesc 	= convertDate($databook['check_in']);
		$hariDesc 	= dayChoice($databook['check_in']);
		//---------------------------------------------------
		//FORM CONTENT
		
		$form .= "			
				<html xmlns='http://www.w3.org/1999/xhtml'>
					<head>
						<title>Niceforms</title>
							<!-- Fonts -->	
						<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
						<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
						<style>
							table {
							border-collapse: separate;
							border-color: gray;
							}
						</style>
					</head>
					<body style='font-family: calibri'>
						<p><font color='#b8e8ff' style='font-size: 25px'>Dear ".$_POST['name'].",</font><br>
							Terima kasih telah mengunjungi website walanja.co.id. Kami akan segera memproses order Anda apabila:<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Pembayaran telah kami terima<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Konfirmasi Pembayaran Bank Transfer telah dilakukan melalui website paling lambat 20 MENIT terhitung setelah pemesanan dilakukan<br><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Silahkan konfirmasi pembayaran anda  <a rel='nofollow' shape='rect' target='_blank' href='http://walanja.co.id/index.php?menu=login'>disini</a></p><br>
							
							<p><i>Thank you for visit website walanja.co.id. We will process your order when:</i><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>1. Your payment is received</i><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>2. Bank Transfer Payment Confirmation has been done through the website later than 20 MINUTE starting after reservation is made</i><br><br><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Please Confirm your Bank Transfer payment <a rel='nofollow' shape='rect' target='_blank' href='http://walanja.co.id/index.php?menu=login' target='_blank'>here</a></i></p>
							

														
							<table border='1' cellpadding='0' cellspacing='0' width='80%'>
								<tr>
									<td style='background-color: #069;color:#fff;font-size:14px;font-weight:bold;padding:0.5em 1em'><font color='white'>Rincian Pemesanan</font></td>
								</tr>
								<tr>
									<td style='font-size:14px;font-weight:bold;padding:0.5em 1em'><font>ID (<i>ID</i>): ".$autonum."</font></td>
								</tr>
								<tr>
									<td style='font-size:14px;font-weight:bold;padding:0.5em 1em'><font>Tanggal Pemesanan (<i>date of booking</i>): ".$hariPesan.", ".$tglPesan."</font></td>
								</tr>
								<tr>
									<td style='font-size:14px;font-weight:bold;padding:0.5em 1em'><font>Email Pengguna (<i>email users</i>): ".$_POST['email']."</font></td>
								</tr>
								<tr>
									<td style='font-size:14px;font-weight:bold;padding:0.5em 1em'><font>Kata Sandi (<i>password</i>): ".$_POST['password']."</font></td>
								</tr>
							</table>
							<br>
							<br>
							
		<h4>Rincian Wisata</h4>				
		<table style='width:100%;font-family:Verdana,sans-serif;font-size:11px;color:#000000'>

        <tbody>
			<tr style='background-color:#4891b2;color:#fff;font-size:12px;font-weight:bold;padding:0.5em 1em'>
			  <td align='left' style='width:20%;padding:0.3em;color:#ffffff'>Tujuan Wisata<br>(<i>Tourist Destination</i>)</td>
			  <td align='left' style='width:20%;padding:0.3em;color:#ffffff'>Nama Tempat<br>(<i>place name</i>)</td>";
			  if($databook['obj_dewasa'] > 0){
	$form .="
			  <td align='left' style='width:20%;padding:0.3em;color:#ffffff'>Dewasa (<i>adult</i>)</td> 
			";
			} 
			if($databook['obj_anak'] > 0){
	$form .="
			  <td align='left' style='width:20%;padding:0.3em;color:#ffffff'>Anak (<i>child</i>)</td>
			  ";
			  }
	$form .="
			  <td align='left' style='width:15%;padding:0.3em;color:#ffffff'>Tgl Berangkat (<i>departure date</i>)</td>
			</tr>
			
			<tr style='background-color:#eeeeee;text-align:center'>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['obj_tujuan']."</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['hotel_nama']."</td>";
			  if($databook['obj_dewasa'] > 0){
	$form .="
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$wisatawanDewasa." Dewasa (adult)</td>";
			 } 
			 
			 if($databook['obj_anak'] > 0){ 
	$form .="
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$wisatawanAnak." Anak (child)</td>";
			  }
	$form .="
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$hariDesc.", ".$tglDesc."</td>
			</tr>
		</tbody>
	  </table>
	  
	  <h4>Rincian Biaya</h4>				
		<table style='width:100%;font-family:Verdana,sans-serif;font-size:11px;color:#000000'>

        <tbody>
			<tr style='background-color:#4891b2;color:#fff;font-size:12px;font-weight:bold;padding:0.5em 1em'>
			  <td align='left' style='width:20%;padding:0.3em;color:#ffffff'>Biaya Untuk<br>(<i>Cost for</i>)</td>";
			  if($databook['obj_dewasa'] > 0){
	$form .="
			  <td align='left' style='width:18%;padding:0.3em;color:#ffffff'>Tiket Dewasa<br>(<i>adult ticket</i>)</td> 
			";
			} 
			if($databook['obj_anak'] > 0){
	$form .="
			  <td align='left' style='width:18%;padding:0.3em;color:#ffffff'>Tiket Anak<br>(<i>child ticket</i>)</td>
			  ";
			  }
	$form .="
			  <td align='left' style='width:15%;padding:0.3em;color:#ffffff'>Total<br>(<i>total</i>)</td>
			</tr>
			
			<tr style='background-color:#eeeeee;text-align:center'>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'></td>".$tiketNama."</td>";
			  if($databook['obj_dewasa'] > 0){
	$form .="
			  <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($tiketDewasa * $wisatawanDewasa,2,",",".")."</td>";
			 } 
			 
			 if($databook['obj_anak'] > 0){ 
	$form .="
			  <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($tiketAnak * $wisatawanAnak,2,",",".")."</td>";
			  }
	$form .="
			  <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($totalPembarayaran,2,",",".")."</td>
			</tr>";
	
	$qryRent 	= "SELECT a.guest_book_wisata_detail_id,b.tiket_nama,b.tiket_harga_permainan FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$databook['guest_book_wisata_detail_kode']."'";
		$stmtRent 	= $conn->prepare( $qryRent );
		$stmtRent->execute();
		while ($rowRent = $stmtRent->fetch(PDO::FETCH_ASSOC))
		{
		extract($rowRent); 
			
$form .="
		<tr style='background-color:#eeeeee;text-align:center'>
			<td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$tiket_nama."</td>
			<td align='right' colspan='3' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($tiket_harga_permainan,2,",",".")."</td>
		</tr>
		";
		}
$form .="
		<tr style='background-color:#eeeeee;text-align:center'>
			<td align='right' colspan='3' style='background-color:#b8e8ff;color:#000;font-size:12px;font-weight:normal;padding:0.5em 1em'><b>Total Tiket</b> (<i>total ticket</i>)</td>
			<td align='right' style='background-color:#b8e8ff;color:#000;font-size:11px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($totalBersih,2,",",".")."</td>
		</tr>
		<tr style='background-color:#eeeeee;text-align:center'>
			<td align='right' colspan='3' style='background-color:#b8e8ff;color:#000;font-size:12px;font-weight:normal;padding:0.5em 1em'><b>Disc</b> (<i>disc</i>)</td>
			<td align='right' style='background-color:#b8e8ff;color:#000;font-size:11px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($datavoc['voc_nilai'],2,",",".")."</td>
		</tr>
		<tr style='background-color:#eeeeee;text-align:center'>
			<td align='right' colspan='3' style='background-color:#b8e8ff;color:#000;font-size:12px;font-weight:normal;padding:0.5em 1em'><b>Total Pembayaran</b> (<i>total payment</i>)</td>
			<td align='right' style='background-color:#b8e8ff;color:#000;font-size:11px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($_POST['totprice'],2,",",".")."</td>
		</tr>
		</tbody>
	  </table>
	  
	  <table>
	  <tr>
		<td align='left'>
			<div>Silakan lakukan pembayaran ke:</div>
			  <div>
				<i>Please make your payment to:</i>
			  </div>
			  <div style='padding:0px 0px 10px 25px;font-weight:bolder'>
				<ul>
					<li>Rek Bank Mandiri Cabang Pasteur<br>No. 132.001.099.7022<br>a.n. PT. Citra Jelajah Informatika</li><br>
					<li>Rek BCA Cabang Dago<br>No. 777.054.0300<br>a.n. PT. Citra Jelajah Informatika</li>	
				</ul>
			  </div>
			<div>Jika Konfirmasi Pembayaran tidak diterima, pemesanan akan dibatalkan secara otomatis.</div>
			  <div>
				<i>If the Payment confirmation is not received, booking will be automatically cancelled.</i>
			  </div>
			<div>Terima kasih, <br><i>Thank you,</i><i></i></div>
			  <div style='font-weight:bolder;color:#1192cc;font-size:14px'>
				<i>walanja.co.id</i>
			  </div>
		</td>
	  </tr>
	  </table>					
	</body>
	</html>";
							//echo $form;
		
		// SEND MAIL TO GUEST
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = confMailServer($conn, 'mail_outgoing_server');
			$mail->Port = 25; 
			$mail->SMTPAuth = true;
			$mail->Username = confMailServer($conn, 'mail_username');
			$mail->Password = confMailServer($conn, 'mail_password');
			$mail->SMTPSecure = 'tls';

			$mail->From = confMailServer($conn, 'mail_username');
			$mail->FromName = confMailServer($conn, 'mail_from');
			$mail->addAddress($_POST['email'], $_POST['name']);
			$mail->AddCC(confMailServer($conn, 'mail_cc'));
			
			$mail->WordWrap = 50;
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PEMESANAN TIKET WISATA';
			$mail->msgHTML($form);
			$mail->send();
		
		
		}catch(PDOException $exception){
			echo "Error: " . $exception->getMessage();
		}
		
	}
?>