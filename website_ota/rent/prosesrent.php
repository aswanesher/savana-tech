<?PHP
	session_start();
	require ('../config/hotel.conn.php');
	require_once ('../library/function.number.php');
	require_once ('../library/function.mail.php');
	require_once ('../library/function.convert.date.php');
	require ('../plugins/phpmailermaster/PHPMailerAutoload.php');
	date_default_timezone_set('Asia/Jakarta');
		
		//CHECK AUTO NUMBER --------------------------------------------------------------------------------------------------
		$today	= date("Ymd");
		$now	= date("Y-m-d H:i:s");
		
		$kodeKategory	= $_POST['kategory_item'];
		$qryaoutonum 	= $conn->query("SELECT COUNT(book_kode) AS jumlah FROM guest_book WHERE book_kode IS NOT NULL AND kategory_item = '".$kodeKategory."'");
		$qryaoutonum 	= $qryaoutonum->fetch(PDO::FETCH_ASSOC);
		$lastnotransaksi 	= $qryaoutonum['jumlah'];
		$code_periode 		= $qryaoutonum['jumlah'];	
		
		$nextnourut 		 	= $lastnotransaksi;
		$nextbookcode 		 	= $today.sprintf('RRTCM%04s', $nextnourut);
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
		$tglin 		= explode("/",$_POST['check_in']);
		$check_in 	= $tglin[2]."-".$tglin[0]."-".$tglin[1];
		//----------------------------------------------------------------
		
		//CONVERSI DATE KEMBALI-------------------------------------
		$tglout		= explode("/",$_POST['check_out']);
		$check_out 	= $tglout[2]."-".$tglout[0]."-".$tglout[1];
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
		
		if ($datavoc['voc_id'] != ''){
			$totstlhdisc = $_POST['totprice'] - $datavoc['voc_nilai'];
		}else{
			$totstlhdisc = $_POST['totprice'];
		}
		//----------------------------------------------------------------------------------------------------------------
		
		//CALCULATION TOTAL PAYMENT JIKA MENGGUNAKAN SUPIR----------------------------------------------------------------
		$qryCekHargaSupir 	= $conn->query("SELECT rent_harga_supir FROM `m_hotel` WHERE hotel_id = '".$_POST['hotel_id']."'");
		$dataHargaSupir		= $qryCekHargaSupir->fetch(PDO::FETCH_ASSOC);
		if (isset($_POST['flag_supir']) && $_POST['flag_supir'] == 1){
			$totstlhdisc	= $totstlhdisc + $dataHargaSupir['rent_harga_supir'];
		}else{
			$totstlhdisc	= $totstlhdisc;
		}
		//----------------------------------------------------------------------------------------------------------------
		
		//INSERT GUEST RESERVATION----------------------------------------------------------------------------------------
		try{
		$qryguestreserv 		= "INSERT INTO guest_book SET book_kode = ?, book_kode_encrypt	= ?, hotel_id = ?, check_in	= ?, check_out = ?, day_total = ?, rent_jml_penumpang	= ?, rent_tujuan = ?, flag_supir = ?, rent_jam = ?,	rent_permintaan	= ?, kategory_item = ?, email = ?, password	= ?, password_encrypt	= ?, name = ?, gender = ?, location	= ?, country = ?, phone	= ?, totprice = ?, very_code = ?, date_input = ?, xcode_voc	= ?, total_stlh_disc = ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $nextbookcode);
		$stmtguestreserv->bindParam(2, $nextbookcodeencrypt);
		$stmtguestreserv->bindParam(3, $_POST['hotel_id']);
		$stmtguestreserv->bindParam(4, $check_in);
		$stmtguestreserv->bindParam(5, $check_out);
		$stmtguestreserv->bindParam(6, $_POST['day_total']);
		$stmtguestreserv->bindParam(7, $_POST['rent_jml_penumpang']);
		$stmtguestreserv->bindParam(8, $_POST['rent_tujuan']);
		$stmtguestreserv->bindParam(9, $_POST['flag_supir']);
		$stmtguestreserv->bindParam(10, $_POST['rent_jam']);
		$stmtguestreserv->bindParam(11, $_POST['rent_permintaan']);
		$stmtguestreserv->bindParam(12, $_POST['kategory_item']);
		$stmtguestreserv->bindParam(13, $_POST['email']);
		$stmtguestreserv->bindParam(14, $_POST['password']);
		$stmtguestreserv->bindParam(15, $passencrypt);
		$stmtguestreserv->bindParam(16, $_POST['name']);
		$stmtguestreserv->bindParam(17, $gender);
		$stmtguestreserv->bindParam(18, $_POST['location']);
		$stmtguestreserv->bindParam(19, $_POST['country']);
		$stmtguestreserv->bindParam(20, $_POST['phone']);
		$stmtguestreserv->bindParam(21, $_POST['totprice']);
		$stmtguestreserv->bindParam(22, $autonum);
		$stmtguestreserv->bindParam(23, $now);
		$stmtguestreserv->bindParam(24, $_SESSION['xcd']);
		$stmtguestreserv->bindParam(25, $totstlhdisc);
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
		
		
		//AMBIL TAMU YANG SUDAH TERDAFTAR UNTUK TEMPALTE EMAIL---------------------------------------------------------------------------------------------
		$qrycek 	= $conn->query("SELECT a.book_kode,b.hotel_nama,b.rent_type,b.rent_merk,b.rent_kondisi,b.rent_transmisi,b.hotel_avg,a.check_in,a.check_out,a.day_total,a.rent_jml_penumpang,a.rent_tujuan,a.flag_supir,a.rent_jam,a.rent_permintaan,b.rent_harga_supir FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.book_kode_encrypt = '".$nextbookcodeencrypt."'");
		$databook	= $qrycek->fetch(PDO::FETCH_ASSOC);
		//-------------------------------------------------------------------------------------------------------------------------------------------------
		if ($databook['rent_kondisi'] == 1){
			$kondisi = "Baru";
			$kondisiEng = "New";
		}else if ($databook['rent_kondisi'] == 2){
			$kondisi = "Baik";
			$kondisiEng = "Good";
		}
		//CONVERT DATE RESERVATION---------------------------
		$tglPesan 	= convertDate($now);
		$hariPesan 	= dayChoice($now);
		//---------------------------------------------------
		
		/*
		//TOTAL DAY------------------------------------------
		$in			= date_create($databook['check_in']);
		$out		= date_create($databook['check_out']);
		$tot_day	= date_diff($in,$out);
		//---------------------------------------------------
		*/
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
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Konfirmasi Pembayaran Bank Transfer telah dilakukan melalui website paling lambat 1 Jam terhitung setelah pemesanan dilakukan<br><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Silahkan konfirmasi pembayaran anda  <a rel='nofollow' shape='rect' target='_blank' href='http://walanja.co.id/index.php?menu=login'>disini</a></p><br>
							
							<p><i>Thank you for visit website walanja.co.id. We will process your order when:</i><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>1. Your payment is received</i><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>2. Bank Transfer Payment Confirmation has been done through the website later than 1 hour starting after reservation is made</i><br><br><br>
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
							
							
		<table style='width:100%;font-family:Verdana,sans-serif;font-size:11px;color:#000000'>

        <tbody>
			<tr style='background-color:#4891b2;color:#fff;font-size:12px;font-weight:bold;padding:0.5em 1em'>
			  <th align='left' style='width:20%;padding:0.3em;color:#ffffff'>Merk Mobil (<i>Car brands</i>)</th>
			  <th align='left' style='width:20%;padding:0.3em;color:#ffffff'>Nama Mobil (<i>Car name</i>)</th>
			  <th align='left' style='width:20%;padding:0.3em;color:#ffffff'>Type Mobil (<i>Car type</i>)</th>
			  <th align='left' style='width:20%;padding:0.3em;color:#ffffff'>Kondisi (<i>condition</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Transmisi (<i>transmission</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Tgl Berangkat (<i>departure date</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Tgl Kembali (<i>return date</i>)</th>

			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Durasi (<i>duration</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Jml Penumpang (<i>passengers</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Kota Tujuan (<i>destination</i>)</th>";
			  if (isset($_POST['flag_supir']) && $_POST['flag_supir'] == 1){
	$form .= "
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Tarif Supir (<i>rate driver</i>)</th>
			  ";
			  }
	$form .= "
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Jam Pengambilan (<i>taking time</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Jam Pengembalian (<i>time Returns</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Permintaan Lain (<i>other requests</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Harga Per Orang (<i>price each people</i>)</th>
			  <th align='left' style='width:15%;padding:0.3em;color:#ffffff'>Total (<i>total</i>)</th>
			</tr>
			
			<tr style='background-color:#eeeeee;text-align:center'>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_merk']."</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['hotel_nama']."</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_type']."</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$kondisi." (".$kondisiEng.")</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_transmisi']."</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['check_in']."</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['check_out']."</td>
			  <td align='center' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['day_total']."</td>
			  <td align='center' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_jml_penumpang']." Orang (person)</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_tujuan']."</td>";
				if (isset($_POST['flag_supir']) && $_POST['flag_supir'] == 1){
				
	$form .= "
			  <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($databook['rent_harga_supir'],2,",",".")."</td>
			  ";
			  }
	$form .= "
			  <td align='center' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_jam']."</td>
			  <td align='center' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_jam']."</td>
			  <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['rent_permintaan']."</td>
			  <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($databook['hotel_avg'],2,",",".")."</td>
			  <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($totstlhdisc,2,",",".")."</td>
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
			
			$mail->WordWrap = 50;
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PEMESANAN MOBIL';
			$mail->msgHTML($form);
			$mail->send();
		
		
		}catch(PDOException $exception){
			echo "Error: " . $exception->getMessage();
		}
		
	
?>