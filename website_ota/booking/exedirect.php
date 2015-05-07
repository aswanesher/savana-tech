<?PHP
	
	require ('../config/hotel.conn.php');
	require ('../library/function.convert.date.php');
	require ('../library/function.mail.php');
	require ('../plugins/phpmailermaster/PHPMailerAutoload.php');
	$_GET['act'] = 'exedirect';
	
	if(isset($_GET['act']) && $_GET['act'] == 'exedirect'){
		$qryguestbook 	= "SELECT a.book_id,a.kategory_item,a.flag_batal,a.`name`,a.book_kode,DATE(a.date_input) tgl_pesan,a.gender,a.phone,a.email,a.location,d.hotel_nama,a.check_in,a.check_out,a.pax,b.book_detail_id,TIMESTAMPDIFF(MINUTE,a.date_input,NOW()) AS durasi, a.flag_confirm,a.date_input,NOW() AS sekarang FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id INNER JOIN m_hotel d ON a.hotel_id = d.hotel_id WHERE a.flag_batal = 0 AND a.flag_confirm = 0 AND a.book_kode != ''";
		$stmtguestbook 	= $conn->prepare( $qryguestbook );
		$stmtguestbook->execute();
		while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
		extract($rowguestbook);
		
		if($kategory_item == 25437857){
			$pesanName = 'Hotel';
		}else if($kategory_item == 25437858){
			$pesanName = 'Mobil';
		}else if($kategory_item == 25437859){
			$pesanName = 'Tiket Wisata';
		}else if($kategory_item == 25437860){
			$pesanName = 'Restoran';
		}
		
	if($durasi > 60 && $book_id != '' && $book_detail_id == ''){
				
		$form = "
			<table width='100%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'><h3>Dear, ".$name."</h3></td>
					<td width='2%'>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td colspan='3'>Dengan Ini walanja.co.id memberitahukan bahwa pemesanan dengan :</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td colspan='3'><i>With walanja.co.id This inform that reservation :</i></td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td>No Pemesanan (<i>Booking Number</i>)</td>
					<td width='2%' align='center'>:</td>
					<td>".$book_kode."</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td>Tanggal Pemesanan (<i>Booking Of Date</i>)</td>
					<td width='2%' align='center'>:</td>
					<td>".fullDateDay($tgl_pesan)."</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td>&nbsp;</td>
					<td width='2%'>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<table width='100%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'><b>Identitas Tamu (<i>guest identity</i>)</b></td>
					<td width='17%'></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
					<td width='15%'>Nama Tamu (<i>Guests Name</i>)</td>
					<td width='2%' align='center'>:</td>
					<td>".$name."</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
					<td width='15%'>Jenis Kelamin (<i>Gender</i>)</td>
					<td width='2%' align='center'>:</td>
					<td>".$gender."</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
					<td width='15%'>Lokasi (<i>Location</i>)</td>
					<td width='2%' align='center'>:</td>
					<td>".$location."</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
					<td width='15%'>No Tlp (<i>Phone Number</i>)</td>
					<td width='2%' align='center'>:</td>
					<td>".$phone."</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
					<td width='15%'>Email (<i>Email</i>)</td>
					<td width='2%' align='center'>:</td>
					<td>".$email."</td>
				</tr>
			</table>
			<table width='50%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='1%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>Permintaan tidak dapat kami proses dikarenakan batas waktu konfirmasi untuk transfer pembayaran telah habis, terimakasih telah mengunjungi walanja.co.id, kunjungi terus walanja.co.id dan nantikan promo menariknya</td>
				</tr>
			</table>
			<table width='50%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='1%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'><i>Request can not be processed because confirm payment for transfer deadline has expired, thank you for visiting walanja.co.id, visit continues walanja.co.id and pull it waiting for promotion</i></td>
				</tr>
			</table>
			<table width='50%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='1%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>untuk informasi lebih lanjut silahkan hubungi Customer Service kami di email : sales@walanja.co.id atau telepon 022-9291-4001</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'>atau anda bisa login <a href='http://walanja.co.id/index.php?menu=login'>disini</a> untuk melihat status pemesanan.</td>
				</tr>
			</table>
			<table width='50%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='1%'>&nbsp;</td>
					<td width='20%'>&nbsp;</td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'><i>for more information please call our Customer Service at, email: sales@walanja.co.id or phone 022-9291-4001</i></td>
				</tr>
				<tr>
					<td width='2%'>&nbsp;</td>
					<td width='20%'><i>or you can log in <a href='http://walanja.co.id/index.php?menu=login'>here</a> to see your order status.</i></td>
				</tr>
			</table>
			";
			
			// SEND MAIL TO GUEST
			
			$mail = new PHPMailer;

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = confMailServer($conn, 'mail_outgoing_server'); // Specify main and backup SMTP servers
			$mail->Port = 25; 
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = confMailServer($conn, 'mail_username');
			$mail->Password = confMailServer($conn, 'mail_password');			
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

			$mail->From = confMailServer($conn, 'mail_username');
			$mail->FromName = confMailServer($conn, 'mail_from');
			$mail->addAddress($email, $name);     				  // Add a recipient
			$mail->addBcc('opt@walanja.co.id', 'Operator Walanja');     				  // Add a recipient

			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'KONFIRMASI PEMBATALAN PEMESANAN '.$pesanName.'';
			$mail->Body    = $form;
			$mail->send();
			
			$qryremove	= "UPDATE `guest_book` SET `flag_batal`='1' WHERE `book_id`='".$book_id."'";
			$stmtremove = $conn->prepare($qryremove);
			$stmtremove->execute();
				echo '1';
			}else{
				echo '0';
			}
		}
	}
	
	
?>