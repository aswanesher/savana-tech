<?PHP
	require("../config/hotel.conn.php");
	require("../plugins/mpdf/mpdf.php");
	require("../library/function.convert.date.php");
	require("../library/function.mail.php");
	require("../plugins/phpmailermaster/PHPMailerAutoload.php");
	
	$code = $_POST['code'];
	//$code = "20150129RSVCM0000";
	//$qrycekguest 	= $conn->query("SELECT a.*,b.hotel_nama,b.hotel_email,b.rent_merk FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.book_kode = '".$code."' AND a.flag_batal = 0");
	$qrycekguest 	= $conn->query("SELECT a.*,b.hotel_nama,b.rent_merk, c.kar_email,c.kar_id,c.total_deposit,c.komisi FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id INNER JOIN mst_karyawan c ON b.kar_id = c.kar_id WHERE a.book_kode = '".$code."' AND a.flag_batal = 0");
	$qrycekguest	= $qrycekguest->fetch(PDO::FETCH_ASSOC);
	
	$qrycek 		= $conn->query("SELECT voc_nilai FROM m_voucher WHERE voc_code_encrypt = '".$qrycekguest['xcode_voc']."'");
	$datavoc		= $qrycek->fetch(PDO::FETCH_ASSOC);
	
	$qrycekpembayaran	= $conn->query("SELECT * FROM guest_book_detail WHERE book_id = '".$qrycekguest['book_id']."'");
	$dataPembayaran		= $qrycekpembayaran->fetch(PDO::FETCH_ASSOC);
	
	$qrycekRoom		= $conn->query("SELECT * FROM m_room WHERE room_id = '".$qrycekguest['room_id']."'");
	$dataRoom		= $qrycekRoom->fetch(PDO::FETCH_ASSOC);
	
	if($dataPembayaran['bank_tujuan'] == 'BCA'){
		$namaBank = 'BCA (777.054.0300)';
	}else{
		$namaBank = 'Mandiri (132.001.099.7022)';
	}
	
	if($qrycekguest['flag_supir'] == 1){
		$permintaanRent = 'Include Supir';
	}else{
		$permintaanRent = '';
	}
	
	$totKomisi=0;
	if($qrycekguest['komisi']>0){
	$totBack = $qrycekguest['total_stlh_disc'] + $datavoc['voc_nilai'];
	
	
	$komisi = $qrycekguest['komisi']/100 *  $totBack;
	$totKomisi = $totBack - $komisi;
		$tot=$qrycekguest['total_deposit']-$totKomisi;
	 
	}	
	$dayHarga = 0;
	$harga='';
	$dtharga = 0;
	
	 $tgl1 = explode("-",$qrycekguest['check_in']);
	$tglIn = $tgl1[0]."-".$tgl1[1]."-".$tgl1[2];	 
	
	
	  $q = $conn->query("SELECT * FROM kalender_harga WHERE cal_bulan = '".$tgl1[1]."' and cal_tahun= '".$tgl1[0]."'  and room_id=".$qrycekguest['room_id']."");
	
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
		if($a == $tgl1[2]){
			$dayHarga = $harga[$a-1];
		}
	}
	
	
	$in		= date_create($qrycekguest['check_in']);
	$out	= date_create($qrycekguest['check_out']);
	$tot_day= date_diff($in,$out);
	
	$totalDep= $dayHarga * $qrycekguest['noroom'] * $tot_day->format("%a") ;	
	
	$tot=$qrycekguest['total_deposit']-$totalDep;
	
		
	$qhotel= "UPDATE mst_karyawan set total_deposit = '".$tot."' where kar_id = '".$qrycekguest['kar_id']."'";
    $upadate_deposit = $conn->prepare($qhotel);
    $upadate_deposit->execute();
	
	$check_in = date("M,d Y", strtotime($qrycekguest['check_in']));
	$check_out = date("M,d Y", strtotime($qrycekguest['check_out']));
	
	$newtext    = wordwrap($qrycekguest['hotel_address'], 20, "<br />\n");
	$in			= date_create($qrycekguest['check_in']);
	$out		= date_create($qrycekguest['check_out']);
	$tot_day	= date_diff($in,$out);
	
		function acak($panjang)
		{
			$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$string = '';
			for ($i = 0; $i < $panjang; $i++) {
				$pos = rand(0, strlen($karakter)-1);
				$string .= $karakter{$pos};
			}
			return $string;
		}
		$autoname = acak(5);
	if($qrycekguest['kategory_item'] == 25437860){
		require_once('cetak_pdf_resto.php');
	}else if($qrycekguest['kategory_item'] == 25437859){
		require_once('cetak_pdf_wisata.php');
	}else if($qrycekguest['kategory_item'] == 25437858){
		require_once('cetak_pdf_rent.php');
	}else if($qrycekguest['kategory_item'] == 25437857){
		require_once('cetak_pdf_hotel.php');
	}
	
	
	$mpdf=new mPDF('c','A4','','',10,10,10,25,16,13); 
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->list_indent_first_level = 0; 
	$stylesheet = file_get_contents('stylepdf.css');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output('doc/Confirmation-ID-'.$code.'-'.$autoname.'.pdf');
	
	//UPDATE GUEST RESERVATION
	$qryupdate = "UPDATE guest_book set flag_confirm = '1', pdf_name = 'Confirmation-ID-".$code."-".$autoname.".pdf' where book_kode = '".$code."'";
    $stmt_update = $conn->prepare($qryupdate);
    $stmt_update->execute();
	
	//SEND MAIL ACC
	
	
				
			$qryConfirmAcc	= $conn->query("SELECT * FROM guest_book WHERE book_kode = '".$code."' ");
			$dataConfirmAcc	= $qryConfirmAcc->fetch(PDO::FETCH_ASSOC);
			
			if($dataConfirmAcc['kategory_item'] == 25437860){
				$kategoryNama = 'Restoran';
			}else if($dataConfirmAcc['kategory_item'] == 25437859){
				$kategoryNama = 'Tiket Wisata';
			}else if($dataConfirmAcc['kategory_item'] == 25437858){
				$kategoryNama = 'Mobil';
			}else if($dataConfirmAcc['kategory_item'] == 25437857){
				$kategoryNama = 'Kamar';
			}
			
			$form = '
				<p><h4>Dear, '.$dataConfirmAcc['name'].'</h4></p>
				<p>Pemesana '.$kategoryNama.' Anda telah kami setujui, terlampir bukti pemesanan (Attachment) sebagai bukti pemesanan yang harus anda tunjukan pada saat akan melakukan reservasi.</p><br>
				<p>Terimakasih Telah mengunjungi web booking walanja.co.id, kunjungi terus web booking resmi walanja.co.id, situs web booking terpercaya no 1 di bandung dan nantikan promo-promo menariknya dari kami.</p><br>
				<p style="color: orange">walanja.co.id</p>
				';
			
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
			$mail->addAddress($dataConfirmAcc['email'], $dataConfirmAcc['name']);
			$mail->AddCC(confMailServer($conn, 'mail_cc'), confMailServer($conn, 'mail_group'));
			
			$mail->WordWrap = 50;
			$mail->AddAttachment( 'doc/'.$dataConfirmAcc['pdf_name'] , $dataConfirmAcc['pdf_name'] );
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PERSETUJUAN PEMESANAN '.$kategoryNama.'';
			$mail->msgHTML($form);
			$mail->send();
			
			
			//MAIL TO HOTEL
			
			$formHotel = '
				<p><h4>Yth, '.$qrycekguest['hotel_nama'].'</h4></p>
				<p>Telah dilakukan pemesanan melalui web booking <b>walanja.co.id</b> dengan rincian yg terlampir (Attachment)</p>
				<p>di mohon untuk mengkonfirmasikan Pesediaan '.$kategoryNama.' kepada kami di 022-9291-4001 atau '.confMailServer($conn, 'mail_cc').'</p><br>
				<p>Terimakasih!</p>
				<p style="color: orange">Walanja.co.id</p>
			';
			
			$mailToHotel = new PHPMailer;
			$mailToHotel->isSMTP();
			$mailToHotel->Host = confMailServer($conn, 'mail_outgoing_server');
			$mailToHotel->Port = 25; 
			$mailToHotel->SMTPAuth = true;
			$mailToHotel->Username = confMailServer($conn, 'mail_username');
			$mailToHotel->Password = confMailServer($conn, 'mail_password');
			$mailToHotel->SMTPSecure = 'tls';

			$mailToHotel->From = confMailServer($conn, 'mail_username');
			$mailToHotel->FromName = confMailServer($conn, 'mail_from');
			$mailToHotel->addAddress($qrycekguest['kar_email'], $qrycekguest['hotel_nama']);
			
			$mailToHotel->WordWrap = 50;
			$mailToHotel->AddAttachment( 'doc/'.$dataConfirmAcc['pdf_name'] , $dataConfirmAcc['pdf_name'] );
			$mailToHotel->isHTML(true);

			$mailToHotel->Subject = 'PEMBERITAHUAN PEMESANAN DARI '.confMailServer($conn, 'mail_from').'';
			$mailToHotel->msgHTML($formHotel);
			$mailToHotel->send();
			
			//update persediaan kamar
			$room 		= $dataRoom['room_avaibility'] - $qrycekguest['noroom'];
			$updtroom	= "UPDATE `m_room` SET `room_avaibility`=".$room." WHERE `room_id`= '".$qrycekguest['room_id']."'";
			$updt 		= $conn->prepare($updtroom);
			$updt->execute();
	
?>