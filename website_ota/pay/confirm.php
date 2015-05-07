<?PHP
		require ('../config/hotel.conn.php');
		require("../library/function.convert.date.php");
		require("../library/function.mail.php");
		require('../plugins/phpmailermaster/PHPMailerAutoload.php');
		//require ('library/function.uang.php');
		$today	= gmdate('Y-m-d H:i:s',time()+60*60*7);
		
		if ($_POST['book_id'] != "" && $_POST['bank_tujuan'] != "" && $_POST['asal_bank'] != "" && $_POST['atas_nama'] != ""){
		
		//CONVERSI DATE TRANSFER
		$tgltrf = explode("/",$_POST['tgl_transfer']);
		$tgl_trf = $tgltrf[2]."-".$tgltrf[0]."-".$tgltrf[1];
		
		if (isset($_FILES['upload']['type']) ) {
		   //echo $_FILES['upload']['tmp_name'];
		   //echo $_FILES['upload']['type'];
		   $nama_file 	= $_FILES['upload']['name'];
		   $ukuran_file =  $_FILES['upload']['size'];
		   
		   $uploaddir	= '../images/attachment/';
		   $dirfile		= $uploaddir.$nama_file;
		   move_uploaded_file($_FILES['upload']['tmp_name'],$dirfile);
		   
		}
		
		
		$id = (int)$_POST['book_id'];
		$qrycheckbook 	= $conn->query("SELECT book_id FROM guest_book_detail WHERE book_id = '".$id."'");
		$qrycheckbook 	= $qrycheckbook->fetch(PDO::FETCH_ASSOC);
		
		if ($qrycheckbook['book_id'] == ""){
		
		$jml_trf = str_replace(".","",$_POST['jml_transfer']);
		//echo $jml_trf;
		
		$qryconfirm 		= "INSERT INTO guest_book_detail SET 
									book_id 			= ?, 
									bank_tujuan			= ?, 
									asal_bank			= ?, 
									atas_nama			= ?, 
									tgl_transfer		= ?, 
									jml_transfer		= ?, 
									upload				= ?,
									date_input			= ?";
										
		$stmtconfirm = $conn->prepare($qryconfirm);
		$stmtconfirm->bindParam(1, $_POST['book_id']);
		$stmtconfirm->bindParam(2, $_POST['bank_tujuan']);
		$stmtconfirm->bindParam(3, $_POST['asal_bank']);
		$stmtconfirm->bindParam(4, $_POST['atas_nama']);
		$stmtconfirm->bindParam(5, $tgl_trf);
		$stmtconfirm->bindParam(6, $jml_trf);
		$stmtconfirm->bindParam(7, $nama_file);
		$stmtconfirm->bindParam(8, $today);
		$stmtconfirm->execute();
		
		$qryPostMail 	= $conn->query("SELECT * FROM guest_book WHERE book_id = '".$id."'");
		$qryPostMail 	= $qryPostMail->fetch(PDO::FETCH_ASSOC);
		
		$qryPostPay 	= $conn->query("SELECT * FROM guest_book_detail WHERE book_id = '".$id."'");
		$qryPostPay 	= $qryPostPay->fetch(PDO::FETCH_ASSOC);
		
		if($qryPostPay['bank_tujuan'] == 'BCA'){
			$namaBank = 'BCA (777.054.0300)';
		}else{
			$namaBank = 'Mandiri (132.001.099.7022)';
		}
		
		$form = '
				<p>Baru Saja Di lakukan pembayaran untuk:</p>
				<p>Id Pemesanan: '.$qryPostMail['very_code'].'</p>
				<p>Nama Tamu: '.$qryPostMail['name'].'</p>
				<p>Email Tamu: '.$qryPostMail['email'].'</p>
				<p><b>Detail Pembayaran</b></p>
				<p>Bank Tujuan : '.$namaBank.'</p>
				<p>Asal Bank : '.$qryPostPay['asal_bank'].'</p>
				<p>Atas Nama : '.$qryPostPay['atas_nama'].'</p>
				<p>Tgl Transfer : '.fullDateDay($qryPostPay['tgl_transfer']).'</p>
				<p>Jumlah Transfer : Rp. '.number_format($qryPostPay['jml_transfer'],2,",",".").'</p>';
				
				//echo $form;
	
	// SEND MAIL TO OPERATOR
			
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
			$mail->addAddress('opt@walanja.co.id', 'Operator Walanja');
			
			$mail->WordWrap = 50;
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PEMBAYARAN';
			$mail->msgHTML($form);
			$mail->send();
		}		
				echo "<script>var r = confirm('Terima Kasih, Konfirmasi Pembayaran Telah Berhasil. untuk melihat rinciaan pembayaran bisa di lihat di menu riwayat & pembayaran, lalu klik id pemesanan yang baru saja anda konfirmasikan.');if(r == true){window.location = '../index.php?menu=veri';} else {window.location = '../index.php?menu=veri';}</script>";
		
		}else{
				echo "<script>alert('Silahkan Lengkapi Kolom inputan!!!');window.location = '../index.php?menu=veri';</script>";
		}
?>