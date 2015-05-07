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
			$qrydatahot 	= $conn->query("SELECT * FROM m_hotel WHERE hotel_id = ".$_GET['id']."");
			$datahot		= $qrydatahot->fetch(PDO::FETCH_ASSOC);
	?>
<br>
<div class="row">
	<div class="col-md-6">
		<table width="100%">
			<tr>
				<td><h4><b><?PHP echo $datahot['hotel_nama']?></b></h4></td>
			</tr>
			<tr>
				<td>Detail Informasi Hotel</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="20%">Kategori Info</td>
				<td width="25%">
					<select class="form-control" id="slcInfo">
						<option value="">-- Pilih Kategori Info --</option>
						<option value="desk">Deskripsi Hotel</option>
						<option value="keb">Kebijakan Hotel</option>
						<option value="tmpt">Tempat Menarik Terdekat</option>
					</select>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<div id="showTmpt">
		<form action="#" id="formTmpt" method="POST">
		<table width="100%">
			<tr>
				<td width="20%">Nama Tempat</td>
				<td width="30%"><input type="text" name="tmpt_nama" class="form-control"/></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="20%">Jarak</td>
				<td width="30%">
				<div class="col-xs-5"><input type="text" class="form-control" name="tmpt_jarak"></div>
				<div class="col-xs-7">
				<select class="form-control" name="tmpt_satuan">
					<option value="M">Meter</option>
					<option value="KM">KM</option>
				</select>
				</div>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><a href="javascript:;" id="addTmpt" class="btn btn-success">Tambah</a></td>
				<td>&nbsp;</td>
			</tr>
		</table>
		</form>
		<br>
		<table width="100%" id="dataTmpt" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
			<tr>
				<td width="2%">#</td>
				<td width="20%">Nama Tempat</td>
				<td>Jarak</td>
				<td>Option</td>
			</tr>
			<?PHP
				require ('../../config/hotel.conn.php');
				$qryhotel 	= "SELECT * FROM m_tmpt WHERE hotel_id = '".$_GET['id']."' ORDER BY tmpt_id DESC";
				$stmthotel 	= $conn->prepare( $qryhotel );
				$stmthotel->execute();
				$i=0;
				while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
				extract($rowhotel);
				$i++;
				?>
			<tr>
				<td><?PHP echo $i?></td>
				<td><?PHP echo $tmpt_nama?></td>
				<td><?PHP echo $tmpt_jarak?> (<i><?PHP echo $tmpt_satuan?></i>)</td>
				<td><a href="javascript:;" onclick="location.href='posthoteldesk.php?act=tmpt&point=hapus&idtmpt=<?PHP echo $tmpt_id?>&hotel_id=<?PHP echo $_GET['id']?>'" id="" class="delRowDesk"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a></td>
			</tr>
			<?PHP
			}
			?>
		</table>
		</div>
		<div id="showDesk">
		<form action="#" id="formDesk" method="POST">
		<table width="100%">
			<tr>
				<td width="20%">Judul</td>
				<td width="30%"><input type="text" name="desk_judul" class="form-control"/></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="20%">Konten</td>
				<td width="30%"><textarea type="text" name="desk_konten" class="form-control"></textarea></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><a href="javascript:;" id="addDesk" class="btn btn-success">Tambah</a></td>
				<td>&nbsp;</td>
			</tr>
		</table>
		</form>
		<br>
		<table width="100%" id="dataDesk" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
			<tr>
				<td width="2%">#</td>
				<td width="20%">Judul</td>
				<td>Konten</td>
				<td>Option</td>
			</tr>
			<?PHP
				require ('../../config/hotel.conn.php');
				$qryhotel 	= "SELECT * FROM m_hotel_desk WHERE hotel_id = '".$_GET['id']."' ORDER BY desk_hotel_id DESC";
				$stmthotel 	= $conn->prepare( $qryhotel );
				$stmthotel->execute();
				$i=0;
				while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
				extract($rowhotel);
				$i++;
				?>
			<tr>
				<td><?PHP echo $i?></td>
				<td><?PHP echo $desk_judul?></td>
				<td><?PHP echo $desk_konten?></td>
				<td><a href="javascript:;" onclick="location.href='posthoteldesk.php?act=desk&point=hapus&iddesk=<?PHP echo $desk_hotel_id?>&hotel_id=<?PHP echo $_GET['id']?>'" id="" class="delRowDesk"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a></td>
			</tr>
			<?PHP
			}
			?>
		</table>
		</div>
		
		<div id="showKeb">
		<form action="#" id="formKeb" method="POST">
		<table width="100%">
			<tr>
				<td width="20%">Judul</td>
				<td width="30%"><input type="text" name="keb_judul" class="form-control"/></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="20%">Konten</td>
				<td width="30%"><textarea type="text" name="keb_konten" class="form-control"></textarea></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><a href="javascript:;" id="addKeb" class="btn btn-success">Tambah</a></td>
				<td>&nbsp;</td>
			</tr>
		</table>
		</form>
		<br>
		<table width="100%" id="dataKeb" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
			<tr>
				<td width="2%">#</td>
				<td width="20%">Judul</td>
				<td>Konten</td>
				<td>Option</td>
			</tr>
			<?PHP
				require ('../../config/hotel.conn.php');
				$qryhotel 	= "SELECT * FROM m_hotel_kebijakan WHERE hotel_id = '".$_GET['id']."' ORDER BY keb_hotel_id DESC";
				$stmthotel 	= $conn->prepare( $qryhotel );
				$stmthotel->execute();
				$i=0;
				while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
				extract($rowhotel);
				$i++;
				?>
			<tr>
				<td><?PHP echo $i?></td>
				<td><?PHP echo $keb_judul?></td>
				<td><?PHP echo $keb_konten?></td>
				<td><a href="javascript:;" onclick="location.href='posthoteldesk.php?act=keb&point=hapus&idkeb=<?PHP echo $keb_hotel_id?>&hotel_id=<?PHP echo $_GET['id']?>'" id="" class="delRowKeb"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a></td>
			</tr>
			<?PHP
			}
			?>
		</table>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Selesai</a>
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
		function clearInput(){
				$("#formDesk :input").each( function(){
				   $(this).val(''); 
				});
		}
		function clearInputKeb(){
				$("#formKeb :input").each( function(){
				   $(this).val(''); 
				});
		}
		function clearInputTmpt(){
				$("#formTmpt :input").each( function(){
				   $(this).val(''); 
				});
		}
		
		
		$('#showTmpt').hide();
		$('#showDesk').hide();
		$('#showKeb').hide();
		$("#slcInfo").change(function() {
			var selectedValue = this.value;
			//jika yang di select desk
			if (selectedValue == 'desk'){
			$('#showTmpt').hide();
			$('#showKeb').hide();
			$('#showDesk').show();
			$('#addDesk').bind("click", function (event) {
				var idhotel		= '<?PHP echo $_GET['id']?>';
				var judul 		= $('input:text[name=desk_judul]').val();
				var konten	 	= $('textarea[name=desk_konten]').val();
				var url			= 'posthoteldesk.php';
				if (judul != '' && konten != ''){
					$.post(url, {
						idhotel: idhotel, 
						judul: judul, 
						konten: konten,
						act: selectedValue,
						point: 'tambah'
					} ,function() {
						clearInput();
						$.ajax({
							url: 'loaddesk.php',
							type: 'GET',
							data: 'id='+idhotel,
							cache: false,
							success: function(resTblDesk) {
								$('#dataDesk').html(resTblDesk);
							}
						});
				});
				}else{
					alert('Lengkapi Form Inputan !!!');
				}
			});
			//jika yang di select kebijakan
			}else if (selectedValue == 'keb'){
				$('#showTmpt').hide();
				$('#showDesk').hide();
				$('#showKeb').show();
				
				$('#addKeb').bind("click", function (event) {
				var idhotel		= '<?PHP echo $_GET['id']?>';
				var judul 		= $('input:text[name=keb_judul]').val();
				var konten	 	= $('textarea[name=keb_konten]').val();
				var url			= 'posthoteldesk.php';
				if (judul != '' && konten != ''){
					$.post(url, {
						idhotel: idhotel, 
						judul: judul, 
						konten: konten,
						act: selectedValue,
						point: 'tambah'
					} ,function() {
						clearInputKeb();
						$.ajax({
							url: 'loadkeb.php',
							type: 'GET',
							data: 'id='+idhotel,
							cache: false,
							success: function(resTblDesk) {
								$('#dataKeb').html(resTblDesk);
							}
						});
				});
				}else{
					alert('Lengkapi Form Inputan !!!');
				}
			});
				
			}else if (selectedValue == 'tmpt'){
				$('#showTmpt').show();
				$('#showDesk').hide();
				$('#showKeb').hide();
				$('#addTmpt').bind("click", function (event) {
				var idhotel		= '<?PHP echo $_GET['id']?>';
				var nama 		= $('input:text[name=tmpt_nama]').val();
				var jarak 		= $('input:text[name=tmpt_jarak]').val();
				var satuan	 	= $('select[name=tmpt_satuan]').val();
				var url			= 'posthoteldesk.php';
				if (nama != '' && jarak != '' && satuan != ''){
					$.post(url, {
						idhotel: idhotel, 
						nama: nama, 
						jarak: jarak,
						satuan: satuan,
						act: selectedValue,
						point: 'tambah'
					} ,function() {
						clearInputTmpt();
						$.ajax({
							url: 'loadtmpt.php',
							type: 'GET',
							data: 'id='+idhotel,
							cache: false,
							success: function(resTblDesk) {
								$('#dataTmpt').html(resTblDesk);
							}
						});
					});
				}else{
					alert('Lengkapi Form Inputan !!!');
				}
			});
			}else if (selectedValue == ''){
				$('#showTmpt').hide();
				$('#showDesk').hide();
				$('#showKeb').hide();
			}
			
		});
		jQuery(document).ready(function() {		
			App.setPage("forms");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>