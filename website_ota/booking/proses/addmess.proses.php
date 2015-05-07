<?PHP
	require ('../../config/hotel.conn.php');
	require ('../../plugins/phpmailermaster/PHPMailerAutoload.php');
	// SEND MAIL TO GUEST
		
		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.cifo.co.id';      				  // Specify main and backup SMTP servers
		$mail->Port = 25; 
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'iqbal@cifo.co.id';                 // SMTP username
		$mail->Password = 'bandung2014';                  // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

		$mail->From = 'iqbal@cifo.co.id';
		$mail->FromName = 'Email Konfirmasi CMedia';
		$mail->addAddress($_POST['email'], $_POST['name']);     // Add a recipient

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $_POST['title'];
		$mail->Body    = $_POST['content'];
		//$mail->msgHTML($form);

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		
		header ("location: ../index.php?modul=op");	
	
?>