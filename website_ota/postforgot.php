<?PHP
	require ('config/hotel.conn.php');
	require ('library/function.mail.php');
	require ('plugins/phpmailermaster/PHPMailerAutoload.php');
	
	if(isset($_POST['email']) && $_POST['email'] != ''){
		
		$qryCekMember 	= $conn->query("SELECT * FROM guest_book WHERE email = '".$_POST['email']."' LIMIT 0,1");
		$qryCekMember 	= $qryCekMember->fetch(PDO::FETCH_ASSOC);
		
		if($qryCekMember['book_id'] == ''){
			echo '1';
		}else{
			
			function acakDepan($panjang)
				{
					$karakter= '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
					$string = '';
					for ($i = 0; $i < $panjang; $i++) {
						$pos = rand(0, strlen($karakter)-1);
						$string .= $karakter{$pos};
					}
					return $string;
				}
			function acakBelakang($panjang)
				{
					$karakter= '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
					$string = '';
					for ($i = 0; $i < $panjang; $i++) {
						$pos = rand(0, strlen($karakter)-1);
						$string .= $karakter{$pos};
					}
					return $string;
				}
				$autonumDepan = acakDepan(4);
				$autonumBelakang = acakBelakang(4);
			
			$form = '
				Dear, '.$qryCekMember['name'].'<br>
				silahkan klik <a href="http://walanja.co.id/index.php?menu=rest&reset='.$autonumDepan.$qryCekMember['book_id'].$autonumBelakang.'" >( disini )</a> untuk pengaturan ulang kata sandi anda.
				<br><br>
				terima kasih,<br>
				<i style="color: orange">walanja.co.id</i>
			';
			
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
			$mail->addAddress($qryCekMember['email'], $qryCekMember['name']);
			
			$mail->WordWrap = 50;
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PENGATURAN ULANG KATA SANDI';
			$mail->msgHTML($form);
			$mail->send();
			
			echo '2';
		}
		
	}else{
		header('location: //walanja.co.id');
	}
?>