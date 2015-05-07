	<!-- Picker -->	
	<link rel="stylesheet" href="assets/css/jquery-ui.css" />	
	
    <!-- jQuery -->		
    <script src="assets/js/jquery.v2.0.3.js"></script>
	
	<!-- Picker -->	
	<script src="assets/js/jquery-ui.js"></script>	

    <!-- Picker -->	
    <script src="assets/js/jquery.easing.js"></script>	
	
	<script src="booking/js/curency/jquery.inputmask.js" type="text/javascript"></script>
	<script src="booking/js/curency/jquery.inputmask.extensions.js" type="text/javascript"></script>
	<script src="booking/js/curency/jquery.inputmask.numeric.extensions.js" type="text/javascript"></script>
	<script type="text/javascript">
		//------------------------------
		//Picker
		//------------------------------
		jQuery(function() {
			jQuery( "#datepicker,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7,#datepicker8" ).datepicker();
		});	
		
		$("#curency").inputmask('decimal',
		  { 'alias': 'numeric',
			'groupSeparator': '.',
			'autoGroup': true,
			'digits': 2,
			'radixPoint': ",",
			'digitsOptional': false,
			'allowMinus': false,
			'prefix': '',
			'placeholder': '0'
		  }
		);
	</script>
<?PHP
	require ('config/hotel.conn.php');
	$code 		= $_GET['code'];
	$ordernew 	= $_GET['ordernew'];
	//CHECK BOOK
		$qrycek 	= $conn->query("SELECT a.book_id,a.hotel_id,a.room_id,a.book_kode,a.book_kode_encrypt,a.check_in,a.check_out,a.pax,a.noroom,a.email,a.`name`,a.gender,a.location,a.phone,a.totprice,a.flag_confirm,a.pdf_name,e.voc_nilai,a.total_stlh_disc,b.book_detail_id,c.hotel_nama,d.room_type,d.room_price FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id INNER JOIN m_hotel c ON a.hotel_id = c.hotel_id INNER JOIN m_room d ON a.room_id = d.room_id LEFT JOIN m_voucher e ON a.xcode_voc = e.voc_code_encrypt WHERE a.very_code = '".$code."' AND a.book_kode_encrypt = '".$ordernew."'");
		$databook	= $qrycek->fetch(PDO::FETCH_ASSOC);
		//TOTAL DAY
		$in		= date_create($databook['check_in']);
		$out	= date_create($databook['check_out']);
		$tot_day= date_diff($in,$out);
	if ($code != '' && $databook['book_kode'] != '' && $databook['book_detail_id'] == ''){
	echo '
	
	
	
		<p class="ftitleblack">Nomor Pemesanan : '.$databook['book_kode'].'</p>
		<form action="confirm.php" method="POST" enctype="multipart/form-data">
		<table class="table table-bordered  mt-8" width="100%">
								<tr>
									<td width="25%">
										<span class="ftitleblack">Bank Tujuan</span>
											<SELECT name="bank_tujuan" class="form-control">
												<option value="BCA">BCA (777.054.0300)</option>
												<option value="MAN">Mandiri (132.001.099.7022)</option>
											</SELECT>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Nama Hotel</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Type Ruangan</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Tgl Check-in</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Tgl Check-out</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Jml Hari</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Harga</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Disc</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Total</span>
									</td>
								</tr>
								<tr>
									<td>
										<span class="ftitleblack">Melalui Bank</span>
										<input type="text" name="asal_bank" class="form-control"/>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$databook['hotel_nama'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$databook['room_type'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$databook['check_in'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$databook['check_out'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$tot_day->format("%a").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($databook['room_price'],2,",",".").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($databook['voc_nilai'],2,",",".").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($databook['total_stlh_disc'],2,",",".").'</span>
									</td>
								</tr>
								<tr>
									<td>
										<span class="ftitleblack">Atas Nama</span>
										<input type="text" name="atas_nama" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td>
										<span class="ftitleblack">Tgl Transfer</span>
										<input type="text" name="tgl_transfer" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/>
									</td>
								</tr>
								<tr>
									<td>
										<span class="ftitleblack">Jumlah Transfer</span>
										<input id="curency" name="jml_transfer" data-inputmask="\'alias\': \'numeric\', \'groupSeparator\': \',\', \'autoGroup\': true, \'digits\': 2, \'digitsOptional\': false, \'prefix\': \'$ \', \'placeholder\': \'0\'" style="text-align: right;" class="form-control">
									</td>
								</tr>
								<tr>
									<td>
										<span class="ftitleblack">Upload Bukti</span>
										<input type="file" name="upload" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td>
										<input type="hidden" name="book_id" value="'.$databook['book_id'].'"/>
										<button class="form-control" style="background-color: #FF9600;color: white;">S E L E S A I</button>
									</td>
								</tr>
							</table>
							</form>
	
	';
	}else if ($databook['book_detail_id'] != ''){
	
						  
								$qrycekpembayaran 	= $conn->query("SELECT a.book_id,a.hotel_id,a.room_id,a.book_kode,a.book_kode_encrypt,a.check_in,a.check_out,a.pax,a.noroom,a.email,a.`name`,a.gender,a.location,a.phone,a.totprice,a.flag_confirm,a.pdf_name,e.voc_nilai,a.total_stlh_disc,b.book_detail_id,c.hotel_nama,d.room_type,d.room_price,b.* FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id INNER JOIN m_hotel c ON a.hotel_id = c.hotel_id INNER JOIN m_room d ON a.room_id = d.room_id LEFT JOIN m_voucher e ON a.xcode_voc = e.voc_code_encrypt WHERE a.book_kode_encrypt = '".$_COOKIE['crv']."'");
								$qrycekpembayaran	= $qrycekpembayaran->fetch(PDO::FETCH_ASSOC);
								if ($qrycekpembayaran['book_detail_id'] != ''){
								$in		= date_create($qrycekpembayaran['check_in']);
								$out	= date_create($qrycekpembayaran['check_out']);
								$tot_day= date_diff($in,$out);
						echo '
								<table class="table table-bordered  mt-8" width="100%">
										<tr id="notid">
											<td align="center">Sudah Dilakukan Pembayaran!</td>
										</tr>
								</table>
								<span class="size16 bold">Detail Pemesanan Terbaru</span><br>
								<span class="size16">(<i>Latest Booking Details</i>)</span><br><br>
								<table class="table table-bordered  mt-8">
								<tr>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Nama Hotel</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Type Ruangan</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Tgl Check-in</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Tgl Check-out</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Jml Hari</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Jumlah</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Harga</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Disc</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Total</span>
									</td>
								</tr>
								<tr>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['hotel_nama'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['room_type'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['check_in'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['check_out'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$tot_day->format("%a").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['noroom'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($qrycekpembayaran['room_price'],2,",",".").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($qrycekpembayaran['voc_nilai'],2,",",".").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($qrycekpembayaran['total_stlh_disc'],2,",",".").'</span>
									</td>
								</tr>
								
							</table>
							<br>
							<p style="color: #8bc0ec;font-size: 22px">Hello '.$qrycekpembayaran['name'].',</p>
							<p>Terima kasih atas konfirmasi pembayaran Anda.<br>Setelah verifikasi pembayaran dilakukan, kami akan segera memproses permintaan Anda.<br><i>Thank you for your payment confirmation.</i><br><i>Your request will be processed once the payment verification is done by us.</i><br><br>Berikut adalah detail konfirmasi pembayaran Anda:<br><i>Here is your payment confirmation details: </i></p>
							<table width="100%">
								<tr>
									<td width="35%" class="ftitleblack">Nomor Pemesanan (<i>Number Of Booking</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['book_kode'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Nama (<i>Name</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['name'].'</td>
								</tr>
								<tr>
									<td width="20%" class="ftitleblack">Tgl Konfirmasi (<i>Confirm Date</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['date_input'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Bank Tujuan (<i>Bank Destination</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['bank_tujuan'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Melalui Bank (<i>From Bank</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['asal_bank'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Atas Nama (<i>Name Of</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['atas_nama'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Tgl Transfer (<i>Transfer Date</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['tgl_transfer'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Jml Transfer (<i>Amount Transfer</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">Rp. '.number_format($qrycekpembayaran['jml_transfer'],2,",",".").'</td>
								</tr>
								<tr>
									<td colspan="3" class="ftitleblack" align="center">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3"><p>- Untuk informasi dan persyaratan sehubungan dengan pemesanan Anda, mohon hubungi customer service kami di sales@walanja.co.id atau 022 - 9291 4001 (Senin - Jumat, 08.30 - 17.00 WIB)</p>
									<p><i>- For any queries, please contact us at sales@walanja or 022 - 9291 4001 (Monday - Friday, 08.30 - 17.00 WIB) </i></p>
									</td>
								</tr>
								<tr>
									<td colspan="3"><p>- Silahkan Unduh Bukti Pemesanan anda 
									<a href="javascript:;" onclick="location.href=\'aprove.php?code='.$qrycekpembayaran['book_kode_encrypt'].'\'" ><b>disini</b></a> apabila bukti pemesanan belum dapat di unduh silahkan tunggu beberapa saat lagi, karna operator kami sedang memproses permintaan anda, cek kembali email anda untuk mendapatkan email konfirmasi dari kami.
									
									</p>
									<p>- <i>please download for proof of your reservation 
									<a href="javascript:;" onclick="location.href=\'aprove.php?code='.$qrycekpembayaran['book_kode_encrypt'].'\'" ><b>here</b></a> if the booking can not be downloaded, please wait for a while longer, because our operators are processing your request, check again your email to receive emails confirmation from us
									</i></p>
									</td>
								</tr>
							</table>';
						  
							}
						  
				echo '
						  </div>
		';
	}else{
		$qrycekpembayaran 	= $conn->query("SELECT a.book_id,a.hotel_id,a.room_id,a.book_kode,a.book_kode_encrypt,a.check_in,a.check_out,a.pax,a.noroom,a.email,a.`name`,a.gender,a.location,a.phone,a.totprice,a.flag_confirm,a.pdf_name,e.voc_nilai,a.total_stlh_disc,b.book_detail_id,c.hotel_nama,d.room_type,d.room_price,b.* FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id INNER JOIN m_hotel c ON a.hotel_id = c.hotel_id INNER JOIN m_room d ON a.room_id = d.room_id LEFT JOIN m_voucher e ON a.xcode_voc = e.voc_code_encrypt WHERE a.book_kode_encrypt = '".$_COOKIE['crv']."'");
								$qrycekpembayaran	= $qrycekpembayaran->fetch(PDO::FETCH_ASSOC);
								if ($qrycekpembayaran['book_detail_id'] != ''){
								$in		= date_create($qrycekpembayaran['check_in']);
								$out	= date_create($qrycekpembayaran['check_out']);
								$tot_day= date_diff($in,$out);
						echo '
								<table class="table table-bordered  mt-8" width="100%">
										<tr id="notid">
											<td align="center">Id Tidak Terdaftar!!!</td>
										</tr>
								</table>
								<span class="size16 bold">Detail Pemesanan Terbaru</span><br>
								<span class="size16">(<i>Latest Booking Details</i>)</span><br><br>
								<table class="table table-bordered  mt-8">
								<tr>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Nama Hotel</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Type Ruangan</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Tgl Check-in</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Tgl Check-out</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Jml Hari</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Jumlah</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Harga</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Disc</span>
									</td>
									<td style="background-color: #FF9600;">
										<span class="ftitleblack" style="font-size: 13px;color: white;">Total</span>
									</td>
								</tr>
								<tr>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['hotel_nama'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['room_type'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['check_in'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['check_out'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$tot_day->format("%a").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">'.$qrycekpembayaran['noroom'].'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($qrycekpembayaran['room_price'],2,",",".").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($qrycekpembayaran['voc_nilai'],2,",",".").'</span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. '.number_format($qrycekpembayaran['total_stlh_disc'],2,",",".").'</span>
									</td>
								</tr>
								
							</table>
							<br>
							<p style="color: #8bc0ec;font-size: 22px">Hello '.$qrycekpembayaran['name'].',</p>
							<p>Terima kasih atas konfirmasi pembayaran Anda.<br>Setelah verifikasi pembayaran dilakukan, kami akan segera memproses permintaan Anda.<br><i>Thank you for your payment confirmation.</i><br><i>Your request will be processed once the payment verification is done by us.</i><br><br>Berikut adalah detail konfirmasi pembayaran Anda:<br><i>Here is your payment confirmation details: </i></p>
							<table width="100%">
								<tr>
									<td width="35%" class="ftitleblack">Nomor Pemesanan (<i>Number Of Booking</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['book_kode'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Nama (<i>Name</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['name'].'</td>
								</tr>
								<tr>
									<td width="20%" class="ftitleblack">Tgl Konfirmasi (<i>Confirm Date</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['date_input'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Bank Tujuan (<i>Bank Destination</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['bank_tujuan'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Melalui Bank (<i>From Bank</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['asal_bank'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Atas Nama (<i>Name Of</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['atas_nama'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Tgl Transfer (<i>Transfer Date</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">'.$qrycekpembayaran['tgl_transfer'].'</td>
								</tr>
								<tr>
									<td class="ftitleblack">Jml Transfer (<i>Amount Transfer</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">Rp. '.number_format($qrycekpembayaran['jml_transfer'],2,",",".").'</td>
								</tr>
								<tr>
									<td colspan="3" class="ftitleblack" align="center">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3"><p>- Untuk informasi dan persyaratan sehubungan dengan pemesanan Anda, mohon hubungi customer service kami di sales@walanja.co.id atau 022 - 9291 4001 (Senin - Jumat, 08.30 - 17.00 WIB)</p>
									<p><i>- For any queries, please contact us at sales@walanja or 022 - 9291 4001 (Monday - Friday, 08.30 - 17.00 WIB) </i></p>
									</td>
								</tr>
								<tr>
									<td colspan="3"><p>- Silahkan Unduh Bukti Pemesanan anda 
									<a href="javascript:;" onclick="location.href=\'aprove.php?code='.$qrycekpembayaran['book_kode_encrypt'].'\'" ><b>disini</b></a> apabila bukti pemesanan belum dapat di unduh silahkan tunggu beberapa saat lagi, karna operator kami sedang memproses permintaan anda, cek kembali email anda untuk mendapatkan email konfirmasi dari kami.
									
									</p>
									<p>- <i>please download for proof of your reservation 
									<a href="javascript:;" onclick="location.href=\'aprove.php?code='.$qrycekpembayaran['book_kode_encrypt'].'\'" ><b>here</b></a> if the booking can not be downloaded, please wait for a while longer, because our operators are processing your request, check again your email to receive emails confirmation from us
									</i></p>
									</td>
								</tr>
							</table>';
						  
							}
						  
				echo '
						  </div>
		';
	}
?>