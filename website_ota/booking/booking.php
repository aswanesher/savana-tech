<?PHP
	require ('config/hotel.conn.php');
	session_start();
	//CLEAR SESSION
	unset($_SESSION['xcd']);
	$id = (int)$_REQUEST['id'];
	$qryhot = $conn->query("SELECT a.room_id,a.room_type,a.room_price,a.room_disc,b.hotel_nama FROM m_room a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.hotel_id = '".$id."' AND a.room_type = '".$_GET['type']."'");
	$strhot = $qryhot->fetch(PDO::FETCH_ASSOC);
	
	$hotname 	= $strhot['hotel_nama'];
	$type 		= $strhot['room_type'];
	$price 		= $strhot['room_price'];
	$room_id	= $strhot['room_id'];
	
	$dayHarga = 0;
	$harga='';
	$dtharga = 0;
	  $jum = 0;
	  
	  $q = $conn->query("SELECT * FROM kalender_harga WHERE cal_bulan = month(curdate()) and cal_tahun= year(curdate())  and room_id=".$strhot['room_id']."");
	
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
		if($a == $dd['day']){
			$dayHarga=$harga[$a-1];
		}
	}
	
	
	$in		= date_create($_GET['in']);
	$out	= date_create($_GET['out']);
	$tot_day= date_diff($in,$out);
	
	if($strhot['room_disc'] > 0){
	$disc=0;
	//	$disc = $strhot['room_disc'] / 100 * $dayHarga;
		$totStlhDisc = $disc + $dayHarga;
	}else{
		$totStlhDisc = $dayHarga;
	}
	
	if(isset($_COOKIE['mail']) && isset($_COOKIE['usr'])){
		
		$qryCekGuest = $conn->query("SELECT * FROM guest_book WHERE email = '".$_COOKIE['mail']."' AND name = '".$_COOKIE['usr']."'");
		$strCekGuest = $qryCekGuest->fetch(PDO::FETCH_ASSOC);
		
		$readOnly = "readonly";
		$disabled = "disabled";
	}
	
?>
<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Walanja - Online Booking</title>
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="booking/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="booking/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="booking/css/responsive.css" >
	<link rel="stylesheet" type="text/css"  href="booking/css/tes.css" >
	<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="booking/js/gritter/css/jquery.gritter.css" />
	
	<link href="booking/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="booking/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="booking/js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="booking/js/uniform/css/uniform.default.min.css" />
	<!-- WIZARD -->
	<link rel="stylesheet" type="text/css" href="booking/js/bootstrap-wizard/wizard.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="plugins/countdown/jquery.countdown.css">
	<style type="text/css">
		#defaultCountdown { width: 100%; height: auto; }
	</style>
