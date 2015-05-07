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
</head>
<body>
		<?PHP
			require ('../../config/hotel.conn.php');
			require ('../../library/function.convert.date.php');
			$qrydetailbook 	= $conn->query("SELECT a.total_pesanan, a.rinci_nomor, b.total_deposit, b.kar_nama FROM trs_kebutuhan a INNER JOIN mst_karyawan b ON a.kar_id = b.kar_id WHERE a.rinci_id = '".$_GET['id']."' LIMIT 0,1");
			$datadetailbook	= $qrydetailbook->fetch(PDO::FETCH_ASSOC);
			
			
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
				<a href='#'> <i class='fa fa-times' data-dismiss='modal' onclick="javascript:parent.jQuery.fancybox.close();"></i> </a>
			</div>
		</div>
		
	<br><br>
									<div class="col-md-6">
										<div class="box">
											<div class="box-title">
											</div>
											<div class="box-body big">
											<h3 class="form-title">Informasi Transaksi Agent</h3>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Nama Agent</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['kar_nama']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Kode Pemesanan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['rinci_nomor']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Nilai Deposit Saat Ini</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right">Rp. <?PHP echo number_format($datadetailbook['total_deposit'],2,",",".")?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Nilai Total Pemesanan</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right">Rp. <?PHP echo number_format($datadetailbook['total_pesanan'],2,",",".")?></label>
													</div>
												  </div>
											</div>
										</div>
									</div>
	
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