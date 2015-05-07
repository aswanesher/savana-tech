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
	<!-- JQUERY UI-->
	<link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- BOOTSTRAP SWITCH -->
	<link rel="stylesheet" type="text/css" href="../js/bootstrap-switch/bootstrap-switch.min.css" />
	<!-- HUBSPOT MESSENGER -->
	<link rel="stylesheet" type="text/css" href="../js/hubspot-messenger/css/messenger.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/hubspot-messenger/css/messenger-spinner.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/hubspot-messenger/css/messenger-theme-air.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/hubspot-messenger/css/messenger-theme-block.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/hubspot-messenger/css/messenger-theme-flat.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/hubspot-messenger/css/messenger-theme-future.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/hubspot-messenger/css/messenger-theme-ice.min.css" />
	<!-- MAGIC SUGGEST -->
	<link rel="stylesheet" type="text/css" href="../js/magic-suggest/magicsuggest-1.3.1-min.css" />
	<!-- DATE PICKER -->
	<link rel="stylesheet" type="text/css" href="../js/datepicker/themes/default.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/datepicker/themes/default.date.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/datepicker/themes/default.time.min.css" />
	<!-- COLOR PICKER -->
	<link rel="stylesheet" type="text/css" href="../js/colorpicker/css/colorpicker.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
<br>
								<div class="row">
									<div class="col-md-6">
										<!-- BASIC -->
										<div class="box">
											<div class="box-title">
												<h4>Tambah Voucher</h4>
											</div>
											<div class="box-body big">
												
												<form class="form-horizontal" action="../proses/addvoc.proses.php" method="POST" target="_parent" role="form" enctype="multipart/form-data">
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Kode Voucher</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" id="inputEmail3" name="voc_code">
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Nilai Voucher</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" style="text-align: right" id="inputEmail3" name="voc_nilai">
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Masa Berlaku Voucher</label>
													<div class="col-sm-5">
													  <input class="form-control datepicker" type="text" name="voc_exp" size="10" id="dp1414379872872">
													</div>
												  </div>
												  <div class="separator"></div>
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <input type="hidden" name="act" value="tambah"/>
													  <a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Keluar</a>
													  <button class="btn btn-pink">Simpan</button>
													</div>
												  </div>
												</form>

											</div>
										</div>
								</div>
							</div>
										<!-- /BASIC -->
	
	
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="../js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="../js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="../bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="../js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="../js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="../js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="../js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- BOOTSTRAP SWITCH -->
	<script type="text/javascript" src="../js/bootstrap-switch/bootstrap-switch.min.js"></script>
	<!-- BOOTBOX -->
	<script type="text/javascript" src="../js/bootbox/bootbox.min.js"></script>
	<!-- HUBSPOT MESSENGER -->
	<script type="text/javascript" src="../js/hubspot-messenger/js/messenger.min.js"></script>
	<script type="text/javascript" src="../js/hubspot-messenger/js/messenger-theme-flat.js"></script>
	<script type="text/javascript" src="../js/hubspot-messenger/js/messenger-theme-future.js"></script>
	<!-- MAGIC SUGGEST -->
	<script type="text/javascript" src="../js/magic-suggest/magicsuggest-1.3.1-min.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="../js/timeago/jquery.timeago.min.js"></script>
	<!-- DATE PICKER -->
	<script type="text/javascript" src="../js/datepicker/picker.js"></script>
	<script type="text/javascript" src="../js/datepicker/picker.date.js"></script>
	<script type="text/javascript" src="../js/datepicker/picker.time.js"></script>
	<!-- COLOR PICKER -->
	<script type="text/javascript" src="../js/colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<!-- RATY -->
	<script type="text/javascript" src="../js/jquery-raty/jquery.raty.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="../js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="../js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("elements");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>