</head>
  <body id="top" class="thebg" >
    <!-- FOOTER -->
		<section id="header" class="clearfix paymentGreyContainer">
			<div class="container">
				<div id="column-header" class="row-fluid">
					<img src="images/logo.png" />
				</div>
			  </div>
		</section>
		<!--/FOOTER -->
	<br>
	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			<!-- SLIDER -->
			<div class="col-md-8 details-slider">
			
				<div id="c-carousel">
				<div id="wrapper">
				<div id="inner">
					<!-- SAMPLE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box" id="formWizard">
									<div class="box-title">
										<h4>Formulir Pemesanan - <span class="stepHeader">Tahap 1 dari 3</h4>
										
									</div>
									<div class="box-body form">
										<form id="wizForm" action="#" class="form-horizontal" method="POST">
										<div class="wizard-form">
										   <div class="wizard-content">
											  <ul class="nav nav-pills nav-justified steps">
												 <li>
													<a href="javascript:;" data-toggle="tab" data-target="#account" class="wiz-step">
													<span class="step-number">1</span>
													<span class="step-name"><i class="fa fa-check"></i> Isi Data Pribadi </span>   
													</a>
												 </li>

												 <li>
													<a href="javascript:;" data-toggle="tab" data-target="#payment" class="wiz-step active">
													<span class="step-number">2</span>
													<span class="step-name"><i class="fa fa-check"></i> Informasi Pembayaran</span>   
													</a>
												 </li>
												 <li>
													<a href="javascript:;" data-toggle="tab" data-target="#confirm" class="wiz-step">
													<span class="step-number">3</span>
													<span class="step-name"><i class="fa fa-check"></i> Selesai </span>   
													</a> 
												 </li>
											  </ul>
											  <div id="bar" class="progress progress-striped progress-sm active" role="progressbar">
												 <div class="progress-bar progress-bar-warning"></div>
											  </div>
											  <div class="tab-content">
												 <div class="alert alert-danger display-none">
													<a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
													Formulir Anda memiliki kesalahan. Silakan memperbaikinya untuk melanjutkan.
												 </div>
												 
												 
												 <div id="logguest">
												  <form id="formcekguest" action="#" method="POST">
													<h4 class="block">Sudah Punya Akun?</h4>
													<div class="form-group">
													   <label class="control-label col-md-3">Email<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="emailcek" placeholder="Masukan Email" />
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Kata Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" class="form-control" name="passwordcek" placeholder="Masukan Sandi"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Ulangi Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" class="form-control" id="cekpass" name="cekpass" placeholder="Ulangi Sandi"/>
														  <span id="tidak" style="color: red;display: none">Kata sandi tidak cocok!</span>
														  <span id="ya" style="color: green;display: none">Kata sandi cocok!</span>
													   </div>
													</div>
													<div class="wizard-buttons">
													  <div class="row">
														 <div class="col-md-12">
															<div class="col-md-offset-3 col-md-9">
															   <a href="javascript:;" id="ceklog" class="btn btn-primary">
																Masuk <i class="fa fa-lock"></i>
															   </a>                          
															</div>
														 </div>
													  </div>
												   </div>
												   </form>
													</div>
												 
												 <div class="tab-pane active" id="account">
													<h4>Buat Akun</h4>
													<div class="form-group">
													   <label class="control-label col-md-3">Email<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" value="<?PHP echo $strCekGuest['email']?>" class="form-control" name="email" placeholder="Please provide email address" <?PHP echo $readOnly?> />
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Kata Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" value="<?PHP echo $strCekGuest['password']?>" class="form-control" name="password" placeholder="Please provide password" <?PHP echo $readOnly?> />
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Ulangi Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" id="cekPassVal" value="<?PHP echo $strCekGuest['password']?>" class="form-control" name="passwordCek" placeholder="repeat password" <?PHP echo $readOnly?> />
														  <span class="error-span"></span>
														  <span id="tidakVal" style="color: red;display: none">Kata sandi tidak cocok!</span>
														  <span id="yaVal" style="color: green;display: none">Kata sandi cocok!</span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Nama<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" value="<?PHP echo $strCekGuest['name']?>" class="form-control" name="name" placeholder="Please provide your name" <?PHP echo $readOnly?> />
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Jenis Kelamin<span class="required">*</span></label>
													   <div class="col-md-4">
															 <label class="radio">
																<input type="radio" name="gender" value="M" data-title="Male" class="uniform" <?PHP echo $gen = $strCekGuest['gender']=="Laki-Laki"?"checked":""?> <?PHP echo $disabled?> />
															 Laki-Laki
															 </label>
															 <label class="radio">
																<input type="radio" <?PHP echo $gen = $strCekGuest['gender']=="Perempuan"?"checked":""?> name="gender" value="F" data-title="Female" class="uniform" <?PHP echo $disabled?> />
															 Perempuan
															 </label>														  
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Alamat<span class="required">*</span></label>
													   <div class="col-md-4">
														  <textarea class="form-control" name="location" placeholder="Please provide home address" ><?PHP echo $strCekGuest['location']?></textarea>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Negara</label>
													   <div class="col-md-4">
														  <select name="country" id="country_select" class="col-md-12 full-width-fix" >
															 <option value=""></option>
															 <?PHP
																$qrycountry 	= "SELECT * FROM m_country";
																$stmtcountry 	= $conn->prepare( $qrycountry );
																$stmtcountry->execute();		 
																while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
																extract($rowcountry);
																	if($strCekGuest['country'] == $count_id){
															 ?>
															 <option value="<?PHP echo $count_id?>" selected ><?PHP echo $count_name?></option>
															 <?PHP
																	}else{
															?>
															<option value="<?PHP echo $count_id?>"><?PHP echo $count_name?></option>
															<?PHP															
																	}
																}
															 ?>
														  </select>
													   </div>													
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">No. Telepon<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" value="<?PHP echo $strCekGuest['phone']?>" class="form-control" name="phone" placeholder="Please provide phone number" />
														  <span class="error-span"></span>
													   </div><br><br><br><br>
													  
													</div>
												 </div>
												 <div class="tab-pane" id="payment">
												 <h3 class="block">Pembayaran</h3>
												 <p class="alert alert-block alert-warning fade in"><i class="fa fa-exclamation-circle"></i><i> Silahkan selesaikan pembayaran anda</i> untuk menghindari pembatalan oleh pihak kami.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembayaran dapat dilakukan melalu metode pembayaran yang dipilih :</p>
													
													<div class="row">
														<div class="col-md-12">
														<p>walanja.co.id menyediakan beberapa metode pembayaran diantaranya :</p>
														<p>Metode pembayaran dengan transfer</p>
														<p>Metode pembayaran dengan menggunakan Kartu Kredit</p>
														<h3 class="block">Pilih Metode pembayaran yang akan dilakukan :</h3>
														</div>
													</div> <br>
													<div class="row">
														<div class="col-md-12">
															<div><a href="javascript:void(0);" id="payTb" ><img src="images/tb_icon.png" /></a></div>
														</div>
														<div class="col-md-12">
															<div><a href="javascript:void(1);" id="payCc" ><img src="images/cc_icon.png" /></a></div>
														</div>
													</div><br>
													
													<div style="display: none" id="showTb"><img src="booking/css/banner_right.png" alt="banner_left" style="width:100%;height:100%"></div>
													<div style="display: none" id="showCc"><img src="images/under_con.png" style="width:100%;height:100%"></div>
													<br>
														<div class="form-group">
															<div class="col-md-12">
															<div class="clearfix paymentGreyContainer" style="background-color: #d9534f">
																<label class="control-label col-md-4" style="color: white">Gunakan Kode Voucher Anda Disini :</label>
																<div class="form-group">
																<div class="col-md-4">
																<input type="text" class="form-control" name="voc_code" placeholder="Masukan Kode Voucher"/>
																</div>
																<div class="col-md-3">
																  <input type="hidden" name="totyar" value="<?PHP echo $totStlhDisc * $tot_day->format("%a") * $_GET['noroom'];?>"/>
																  <a class="btn btn-info" id="cekvoc">Gunakan Voucher</a>
																</div>
																</div>
															</div>
															</div>
														</div>
														<h4>Ketentuan Penggunaan Voucher</h4>
														<div class="form-group">
															<div class="col-md-12">
																<table width="100%" style="font-size: 18px">
																	<tr>
																		<td width="3%" valign="top" align="center">1.</td>
																		<td>Silahkan gunakan kode voucher anda untuk mendapatkan potongan harga.</td>
																	</tr>
																	<tr>
																		<td width="3%" valign="top" align="center">2.</td>
																		<td>Apabila Belum mendapatkan kode voucher silahkan hubungi customer service kami untuk ketentuan mendapatkan kode voucher.</td>
																	</tr>
																	<tr>
																		<td width="3%" valign="top" align="center">3.</td>
																		<td>Total Pembayaran yang tertera di samping kanan halaman adalah total pembayaran sebelum di potong discount.</td>
																	</tr>
																	<tr>
																		<td width="3%" valign="top" align="center">4.</td>
																		<td>Perhatikan <b>Total pembayaran</b> setelah voucher di gunakan.</td>
																	</tr>
																	<tr>
																		<td width="3%" valign="top" align="center">5.</td>
																		<td>voucher hanya berlaku untuk 1x pemakaian.</td>
																	</tr>
																	<tr>
																		<td width="3%" valign="top" align="center">6.</td>
																		<td>hubungi customer service kami di 022-9291-4001 atau kirim email ke sales@walanja.co.id jika voucher tidak bisa di gunakan</td>
																	</tr>
																</table>
															</div>
														</div>
												 </div>
												 
												 
												 <div class="tab-pane" id="confirm">
													<h3 class="block">Pemberitahuan</h3>
													<div class="well" style="font-size: 18px">
														<p>Kami akan mengirimkan anda email untuk informasi lebih lanjut mengenai konfirmasi pembayaran, kirim email ke <b>sales@walanja.co.id</b>  atau hubungi customer service kami di (<b>022-9291-4001</b>) apabila email belum juga anda terima.</p>
														<p><i>We will send you email for more information about confirmation of payment, send an email to <b>sales@walanja.co.id</b> or contact our customer service at (<b>022-9291-4001</b>) if you have not received the email.</i></p><br>
														<p>Kami akan segera memproses order Anda apabila:</p>
														<p>&nbsp;&nbsp;1. Pembayaran telah kami terima</p>
														<p>&nbsp;&nbsp;2. Konfirmasi Pembayaran Bank Transfer telah dilakukan melalui website paling lambat 1 Jam terhitung setelah anda menyelesaikan pengisian formulir pemesanan dan menyetujui peraturan yang berlaku di walanja.co.id.</p>
														<p>&nbsp;&nbsp;3. pilih check box di bawah ini untuk persetujuan pemesanan, apabila telah di setujui itu artinya anda telah mengerti dan menyetujui dengan peraturan yang berlaku di walanja.co.id.</p><br>
														
														<p><i>We will process your order when:</i></p>
														<p>&nbsp;&nbsp;<i>1. Your payment is received.</i></p>
														<p>&nbsp;&nbsp;<i>2. Bank Transfer Payment Confirmation has been done through the website later than 1 hour starting after reservation is made.</i></p>
														<p>&nbsp;&nbsp;<i>3. Choose the check box below for the booking approval, if it has been to be approved, that means that you have come to understand and agree with the rules the applicable in walanja.co.id.</i></p><br>
														<div>
															<input type="checkbox" name="app" id="app" value="1"/> <b>ya, saya setuju. (<i>i agree</i>)</b>
														</div>
													</div>
													
												 </div>
											  </div>
										   </div>
										   <input type="hidden" name="hotel_id" value="<?PHP echo $_GET['id']?>" />
										   <input type="hidden" name="check_in" value="<?PHP echo $_GET['in']?>" />
										   <input type="hidden" name="check_out" value="<?PHP echo $_GET['out']?>" />
										   <input type="hidden" name="pax" value="<?PHP echo $_GET['pax']?>" />
										   <input type="hidden" name="noroom" value="<?PHP echo $_GET['noroom']?>" />
										   <input type="hidden" name="room_id" value="<?PHP echo $room_id?>" />
										   <input type="hidden" name="totprice" value="<?PHP echo $totStlhDisc * $tot_day->format("%a") * $_GET['noroom']?>" />
										   <div class="wizard-buttons">
											  <div class="row">
												 <div class="col-md-12">
													<div class="col-md-offset-3 col-md-9">
													   <a href="javascript:;" class="btn btn-default prevBtn">
														<i class="fa fa-arrow-circle-left"></i> Back 
													   </a>
													   <a href="javascript:;" class="btn btn-primary nextBtn">
														Lanjutkan <i class="fa fa-arrow-circle-right"></i>
													   </a>
													   <a href="javascript:;" class="btn btn-success submitBtn">
														Selesai <i class="fa fa-arrow-circle-right"></i>
													   </a>                            
													</div>
												 </div>
											  </div>
										   </div>
										   <div class="alert alert-success display-none">
													Pemesanan Berhasil
												 </div>
										   <div id="loading">
												<img src="images/load.gif"/>
										   </div>
										</div>
									 </form>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /SAMPLE -->
				</div>
				
					
		</div>
		</div> <!-- /c-carousel -->
			</div>
			<!-- END OF SLIDER -->			
			<br>
			<!-- RIGHT INFO -->
			<div class="row">
			<div class="col-md-4">
				<div class="row">
				<div class="color-light pattern">
				<div class="clearfix paymentGreyContainer" align="center">
				 <span class="label label-danger arrow-out arrow-out-right">Perhatian !</span>
				 <br><br><p><b>Waktu yang Tersisa Untuk anda menyelesaikan pengisian formulir pemesanan</b></p>
				 <center><h3><b><div id="defaultCountdown"></div></b></h3></center>
				</div>
				</div>
				</div>
				<h3>Rincian Pemesanan</h3>
				<div class="row">
				<div class="color-light pattern">
				<div class="clearfix paymentGreyContainer" style="background-color: rgb(255, 207, 119)">
				 <h3><b><?PHP echo $hotname?></b></h3>
				 <h3><?PHP echo $type?></b></h3>
				</div>
				<div class="clearfix paymentGreyContainer">
					<table width="100%">
						<tr>
							<td><h3><b>Harga</b></h3></td>
							<td>&nbsp;</td>
							<td align="right"><h3><b>Rp. <?PHP echo number_format($totStlhDisc,2,",",".");?></b></h3></td>
						</tr>
						<tr>
							<td><h4><b>- Tgl Check-In</b></h4></td>
							<td><b>:</b></td>
							<td style="color: red"><h4><b><?PHP echo $_GET['in']?></b></h4></td>
						</tr>
						<tr>
							<td><h4><b>- Tgl Check-Out</b></h4></td>
							<td><b>:</b></td>
							<td style="color: red"><h4><b><?PHP echo $_GET['out']?></b></h4></td>
						</tr>
						<tr>
							<td><h4><b>- Durasi</b></h4></td>
							<td><span class="badge badge-red"><?PHP echo $tot_day->format("%a");?> Malam</span></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><h4><b>- Jumlah</b></h4></td>
							<td><span class="badge badge-red"><?PHP echo $_GET['noroom']?></span></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><h4><b>- Jumlah Tamu</b></h4></td>
							<td><span class="badge badge-red"><?PHP echo $_GET['pax']?> Orang</span></td>
							<td>&nbsp;</td>
						</tr>
					</table>
				</div>
				<div class="clearfix paymentGreyContainer">
					<table width="100%" id="view-mount">
							<tr>
								<td><h4><b>Total Pembayaran</b></h4><td>
								<td align="right"><h4><b>Rp. <?PHP echo number_format($totStlhDisc * $tot_day->format("%a") * $_GET['noroom'],2,",",".");?></b></h4><td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;<div id="loadvoc"></div><td>
							</tr>
					</table>
				</div>
				<div class="clearfix paymentGreyContainer">
					<p><span class="label label-warning arrow-out arrow-out-right">Perhatian !</span><br><br>Periksa Kembali Pemesanan Anda apakah sudah sesuai, apabila ada kesalahan dalam pemesanan ulangi kembali tahap pemesanan</p>
				</div>
					<div><!--<img src="booking/css/banner_left.png" alt="banner_left" style="width:100%;height:100%">-->
					</div>
				</div>
				</div>
			</div>	
			</div>
			<!-- END OF RIGHT INFO -->
		</div>
	</div>
	
	
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="booking/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="booking/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="booking/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="booking/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="booking/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="booking/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="booking/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="booking/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="booking/js/select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="booking/js/uniform/jquery.uniform.min.js"></script>
	<!-- WIZARD -->
	<script src="booking/js/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<!-- WIZARD -->
	<script src="booking/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="booking/js/jquery-validate/additional-methods.min.js"></script>
	<!-- GRITTER -->
	<script type="text/javascript" src="booking/js/gritter/js/jquery.gritter.min.js"></script>
	<!-- BOOTBOX -->
	<script type="text/javascript" src="booking/js/bootbox/bootbox.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="booking/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="plugins/countdown/jquery.plugin.js"></script>
	<script type="text/javascript" src="plugins/countdown/jquery.countdown.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="booking/js/script.js"></script>
	<script type="text/javascript">$(function () {$('#defaultCountdown').countdown({until: 1800});});var myVarCloseForm=setInterval(function(){loadCloseForm()},1800000);function loadCloseForm(){open(location, '_self').close();}$(document).ready(function(){$("#cekpass").keyup(function (){var pass=$('input:password[name=passwordcek]').val();var passCek=$('input:password[name=cekpass]').val();if(pass != passCek){$('#ya').hide();$('#tidak').show();}else if(pass == '' || passCek == ''){$('#ya').hide();$('#tidak').hide();}else{$('#tidak').hide();$('#ya').show();}});$("#cekPassVal").keyup(function (){var passVal=$('input:password[name=password]').val();var passCekVal=$('input:password[name=passwordCek]').val();if(passVal != passCekVal){$('#yaVal').hide();$('#tidakVal').show();}else if(passVal == '' || passCekVal == ''){$('#yaVal').hide();$('#tidakVal').hide();}else{$('#tidakVal').hide();$('#yaVal').show();}});$('#payTb').click(function (){$('#showCc').hide();$('#showTb').toggle('fast');});$('#payCc').click(function () {$('#showTb').hide();$('#showCc').toggle('fast');});$('#ceklog').bind("click", function () {var emailcek 	= $('input:text[name=emailcek]').val();var passwordcek = $('input:password[name=passwordcek]').val();$.ajax({url: 'getguest.php',type: 'GET',data: 'emailcek='+emailcek+'&passwordcek='+passwordcek,cache: false,success: function(rescek){$('#account').html(rescek);}});});$('#cekvoc').bind("click", function () {var vocode 	= $('input:text[name=voc_code]').val();var totyar 	= '<?PHP echo $totStlhDisc * $tot_day->format("%a") * $_GET['noroom'];?>';$('#loadvoc').html('<img src="images/loadvoc.gif" />').show();var myVarloadvoc=setInterval(function(){loadingvoc()},2000);function loadingvoc() {$.ajax({url: 'getvoc.php',type: 'GET',data: 'vocode='+vocode+'&totyar='+totyar,cache: false,success: function(resvoc){$('#view-mount').html(resvoc);$('#loadvoc').html('<img src="images/loadvoc.gif" />').hide();var myVarwarvoc=setInterval(function(){closewarvoc()},4000);function closewarvoc(){$('#warvoc').hide('fast');clearTimeout(myVarwarvoc);}}});clearTimeout(myVarloadvoc);}});});var myVarwar=setInterval(function(){closewar()},4000);function closewar(){$('#warning').hide('fast');}var FormWizard = function (){return{init: function (){if (!jQuery().bootstrapWizard){return;}$("#country_select").select2({placeholder: "Select your country"});$("#bank").select2({placeholder: "Select your bank"});var wizform = $('#wizForm');var alert_success = $('.alert-success', wizform);var alert_error = $('.alert-danger', wizform);wizform.validate({doNotHideMessage: true,errorClass: 'error-span',errorElement: 'span',rules: {email: {required: true,email: true},password: {minlength: 3,required: true},passwordCek: {minlength: 3,required: true},name: {required: true},gender: {required: true},location: {required: true},country: {required: true},phone: {required: true},bank: {required: true}},invalidHandler: function (event, validator) {alert_success.hide();alert_error.show();},highlight: function (element) {$(element).closest('.form-group').removeClass('has-success').addClass('has-error');},unhighlight: function (element){$(element).closest('.form-group').removeClass('has-error');},success: function (label){if (label.attr("for") == "gender") {label.closest('.form-group').removeClass('has-error').addClass('has-success');label.remove();}else{label.addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');}}});$('#formWizard').bootstrapWizard({'nextSelector': '.nextBtn','previousSelector': '.prevBtn',onNext: function (tab, navigation, index) {alert_success.hide();alert_error.hide();if (wizform.valid() == false) {return false;}var total = navigation.find('li').length;var current = index + 1;$('.stepHeader', $('#formWizard')).text('Tahap ' + (index + 1) + ' dari ' + total);jQuery('li', $('#formWizard')).removeClass("done");var li_list = navigation.find('li');for (var i = 0; i < index; i++) {jQuery(li_list[i]).addClass("done");}if (current == 1) {$('#formWizard').find('.prevBtn').hide();} else {$('#formWizard').find('.prevBtn').show();$('#logguest').hide();}if (current >= total) {$('#formWizard').find('.nextBtn').hide();$('#formWizard').find('.submitBtn').hide();$('#app').change(function () {if ($('#app').is(':checked')) {$('#formWizard').find('.submitBtn').show();}else {$('#formWizard').find('.submitBtn').hide();}});}else{$('#formWizard').find('.nextBtn').show();$('#formWizard').find('.submitBtn').hide();}},onPrevious: function (tab, navigation, index) {alert_success.hide();alert_error.hide();var total = navigation.find('li').length;var current = index + 1;$('.stepHeader', $('#formWizard')).text('Tahap ' + (index + 1) + ' dari ' + total);jQuery('li', $('#formWizard')).removeClass("done");var li_list = navigation.find('li');for (var i = 0; i < index; i++) {jQuery(li_list[i]).addClass("done");}if (current == 1) {$('#formWizard').find('.prevBtn').hide();$('#logguest').show();} else {$('#formWizard').find('.prevBtn').show();}if (current >= total) {$('#formWizard').find('.nextBtn').hide();$('#formWizard').find('.submitBtn').show();} else {$('#formWizard').find('.nextBtn').show();$('#formWizard').find('.submitBtn').hide();}},onTabClick: function (tab, navigation, index) {bootbox.alert('silahkan melengkapi pengisian');return false;},onTabShow: function (tab, navigation, index) {var total = navigation.find('li').length;var current = index + 1;var $percent = (current / total) * 100;$('#formWizard').find('.progress-bar').css({width: $percent + '%'});}});function confirm(){var notif = 'Notification!';var pesan = 'Pemesanan Berhasil';$.gritter.add({title: notif,text: pesan});return false;}function clearInput(){$("#wizForm :input").each( function(){$(this).val('');});}$('#formWizard').find('.prevBtn').hide();$('#loading').hide();$('#formWizard .submitBtn').bind("click", function (event) {var url= "proses.php";var hotel_id	= $('input:hidden[name=hotel_id]').val();var check_in = $('input:hidden[name=check_in]').val();var check_out = $('input:hidden[name=check_out]').val();var pax= $('input:hidden[name=pax]').val();var noroom= $('input:hidden[name=noroom]').val();var room_id= $('input:hidden[name=room_id]').val();var totprice= $('input:hidden[name=totprice]').val();var email= $('input:text[name=email]').val();var password= $('input:password[name=password]').val();var name= $('input:text[name=name]').val();var gender= $('input[type="radio"]:checked').val();var location= $('textarea[name=location]').val();var country= $('select[name=country]').val();var phone= $('input:text[name=phone]').val();var action= "book";$('.wizard-buttons').hide();$.post(url, {act: action,hotel_id: hotel_id,check_in: check_in,check_out: check_out,pax: pax,noroom: noroom,room_id: room_id,email: email,password: password,name: name,gender: gender,location: location,country: country,phone: phone,totprice: totprice} ,function() {$('#loading').show();var myVarload=setInterval(function(){load()},2000);function load() {alert_success.show();clearTimeout(myVarload);}var myVar=setInterval(function(){closeform()},4000);function closeform() {open(location, '_self').close();}});}).hide();}};}();</script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("wizards_validations");  //Set current page
			App.init(); //Initialise plugins and elements
			FormWizard.init();
		});
	</script>
	<!-- /JAVASCRIPTS -->
  </body>
</html>