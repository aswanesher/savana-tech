<?PHP
	require ('config/hotel.conn.php');
	$id = (int)$_REQUEST['id'];
	$qryhot = $conn->query("SELECT a.*,b.count_name,c.prov_nama,d.kota_nama,e.wil_nama FROM m_hotel a INNER JOIN m_country b ON a.count_id = b.count_id INNER JOIN m_prov c ON a.prov_id = c.prov_id INNER JOIN m_kota d ON a.kota_id = d.kota_id INNER JOIN m_wilayah e ON a.wil_id = e.wil_id WHERE hotel_id = '".$id."'");
	$strhot = $qryhot->fetch(PDO::FETCH_ASSOC);
	
	$lat 		= $strhot['hotel_lat'];
	$lang 		= $strhot['hotel_lang'];
	$hotname 	= $strhot['hotel_nama'];
	$hotrate 	= $strhot['rate_id'];
	
	$in			= date_create($_GET['in']);
	$out		= date_create($_GET['out']);
	$tot_day	= date_diff($in,$out);
	
	if (isset($_GET['in']) && isset($_GET['out'])){
		$datein 	= $_GET['in'];
		$dateout 	= $_GET['out']; 
	}else{
		$datein 	= '';
		$dateout 	= '';
	}
	
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CMedia - Online Booking</title>
	
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/custom.css" rel="stylesheet" media="screen">

	<link href="examples/carousel/carousel.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="css/fullscreen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
    <!-- Picker UI-->	
	<link rel="stylesheet" href="assets/css/jquery-ui.css" />	
	<!-- bin/jquery.slider.min.css -->
	<link rel="stylesheet" href="plugins/jslider/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="plugins/jslider/css/jslider.round-blue.css" type="text/css">
    <!-- jQuery-->	
    <script src="assets/js/jquery.v2.0.3.js"></script>
	<script src="assets/js/jquery-ui.js"></script>	
	<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="plugins/jslider/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="plugins/jslider/js/tmpl.js"></script>
	<script type="text/javascript" src="plugins/jslider/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="plugins/jslider/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="plugins/jslider/js/jquery.slider.js"></script>
	<!-- end -->

    <!-- Custom Select -->
	<script type='text/javascript' src='assets/js/jquery.customSelect.js'></script>
	
    <!-- Custom functions -->
    <script src="assets/js/functions.js"></script>

    <!-- Nicescroll  -->	
	<script src="assets/js/jquery.nicescroll.min.js"></script>
	
    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	
    <!-- CarouFredSel -->
    <script src="assets/js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="assets/js/helper-plugins/jquery.touchSwipe.min.js"></script>
	
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.transit.min.js"></script>
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

    <!-- Counter -->	
    <script src="assets/js/counter.js"></script>	
	
    <!-- Carousel-->	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="assets/js/initialize-carousel-detailspage.js"></script>		
	
    <!-- Js Easing-->	
    <script src="assets/js/jquery.easing.js"></script>

    <!-- Bootstrap-->	
    <script src="dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	
	var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng('<?PHP echo $lat?>', '<?PHP echo $lang?>'),
        zoom: 16,
        mapTypeId: 'hybrid'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("phpsqlajax_genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
	</script>
	<style>
		.paymentGreyContainer {
			background: #f0f0f0;
			padding: 5px;
			margin-bottom: 10px;
			border-left: 3px solid #1ba0e2;
			border-bottom: 1px solid #C4C4C4;
			width: 300px;
			}
	</style>
  </head>
  <body id="top" class="thebg" onload="load()" >
    <div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="#"></a>
			<div class="left">
				<ul class="bcrumbs">
					<li>/</li>
					<li><i><a href="javascript:;" onclick="location.href='//walanja.co.id'">Home</a></i></li>
					<li>/</li>
					<li><i><?PHP echo $strhot['prov_nama']?></i></li>	
					<li>/</li>
					<li><i><?PHP echo $strhot['kota_nama']?></i></li>	
					<li>/</li>
					<li><i><?PHP echo $strhot['wil_nama']?></i></li>	
				</ul>				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			<!-- SLIDER -->
			<div class="col-md-5">
			<div id="caroufredsel_wrapper2">
						<div id="carousel">
							<?PHP
							$qrybannroom = $conn->prepare("SELECT * FROM mst_galery WHERE hotel_id = '".$id."'");
							$qrybannroom->execute();
							while ($dtbanneroom=$qrybannroom->fetchObject()){
							?>
							<img src="//agent.walanja.co.id/img/gallery/<?PHP echo $dtbanneroom->galery_image?>" alt=""/>						
							<?PHP
							}
							?>
						</div>
					</div>
			</div>
			<!-- END OF SLIDER -->			
			
			<!-- RIGHT INFO -->
			<div class="col-md-4">
				<table width="100%">
					<tr>
						<td width="60%"><h4 class="opensans dark bold margtop1 lh1"><?PHP echo $hotname?></h4></td>
					</tr>
					<tr>
						<td style="border-bottom: 2px solid grey"><i><h5><?PHP echo $strhot['hotel_address']?></h5></i></td>
					</tr>
					<tr>
						<td><b>Tempat menarik terdekat</b></td>
					</tr>
					<?PHP
						$qrytmpt	=	$conn->prepare("SELECT * FROM m_tmpt WHERE hotel_id = '".$id."'");
						$qrytmpt->execute();
						while ($dtTmpt=$qrytmpt->fetchObject()){
					?>
					<tr>
						<td><?PHP echo $dtTmpt->tmpt_nama?> (<?PHP echo $dtTmpt->tmpt_jarak?> <?PHP echo $dtTmpt->tmpt_satuan?>)</td>
					</tr>
					<?PHP
					}
					?>
					
					
					
				</table>
				
			</div>
			<div class="col-md-3">
				<table width="100%">
					<tr>
						<td><img src="images/smallrating-<?PHP echo $strhot['rate_id']?>.png" alt=""></td>
						<td align="center"><span class="opensans size30 bold grey2">4.5</span>/5<br><b>Baik</b></td>
					</tr>
					
						
					
					<tr>
						<td>
							<p><h4 class="opensans dark bold margtop1 lh1">Menu Pintas</h4></p>
							<div>
								<li class="fac_icon"> <h5><a href="#hotelDetailMap" style="text-decoration: none">Peta Hotel</a></h5></li>
								<li class="fac_icon"> <h5><a href="#hotelDetailFac" style="text-decoration: none">Fasilitas Hotel</a></h5></li>
								<li class="fac_icon"> <h5><a href="#hotelDetailKet" style="text-decoration: none">Keterangan Hotel</a></h5></li>
								<li class="fac_icon"> <h5><a href="#hotelDetailPro" style="text-decoration: none">Ketentuan Hotel</a></h5></li>
							</div>						
						</td>
					</tr>
				</table>
			</div>
			
			</div>
			<div class="col-md-5">
				<table width="100%">
					<tr>
						<td>
							<div id="pager">
									<?PHP
									$qrybannroomdet	=	$conn->prepare("SELECT * FROM mst_galery WHERE hotel_id = '".$id."'");
									$qrybannroomdet->execute();
									while ($dtbanneroomdet=$qrybannroomdet->fetchObject()){
									?>
									<img src="//agent.walanja.co.id/img/gallery/<?PHP echo $dtbanneroomdet->galery_image?>" width="120" height="68" alt=""/>
									<?PHP
									}
									?>
							</div>
							<button id="prev_btn2" class="prev2"><img src="images/spacer.png" alt=""/></button>
							<button id="next_btn2" class="next2"><img src="images/spacer.png" alt=""/></button>
						
						</td>
					</tr>
				</table>
		</div>
		
		
		<!-- UPDATE DATE -->
		<div class="container pagecontainer offset-0">
			<form action="search.php" method="POST">
			<table width="100%" id="getFormDate">
				<tr>
						
					<td align="center" width="20%" style="background-color: #FBC558"><span class="opensans size13"><b>Check in</b></span> <br> <b><?PHP echo $_GET['in']?></b></td>
					<td align="center" width="20%"style="background-color: #FBC558"><span class="opensans size13"><b>Check Out</b></span> <br> <b><?PHP echo $_GET['out']?></b></td>
					<td align="center" width="20%"style="background-color: #FBC558"><span class="opensans size13"><b>Durasi</b></span> <br> <b><?PHP echo $tot_day->format("%a")?> Malam</b></td>
					<td align="center"width="27%" style="background-color: #FBC558"><span class="opensans size13"><b>Pax</b></span> <br> <b><?PHP echo $_GET['pax']?></b></td>
					
					<td align="center"><a href="javascript:;" style="text-decoration: none" onclick="getDate(this.value)" class="bookbtn mt1b">Ganti Tanggal</a></td>
					<!--<td width="2%" style="background-color: #f0f0f0">&nbsp;</td>-->
				</tr>
			</table>
			</form>
		</div>
		<div class="container pagecontainer offset-0">
			<table width="100%">
				<tr>
					<td><h3>Pilih Kamar</h3></td>
				</tr>
				<tr>
					<td>Pilih jenis dan harga kamar yang Anda inginkan</td>
				</tr>
			</table>
		</div>
		<div class="container pagecontainer offset-0">
			<table width="100%">
				<tr>
					<td width="10%" colspan="2" align="right" style="border-bottom: 2px solid #ebebeb;"><h5 class="opensans dark bold margtop1 lh1">Tipe Kamar</h5></td>
					<td style="border-bottom: 2px solid #ebebeb;" width="10%">&nbsp;</td>
					<td style="border-bottom: 2px solid #ebebeb;" width="7%" align="center"><h5 class="opensans dark bold margtop1 lh1">Jumlah Tamu</h5></td>
					<td style="border-bottom: 2px solid #ebebeb;" width="7%" align="center"><h5 class="opensans dark bold margtop1 lh1">Jumlah</h5></td>
					<td style="border-bottom: 2px solid #ebebeb;" width="13%" align="center" colspan="2"><h5 class="opensans dark bold margtop1 lh1">Harga: Per malam total</h5></td>
				</tr>
				<?PHP
				$qryroom 	= "SELECT * FROM m_room WHERE hotel_id = '".$id."' ORDER BY room_price ASC";
				$stmt_room 	= $conn->prepare( $qryroom );
				$stmt_room->execute();
				$num_fac 	= $stmt_room->rowCount();
				while ($row_room = $stmt_room->fetch(PDO::FETCH_ASSOC)){
				extract($row_room);
				if($room_disc > 0){
				$disc = 100 - $room_disc;
				$totStlhDisc = $disc / 100 * $room_price;
				}else{
				$totStlhDisc = $room_price;
				}
				?>
				<form action="search.php" method="POST" target="_blank">
				<tr>
					<td style="border-left: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;"><img src="images/room-images/<?PHP echo $room_image?>" width="100%" alt=""/></td>
					<td style="border-bottom: 2px solid #ebebeb;">&nbsp;</td>
					<td style="border-bottom: 2px solid #ebebeb;"><h4 class="opensans dark bold margtop1 lh1"><br><br><?PHP echo $room_type?></h4><br>
						<?PHP
						if ($flag_breakfast == 1){
						?>
						<ul class="hotelpreferences">
							<li class="icohp-breakfast" alt="Free Breakfast"></li>
						</ul>
						<?PHP
						}
						?>
					<br> <h5><a href="javascript:;" id="showInfo<?PHP echo $room_id?>" style="color: #ff9900;text-decoration: none;"><b>Info Kamar Ini</b> <img src="images/turn-around.png"/></a></h5></td>
					<td style="border-bottom: 2px solid #ebebeb;" align="center"><h5 class="opensans dark bold margtop1 lh1"><?PHP echo $room_jml_org?> Orang</h5></td>
					<td style="border-bottom: 2px solid #ebebeb;" align="center">
						<select name="noroom" style="width: 50%" onchange="slcRoom(this.value)" >
							<option selected >1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td style="border-bottom: 2px solid #ebebeb;" id="getPrice">
					<span class="green size15"><b>Rp. <?PHP echo number_format($room_price,2,",",".");?></b></span><br>
					<h5><a href="javascript:;" id="#">Harga Termasuk Pajak !</a></h5></td>
					<td style="border-bottom: 2px solid #ebebeb;border-right: 2px solid #ebebeb;" align="center">
					<input type="hidden" name="menu" value="book"/>
					<input type="hidden" name="id" value="<?PHP echo $_GET['id']?>"/>
					<input type="hidden" name="room_price" value="<?PHP echo $room_price?>"/>
					<input type="hidden" name="in" value="<?PHP echo $_GET['in']?>"/>
					<input type="hidden" name="out" value="<?PHP echo $_GET['out']?>"/>
					<input type="hidden" name="pax" value="<?PHP echo $_GET['pax']?>"/>
					<input type="hidden" name="type" value="<?PHP echo $room_type?>"/>
					<?PHP
					//VALIDATION FORM
					if ($datein != '' && $dateout != ''){
					?>
					<button class="bookbtn mt1b">Pesan Kamar</button>
					<?PHP
					}else{
					?>
					<button href="javascript:;" onclick="alert('Silahkan Lengkapi Tanggal Pemesanan !!!')" class="bookbtn mt1b">Pesan Kamar</button>
					<?PHP
					}
					?>
					</td>
				</tr>
				</form>
				
				<tr id="info<?PHP echo $room_id?>">
					<td style="border-left: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;background-color: #f0f0f0;vertical-align:top;" colspan="2">
					<h3>Tipe kamar</h3><br>
					<?PHP echo $room_tipe_kamar?>
					</td>
					<td style="border-bottom: 2px solid #ebebeb;background-color: #f0f0f0;vertical-align:top;" colspan="2">
					<h3>Informasi Penting</h3><br>
					<?PHP echo $room_info_penting?>
					</td>
					<td style="border-bottom: 2px solid #ebebeb;background-color: #f0f0f0;vertical-align:top;" colspan="2">
					<h3>Biaya tambahan</h3><br>
					<?PHP echo $room_biaya_tambah?>
					</td>
					<td style="border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;background-color: #f0f0f0">&nbsp;</td>
				</tr>
				<?PHP
				}
				?>
				
			</table>
		</div>
		<div id="hotelDetailMap"></div>
		<div id="hotelDetailFac"></div>
		<div class="container pagecontainer offset-0">
			<table width="100%">
					<tr>
						<td width="2%">&nbsp;</td>
						<td width="30%"><h4 class="opensans dark bold margtop1 lh1">Hotel ini di peta</h4></td>
						<td><h4 class="opensans dark bold margtop1 lh1">Fasilitas Hotel</h4></td>
						<td>&nbsp;</td>
					</tr>
				</table>
		</div>
		<div class="container pagecontainer offset-0">
			<div class="col-md-4">
				<div id="map" style="width: 300px; height: 300px"></div>
				<div class="clearfix paymentGreyContainer">Area: Bandung</div>
				<br>
				<div class="clearfix paymentGreyContainer">
				<br>
				<h4 class="opensans dark bold margtop1 lh1">Data hotel ini</h4>
				<br>
				<table width="100%">
					<tr>
						<td width="40%"><b>Negara</b></td>
						<td>:</td>
						<td><?PHP echo $strhot['count_name']?></td>
					</tr>
					<tr>
						<td><b>Provinsi</b></td>
						<td>:</td>
						<td><?PHP echo $strhot['prov_nama']?></td>
					</tr>
					<tr>
						<td><b>Kota</b></td>
						<td>:</td>
						<td><?PHP echo $strhot['kota_nama']?></td>
					</tr>
					<tr>
						<td><b>Area</b></td>
						<td>:</td>
						<td><?PHP echo $strhot['hotel_area']?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><b>Check-in</b></td>
						<td>:</td>
						<td><?PHP echo $_GET['in']?></td>
					</tr>
					<tr>
						<td><b>Check-out</b></td>
						<td>:</td>
						<td><?PHP echo $_GET['out']?></td>
					</tr>
					<tr>
						<td><b>Jml Ruangan</b></td>
						<td>:</td>
						<td><?PHP echo $strhot['hotel_jml_kamar']?></td>
					</tr>
					<tr>
						<td><b>Jml Lantai</b></td>
						<td>:</td>
						<td><?PHP echo $strhot['hotel_jml_lantai']?></td>
					</tr>
				</table>
				
				</div>
			</div>
			<?PHP
				$qryFac 	= "SELECT b.ame_nama FROM m_room_detail a INNER JOIN m_amenities b ON a.ame_id = b.ame_id WHERE a.hotel_id = '".$id."'";
				$stmtFac 	= $conn->prepare( $qryFac );
				$stmtFac->execute();
				while ($rowFac = $stmtFac->fetch(PDO::FETCH_ASSOC)){
				extract($rowFac);
			?>
			<div class="col-md-3">
				<div class="hpadding23">
					<div class="col-md-12">
						<ul class="checklist">
							<li><?PHP echo $ame_nama?></li>
						</ul>
					</div>											
				</div>
			</div>
			<?PHP
			}
			?>
			<div class="col-md-8" id="hotelDetailKet">
				<table width="100%">
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><h4>Deskripsi hotel</h4></td>
					</tr>
					<?PHP
						$qryHotDesk 	= "SELECT * FROM m_hotel_desk WHERE hotel_id = '".$id."'";
						$stmtHotDesk 	= $conn->prepare( $qryHotDesk );
						$stmtHotDesk->execute();
						while ($rowHotDesk = $stmtHotDesk->fetch(PDO::FETCH_ASSOC)){
						extract($rowHotDesk);
					?>
					<tr>
						<td><h5><b><?PHP echo $desk_judul?><b></h5></td>
					</tr>
					<tr>
						<td><?PHP echo $desk_konten?></td>
					</tr>
					<?PHP
					}
					?>
					<tr id="hotelDetailPro">
						<td><h4>Kebijakan hotel</h4></td>
					</tr>
					<?PHP
						$qryHotKeb 	= "SELECT * FROM m_hotel_kebijakan WHERE hotel_id = '".$id."'";
						$stmtHotKeb 	= $conn->prepare( $qryHotKeb );
						$stmtHotKeb->execute();
						while ($rowHotKeb = $stmtHotKeb->fetch(PDO::FETCH_ASSOC)){
						extract($rowHotKeb);
					?>
					<tr>
						<td><h5><b><?PHP echo $keb_judul?><b></h5></td>
					</tr>
					<tr>
						<td><?PHP echo $keb_konten?></td>
					</tr>
					<?PHP
					}
					?>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="center" style="background-color: #ff9900"><a href="#top" style="color: white;text-decoration: none;"><h5><b>Pesan Sekarang!<b></h5></a></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><i><b>Disclaimer:</b></i> Adalah tanggung jawab hotel untuk memastikan akurasi foto hotel. walanja.co.id tidak bertanggung jawab atas ketidak-akuratan foto hotel. Harga kamar yang ditampilkan adalah untuk tamu dewasa. Anak-anak mungkin akan dianggap sebagai tamu dewasa dan dikenakan biaya penuh kecuali jika tertera sebaliknya. Harga kamar belum termasuk sarapan dan sarapan akan dikenakan biaya oleh hotel kecuali jika tertera sebaliknya.</td>
					</tr>
				</table>
			</div>
			
		</div>
		
		
	</div>
	
	<!-- FOOTER -->
		<div class="footerbgb2 lcfix">
		
			<div class="container">		
				
				<div class="col-md-3">
					<span class="ftitle">Find Us</span>
					<div class="scont">
						<a href="http://facebook.com/walanja14" class="social1b"><img src="images/icon-facebook.png" alt=""/></a>
						<a href="https://twitter.com/walanjabandung" class="social2b"><img src="images/icon-twitter.png" alt=""/></a>
						<a href="#" class="social3b"><img src="images/icon-gplus.png" alt=""/></a>
						<a href="#" class="social4b"><img src="images/icon-youtube.png" alt=""/></a>
						<br/><br/><br/>
						<img src="images/logosmal.png" alt="" /><br/>
						&copy; 2015  |  <a href="//cmedia.co.id" target="_blank">CMedia Developers</a><br/>
						All Rights Reserved 
						<br/><br/>	
					</div>
				</div>
				<!-- End of column 1-->
				
				<div class="col-md-3">
					<span class="ftitle">Pencarian Hotel</span>
					<br/><br/>
					<ul class="footerlist">
						<?PHP
							$qrybannroom	=	$conn->prepare("SELECT * FROM m_wilayah");
							$qrybannroom->execute();
							while ($dtbanneroom=$qrybannroom->fetchObject()){
						?>
						<li><a href="javascript:;" onclick="location.href='index.php?menu=home&wil=<?PHP echo $dtbanneroom->wil_nama?>'"><?PHP echo $dtbanneroom->wil_nama?></a></li>
						<?PHP
						}
						?>
					</ul>
				</div>
				<!-- End of column 2-->		
				
				<div class="col-md-3">
					<span class="ftitle">Tentang Walanja</span>
					<br/><br/>
					<ul class="footerlist">
						<li><a href="javascript:;" onclick="location.href='index.php?menu=tutor'">Cara Pemesanan</a></li>
						<li><a href="javascript:;" onclick="location.href='index.php?menu=faq'">FAQ</a></li>
					</ul>				
				</div>
				<!-- End of column 3-->		
				
				<div class="col-md-3 grey">
					
					<span class="ftitle">Customer support</span><br/>
					<span class="pnr">022-9291-4001</span><br/>
					sales@walanja.co.id	</div>			
				<!-- End of column 4-->			
			</div>	
		</div>

	
	
	</div>
  </body>
</html>
<script type="text/javascript">
/*
	function slcRoom(str){
		var roomPrice = $('input:hidden[name=room_price]').val();
		alert(roomPrice)
		
		$.ajax({
		
			type:'GET',
			url:'getPriceRoom.php',
			data: 'str=' + str,
			success: function(resfill){
				$('#getPrice').html(resfill);
			}
		
		});
		
	}
*/
	function getDate(str){
		var id 			= '<?PHP echo $_GET['id']?>';
		var checkIn 	= '<?PHP echo $_GET['in']?>';
		var checkOut 	= '<?PHP echo $_GET['out']?>';
		var pax 		= '<?PHP echo $_GET['pax']?>';
		var fill 		= 'getDate';
		$.ajax({
		
			type:'GET',
			url:'getschedule.php',
			data: 'fill=' + fill + '&id=' + id + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
			success: function(resfill){
				$('#getFormDate').html(resfill);
			}
		
		});
	
	}

</script>

<script type="text/javascript">
<?PHP
	$qryroom 	= "SELECT * FROM m_room WHERE hotel_id = '".$id."'";
	$stmt_room 	= $conn->prepare( $qryroom );
	$stmt_room->execute();
	$num_fac 	= $stmt_room->rowCount();
	while ($row_room = $stmt_room->fetch(PDO::FETCH_ASSOC)){
	extract($row_room);
?>
	$('#info<?PHP echo $room_id?>').hide();
<?PHP
}
?>
<?PHP
	$qryroom 	= "SELECT * FROM m_room WHERE hotel_id = '".$id."'";
	$stmt_room 	= $conn->prepare( $qryroom );
	$stmt_room->execute();
	$num_fac 	= $stmt_room->rowCount();
	while ($row_room = $stmt_room->fetch(PDO::FETCH_ASSOC)){
	extract($row_room);
?>
	$( "#showInfo<?PHP echo $room_id?>" ).bind("click", function(event) {
		$('#info<?PHP echo $room_id?>').toggle();
	});
<?PHP
}
?>
</script>
<?PHP
	$strhot->closeCursor();
?>