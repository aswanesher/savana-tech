	
	<script src="booking/js/curency/jquery.inputmask.js" type="text/javascript"></script>
	<script src="booking/js/curency/jquery.inputmask.extensions.js" type="text/javascript"></script>
	<script src="booking/js/curency/jquery.inputmask.numeric.extensions.js" type="text/javascript"></script>
	
	<!-- Picker -->	
	<link rel="stylesheet" href="assets/css/jquery-ui.css" />	
	
	
	<!-- Picker -->	
	<script src="assets/js/jquery-ui.js"></script>	

    <!-- Picker -->	
    <script src="assets/js/jquery.easing.js"></script>	
	
	<script type="text/javascript">
		//------------------------------
		//Picker
		//------------------------------
		var dateToday = new Date(); 
		$(function() {
			$( "#tglBayar" ).datepicker({
				showButtonPanel: true,
				minDate: dateToday
			});
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
	require ('../config/hotel.conn.php');
	require_once ('../library/function.number.php');
	require_once ('../library/function.convert.date.php');
	require_once ('../library/function.cracked.php');
	$code 	= $_GET['code'];
	if(isset($code) && $code != ''){
		$QryCheckProf 	= $conn->query("SELECT a.book_id,a.hotel_id,a.very_code,a.meja_nomor,a.total_stlh_disc,a.guest_book_wisata_detail_kode,a.xcode_voc,a.hotel_id,a.meja_nomor_pesanan,a.kategory_item,a.book_kode,b.book_detail_id FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id WHERE a.very_code = '".$code."'");
		$strDataProf 	= $QryCheckProf->fetch(PDO::FETCH_ASSOC);
		
		$qrycek 	= $conn->query("SELECT voc_nilai FROM m_voucher WHERE voc_code_encrypt = '".$strDataProf['xcode_voc']."'");
		$datavoc	= $qrycek->fetch(PDO::FETCH_ASSOC);
?>

		<?PHP
			if(($strDataProf['kategory_item'] == 25437860 && $strDataProf['book_detail_id'] == '' && $strDataProf['very_code'] != '') 
			OR ($strDataProf['kategory_item'] == 25437859 && $strDataProf['book_detail_id'] == '' && $strDataProf['very_code'] != '')
			OR ($strDataProf['kategory_item'] == 25437857 && $strDataProf['book_detail_id'] == '' && $strDataProf['very_code'] != '')
			OR ($strDataProf['kategory_item'] == 25437858 && $strDataProf['book_detail_id'] == '' && $strDataProf['very_code'] != '')){
		?>
		<div class="col-md-9 offset-0" style="width: 36%;">
		Silahkan Konfirmasikan Pembayaran Anda Disini.
		<form action="pay/confirm.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
			
		<table>
		
			<tr>
				<td>
					<span class="ftitleblack">Bank Tujuan</span>
					<SELECT name="bank_tujuan" class="form-control">
						<option value="BCA">BCA (777.054.0300)</option>
						<option value="MAN">Mandiri (132.001.099.7022)</option>
					</SELECT>
				</td>						
			</tr>
			<tr>
				<td>
					<span class="ftitleblack">Melalui Bank</span>
						<input type="text" name="asal_bank" class="form-control"/>
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
					<input type="text" name="tgl_transfer" id="tglBayar" class="form-control mySelectCalendar" placeholder="mm/dd/yyyy"/>
				</td>
			</tr>
			<tr>
				<td>
					<span class="ftitleblack">Jumlah Transfer</span>
					<input id="curency" name="jml_transfer" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" style="text-align: right;" class="form-control">
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
					<input type="hidden" name="book_id" value="<?PHP echo $strDataProf['book_id']?>"/>
					<button class="form-control" style="background-color: #FF9600;color: white;">S E L E S A I</button>
				</td>
			</tr>
			</table>
			</td>
			<td>
				<table>
					<tr>
						<td width=50px>&nbsp;</td>					
					</tr>
				</table>
				
			</td>
			</tr>
		</table>
		</form>
		</div>
		
		<?PHP
			switch ($strDataProf['kategory_item']) {
			case 25437860: require_once('load_rincian_kuliner.php'); break;
			case 25437859: require_once('load_rincian_obyek.php'); break;
			case 25437857: require_once('load_rincian_hotel.php'); break;
			case 25437858: require_once('load_rincian_rental.php'); break;
			default:
			}
		?>
		
		<?PHP
		}else if(($strDataProf['kategory_item'] == 25437860 && $strDataProf['book_detail_id'] != '') 
			  OR ($strDataProf['kategory_item'] == 25437859 && $strDataProf['book_detail_id'] != '')
			  OR ($strDataProf['kategory_item'] == 25437857 && $strDataProf['book_detail_id'] != '')
			  OR ($strDataProf['kategory_item'] == 25437858 && $strDataProf['book_detail_id'] != '')){
			$qrycekpem		 	= $conn->query("SELECT a.book_kode_encrypt,a.book_kode,a.`name`,b.tgl_transfer,b.bank_tujuan,b.asal_bank,b.atas_nama,b.date_input,b.jml_transfer FROM guest_book a INNER JOIN guest_book_detail b ON a.book_id = b.book_id WHERE a.very_code = '".$code."'");
			$qrycekpembayaran	= $qrycekpem->fetch(PDO::FETCH_ASSOC);
			
			if($qrycekpembayaran['bank_tujuan'] == 'MAN'){
				$namaBank = 'Mandiri (132.001.099.7022)';
			}else if($qrycekpembayaran['bank_tujuan'] == 'BCA'){
				$namaBank = 'BCA (777.054.0300)';
			}
			
			$tglKonfirm		= convertDate($qrycekpembayaran['date_input']);
			$hariKonfirm	= dayChoice($qrycekpembayaran['date_input']);
			
			$tglTrf		= convertDate($qrycekpembayaran['tgl_transfer']);
			$hariTrf	= dayChoice($qrycekpembayaran['tgl_transfer']);
		?>
							<p style="color: #8bc0ec;font-size: 22px">Hello <?PHP echo $qrycekpembayaran['name']?>,</p>
							<p>Terima kasih atas konfirmasi pembayaran Anda.<br>Setelah verifikasi pembayaran dilakukan, kami akan segera memproses permintaan Anda.<br><i>Thank you for your payment confirmation.</i><br><i>Your request will be processed once the payment verification is done by us.</i><br><br>Berikut adalah detail konfirmasi pembayaran Anda:<br><i>Here is your payment confirmation details: </i></p>
							<table width="100%">
								<tr>
									<td width="40%" class="ftitleblack">Nomor Pemesanan (<i>Number Of Booking</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $qrycekpembayaran['book_kode']?></td>
								</tr>
								<tr>
									<td class="ftitleblack">Nama (<i>Name</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $qrycekpembayaran['name']?></td>
								</tr>
								<tr>
									<td width="20%" class="ftitleblack">Tgl Konfirmasi (<i>Confirm Date</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $hariKonfirm?>, <?PHP echo $tglKonfirm?></td>
								</tr>
								<tr>
									<td class="ftitleblack">Bank Tujuan (<i>Bank Destination</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $namaBank?></td>
								</tr>
								<tr>
									<td class="ftitleblack">Melalui Bank (<i>From Bank</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $qrycekpembayaran['asal_bank']?></td>
								</tr>
								<tr>
									<td class="ftitleblack">Atas Nama (<i>Name Of</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $qrycekpembayaran['atas_nama']?></td>
								</tr>
								<tr>
									<td class="ftitleblack">Tgl Transfer (<i>Transfer Date</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $hariTrf?>, <?PHP echo $tglTrf?></td>
								</tr>
								<tr>
									<td class="ftitleblack">Jml Transfer (<i>Amount Transfer</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack">Rp. <?PHP echo number_format($qrycekpembayaran['jml_transfer'],2,",",".")?></td>
								</tr>
								<tr>
									<td colspan="3" class="ftitleblack" align="center">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3"><p>- Untuk informasi dan persyaratan sehubungan dengan pemesanan Anda, mohon hubungi customer service kami di sales@walanja.co.id atau 022 - 9291 4001 (Senin - Jum'at, 08.30 - 17.00 WIB)</p>
									<p><i>- For any queries, please contact us at sales@walanja or 022 - 9291 4001 (Monday - Friday, 08.30 - 17.00 WIB) </i></p>
									</td>
								</tr>
								<tr>
									<td colspan="3"><p>- Silahkan Unduh Bukti Pemesanan anda di menu <a href="javascript:;" data-toggle="tab" data-target="#download" onclick="mySelectUpdate()"><b>Unduh Bukti</b></a>. apabila bukti pemesanan belum dapat di unduh silahkan tunggu beberapa saat lagi, karna operator kami sedang memproses permintaan anda, cek kembali email anda untuk mendapatkan email konfirmasi dari kami.
									
									</p>
									<p>- <i>Please Overview Download The evidence your reservation at the menu <a href="javascript:;" data-toggle="tab" data-target="#download" onclick="mySelectUpdate()"><b>Unduh Bukti</b></a>. if proof can not be downloaded reservations please wait a while longer, because our operators are processing your request, check your email again to get a confirmation email from us.
									</i></p>
									</td>
								</tr>
							</table>
		<?PHP
		}else if($strDataProf['very_code'] == ''){
		?>
			<table width="100%">
				<tr>
					<td align="center">ID Pemesanan Tidak Terdaftar..!!!</td>
				</tr>
			</table>
		<?PHP
		}
		?>
<?PHP
	}else{
?>
		<table width="100%">
			<tr>
				<td align="center">Silahkan Masukan ID Pemesanan Anda..!!!</td>
			</tr>
		</table>
<?PHP
	}
?>