<!DOCTYPE html>
<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>CMEDIA | CRM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="../../css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="../../css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="../../css/responsive.css" >
	<!-- DATE PICKER -->
	<link rel='stylesheet' type='text/css' href='../../js/datepicker/themes/default.min.css' />
	<link rel='stylesheet' type='text/css' href='../../js/datepicker/themes/default.date.min.css' />
	<link rel='stylesheet' type='text/css' href='../../js/datepicker/themes/default.time.min.css' />
	<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="../../js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="../../js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="../../js/uniform/css/uniform.default.min.css" />
	<!-- WIZARD -->
	<link rel="stylesheet" type="text/css" href="../../js/bootstrap-wizard/wizard.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<!-- JQUERY UI-->
	<link rel='stylesheet' type='text/css' href='../../js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css' />
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	 <script type="text/javascript" src="../../plugins/fancybox/lib/jquery-1.10.1.min.js"></script>
	<!-- JQUERY UI-->
	<script src="../../js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="../../bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- DATA TABLES -->
	<script type='text/javascript' src='../../js/datatables/media/js/jquery.dataTables.min.js'></script>
	<script type='text/javascript' src='../../js/datatables/media/assets/js/datatables.min.js'></script>
	<script type='text/javascript' src='../../js/datatables/extras/TableTools/media/js/TableTools.min.js'></script>
	<script type='text/javascript' src='../../js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js'></script>
		
	<!-- DATE RANGE PICKER -->
	<script src="../../js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="../../js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="../../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="../../js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="../../js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="../../js/select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="../../js/uniform/jquery.uniform.min.js"></script>
	<!-- WIZARD -->
	<script src="../../js/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<!-- WIZARD -->
	<script src="../../js/jquery-validate/jquery.validate.min.js"></script>
	<script src="../../js/jquery-validate/additional-methods.min.js"></script>
	<!-- BOOTBOX -->
	<script type="text/javascript" src="../../js/bootbox/bootbox.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="../../js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- DATE PICKER -->
	<script type='text/javascript' src='../../js/datepicker/picker.js'></script>
	<script type='text/javascript' src='../../js/datepicker/picker.date.js'></script>
	<script type='text/javascript' src='../../js/datepicker/picker.time.js'></script>
	<!-- BLOCK UI -->
	<script type='text/javascript' src='../../js/jQuery-BlockUI/jquery.blockUI.min.js'></script>
	<!-- BOOTSTRAP SWITCH -->
	
	<!-- BOOTBOX -->
	<script type='text/javascript' src='../../js/bootbox/bootbox.min.js'></script>
	
	<!-- MAGIC SUGGEST -->
	<script type='text/javascript' src='../../js/magic-suggest/magicsuggest-1.3.1-min.js'></script>
	
	<!-- DATE PICKER -->
	<script type='text/javascript' src='../../js/datepicker/picker.js'></script>
	<script type='text/javascript' src='../../js/datepicker/picker.date.js'></script>
	<script type='text/javascript' src='../../js/datepicker/picker.time.js'></script>
	
	<!-- COOKIE -->
	<script type='text/javascript' src='../../js/jQuery-Cookie/jquery.cookie.min.js'></script>
	<!-- CUSTOM SCRIPT -->
	<script src="../../js/script.js"></script>
	<script src="../../js/bootstrap-wizard/form-wizard.min.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("form");  //Set current page
			App.init(); //Initialise plugins and elements
			FormWizard.init();
		});
	</script>
	<script type='text/javascript'>
	var htmlobjek;
	$(document).ready(function(){
	  //apabila terjadi event onchange terhadap object <select id=propinsi>
	  $('#bulan').change(function(){
		var bulan = $('#bulan').val();
		var jumlah = $('#jumlah').val();
		var kontrak_id = $('#pelanggan_select').val();
		$.ajax({
			url: 'ambilkontrak.php',
			data: 'bulan='+bulan+'&jumlah='+jumlah+'&kontrak_id='+kontrak_id,
			cache: false,
			 success: function(msg){
				$('#data').html(msg);
			}
		});
	  });
	  $('#jumlah').change(function(){
		var jumlah = $('#jumlah').val();
		$.ajax({
			url: 'getPelanggan.php',
			data: 'jumlah='+jumlah,
			cache: false,
			 success: function(msg){
				$('#pelanggan').html(msg);
			}
		});
	  });
	});

	</script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage('elements');  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	
	
		<!-- /JAVASCRIPTS -->
</head>
<body>
<?php
	require ('../../../config/hotel.conn.php');
			require ('../../../library/function.convert.date.php');
			
			
