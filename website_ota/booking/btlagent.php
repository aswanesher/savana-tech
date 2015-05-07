<?PHP
	require("../config/hotel.conn.php");
	require("../plugins/mpdf/mpdf.php");
	require("../library/function.convert.date.php");
	require('../library/function.group.agent.php');
	require("../library/function.mail.php");
	require("../plugins/phpmailermaster/PHPMailerAutoload.php");
	
	$spec = $_POST['spec'];
	//$spec = 1;
	
	if(isset($spec) && $spec != ''){
			$QryCekPesanan 	= $conn->query("SELECT a.*,b.kar_nama,b.kar_alamat,b.kar_kode,b.kar_email,b.total_deposit FROM trs_kebutuhan a INNER JOIN mst_karyawan b ON a.kar_id = b.kar_id WHERE a.rinci_id = '".$spec."' LIMIT 0,1");
			$QryCekPesanan	= $QryCekPesanan->fetch(PDO::FETCH_ASSOC);
		
			$agentDiscVoc 	= $conn->query("SELECT b.voc_nilai FROM trs_kebutuhan a LEFT JOIN m_voucher b ON a.voc_code = b.voc_code WHERE rinci_id = '".$spec."' LIMIT 0,1");
			$agentDiscVoc	= $agentDiscVoc->fetch(PDO::FETCH_ASSOC);
		
			$updateTotalDeposit = $QryCekPesanan['total_deposit'] + $QryCekPesanan['total_pesanan'] + $agentDiscVoc['voc_nilai'];
			
			//UPDATE DEPOSITE
			/*$qryupdate = "UPDATE mst_karyawan set total_deposit = '".$updateTotalDeposit."' WHERE kar_id = '".$QryCekPesanan['kar_id']."'";
			$stmt_update = $conn->prepare($qryupdate);
			$stmt_update->execute();*/
			
			//UPDATE GUEST RESERVATION
			$qryupdate = "UPDATE trs_kebutuhan set status_cetak = '2' WHERE rinci_id = '".$spec."'";
			$stmt_update = $conn->prepare($qryupdate);
			$stmt_update->execute();
			
		
			$form = '
				<h3>Dear, '.$QryCekPesanan['kar_nama'].'</h3><br>
				Berikut akan di informasikan bahwa pemesanan anda dengan rincian sebagai berikut :<br>
				Nomor Pemesanan : '.$QryCekPesanan['rinci_nomor'].'<br>
				Tanggal Pemesanan : '.fullDateDay($QryCekPesanan['rinci_tanggal']).'<br>
				Permintaan Tidak dapat kami setujui di karenakan pesanan saat ini tidak tersedia, Mohon maaf untuk ke tidak nyamanannya. untuk nilai deposite akan kami kembalikan nominalnya sebesar <b>Rp. '.number_format($QryCekPesanan['total_pesanan'],2,",",".").'</b>, sesuai dengan nilai total pemesanan. Terimakasih sudah memesan melalui agent.walanja.co.id, nantikan promo menarik dari kami. kunjungi juga website booking resmi walanja.co.id. booking system terpercaya no 1 di bandung.
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
			$mail->FromName = 'Agent System';
			$mail->addAddress($QryCekPesanan['kar_email'], $QryCekPesanan['kar_nama']);
			
			$mail->WordWrap = 50;
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PEMBATALAN PEMESANAN';
			$mail->Body    = $form;
			$mail->send();
			
	}
	
?>