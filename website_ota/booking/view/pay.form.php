<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Cloud Admin | Forms</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="../css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="../css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="../css/responsive.css" >
	<!-- FONTS -->
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- TYPEAHEAD -->
	<link rel="stylesheet" type="text/css" href="../js/typeahead/typeahead.css" />
	<!-- FILE UPLOAD -->
	<link rel="stylesheet" type="text/css" href="../js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="../js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="../js/uniform/css/uniform.default.min.css" />
	<!-- JQUERY UPLOAD -->
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="../js/blueimp/gallery/blueimp-gallery.min.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="../js/jquery-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="../../js/jquery-upload/css/jquery.fileupload-ui.css">
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
		<?PHP
			require ('../../config/hotel.conn.php');
			require ('../../library/function.convert.date.php');
			$code = $_GET['id'];
			$qrypay 	= $conn->query("SELECT a.book_id,a.`name`,b.bank_tujuan,b.asal_bank,b.atas_nama,b.tgl_transfer,b.jml_transfer,b.upload,a.total_stlh_disc,a.totprice,c.voc_nilai FROM guest_book a INNER JOIN guest_book_detail b ON a.book_id = b.book_id LEFT JOIN m_voucher c ON a.xcode_voc = c.voc_code_encrypt WHERE a.book_kode_encrypt = '".$code."'");
			$datapay	= $qrypay->fetch(PDO::FETCH_ASSOC);
			
		?>
		<div class='box border red' id='formWizard'>	
		
		
		<div class='box-title'>
			<button class='btn btn-primary' onclick="window.print();">Cetak</button>
			<div class='tools'>
				<!--<a href='#box-config' data-toggle='modal' class='config'>
					<i class='fa fa-cog'></i>
				</a>
				<a href='#' class='reload'>
					<i class='fa fa-refresh'></i>
				</a>
				<a href='#' class='collapse'>
					<i class='fa fa-chevron-up'></i>
				</a>-->
				<a href='#' ><i class='fa fa-times' data-dismiss='modal' onclick="javascript:parent.jQuery.fancybox.close();"></i> </a>
			</div>
		</div>
		
	<br><br>
								<?PHP 
											if ($datapay['book_id'] != ''){
											?>
									<div class="col-md-6">
										<div class="box">
											<div class="box-title">
												<h4>Bukti Pembayaran Nama Pemesan : <?PHP echo $datapay['name']?></h4>
												
											</div>
											<div class="box-body big">
												  <div class="form-group">
													<label class="col-sm-3 control-label">Bank Tujuan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datapay['bank_tujuan']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Asal Bank</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datapay['asal_bank']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Atas Nama</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datapay['atas_nama']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl transfer</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datapay['tgl_transfer'])?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Total Bayar</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right">Rp. <?PHP echo number_format($datapay['total_stlh_disc'],2,",",".")?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Disc</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right">Rp. <?PHP echo number_format($datapay['voc_nilai'],2,",",".")?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Jml yg harus dibayar</label>
													<div class="col-sm-9">

													  <label class="form-control" align="right">Rp. <?PHP echo number_format($datapay['total_stlh_disc'],2,",",".")?></label>
													</div>
												  </div>
												   <div class="form-group">
													<label class="col-sm-3 control-label">Jml Transfer</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right">Rp. <?PHP echo number_format($datapay['jml_transfer'],2,",",".")?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Deposit</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right" style="background-color: pink">Rp. <?PHP echo number_format($datapay['jml_transfer'] - $datapay['total_stlh_disc'],2,",",".")?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Bukti Transfer</label>
													<div class="col-sm-9">
													  <img style="width: 513px;" src="../../images/attachment/<?PHP echo $datapay['upload']?>" />
													</div>
												  </div>
											</div>
											
										</div>
									</div>
								<?PHP
									}else{
								?>	
									<!-- PAGE -->
									<section id="page">
										<div class="container">
											<div class="row">
												<div class="col-md-12">
													<div class="divide-100"></div>
												</div>
											</div>
											<div class="row">
												
												<div class="col-md-4 col-md-offset-4 not-found text-center">
												   <div class="content">
												   <center>
													  <h3>Isi Halaman Tidak Dapat Ditampilkan</h3>
													  <p>
														 Belum ada pembayaran.
													  </p>
													 </center>
												   </div>
												</div>
											</div>
										</div>
									</section>
									<!--/PAGE -->
								<?PHP	
									}
								?>
						</div>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("forms");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
	
	
</body>
</html>