$code_id = $_GET['code_id'];
	if(isset($code_id)){
		$quser 	= $conn->query("SELECT  code_safety, code_key_encrypt, code_id from authenticated where code_id= '".$code_id."'");
			$dtuser	= $quser->fetch(PDO::FETCH_ASSOC);
			$in		= date_create($dtuser['check_in']);
	$hide='readonly';
	$aksi='ubah';
	}else{
	$aksi = 'tambah';	
	}
?>
<body>
	<div class='box border red' id='formWizard'>
		<div class='box-title'>
			<h4><i class='fa fa-bars'></i>Pengguna Baru</h4>
			<div class='tools '>
				<!--<a href='#box-config' data-toggle='modal' class='config'>
					<i class='fa fa-cog'></i>
				</a>
				<a href='#' class='reload'>
					<i class='fa fa-refresh'></i>
				</a>
				<a href='#' class='collapse'>
					<i class='fa fa-chevron-up'></i>
				</a>-->
				<a href='#' class='remove'>
					<i class='fa fa-times'></i>
				</a>
			</div>
		</div>
		<div class='box-body form'>
			<form id='wizForm' class='form-horizontal' role="form" action="proses.php" method="post" target="_parent">
			<div class='wizard-form'>
				<div class='wizard-content'>			
					<div class='tab-content'>				 
						<div class='tab-pane active' id='account'>
							<div class='form-group'>
								<label class='control-label col-md-3'>Nama Pengguna<span class='required'>*</span></label>
									<div class='col-md-4'>
									<input type='text' class='form-control' name='code_safety' placeholder='nama' value='<?php echo $dtuser['code_safety']?>'/>
									<span class='error-span'></span>
								</div>
							</div>
							<div class='form-group'>
								<label class='control-label col-md-3'>Sebagai<span class='required'>*</span></label>
									 <div class='col-md-4'>
										 <select name='kar_id' class='form-control'>
										 <option value=''>-- Pilih Pengguna --</option>
										 <?php
										 $sql 	= $conn->query("SELECT * FROM  mst_karyawan");
										
										while ($dt = $sql->fetch(PDO::FETCH_ASSOC)){
											 if($dtuser['kar_id']==$dt['kar_id']){
											 ?>
											 <option value="<?php echo $dt['kar_id']?>" selected>[<?php echo $dt['kar_kode']?>] <?php echo $dt['kar_nama']?></option>
											 <?php 
											 }else{
											 ?>
											 <option value="<?php echo $dt['kar_id']?>">[<?php echo $dt['kar_kode']?>] <?php echo $dt['kar_nama']?></option>
											 <?php
											 }
										 }
										 
										 ?>
									  </select>
							   </div>
							</div>
							<div class='form-group'>
								<label class='control-label col-md-3'>Password<span class='required'>*</span></label>
									<div class='col-md-4'>
									<input type='password' class='form-control' name='code_key' placeholder='**********' value='<?php echo $dtuser['code_key'] ?>' <?php echo $hide ?> />
									<span class='error-span'></span>
								</div>
							</div>
							<div class='form-group'>
								<label class='control-label col-md-3'>Konfirmasi Password<span class='required'>*</span></label>
									<div class='col-md-4'>
									<input type='password' class='form-control' name='password_confirm' placeholder='**********' value='' <?php echo $hide ?> />
									<span class='error-span'></span>
								</div>
							</div>
								<!--<div class='form-group'>
								<label class='control-label col-md-3'>Hak Akses <?= $data[level_id]?><span class='required'>*</span></label>
									 <div class='col-md-4'>
										 <select name='level_id' class='form-control'>
										 <option value=''>-- Pilih Level --</option>
										 <?php
										  $sql = mysqli_query($conn,"SELECT * FROM users_group WHERE level_id NOT IN (1)");
										 while($dt=mysqli_fetch_array($sql)){
											 if($data['level_id']==$dt['level_id']){
											 ?>
											 <option value="<?php echo $dt['level_id']?>" selected><?php echo $dt['level_nama']?></option>
											 <?php 
											 }else{
											 ?>
											 <option value="<?php echo $dt['level_id']?>"><?php echo $dt['level_nama']?></option>
											 <?php
											 }
										 }
										 ?>
									  </select>
							   </div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="aksi" value="<?php echo $aksi?>" />
			<input type="hidden" name="code_id" value="<?php echo $code_id?>" />
			<button type='button' class='btn btn-inverse' data-dismiss='modal' onclick="javascript:parent.jQuery.fancybox.close();"><i class='fa fa-angle-left'></i> Batal</button>
			<button type="submit" class="btn btn-success tip-bottom" title=""><i class='fa fa-save'></i> Simpan</button>
			</form>
		</div>
	</div>
</body>
</html>