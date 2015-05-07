<?PHP
	session_start();
	$_SESSION["hotel_id"] = $_GET['id'];
?>
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
?>
<br>
								<div class="row">
									<div class="col-md-6">
										<!-- BASIC -->
										<div class="box">
											<div class="box-title">
												<h4>Tambah Fasilitas Hotel</h4>
											</div>
											<div class="box-body big">
												
												<form class="form-horizontal" action="#" method="POST" role="form">
												  
												  <div id="select"></div>
												  
												  <div class="form-group">
												  <div class="col-sm-2 control-label">
												  <input type="hidden" name="id" value="<?PHP echo $_GET['id']?>">
												  <a href="#" id="add" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
												  </div>
												  </div>
												  </form>
												  
												  <div class="separator"></div>
													<div class="col-sm-5">
													<div id="message" class="alert alert-block alert-success fade in">Berhasil ditambahkan</div>
													<div id="result" align="center"></div>
													</div>
													<div id="list_fac"></div>
												  
												  <div class="separator"></div>
												  
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Keluar</a>
													  <a class="btn btn-pink" onclick="javascript:parent.jQuery.fancybox.close();">Selesai</a>
													</div>
												  </div>
												

											</div>
										</div>
								</div>
							</div>
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
	
		$('#message').hide();
		
		var slc = "selectfac.load.php";
		$("#select").load(slc);
		
		var main = "fac.load.php";
		$("#list_fac").load(main);
		$("#add").bind("click", function(event) {
			var url 	= "fac.post.php";
			var fac_id 	= $('select[name=fac_id]').val();
			var ame_id 	= $('select[name=ame_id]').val();
			var id = $('input:hidden[name=id]').val();
			var action 	= 'tambah';
			//alert(id);
			if (fac_id != '' || ame_id != '' && id != ''){
				$.post(url, {fac_id: fac_id, ame_id: ame_id, id: id, act: action} ,function() {
					$('#message').show();
					var myVaralertclose=setInterval(function(){alertclose()},2000);
						function alertclose() {
						$('#message').hide();
						$("#select").load(slc);
						$("#list_fac").load(main);
						clearTimeout(myVaralertclose);
						}
					
				});
			}else{
				alert("Pilihan Tidak Boleh Kosong!!!");
			}
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