<?PHP
	require("../config/hotel.conn.php");
	require("../plugins/mpdf/mpdf.php");
	require("../library/function.convert.date.php");
	require('../library/function.group.agent.php');
	require("../library/function.mail.php");
	require("../plugins/phpmailermaster/PHPMailerAutoload.php");
	
	$id = ($_POST['id']==''?$_GET['id']:$_POST['id']);
	//$spec = 1;
	
	if(isset($id) && $id != ''){
			$qrycekguest 	= $conn->query("SELECT a.*,b.hotel_nama,b.rent_merk, c.kar_email,c.kar_id,c.total_deposit,c.komisi FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id INNER JOIN mst_karyawan c ON b.kar_id = c.kar_id WHERE a.book_id= '".$id."' AND a.flag_batal = 0");
			$qrycekguest	= $qrycekguest->fetch(PDO::FETCH_ASSOC);
			
			$qrycek 		= $conn->query("SELECT voc_nilai FROM m_voucher WHERE voc_code_encrypt = '".$qrycekguest['xcode_voc']."'");
			$datavoc		= $qrycek->fetch(PDO::FETCH_ASSOC);
			
			$qrycekpembayaran	= $conn->query("SELECT * FROM guest_book_detail WHERE book_id = '".$qrycekguest['book_id']."'");
			$dataPembayaran		= $qrycekpembayaran->fetch(PDO::FETCH_ASSOC);
			
			$qrycekRoom		= $conn->query("SELECT * FROM m_room WHERE room_id = '".$qrycekguest['room_id']."'");
			$dataRoom		= $qrycekRoom->fetch(PDO::FETCH_ASSOC);
			
						
			//UPDATE GUEST RESERVATION
			$qryupdate = "UPDATE guest_book set flag_batal = '2' WHERE book_id = '".$id."'";
			$stmt_update = $conn->prepare($qryupdate);
			$stmt_update->execute();
			
		
		
			$form = '
				<h3>Dear, '.$qrycekguest['name'].'</h3><br>
				Berikut akan di informasikan bahwa pemesanan anda dengan rincian sebagai berikut :<br>
				Nomor Pemesanan : '.$qrycekguest['very_code'].'<br>
				Tanggal Pemesanan : '.fullDateDay($qrycekguest['date_input']).'<br>
				
				Permintaan tidak dapat kami setujui dikarenakan ada kesalahan pada tahap pemesanan yang anda lakukan. 
				Mohon untuk melakukan pemesanan kembali dengan prosedur yang benar sesuai ketentuan dari pihak kami . atau bisa kunjungi menu Cara Pemesanan di website walanja.co.id untuk tahap - tahap pemesanan.<br>
				Info lebih lanjut hubungi  <br>
				<b>Customer support<b>  <br> 
				022-9291-4001 <br> 
				sales@walanja.co.id <br><br>
				
				Terimakasih sudah memesan melalui walanja.co.id, nantikan promo menarik dari kami.
			';
		//echo $form;
		
		
		//SEND MAIL TO AGENT
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = confMailServer($conn, 'mail_outgoing_server');
			$mail->Port = 25; 
			$mail->SMTPAuth = true;
			$mail->Username = confMailServer($conn, 'mail_username');
			$mail->Password = confMailServer($conn, 'mail_password');
			$mail->SMTPSecure = 'tls';

			$mail->From = confMailServer($conn, 'mail_username');
			$mail->FromName = 'KONFIRMASI PEMBATALAN PEMESANAN walanja.co.id';
			$mail->addAddress($qrycekguest['email'], $qrycekguest['name']);
			$mail->addBcc("opt@walanja.co.id","Operator Walanja");
			
			$mail->WordWrap = 50;
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PEMBATALAN PEMESANAN';
			$mail->Body    = $form;
			$mail->send(); 
			
	}
	
			header ("location: index.php?modul=opwlnj");

?>