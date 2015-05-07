<?PHP
	session_start();
	require ('config/hotel.conn.php');
	require ('library/function.mail.php');
	require ('plugins/phpmailermaster/PHPMailerAutoload.php');
	date_default_timezone_set('Asia/Jakarta');
	//$aksi = $_GET['act'];
	$aksi = 'book';
	if ($aksi == 'book'){
		$kategory_item = '25437857';
		//CHECK AUTO NUMBER
		$today	= date("Ymd");
		$now	= date("Y-m-d H:i:s");
		
		$StrkodeKategory		= mysql_real_escape_string($kategory_item);
		$qryaoutonum 			= $conn->query("SELECT COUNT(book_kode) AS jumlah FROM guest_book WHERE book_kode IS NOT NULL AND kategory_item = '25437857'");
		$qryaoutonum 			= $qryaoutonum->fetch(PDO::FETCH_ASSOC);
		$lastnotransaksi 		= $qryaoutonum['jumlah'];
		$code_periode 			= $qryaoutonum['jumlah'];	
		
		$nextnourut 		 	= $lastnotransaksi;
		$nextbookcode 		 	= $today.sprintf('RSVCM%04s', $nextnourut);
		$nextbookcodeencrypt 	= crypt(md5($nextbookcode), md5($nextbookcode));
		
		$passencrypt			= crypt(md5($_POST['password']), md5($_POST['password']));
		
		//CONDITION GENDER
		if ($_POST['gender'] == 'M'){
			$gender = "Laki-Laki";
			}else{
			$gender = "Perempuan";
			}
		
		
		//CONVERSI DATE IN OUT
		$tglin = explode("/",$_POST['check_in']);
		$check_in = $tglin[2]."-".$tglin[0]."-".$tglin[1];
		
		
		$tglout = explode("/",$_POST['check_out']);
		$check_out = $tglout[2]."-".$tglout[0]."-".$tglout[1];
		
		//SET SESSION
		
		$_SESSION['codrev']		= $nextbookcodeencrypt;
		
		//ACAK NOMOR
		
		function acak($panjang)
		{
			$karakter= '1234567890';
			$string = '';
			for ($i = 0; $i < $panjang; $i++) {
				$pos = rand(0, strlen($karakter)-1);
				$string .= $karakter{$pos};
			}
			return $string;
		}
		$autonum = acak(4);
		
		//CEK MAIL
		$qrycekmail 	= $conn->query("SELECT mail_name FROM mail_manager WHERE mail_name = '".$_POST['email']."'");
		$datamail		= $qrycekmail->fetch(PDO::FETCH_ASSOC);
		
		if ($datamail['mail_name'] == ''){
			$QryPostMail	 =	"INSERT INTO mail_manager SET mail_name	= ?";
			$stmtPostMail	 = $conn->prepare($QryPostMail);
			$stmtPostMail->bindParam(1, $_POST['email']);
			$stmtPostMail->execute();
		}
		
		//CALUCATION TOTAL PAYMENT
		
		$qrycekvoc 	= $conn->query("SELECT * FROM `m_voucher` WHERE voc_code_encrypt = '".$_SESSION['xcd']."'");
		$datavoc	= $qrycekvoc->fetch(PDO::FETCH_ASSOC);
		
		if ($datavoc['voc_id'] != ''){
			$totstlhdisc = $_POST['totprice'] - $datavoc['voc_nilai'];
		}else{
			$totstlhdisc = $_POST['totprice'];
		}
					
		//INSERT GUEST RESERVATION
		
		$dayHarga = 0;
	$harga='';
	$dtharga = 0;
	  $jum = 0;
	  
	  $q = $conn->query("SELECT * FROM kalender_harga WHERE cal_bulan =".$tglin[0]." and cal_tahun= ".$tglin[2]."  and room_id=".$_POST['room_id']."");
	
	  $dtharga = $q->fetch(PDO::FETCH_ASSOC);
		
		$harga=explode("," ,$dtharga['cal_harga']);
	
	$jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
	
	$tgl = $jumlah_hari[$dtharga['cal_bulan'] - 1];  
	
	 if ($dtharga['cal_bulan'] == 2) {
		if ($dtharga[cal_tahun] % 400 == 0 OR ($dtharga[cal_tahun] % 4 == 0 AND $dtharga[cal_tahun] % 100 != 0)) {
			$tgl= 29; 
		} 
	}
	
	$qday =$conn->query("SELECT day(curdate()) as day");	
	$dd=$qday->fetch(PDO::FETCH_ASSOC);
		
	for($a=1;$a<=$tgl;$a++){
		if($a == $tglin[1]){
			$dayHarga=$harga[$a-1];
		}
	}
	
	$qroom 	= $conn->query("SELECT room_disc from m_room where room_id='".$_POST['room_id']."'");
		$dtroom	= $qroom->fetch(PDO::FETCH_ASSOC);
	
	$disc 	   = $dtroom['room_disc'] / 100 * $dayHarga;
	$totHarga  = $disc + $dayHarga;
	
	
		
		
		try{
		$qryguestreserv 		= "INSERT INTO guest_book SET 
									book_kode 			= ?, 
									book_kode_encrypt 	= ?, 
									hotel_id 			= ?, 
									check_in 			= ?,
									check_out 			= ?,
									pax		 			= ?,
									noroom	 			= ?,
									kategory_item		= ?,
									room_id	 			= ?,
									email	 			= ?,
									password 			= ?,
									password_encrypt	= ?,
									name				= ?,
									gender				= ?,
									location			= ?,
									country				= ?,
									phone				= ?,
									totprice			= ?,
									very_code			= ?,
									date_input			= ?,
									xcode_voc			= ?,
									hrg_hari_ini		= ?,
									total_stlh_disc		= ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $nextbookcode);
		$stmtguestreserv->bindParam(2, $nextbookcodeencrypt);
		$stmtguestreserv->bindParam(3, $_POST['hotel_id']);
		$stmtguestreserv->bindParam(4, $check_in);
		$stmtguestreserv->bindParam(5, $check_out);
		$stmtguestreserv->bindParam(6, $_POST['pax']);
		$stmtguestreserv->bindParam(7, $_POST['noroom']);
		$stmtguestreserv->bindParam(8, $kategory_item);
		$stmtguestreserv->bindParam(9, $_POST['room_id']);
		$stmtguestreserv->bindParam(10, $_POST['email']);
		$stmtguestreserv->bindParam(11, $_POST['password']);
		$stmtguestreserv->bindParam(12, $passencrypt);
		$stmtguestreserv->bindParam(13, $_POST['name']);
		$stmtguestreserv->bindParam(14, $gender);
		$stmtguestreserv->bindParam(15, $_POST['location']);
		$stmtguestreserv->bindParam(16, $_POST['country']);
		$stmtguestreserv->bindParam(17, $_POST['phone']);
		$stmtguestreserv->bindParam(18, $_POST['totprice']);
		$stmtguestreserv->bindParam(19, $autonum);
		$stmtguestreserv->bindParam(20, $now);
		$stmtguestreserv->bindParam(21, $_SESSION['xcd']);
		$stmtguestreserv->bindParam(22, $totHarga);
		$stmtguestreserv->bindParam(23, $totstlhdisc);
		$stmtguestreserv->execute();
		
		$updtstatus	= "UPDATE `m_voucher` SET `flag_use`='1' WHERE `voc_code_encrypt`= '".$_SESSION['xcd']."'";
		$stmtupdt 	= $conn->prepare($updtstatus);
		$stmtupdt->execute();
		
		
		//CLEAR SESSION
		
		session_cache_expire(30);
		session_destroy();
		
		
		//VALIDATION GUEST
		$qrycek 	= $conn->query("SELECT a.book_kode,c.hotel_nama,a.check_in,a.check_out,a.pax,a.noroom,b.room_type,b.room_price,b.room_avaibility FROM guest_book a INNER JOIN m_room b ON a.room_id = b.room_id INNER JOIN m_hotel c ON a.hotel_id = c.hotel_id WHERE a.book_kode_encrypt = '".$nextbookcodeencrypt."'");
		$databook	= $qrycek->fetch(PDO::FETCH_ASSOC);
		
		$tgl1=explode(" ",$databook['check_in']);		
		$tglChekin= $tgl1[0];			
		$tgl2=explode(" ",$databook['check_out']);		
		$tglChekOut= $tgl2[0];
		
		//CEK DOMAIN
		$qrycekdom 	= $conn->query("SELECT * FROM config_domain LIMIT 0,1");
		$qrycekdom	= $qrycekdom->fetch(PDO::FETCH_ASSOC);
		
		//TOTAL DAY
		$in		= date_create($databook['check_in']);
		$out	= date_create($databook['check_out']);
		$tot_day= date_diff($in,$out);
		
		//FORM CONTENT
		
		$form = "			<html xmlns='http://www.w3.org/1999/xhtml'>
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
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>2. Bank Transfer Payment Confirmation has been done through the website later than 1 Hour starting after reservation is made</i><br><br><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Please Confirm your Bank Transfer payment <a rel='nofollow' shape='rect' target='_blank' href='http://walanja.co.id/index.php?menu=login' onClick='window.location.href='http://walanja.co.id/index.php?menu=login';return false;' target='_blank'>here</a></i></p>
							

														
							<table border='1' cellpadding='0' cellspacing='0' width='60%'>
								<tr>
									<td style='background-color: #069;color:#fff;font-size:14px;font-weight:bold;padding:0.5em 1em'><font color='white'>Rincian Pemesanan</font></td>
								</tr>
								<tr>
									<td style='font-size:14px;font-weight:bold;padding:0.5em 1em'><font>ID (<i>ID</i>): ".$autonum."</font></td>
								</tr>
								<tr>
									<td style='font-size:14px;font-weight:bold;padding:0.5em 1em'><font>Tanggal Pemesanan (<i>date of booking</i>): ".$now."</font></td>
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
							
							
		<table style='width:60%;font-family:Verdana,sans-serif;font-size:11px;color:#000000'>

        <tbody>
		 <tr style='background-color:#4891b2;color:#fff;font-size:12px;font-weight:bold;padding:0.5em 1em'>

          <th align='left' style='width:20%;padding:0.3em;color:#ffffff'>Nama Hotel (<i>hotel name</i>)</th>

          <th align='left' style='width:10%;color:#ffffff;padding:0.3em'>Type Ruangan (<i>room type</i>)</th>

          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Tgl Check In (<i>check in date</i>)</th>

          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Tgl Check Out (<i>check out date</i>)</th>
		  
          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Jumlah Kamar (<i>room total</i>)</th>
		  
          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Durasi (<i>Duration</i>)</th>
		  
		  <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Harga (<i>price</i>)</th>
		  
		  <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Total (<i>total</i>)</th>

        </tr>

        
        <tr style='background-color:#eeeeee;text-align:center'>

          <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['hotel_nama']."</td>

          <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['room_type']."</td>

          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$tglChekin." 14:00</td>

          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$tglChekOut." 12:00 </td>
			
          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['noroom']."</td>
		  
          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$tot_day->format("%a")."</td>
		  
          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>Rp. ".number_format($totHarga,2,",",".")."</td>
		  
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
     <div>Terima kasih, <br><i>Thank you,</i>
  <i></i>
  </div>
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

			$mail->Subject = 'KONFIRMASI PEMESANAN KAMAR';
			$mail->msgHTML($form);
			$mail->send();	

				$formOp .= "
				<p>Telah dilakukan pemesanan melalui walanja.co.id dengan rincian sebagai berikut :</p>
				<p>NOMOR PEMESANAN : ".$nextbookcode."</p>
				<p>TGL PEMESANAN : ".$now."</p>
				<p>NAMA PEMESAN : ".$_POST['name']."</p>
				<p>JENIS KELAMIN : ".$gender."</p>
				<p>NO TLP PEMESAN : ".$_POST['phone']."</p>
				<p>EMAIL PEMESAN : ".$_POST['email']."</p>
				<p><b>DETAIL PESANAN</b></p>
				<p>
					<table style='width:100%;font-family:Verdana,sans-serif;font-size:11px;color:#000000'>

        <tbody>
		 <tr style='background-color:#4891b2;color:#fff;font-size:12px;font-weight:bold;padding:0.5em 1em'>

          <th align='left' style='width:20%;padding:0.3em;color:#ffffff'>Nama Hotel (<i>hotel name</i>)</th>

          <th align='left' style='width:10%;color:#ffffff;padding:0.3em'>Type Ruangan (<i>room type</i>)</th>

          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Tgl Check In (<i>check in date</i>)</th>

          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Tgl Check Out (<i>check out date</i>)</th>
		  
          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Jumlah Kamar (<i>room total</i>)</th>
		  
          <th align='right' style='width:10%;padding:0.3em;color:#ffffff'>Durasi (<i>Duration</i>)</th>

        </tr>

        
        <tr style='background-color:#eeeeee;text-align:center'>

          <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['hotel_nama']."</td>

          <td align='left' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['room_type']."</td>

          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$tglChekin." 14:00</td>

          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$tglChekOut." 12:00 </td>
			
          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$databook['noroom']."</td>
		  
          <td align='right' style='background-color:#b8e8ff;color:#000;font-size:10px;font-weight:normal;padding:0.5em 1em'>".$tot_day->format("%a")."</td>

        </tr>

        
      
      </tbody>
	  </table>
				</p>
				
		<p>Silahkan Login Sebagai Operator Untuk Melihat detail pemesanan dan untuk dilakukan persetujuan pesanan</p>
			";
			
		// SEND MAIL TO GUEST
		
			$mailOp = new PHPMailer;
			$mailOp->isSMTP();
			$mailOp->Host = confMailServer($conn, 'mail_outgoing_server');
			$mailOp->Port = 25; 
			$mailOp->SMTPAuth = true;
			$mailOp->Username = confMailServer($conn, 'mail_username');
			$mailOp->Password = confMailServer($conn, 'mail_password');
			$mailOp->SMTPSecure = 'tls';

			$mailOp->From = confMailServer($conn, 'mail_username');
			$mailOp->FromName = confMailServer($conn, 'mail_from');
			$mailOp->addAddress('opt@walanja.co.id', 'Operator');		

			$mailOp->WordWrap = 50;
			$mailOp->isHTML(true);

			$mailOp->Subject = 'NOTIFIKASI PEMESANAN walanja.co.id';
			$mailOp->msgHTML($formOp);
			$mailOp->send();	
		
		}catch(PDOException $exception){
			echo "Error: " . $exception->getMessage();
		}
	}
?>