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
	<link rel="stylesheet" href="../js/jquery-upload/css/jquery.fileupload-ui.css">
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<?PHP
			require ('../../config/hotel.conn.php');
			$qrydatahot 	= $conn->query("SELECT * FROM m_room WHERE room_id = ".$_GET['id']."");
			$datahot		= $qrydatahot->fetch(PDO::FETCH_ASSOC);
	?>
<br>
								<div class="row">
									<div class="col-md-6">
										<!-- BASIC -->
										<div class="box">
											<div class="box-title">
												<h4>Perbaharui Hotel</h4>
											</div>
											<div class="box-body big">
												
												<form class="form-horizontal" action="../proses/addroom.proses.php" method="POST" target="_parent" role="form" enctype="multipart/form-data">
												 <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Nama Ruangan</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" id="inputEmail3" value="<?PHP echo $datahot['room_type']?>" name="room_type">
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Persediaan</label>
													<div class="col-sm-1">
													  <input type="text" class="form-control" id="inputPassword3" value="<?PHP echo $datahot['room_avaibility']?>" name="room_avaibility"/>Ruangan
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Jml Tamu</label>
													<div class="col-sm-1">
													  <input type="text" class="form-control" id="inputPassword3" value="<?PHP echo $datahot['room_jml_org']?>" name="room_jml_org"/>Orang
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Harga (Rp)</label>
													<div class="col-sm-3">
													  <input type="text" class="form-control" style="text-align: right" id="inputPassword3" value="<?PHP echo $datahot['room_price']?>" name="room_price"/>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Discount (%)</label>
													<div class="col-sm-2">
													  <input type="text" class="form-control" id="inputPassword3" value="<?PHP echo $datahot['room_disc']?>" name="room_disc"/>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Free Breakfast</label>
													<div class="col-sm-2">
													  <input type="checkbox" id="inputPassword3" name="flag_breakfast" <?PHP echo $c = $datahot['flag_breakfast']==1?'checked':'';?> value="1"/>
													</div>
												  </div>
												  <h4>Detail Informasi Ruangan</h4>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Tipe Kamar</label>
													<div class="col-sm-5">
													  <textarea class="form-control" id="inputPassword3" name="room_tipe_kamar"><?PHP echo $datahot['room_tipe_kamar']?></textarea>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Info Penting</label>
													<div class="col-sm-5">
													  <textarea class="form-control" id="inputPassword3" name="room_info_penting"><?PHP echo $datahot['room_info_penting']?></textarea>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Biaya Tambahan</label>
													<div class="col-sm-5">
													  <textarea class="form-control" id="inputPassword3" name="room_biaya_tambah"><?PHP echo $datahot['room_biaya_tambah']?></textarea>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
													<div class="col-sm-5">
													  <input type="file" class="file-input" id="inputEmail3" value="room_image" name="room_image">
													</div>
												  </div>
												  
												  <div class="separator"></div>
												  
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <input type="hidden" name="act" value="edit"/>
													  <input type="hidden" name="id" value="<?PHP echo $datahot['room_id']?>"/>
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
	<!-- TYPEHEAD -->
	<script type="text/javascript" src="../js/typeahead/typeahead.min.js"></script>
	<!-- AUTOSIZE -->
	<script type="text/javascript" src="../js/autosize/jquery.autosize.min.js"></script>
	<!-- COUNTABLE -->
	<script type="text/javascript" src="../js/countable/jquery.simplyCountable.min.js"></script>
	<!-- INPUT MASK -->
	<script type="text/javascript" src="../js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<!-- FILE UPLOAD -->
	<script type="text/javascript" src="../js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="../js/select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="../js/uniform/jquery.uniform.min.js"></script>
	<!-- JQUERY UPLOAD -->
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="../js/blueimp/javascript-template/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="../js/blueimp/javascript-loadimg/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="../js/blueimp/javascript-canvas-to-blob/canvas-to-blob.min.js"></script>
	<!-- blueimp Gallery script -->
	<script src="../js/blueimp/gallery/jquery.blueimp-gallery.min.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="../js/jquery-upload/js/jquery.fileupload.min.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="../js/jquery-upload/js/jquery.fileupload-process.min.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="../js/jquery-upload/js/jquery.fileupload-image.min.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="../js/jquery-upload/js/jquery.fileupload-audio.min.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="../js/jquery-upload/js/jquery.fileupload-video.min.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="../js/jquery-upload/js/jquery.fileupload-validate.min.js"></script>
	<!-- The File Upload user interface plugin -->
	<script src="../js/jquery-upload/js/jquery.fileupload-ui.min.js"></script>
	<!-- The main application script -->
	<script src="../js/jquery-upload/js/main.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="../js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="../js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("forms");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>