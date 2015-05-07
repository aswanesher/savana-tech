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
	if ($code != '' && $databook['book_kode'] != ''){
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
	}else{
		echo '
		<table class="table table-bordered  mt-8" width="100%">
				<tr id="notid">
					<td align="center">ID Tidak Terdaftar!</td>
				</tr>
		</table>
		';
	}
?>