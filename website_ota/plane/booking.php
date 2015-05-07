<?PHP
	require ('../config/hotel.conn.php');
	require_once ('../library/function.cracked.php');
	require_once ('../library/function.convert.date.php');
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	unset($_SESSION['xcd']);
	//UNCRACKED SPEC
	if(isset($_GET['spec'])){
		$flag		 	= crackedSpec($_GET['spec'],9);
		
	// JIKA DESTINATION 1 KALI PERJALANAN
		if(isset($flag) && $flag == 1){
		
			$menu 			= crackedSpec($_GET['spec'],0);
			$idPlane 		= crackedSpec($_GET['spec'],1);
			$promo		 	= crackedSpec($_GET['spec'],2);
			$dari		 	= crackedSpec($_GET['spec'],3);
			$ke			 	= crackedSpec($_GET['spec'],4);
			$tglBerangkat 	= crackedSpec($_GET['spec'],5);
			$tglKembali 	= crackedSpec($_GET['spec'],6);
			$penumpangDewasa= crackedSpec($_GET['spec'],7);
			$penumpangAnak	= crackedSpec($_GET['spec'],8);
			$flagDesc		= crackedSpec($_GET['spec'],9);
			$kodeKategori	= crackedSpec($_GET['spec'],10);
			
			$ketDesc		= "1x Perjalanan";
			
			
			
	// JIKA DESTINATION 2 KALI PERJALANAN	
		}else if(isset($flag) && $flag == 2){
		
			$menu 			= crackedSpec($_GET['spec'],0);
			$idPlane 		= crackedSpec($_GET['spec'],1);
			$promo		 	= crackedSpec($_GET['spec'],2);
			$dari		 	= crackedSpec($_GET['spec'],3);
			$ke			 	= crackedSpec($_GET['spec'],4);
			$tglBerangkat 	= crackedSpec($_GET['spec'],5);
			$tglKembali 	= crackedSpec($_GET['spec'],6);
			$penumpangDewasa= crackedSpec($_GET['spec'],7);
			$penumpangAnak	= crackedSpec($_GET['spec'],8);
			$flagDesc		= crackedSpec($_GET['spec'],9);
			$kodeKategori	= crackedSpec($_GET['spec'],10);
			
			$ketDesc		= "2x Perjalanan";
		}
			//AMBIL INFORMASI MASKAPAI
			$qryPlane 		= $conn->query("SELECT kode_kategory,hotel_nama,hotel_img,hotel_avg,TIME(plane_berangkat) as berangkat,TIME(plane_tiba) as tiba, DATE(plane_berangkat) AS hariberangkat, DATE(plane_tiba) AS haritiba FROM m_hotel WHERE hotel_id = '".$idPlane."'");
			$strPlane 		= $qryPlane->fetch(PDO::FETCH_ASSOC);
			
			$strKodeKategori= $strPlane['kode_kategory'];
			$strPlaneNama	= $strPlane['hotel_nama'];
			$strPlaneimage	= $strPlane['hotel_img'];
			$strPlanePrice	= $strPlane['hotel_avg'];
			
			$tglBerangakatFormat 	= convertDate($tglBerangkat);
			$waktuBerangkat 		= date('H:i',strtotime($strPlane['berangkat']));
			$waktuTiba 				= date('H:i',strtotime($strPlane['tiba']));
			$hariBerangkat			= dayChoice($strPlane['hariberangkat']);
			$hariTiba				= dayChoice($strPlane['haritiba']);
			$hariPenerbangan		= dayChoice($tglBerangkat);
			
			//CALCULATION NILAI PEMBAYARAN
			$totalStlhPerjalanan 	= $strPlanePrice * $flagDesc;
			$totalStlhPenumpang		= $totalStlhPerjalanan * $penumpangDewasa;
		
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
	<link rel="stylesheet" type="text/css" href="../booking/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="../booking/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="../booking/css/responsive.css" >
	<link rel="stylesheet" type="text/css"  href="../booking/css/tes.css" >
	<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="../booking/js/gritter/css/jquery.gritter.css" />
	
	<link href="../booking/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="../booking/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="../booking/js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="../booking/js/uniform/css/uniform.default.min.css" />
	<!-- WIZARD -->
	<link rel="stylesheet" type="text/css" href="../booking/js/bootstrap-wizard/wizard.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../plugins/countdown/jquery.countdown.css">
	<style type="text/css">
		#defaultCountdown { width: 100%; height: auto; }
	</style>
</head>
  <body id="top" class="thebg" >
    <!-- FOOTER -->
		<section id="header" class="clearfix paymentGreyContainer">
			<div class="container">
				<div id="column-header" class="row-fluid">
					<img src="../images/logo.png" />
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
										<h4>Formulir Pemesanan Tiket - <span class="stepHeader">Tahap 1 dari 3</h4>
										
									</div>
									<div class="box-body form">
										<form id="wizForm" action="#" class="form-horizontal" method="POST">
										<div class="wizard-form">
										   <div class="wizard-content">
											  <ul class="nav nav-pills nav-justified steps">
												 <li>
													<a href="#account" data-toggle="tab" class="wiz-step">
													<span class="step-number">1</span>
													<span class="step-name"><i class="fa fa-check"></i> Isi Data Pribadi </span>   
													</a>
												 </li>

												 <li>
													<a href="#payment" data-toggle="tab" class="wiz-step active">
													<span class="step-number">2</span>
													<span class="step-name"><i class="fa fa-check"></i> Informasi Pembayaran</span>   
													</a>
												 </li>
												 <li>
													<a href="#confirm" data-toggle="tab" class="wiz-step">
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
														  <input type="text" class="form-control" name="emailcek" placeholder="Masukan Email"/>
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
														  <input type="text" class="form-control" name="email" placeholder="Please provide email address"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Kata Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" class="form-control" name="password" placeholder="Please provide password"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Nama<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="name" placeholder="Please provide your name"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Jenis Kelamin<span class="required">*</span></label>
													   <div class="col-md-4">
															 <label class="radio">
																<input type="radio" name="gender" value="M" data-title="Male" class="uniform" checked="checked" />
															 Laki-Laki
															 </label>
															 <label class="radio">
																<input type="radio" name="gender" value="F" data-title="Female" class="uniform"/>
															 Perempuan
															 </label>														  
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Lokasi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="location" placeholder="Please provide home address"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Negara</label>
													   <div class="col-md-4">
														  <select name="country" id="country_select" class="col-md-12 full-width-fix">
															 <option value=""></option>
															 <?PHP
																$qrycountry 	= "SELECT * FROM m_country";
																$stmtcountry 	= $conn->prepare( $qrycountry );
																$stmtcountry->execute();		 
																while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
																extract($rowcountry);
															 ?>
															 <option value="<?PHP echo $count_kode?>"><?PHP echo $count_name?></option>
															 <?PHP
																}
															 ?>
														  </select>
													   </div>													
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">No. Telepon<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="phone" placeholder="Please provide phone number"/>
														  <span class="error-span"></span>
													   </div><br><br><br><br>
													  
													</div>
												 </div>
												 <div class="tab-pane" id="payment">
												 <h3 class="block">Pembayaran</h3>
												 <p class="alert alert-block alert-warning fade in"><i class="fa fa-exclamation-circle"></i><i> Silahkan selesaikan pembayaran anda</i> untuk menghindari pembatalan oleh pihak kami.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembayaran dapat dilakukan ke rekening yang sudah tertera dibawah :</p>
													<div class="jumbotron">
													<div class="row">
														<!--<div class="col-md-6">
															<p><img src="images/bank_icon/bca.png" /><img src="images/bank_icon/mandiri.png" /></p>	
														</div> -->
													</div> 
													<div class="row">
														<!--<div class="col-md-6">
															<p>Rek Bank Mandiri Cabang Pasteur <br>No. 132.001.099.7022 <br>a.n. PT. Citra Jelajah Informatika</p>
															<p>Rek BCA Cabang Dago <br>No. 777.054.0300 <br>a.n. PT. Citra Jelajah Informatika</p>
														</div>-->
													</div>
													<div><img src="../booking/css/banner_right.png" alt="banner_left" style="width:100%;height:100%">
													</div>
													</div>													
												 </div>
												 <div class="tab-pane" id="confirm">
													<h3 class="block">Pemberitahuan</h3>
													<div class="well">
														<p>Terima Kasih, Pemesanan kamar Anda Akan Segera Kami Proses.</p>
														<p><i>Thank you, your room reservation will soon We Process.</i></p>
														<p>Kami akan mengirimkan anda email untuk informasi lebih lanjut mengenai konfirmasi pembayaran, kirim email ke <b>sales@walanja.co.id</b>  atau hubungi customer service kami di (<b>022-9291-4001</b>) apabila email belum juga anda terima.</p>
														<p><i>We will send you email for more information about confirmation of payment, send an email to <b>sales@walanja.co.id</b> or contact our customer service at (<b>022-9291-4001</b>) if you have not received the email.</i></p><br>
														<p>Kami akan segera memproses order Anda apabila:</p>
														<p>&nbsp;&nbsp;1. Pembayaran telah kami terima</p>
														<p>&nbsp;&nbsp;2. Konfirmasi Pembayaran Bank Transfer telah dilakukan melalui website paling lambat 20 MENIT terhitung setelah anda menyelesaikan pengisian formulir pemesanan dan menyetujui peraturan yang berlaku di walanja.co.id.</p>
														<p>&nbsp;&nbsp;3. pilih check box di bawah ini untuk persetujuan pemesanan, apabila telah di setujui itu artinya anda telah mengerti dan menyetujui dengan peraturan yang berlaku di walanja.co.id.</p><br>
														
														<p><i>We will process your order when:</i></p>
														<p>&nbsp;&nbsp;<i>1. Your payment is received.</i></p>
														<p>&nbsp;&nbsp;<i>2. Bank Transfer Payment Confirmation has been done through the website later than 20 MINUTE starting after reservation is made.</i></p>
														<p>&nbsp;&nbsp;<i>3. Choose the check box below for the booking approval, if it has been to be approved, that means that you have come to understand and agree with the rules the applicable in walanja.co.id.</i></p><br>
														<div>
															<input type="checkbox" name="app" id="app" value="1"/> <b>ya, saya setuju. (<i>i agree</i>)</b>
														</div>
													</div>
													<!-- // Value Hidden -->
													<input type="hidden" name="hotel_id" value="<?PHP echo $idPlane?>" />
													<input type="hidden" name="check_in" value="<?PHP echo $tglBerangkat?>" />
													<input type="hidden" name="totprice" value="<?PHP echo $totalStlhPenumpang?>" />
													<input type="hidden" name="plane_dewasa" value="<?PHP echo $penumpangDewasa?>" />
													<input type="hidden" name="plane_anak" value="<?PHP echo $penumpangAnak?>" />
													<input type="hidden" name="plane_dari" value="<?PHP echo $dari?>" />
													<input type="hidden" name="plane_ke" value="<?PHP echo $ke?>" />
													<input type="hidden" name="plane_dest" value="<?PHP echo $flagDesc?>" />
													<input type="hidden" name="kategory_item" value="<?PHP echo $kodeKategori?>" />
												 </div>
											  </div>
										   </div>
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
												<img src="../images/load.gif"/>
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
				<h3>Rincian Pemesanan Tiket</h3>
				<div class="row">
				<div class="color-light pattern">
				<div class="clearfix paymentGreyContainer" style="background-color: rgb(255, 207, 119)">
				 <h3><b><?PHP echo $strPlaneNama?></b></h3>
				</div>
				<div class="clearfix paymentGreyContainer">
					<table width="100%">
						<tr>
							<td><h4><b>Harga Per Orang</b></h4></td>
							<td>&nbsp;</td>
							<td align="right"><h4><b>Rp. <?PHP echo number_format($strPlanePrice,2,",",".");?></b></h3></td>
						</tr>
						<tr>
							<td><h4><b>- Perjalanan</b></h4></td>
							<td><b>:</b></td>
							<td style="color: red"><h4><b><?PHP echo $ketDesc?></b></h4></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td colspan="3" align="center" style="background-color: #70AFC4;color: white"><h4><b>Penerbangan Pergi</b></h4></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td colspan="2"><h4><b><?PHP echo $hariPenerbangan?>,<?PHP echo $tglBerangakatFormat?></b></h4></td>
						</tr>
						<tr>
							<td rowspan="3" width="10%"><img src="../images/destination.png"/></td>
							<td width="30%" valign="top">- <b><?PHP echo $dari?></b></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><img src="../images/<?PHP echo $strPlaneimage?>"/></td>
							<td><b><?PHP echo $waktuBerangkat?></b> | <b><?PHP echo $hariBerangkat?></b><br><b><?PHP echo $waktuTiba?></b> | <b><?PHP echo $hariTiba?></b></td>
						</tr>
						<tr>
							<td valign="bottom">- <b><?PHP echo $ke?></b></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="3" align="center"><h4><b>Jumlah Penumpang</b></h4></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><h4><b>- Dewasa</b></h4></td>
							<td style="color: red"><h4><b><?PHP echo $penumpangDewasa?></b></h4></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><h4><b>- Anak</b></h4></td>
							<td style="color: red"><h4><b><?PHP echo $penumpangAnak?></b></h4></td>
						</tr>
					</table>
				</div>
				<div class="clearfix paymentGreyContainer" style="background-color: #d9534f">
					<label class="control-label col-md-12" style="color: white">Gunakan Kode Voucher Anda Disini :</label>
					<div class="form-group">
							<form action="#" class="form-horizontal" method="POST">
							   <div class="col-md-7">
								  <input type="text" class="form-control" name="voc_code" placeholder="Masukan Kode Voucher"/>
								</div>
								<div class="col-md-5" align="center">
								  <a class="btn btn-info" id="cekvoc">Gunakan Voucher</a>
								</div>
							</form>	
					</div>
				</div>
				<div class="clearfix paymentGreyContainer">
					<table width="100%" id="view-mount">
							<tr>
								<td><h4><b>Total Pembayaran</b></h4><td>
								<td align="right"><h4><b>Rp. <?PHP echo number_format($totalStlhPenumpang,2,",",".");?></b></h4><td>
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
	<script src="../booking/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="../booking/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="../booking/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="../booking/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="../booking/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="../booking/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="../booking/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="../booking/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="../booking/js/select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="../booking/js/uniform/jquery.uniform.min.js"></script>
	<!-- WIZARD -->
	<script src="../booking/js/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<!-- WIZARD -->
	<script src="../booking/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="../booking/js/jquery-validate/additional-methods.min.js"></script>
	<!-- GRITTER -->
	<script type="text/javascript" src="../booking/js/gritter/js/jquery.gritter.min.js"></script>
	<!-- BOOTBOX -->
	<script type="text/javascript" src="../booking/js/bootbox/bootbox.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="../booking/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="../plugins/countdown/jquery.plugin.js"></script>
	<script type="text/javascript" src="../plugins/countdown/jquery.countdown.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="../booking/js/script.js"></script>
	<script type="text/javascript">
	
	
	$(function () {
		$('#defaultCountdown').countdown({until: 1200});
	});
	//TIMER CLOSE FORM
	var myVarCloseForm=setInterval(function(){loadCloseForm()},1200000);
		function loadCloseForm() {
			window.location.href='//walanja.co.id';
		}
		
		function closeWindow() {
		   window.location.href='//walanja.co.id';
		}
			$(document).ready(function(){
				$('#ceklog').bind("click", function () {
					var emailcek 	= $('input:text[name=emailcek]').val();
					var passwordcek = $('input:password[name=passwordcek]').val();
						$.ajax({
								url: '../getguest.php',
								type: 'GET',
								data: 'emailcek='+emailcek+'&passwordcek='+passwordcek,
								cache: false,
								success: function(rescek) {
									//alert(rescek);
									$('#account').html(rescek);
									
								}
							});
				});
				$('#cekvoc').bind("click", function () {
					var vocode 	= $('input:text[name=voc_code]').val();
					var totyar 	= '<?PHP echo $totalStlhPenumpang?>';
					//alert(totyar);
					$('#loadvoc').html('<img src="../images/loadvoc.gif" />').show();
					var myVarloadvoc=setInterval(function(){loadingvoc()},2000);
					function loadingvoc() {
					$.ajax({
								url: 'getvocplane.php',
								type: 'GET',
								data: 'vocode='+vocode+'&totyar='+totyar,
								cache: false,
								success: function(resvoc) {
									//alert(resvoc);
									$('#view-mount').html(resvoc);
									$('#loadvoc').html('<img src="../images/loadvoc.gif" />').hide();
									var myVarwarvoc=setInterval(function(){closewarvoc()},4000);
									function closewarvoc() {
										$('#warvoc').hide('fast');
										clearTimeout(myVarwarvoc);
									}
								}
							});
							clearTimeout(myVarloadvoc);
					}
				});
			});
	
	
	var myVarwar=setInterval(function(){closewar()},4000);
				function closewar() {
					$('#warning').hide('fast');
				}
		var FormWizard = function () {
    return {
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }
			/*-----------------------------------------------------------------------------------*/
			/*	Show country list in Uniform style
			/*-----------------------------------------------------------------------------------*/
            $("#country_select").select2({
                placeholder: "Select your country"
            });
			$("#bank").select2({
                placeholder: "Select your bank"
            });

            var wizform = $('#wizForm');
			var alert_success = $('.alert-success', wizform);
            var alert_error = $('.alert-danger', wizform);
            
			/*-----------------------------------------------------------------------------------*/
			/*	Validate the form elements
			/*-----------------------------------------------------------------------------------*/
            wizform.validate({
                doNotHideMessage: true,
				errorClass: 'error-span',
                errorElement: 'span',
                rules: {
                    /* Create Account */
					email: {
                        required: true,
                        email: true
                    },
                    password: {
                        minlength: 3,
                        required: true
                    },
                    name: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    location: {
                        required: true
                    },
                    country: {
                        required: true
                    },
					phone: {
                        required: true
                    },
					bank: {
                        required: true
                    }
					/* image: {
                        required: true
                    },
					                 
                    account_number: {
						required: true,
                        minlength: 16,
                        maxlength: 16
                    }, 
                    card_cvc: {
						required: true,
                        digits: true,
                        minlength: 3,
                        maxlength: 3
                    },
                    card_expirydate: {
                        required: true
                    },
					 card_holder_name: {
                        required: true
                    }
					*/
                },

                invalidHandler: function (event, validator) { 
                    alert_success.hide();
                    alert_error.show();
                },

                highlight: function (element) { 
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); 
                },

                unhighlight: function (element) { 
                    $(element)
                        .closest('.form-group').removeClass('has-error'); 
                },

                success: function (label) {
                    if (label.attr("for") == "gender") { 
                        label.closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); 
                    } else { 
                        label.addClass('valid') 
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); 
                    }
                }
            });

            /*-----------------------------------------------------------------------------------*/
			/*	Initialize Bootstrap Wizard
			/*-----------------------------------------------------------------------------------*/
            $('#formWizard').bootstrapWizard({
                'nextSelector': '.nextBtn',
                'previousSelector': '.prevBtn',
                onNext: function (tab, navigation, index) {
                    alert_success.hide();
                    alert_error.hide();
                    if (wizform.valid() == false) {
                        return false;
                    }
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    $('.stepHeader', $('#formWizard')).text('Tahap ' + (index + 1) + ' dari ' + total);
                    jQuery('li', $('#formWizard')).removeClass("done");
                    var li_list = navigation.find('li');
                    for (var i = 0; i < index; i++) {
                        jQuery(li_list[i]).addClass("done");
                    }
                    if (current == 1) {
                        $('#formWizard').find('.prevBtn').hide();
                       
                    } else {
                        $('#formWizard').find('.prevBtn').show();
						$('#logguest').hide();
                    }
                    if (current >= total) {
                        $('#formWizard').find('.nextBtn').hide();
                        $('#formWizard').find('.submitBtn').hide();
						
						$('#app').change(
							function () {
								if ($('#app').is(':checked')) {
									$('#formWizard').find('.submitBtn').show();
								}  
								else {
									$('#formWizard').find('.submitBtn').hide();
								}
						});
						
                    } else {
                        $('#formWizard').find('.nextBtn').show();
                        $('#formWizard').find('.submitBtn').hide();
                    }
                },
                onPrevious: function (tab, navigation, index) {
                    alert_success.hide();
                    alert_error.hide();
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    $('.stepHeader', $('#formWizard')).text('Tahap ' + (index + 1) + ' dari ' + total);
                    jQuery('li', $('#formWizard')).removeClass("done");
                    var li_list = navigation.find('li');
                    for (var i = 0; i < index; i++) {
                        jQuery(li_list[i]).addClass("done");
                    }
                    if (current == 1) {
                        $('#formWizard').find('.prevBtn').hide();
						$('#logguest').show();
                    } else {
                        $('#formWizard').find('.prevBtn').show();
                    }
                    if (current >= total) {
                        $('#formWizard').find('.nextBtn').hide();
                        $('#formWizard').find('.submitBtn').show();
                    } else {
                        $('#formWizard').find('.nextBtn').show();
                        $('#formWizard').find('.submitBtn').hide();
                    }
                },
				onTabClick: function (tab, navigation, index) {
                    bootbox.alert('silahkan melengkapi pengisian');
                    return false;
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#formWizard').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
				
				
            });
			function confirm(){	
						var notif = 'Notification!';
						var pesan = 'Pemesanan Berhasil';
						$.gritter.add({
							title: notif,
							text: pesan
						});

						return false;
				}
			function clearInput(){
				$("#wizForm :input").each( function(){
				   $(this).val(''); 
				});
			}
			
			
            $('#formWizard').find('.prevBtn').hide();
            $('#loading').hide();
            $('#formWizard .submitBtn').bind("click", function (event) {
				
				var url 			= "prosesplane.php";
				var hotel_id 		= $('input:hidden[name=hotel_id]').val();
				var check_in 		= $('input:hidden[name=check_in]').val();
				var totprice 		= $('input:hidden[name=totprice]').val();
				var plane_dewasa 	= $('input:hidden[name=plane_dewasa]').val();
				var plane_anak 		= $('input:hidden[name=plane_anak]').val();
				var plane_dari 		= $('input:hidden[name=plane_dari]').val();
				var plane_ke 		= $('input:hidden[name=plane_ke]').val();
				var plane_dest 		= $('input:hidden[name=plane_dest]').val();
				var kategory_item	= $('input:hidden[name=kategory_item]').val();
				var email 			= $('input:text[name=email]').val();
				var password 		= $('input:password[name=password]').val();
				var name 			= $('input:text[name=name]').val();
				var gender 			= $('input[type="radio"]:checked').val();
				var location 		= $('input:text[name=location]').val();
				var country 		= $('select[name=country]').val();
				var phone 			= $('input:text[name=phone]').val();
				$('.wizard-buttons').hide();
				
				$.post(url, {
						hotel_id: hotel_id,
						check_in: check_in,
						totprice: totprice,
						plane_dewasa: plane_dewasa,
						plane_anak: plane_anak,
						plane_dari: plane_dari,
						plane_ke: plane_ke,
						plane_dest: plane_dest,
						kategory_item: kategory_item,
						email: email, 
						password: password, 
						name: name, 
						gender: gender, 
						location: location, 
						country: country, 
						phone: phone
					} ,function() {
						$('#loading').show();
						var myVarload=setInterval(function(){load()},2000);
						function load() {
							alert_success.show();
							clearTimeout(myVarload);
						}
						var myVar=setInterval(function(){closeform()},4000);
						function closeform() {
							window.location.href='//walanja.co.id';
						}
					});
			}).hide();
        }
    };
}();

	
	</script>
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