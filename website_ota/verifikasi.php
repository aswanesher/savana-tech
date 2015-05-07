<?PHP
	require ('config/hotel.conn.php');
	if(empty($_COOKIE['crv'])){
			echo "<script>window.location = 'index.php?menu=login';</script>";
	}
	$qrycheckguest 	= $conn->query("SELECT * FROM guest_book WHERE book_kode_encrypt = '".$_COOKIE['crv']."'");
	$qrycheckguest 	= $qrycheckguest->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CMedia - Online Booking</title>
	
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/custom.css" rel="stylesheet" media="screen">


	<link href="examples/carousel/carousel.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
	<!-- Animo css-->
	<link href="plugins/animo/animate+animo.css" rel="stylesheet" media="screen">
	
	
    <!-- jQuery -->		
    <script src="assets/js/jquery.v2.0.3.js"></script>
	

	
  </head>
  <body id="top" class="thebg" >
    <div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="#"></a>
			<div class="left">
				<ul class="bcrumbs">
					<li>/</li>
					<li><a href="#" class="active">Konfirmasi Pembayaran (<i>Amount Confirmation</i>)</a></li>					
				</ul>				
			</div>
			<a class="backbtn right" href="#"></a>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">

		
		<div class="container mt25 offset-0">
			
			
			<!-- CONTENT -->
			<div class="col-md-12 pagecontainer2 offset-0">
				
				<!-- LEFT MENU -->
				<div class="col-md-2 offset-0">
					<!-- Nav tabs -->
					<ul class="nav profile-tabs">
					  <li class="active">
						<a href="javascript:;" onclick="location.href='checklogout.php'" data-toggle="tab">
						<span class="profile-icon"></span>
						Keluar
						</a>
					   </li>
					</ul>
				</div>
				<!-- LEFT MENU -->
					
				<!-- RIGHT CPNTENT -->
				<div class="col-md-11 offset-0">
					<!-- Tab panes from left menu -->
					<div class="tab-content5">
					
					  <!-- TAB 1 -->
					  <div class="tab-pane padding40 active" id="profile">

						  <!-- Admin top -->
						  <div class="col-md-12 offset-0">
							<table class="table table-bordered  mt-10">
							<tr class="grey opensans">
								<td class="center" colspan="4"><b>Menu Yang Tersedia</b></td>
								<td><span class="ftitleblack">Masukan ID Pemesanan (<i>insert your booking ID</i>)</span></td>
							</tr>
							<tr class="grey opensans">
								<td class="center"><a href="javascript:;" id="infoProf" style="text-decoration: none"><b>Lihat Profil</b></a></td>
								<td class="center"><a href="javascript:;" id="infoHistory" style="text-decoration: none"><b>Lihat History</b></a></td>
								<td class="center"><a href="javascript:;" id="infoCekId" style="text-decoration: none"><b>Lihat ID</b></a></td>
								<td class="center"><a href="javascript:;" id="infoConfirm" style="text-decoration: none"><b>Lihat Status</b></a></td>
								<td width="20px">
									
							
											<div class="relative">
												<form action="#" method="post">
												<input type="text" name="very_code" class="form-control2 fccustom2black" id="exampleInputEmail1" placeholder="Masukan ID disini (insert ID here)">
												<a type="submit" href="javascript:;" class="btn btn-default btncustom">Submit<img src="images/arrow.png" alt=""/></a>
												</form>
											</div>
								
								</td>
							</tr>
							</table>
						  </div>
						  <!-- End of Admin top -->
						<div id="dataConfirm">
							<div id="loadConfirm"></div>
						</div>
						<div id="dataDiri"> 
						<span class="size16 bold">Data Diri Selengkapnya</span><br>
						<span class="size16">(<i>More Personal Data</i>)</span>
						<div class="line2"></div>
						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
							<table class="table table-bordered  mt-10">
								<tr>
									<td>Nama (<i>Name</i>)</td>
									<td>Jenis Kelamin (<i>Gender</i>)</td>
									<td>Lokasi (<i>Location</i>)</td>
									<td>Email (<i>Email</i>)</td>
									<td>No. Tlp (<i>Phone</i>)</td>
									<td>Mulai Bergabung (<i>joined</i>)</td>
								</tr>
								<tr>
									<td><?PHP echo $qrycheckguest['name']?></td>
									<td><?PHP echo $qrycheckguest['gender']?></td>
									<td><?PHP echo $qrycheckguest['location']?></td>
									<td><?PHP echo $qrycheckguest['email']?></td>
									<td><?PHP echo $qrycheckguest['phone']?></td>
									<td><?PHP echo $qrycheckguest['date_input']?></td>
								</tr>
							</table>
						</div>
						</div>
						
						<div id="dataHistory"> 
						<span class="size16 bold">History Pemesanan selama berlangganan di walanja.co.id</span><br>
						<span class="size16">(<i>History Booking during subscription in walanja.co.id</i>)</span>
						<div class="line2"></div>
						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
							<table class="table table-bordered  mt-10">
								<tr>
									<td>#</td>
									<td>Nama Hotel (<i>Hotel Name</i>)</td>
									<td>Type Ruangan (<i>Room Type</i>)</td>
									<td>Tgl Pesan (<i>Booking Date</i>)</td>
									<td>Tgl Check-in (<i>Check-in Date</i>)</td>
									<td>Tgl Check-out (<i>Check-out Date</i>)</td>
									<td>Status (<i>Status</i>)</td>
								</tr>
								<?PHP
												$qryguestbook 	= "SELECT b.hotel_nama,c.room_type,DATE(a.date_input) AS tgl_pesan,a.check_in,a.check_out,a.flag_batal,a.flag_confirm FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id INNER JOIN m_room c ON a.room_id = c.room_id WHERE a.email = '".$_COOKIE['mail']."' AND a.book_kode IS NOT NULL ORDER BY a.book_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												$i++;
												if($rowguestbook['flag_batal'] == 1 && $rowguestbook['flag_confirm'] == 0){
													$status 	= 'dibatalkan';
													$statuseng 	= 'canceled';
												}else{
													$status 	= 'disetujui';
													$statuseng 	= 'approved';
												}
								?>
								<tr>
									<td><?PHP echo $i?>.</td>
									<td><?PHP echo $rowguestbook['hotel_nama']?></td>
									<td><?PHP echo $rowguestbook['room_type']?></td>
									<td><?PHP echo $rowguestbook['tgl_pesan']?></td>
									<td><?PHP echo $rowguestbook['check_in']?></td>
									<td><?PHP echo $rowguestbook['check_out']?></td>
									<td><?PHP echo $status?><br>(<i><?PHP echo $statuseng?></i>)</td>
								</tr>
								<?PHP
								}
								?>
							</table>
						</div>
						</div>
						
						<div id="dataId"> 
						<span class="size16 bold">ID Pemesanan</span><br>
						<span class="size16">(<i>Booking ID</i>)</span>
						<div class="line2"></div>
						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
							<table class="table table-bordered  mt-10">
								<tr>
									<td>Id Pemesanan terbaru anda adalah <font color="orange"><?PHP echo $qrycheckguest['very_code']?></font></td>
								</tr>
							</table>
						</div>
						</div>
						  
						<div class="clearfix"></div>
						<br>
						  <?PHP
						  if (isset($_GET['result'])){
						  ?>
						  <div id="result">
						  <div id="" align="center">Maaf Permintaan Anda Masih dalam proses ..</div>
						  <div id="" align="center">Sorry Your request in processing steps ..</div>
						  </div>
						  <?PHP
						  }
						  ?>
						  <div id="loading" align="center"><img src="images/load.gif"/><br>Silahkan Tunggu..</div>
						  <br>
						  <div id="feri">
						  
							<?PHP
								$qrycekpembayaran 	= $conn->query("SELECT a.book_id,a.hotel_id,a.room_id,a.book_kode,a.book_kode_encrypt,a.check_in,a.check_out,a.pax,a.noroom,a.email,a.`name`,a.gender,a.location,a.phone,a.totprice,a.flag_confirm,a.pdf_name,e.voc_nilai,a.total_stlh_disc,b.book_detail_id,c.hotel_nama,d.room_type,d.room_price,b.* FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id INNER JOIN m_hotel c ON a.hotel_id = c.hotel_id INNER JOIN m_room d ON a.room_id = d.room_id LEFT JOIN m_voucher e ON a.xcode_voc = e.voc_code_encrypt WHERE a.book_kode_encrypt = '".$_COOKIE['crv']."' AND a.book_kode IS NOT NULL");
								$qrycekpembayaran	= $qrycekpembayaran->fetch(PDO::FETCH_ASSOC);
								if ($qrycekpembayaran['book_detail_id'] != ''){
								$in		= date_create($qrycekpembayaran['check_in']);
								$out	= date_create($qrycekpembayaran['check_out']);
								$tot_day= date_diff($in,$out);
							?>
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
										<span class="ftitleblack" style="font-size: 13px"><?PHP echo $qrycekpembayaran['hotel_nama']?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px"><?PHP echo $qrycekpembayaran['room_type']?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px"><?PHP echo $qrycekpembayaran['check_in']?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px"><?PHP echo $qrycekpembayaran['check_out']?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px"><?PHP echo $tot_day->format("%a")?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px"><?PHP echo $qrycekpembayaran['noroom']?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. <?PHP echo number_format($qrycekpembayaran['room_price'],2,",",".")?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. <?PHP echo number_format($qrycekpembayaran['voc_nilai'],2,",",".")?></span>
									</td>
									<td>
										<span class="ftitleblack" style="font-size: 13px">Rp. <?PHP echo number_format($qrycekpembayaran['total_stlh_disc'],2,",",".")?></span>
									</td>
								</tr>
								
							</table>
							<br>
							<p style="color: #8bc0ec;font-size: 22px">Hello <?PHP echo $qrycekpembayaran['name']?>,</p>
							<p>Terima kasih atas konfirmasi pembayaran Anda.<br>Setelah verifikasi pembayaran dilakukan, kami akan segera memproses permintaan Anda.<br><i>Thank you for your payment confirmation.</i><br><i>Your request will be processed once the payment verification is done by us.</i><br><br>Berikut adalah detail konfirmasi pembayaran Anda:<br><i>Here is your payment confirmation details: </i></p>
							<table width="100%">
								<tr>
									<td width="35%" class="ftitleblack">Nomor Pemesanan (<i>Number Of Booking</i>)</td>
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
									<td class="ftitleblack"><?PHP echo $qrycekpembayaran['date_input']?></td>
								</tr>
								<tr>
									<td class="ftitleblack">Bank Tujuan (<i>Bank Destination</i>)</td>
									<td align="center" class="ftitleblack">:</td>
									<td class="ftitleblack"><?PHP echo $qrycekpembayaran['bank_tujuan']?></td>
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
									<td class="ftitleblack"><?PHP echo $qrycekpembayaran['tgl_transfer']?></td>
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
									<td colspan="3"><p>- Silahkan Unduh Bukti Pemesanan anda 
									<a href="javascript:;" onclick="location.href='aprove.php?code=<?PHP echo $qrycekpembayaran['book_kode_encrypt']?>'" ><b>disini</b></a> apabila bukti pemesanan belum dapat di unduh silahkan tunggu beberapa saat lagi, karna operator kami sedang memproses permintaan anda, cek kembali email anda untuk mendapatkan email konfirmasi dari kami.
									
									</p>
									<p>- <i>please download for proof of your reservation 
									<a href="javascript:;" onclick="location.href='aprove.php?code=<?PHP echo $qrycekpembayaran['book_kode_encrypt']?>'" ><b>here</b></a> if the booking can not be downloaded, please wait for a while longer, because our operators are processing your request, check again your email to receive emails confirmation from us
									</i></p>
									</td>
								</tr>
								<tr id="unduh">
									<td colspan="3" class="ftitleblack" align="center">&nbsp;<img src="images/load.gif" /><br>Mohon Tunggu (<i>Please Wait</i>) ...</td>
								</tr>
								<tr id="alert">
									<td colspan="3" class="ftitleblack" align="center"><h3>Maaf Permintaan Anda masih dalam tahap pemrosesan ...</h3></td>
								</tr>
								<tr id="alertwo">
									<td colspan="3" class="ftitleblack" align="center"><h3>Sorry Your request in processing steps ...</h3></td>
								</tr>
							</table>
						  <?PHP
							}
						  ?>
						  
						  </div>
						  
						
						<!-- END OF COL 1 -->
						
					  </div>
					  <!-- END OF TAB 1 -->		
					</div>
					<!-- End of Tab panes from left menu -->	
					
				</div>
				<!-- END OF RIGHT CPNTENT -->
			
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
			

			
		</div>
		
		
	</div>
	<!-- END OF CONTENT -->
		
	
	<!-- Javascript  -->
	
    <!-- Nicescroll  -->	
	<script src="assets/js/jquery.nicescroll.min.js"></script>
	
    <!-- Custom functions -->
    <script src="assets/js/functions.js"></script>
	
    <!-- Custom Select -->
	<script type='text/javascript' src='assets/js/jquery.customSelect.js'></script>
	
	<!-- Load Animo -->
	<script src="plugins/animo/animo.js"></script>


	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>
	<script src="assets/js/js-profile.js"></script>
	<script type="text/javascript">
		var loadCon = 'getconfirm.php';
		$("#loadConfirm").load(loadCon);
		
		$("#dataConfirm").hide();
		$("#dataId").hide();
		$("#dataHistory").hide();
		$("#dataDiri").hide();
		$("#loading").hide();
		$("#unduh").hide();
		$("#alert").hide();
		$("#alertwo").hide();
		var myVarresult=setInterval(function(){loadresult()},3000);
		function loadresult() {
			$("#result").hide();
			clearTimeout(myVarresult);
		}
		
		function infoConfirm(){
			$("#dataConfirm").show();
			$("#loadConfirm").load(loadCon);
		}
		
  $(document).ready(function(){

	$('#infoConfirm').bind("click", function () {
		infoConfirm();
		$("#dataDiri").hide();
		$("#dataId").hide();
		$("#dataHistory").hide();
   });
  
   $('#infoProf').bind("click", function () {
		$("#dataDiri").toggle();
		$("#dataId").hide();
		$("#dataHistory").hide();
		$("#dataConfirm").hide();
   });
   
   $('#infoHistory').bind("click", function () {
		$("#dataHistory").toggle();
		$("#dataId").hide();
		$("#dataDiri").hide();
		$("#dataConfirm").hide();
   });
   
   $('#infoCekId').bind("click", function () {
		$("#dataId").toggle();
		$("#dataHistory").hide();
		$("#dataDiri").hide();
		$("#dataConfirm").hide();
   });
   
   
	
	
  $('.btncustom').bind("click", function () {
		$("#loading").show();
		
				var very_code 	= $('input:text[name=very_code]').val();
				$("#loading").show();
				var ordernew = '<?PHP echo $_COOKIE['crv']?>';
				var myVarload=setInterval(function(){loadtime()},2000);
				function loadtime() {
				$.ajax({
							url: 'getbook.php',
							type: 'GET',
							data: 'code='+very_code+'&ordernew='+ordernew,
							cache: false,
							success: function(msg) {
								$('#feri').html(msg);
								$("#loading").hide();
								var myVarnot=setInterval(function(){closenot()},4000);
								function closenot() {
								$("#notid").hide();
								clearTimeout(myVarnot);
								}
								//$("#notid").hide();
							}
						});
						clearTimeout(myVarload);
				}
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
			'prefix': '$ ',
			'placeholder': '0'
		  }
		);
	</script>
  </body>
</html>
