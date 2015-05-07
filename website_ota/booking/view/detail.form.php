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
			$code = $_GET['id'];
			$qrydetailbook 	= $conn->query("SELECT a.*,TIME(a.date_input) as 
			 jam_pesan,b.rent_merk,b.rent_type,a.rent_jam,c.room_price,a.rent_jml_penumpang,a.rent_tujuan,a.rent_permintaan,a.hrg_hari_ini,b.hotel_nama,b.hotel_avg,c.room_type FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id LEFT JOIN m_room c ON a.room_id = c.room_id WHERE a.book_kode_encrypt = '".$code."'");
			$datadetailbook	= $qrydetailbook->fetch(PDO::FETCH_ASSOC);
			$in		= date_create($datadetailbook['check_in']);
			$out	= date_create($datadetailbook['check_out']);
			$tot_day= date_diff($in,$out);
			
			$dayHarga = 0;
			$harga='';
			$dtharga = 0;
			  $jum = 0;
			  
			  $q = $conn->query("SELECT * FROM kalender_harga WHERE cal_bulan = month(curdate()) and cal_tahun= year(curdate())  and room_id=".$datadetailbook['room_id']."");
			
			  $dtharga = $q->fetch(PDO::FETCH_ASSOC);
				
				$harga=explode("," ,$dtharga['cal_harga']);
			
			$jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
			
			$tgl= $jumlah_hari[$dtharga['cal_bulan'] - 1];  
			
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

		
						if($datadetailbook['kategory_item'] == 25437857){
							$pesanName = 'Hotel';
						}else if($datadetailbook['kategory_item'] == 25437858){
							$pesanName = 'Mobil';
						}else if($datadetailbook['kategory_item'] == 25437859){
							$pesanName = 'Tiket Wisata';
						}else if($datadetailbook['kategory_item'] == 25437860){
							$pesanName = 'Restoran';
						}
			
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
				<a href ='#' ><i class='fa fa-times' data-dismiss='modal' onclick="javascript:parent.jQuery.fancybox.close();"></i> </a>
			</div>
		</div>
		
	<br><br>
									<div class="col-md-6">
										<div class="box">
											<div class="box-title">
												<h4>Kode Pemesanan : <?PHP echo $datadetailbook['book_kode']?></h4>
												
											</div>
											<div class="box-body big">
											<h3 class="form-title">Detail Pemesanan <?PHP echo $datadetailbook['name']?></h3>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Nama Pesanan</label>
													<div class="col-sm-9">
													  <label class="form-control">Pemesanan <?PHP echo $pesanName?></label>
													</div>
												  </div>
											<?PHP
												if($datadetailbook['kategory_item'] == 25437857){
													require('detail_hotel.php');
												}else if($datadetailbook['kategory_item'] == 25437858){
													require('detail_rental.php');
												}else if($datadetailbook['kategory_item'] == 25437859){
													require('detail_wisata.php');
												}else if($datadetailbook['kategory_item'] == 25437860){
													require('detail_resto.php');
												}
											?>
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