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
			$qrydatahot 	= $conn->query("SELECT a.`name`,a.email,b.book_detail_id,b.atas_nama,b.asal_bank,b.tgl_transfer FROM guest_book a INNER JOIN guest_book_detail b ON a.book_id = b.book_id WHERE a.book_id = '".$_GET['id']."'");
			$datahot		= $qrydatahot->fetch(PDO::FETCH_ASSOC);
	?>
<br>
								<div class="col-md-6">
										<div class="box">
											<div class="box-title">
												<h4>Nama Tamu : <?PHP echo $datahot['name']?></h4>
												
											</div>
											<form action="../proses/addmess.proses.php" method="POST" target="_parent">
											<input type="hidden" name="name" value="<?PHP echo $datahot['name']?>"/>
											<input type="hidden" name="email" value="<?PHP echo $datahot['email']?>"/>
											<div class="box-body big">
												  <div class="form-group">
													<label class="col-sm-3 control-label">Jenis Pesan</label>
													<div class="col-sm-4">
													  <select name="jenis_pesan" id="mes" class="form-control">
														<option value="">-- Pilih Jenis Pesan --</option>
														<option value="approval">Email Persetujuan</option>
														<option value="cancel">Email Pembatalan</option>
													  </select>
													</div>
												  </div>
												  <br>
												  <br>
												  <br>
												  <br>
												  <div id="showtype">
												  <div class="form-group">
													<label class="col-sm-3 control-label">Judul</label>
													<div class="col-sm-6">
														 <input type="text" name="title" class="form-control" disabled />
													</div>
												</div>
												<br>
												<br>
												<div class="form-group">
													<label class="col-sm-3 control-label">Isi Pesan</label>
													<div class="col-sm-12">
														<textarea type="text" name="content" style="height: 150px" class="form-control" disabled></textarea>
													</div>
												</div>
												<br><br><br><br><br><br><br><br><br><br>
												<div class="separator"></div>
																							  
													 <div class="form-group">
														<div class="col-sm-offset-2 col-sm-10">
															<a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Batal</a>
														</div>
													</div>
												  </div>
											</div>
											</form>
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
	<script type="text/javascript">
	$(document).ready(function() {

		$( "#mes" ).change(function() {
				var detid = '<?PHP echo $datahot['book_detail_id']?>';
				var type = $("#mes option:selected").val();
				//alert(detid);
				$.ajax({
					url: 'getmessage.php',
					type: 'GET',
					data: 'type='+type+'&detid='+detid,
					cache: false,
					success: function(rescek) {
						//alert(rescek);
						$('#showtype').html(rescek);				
					}
				});
		  });
		
	});
	</script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("forms");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>