<!-- Bootstrap -->
    <link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/custom.css" rel="stylesheet" media="screen">
    <!-- Carousel -->
	<link href="examples/carousel/carousel.css" rel="stylesheet">
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
  
    <!-- jQuery -->
	<script src="//code.jquery.com/jquery-1.10.2.js" defer="defer"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" defer="defer"></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js" defer="defer"></script>
	<script src="http://richhollis.github.com/vticker/downloads/jquery.vticker.js?v=1.15" defer="defer"></script>
    <script src="assets/js/jquery.v2.0.3.js" defer="defer"></script>
    <!-- Custom Select -->
	<script type='text/javascript' src='assets/js/jquery.customSelect.js' defer="defer"></script>
    <!-- Custom Select -->
	<script type='text/javascript' src='js/lightbox.js' defer="defer"></script>	
    <!-- Picker UI-->	
	<script defer="defer" src="assets/js/jquery-ui.js"></script>		
	<!-- Easing -->
    <script src="assets/js/jquery.easing.js" defer="defer"></script>
    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js" defer="defer"></script>
   <!-- Nicescroll  -->	
	<script src="assets/js/jquery.nicescroll.min.js" defer="defer"></script>
	<!--<link rel="stylesheet" href="plugins/sliderfade/bjqs.css" type="text/css" />-->
    <!-- CarouFredSel -->
    <script src="assets/js/jquery.carouFredSel-6.2.1-packed.js" defer="defer"></script>
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js" defer="defer"></script>
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.transit.min.js" defer="defer"></script>
	<script type="text/javascript" src="assets/js/jquery.vticker.js" defer="defer"></script>
    <!-- Custom Select -->
	<script type='text/javascript' src='assets/js/jquery.customSelect.js' defer="defer"></script>
	<script type="text/javascript" src="plugins/sliderfade/js/bjqs-1.3.min.js"></script>
	
<?PHP
	require ('config/hotel.conn.php');
	if(isset($_GET['wil']) && $_GET['wil'] != ''){
		$wilayah = $_GET['wil'];
	}else{
		$wilayah = '';
	}
?>
	
<!--
	#################################
		- THEMEPUNCH BANNER -
	#################################
	-->
	<?PHP
		if(isset($_GET['wil']) && $_GET['wil'] != ''){
	?>
		<div id="dajy" class="fullscreen-container mtslide sliderbg fixed">
			<div class="fullscreenbanner">
				<ul>

					<!-- papercut fade turnoff flyin slideright slideleft slideup slidedown-->
				
					<!-- FADE -->
					<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
						<img src="images/bandung.jpg" alt="" />
						<div class="tp-caption scrolleffect sft" color="orange"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo"  >
						</div>	
					</li>
				</ul>
				<div class="tp-bannertimer none"></div>
			</div>
		</div>
		
		<?PHP
		}else{
		?>
	<div id="dajy" class="fullscreen-container mtslide sliderbg fixed">
			<div class="fullscreenbanner">
				<ul>

					<!-- papercut fade turnoff flyin slideright slideleft slideup slidedown-->
				
					<!-- FADE -->
					<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
						<img src="images/banner.jpg" alt="" />
						<div class="tp-caption scrolleffect sft" color="orange"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo"  >
						</div>	
					</li>
				
					<!-- FADE -->
					<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
						<img src="images/slider/harris.jpg" alt=""/>
						<div class="tp-caption scrolleffect sft"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo"  >
							 <div class="sboxpurple textcenter">
								<span class="lato size28 slim caps white">Harris</span><br/><br/><br/>
								<span class="lato size100 slim caps white">hotel</span><br/>
								<span class="lato size20 normal caps white">from</span><br/><br/>
								<span class="lato size48 slim uppercase yellow">Rp.572.755</span><br/>
							 </div>
						</div>	
					</li>

					<!-- FADE -->
					<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
						<img src="images/banner2.jpg" alt=""/>
						<div class="tp-caption scrolleffect sft"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo"  >
						</div>	
					</li>	

					<!-- FADE -->
					<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
						
						<img src="images/slider/park.jpg" alt=""/>
						<div class="tp-caption scrolleffect sft"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo"  >
							 <div class="sboxpurple textcenter">
								<span class="lato size28 slim caps white">Park</span><br/><br/><br/>
								<span class="lato size100 slim caps white">hotel</span><br/>
								<span class="lato size20 normal caps white">from</span><br/><br/>
								<span class="lato size48 slim uppercase yellow">Rp.539.669</span><br/>
							 </div>
						</div>	
					</li>	

				</ul>
				<div class="tp-bannertimer none"></div>
			</div>
		</div>
		<?PHP
		}
		?>
	<!-- / WRAP -->
	<div class="wrap bgfix cstyle03">
		<div class="container mt-200 z-index100">		
		  <?PHP
			if(isset($_GET['wil']) && $_GET['wil'] != ''){
			$qryhot = $conn->query("SELECT COUNT(a.hotel_id) AS jumlah FROM m_hotel a INNER JOIN m_wilayah b ON a.wil_id = b.wil_id WHERE b.wil_nama = '".$_GET['wil']."' AND a.kode_kategory = '25437857'");
			$strhot = $qryhot->fetch(PDO::FETCH_ASSOC);
		  ?>
		  <div class="row">
			<div class="col-md-12">
				<div style="margin-top: -240px">
					<div>
						<div style="color: white;font-size: 60px">Kota Bandung</div>
						<div style="color: white">Wilayah <?PHP echo $_GET['wil']?> <?PHP echo $strhot['jumlah']?> Hotel Yang Tersedia</div>
					</div>		
				</div>
			</div>
		  </div>
		  <?PHP
		  }
		  ?>
		  <div class="row">
			<div class="col-md-12">
				<div class="bs-example bs-example-tabs cstyle04">
				
					<ul class="nav nav-tabs" id="myTab">
						<li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" data-target="#hotel" href="javascript:;"><span class="hotel"></span> Hotel Penginapan</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" data-target="#car" href="javascript:;"><span class="car"></span> Rental Mobil</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" data-target="#vacations" href="javascript:;"><span class="suitcase"></span> Obyek Wisata</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" data-target="#kuliner" href="javascript:;"><span class="culinary"></span> Kuliner</a></li>
					</ul>
					
					<div class="tab-content" id="myTabContent">
					
						<div id="hotel" class="tab-pane fade active in">
							<form action="search.php" method="post">
							<table width="100%">
								<tr>
									<td width="5%" align="center"><h2></h2></td>
									<td width="50%" ><b>1. Tujuan Menginap</b><br><font style="font-size: 14px">Area Tujuan, atau nama hotel </font><br>
									<input type="text" name="tags" id="tags" onkeyup="descsearch()" class="form-control" value="<?PHP echo $wilayah?>" id="" placeholder="Ketik nama daerah atau nama hotel">
									<ul style="position: absolute;background-color: orange;width: 528px;border-radius: 10px;color:white;list-style-type: none;" id="desc_list_id"></ul>
									</td>
									<td width="2%" style="border-right: 3px solid #FF9600;" align="center"></td>
									<td rowspan="2" width="5%" align="center"><h2></h2></td>
									<td rowspan="2">
									
										<table>
											<tr>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td><b>3. Cari Hotel</b><br>
												
													<input type="hidden" name="menu" value="list"/>
													<button id="search" href="javascript:;" class="btn-search2">Cari Hotel</button>
												
												</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
											</tr>
										</table>
										
									
									</td>
								</tr>
								<tr>
									<td width="5%" align="center"><h2></h2></td>
									<td><br><b>2. Waktu Menginap</b><br>
									
									<table width="100%">
										
										<tr>
										
											<td style="font-size: 14px">Check-in: <br><input type="text" name="in" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/></td>
											
											<td style="font-size: 14px">Check-out: <br><input type="text" name="out" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy"/></td>
											
											<td style="font-size: 14px">Dewasa: <br>
											
												<select class="form-control mySelectBoxClass" name="adult">
												  <option value="1">1</option>
												  <option value="2" selected>2</option>
												  <option value="3">3</option>
												  <option value="4">4</option>
												  <option value="5">5</option>
												</select>
											
											</td>
											
											<td style="font-size: 14px">Anak: <br>
											
												<select class="form-control mySelectBoxClass" name="child">
												  <option value="0" selected>0</option>
												  <option value="1" >1</option>
												  <option value="2">2</option>
												  <option value="3">3</option>
												</select>
											
											</td>
										
										</tr>
									
									</table>
									
									</td>
								</tr>
							</table>
							</form>
						</div>
					
						<div id="kuliner" style="height: 283px;" class="tab-pane fade">

							<form action="searckul.php" method="post">
							<table width="100%">
								<tr>
									<td width="3%" align="center"><h2>1</h2></td>
									<td width="20%"><b>Tujuan Kuliner</b></td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="3%" align="center"><h2>2</h2></td>
									<td width="20%"><b>Waktu Kunjungan</b></td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="3%" align="center"><h2>3</h2></td>
									<td width="20%"><b>Cari Tempat Kuliner</b></td>
								</tr>
								<tr>
									<td width="20%" colspan="2" Kota, nama makanan :</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">Tgl Kunjungan :</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">Jumlah Pengunjung :</td>
								</tr>
								<tr>
									<td width="20%" colspan="2" valign="top">
									<input type="text" name="kul_kota" class="form-control" id="">
									</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2" valign="top">
										<input type="text" name="kul_tanggal_berangkat" class="form-control mySelectCalendar" id="datepicker8">
									</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">
										<table>
											<tr>
												<td>
													<b>Dewasa</b>
												</td>
												<td>
													<b>Anak</b>
												</td>
											</tr>
											<tr>
												<td>
													<select class="form-control" style="width: 70px" name="kul_dewasa">
															  <option value="1" selected>1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
															  <option value="6">6</option>
															  <option value="7">7</option>
															  <option value="8">8</option>
													</select>
												</td>
												<td>
													<select class="form-control" style="width: 70px" name="kul_anak">
															  <option value="0" selected>0</option>
															  <option value="1">1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
															  <option value="6">6</option>
															  <option value="7">7</option>
															  <option value="8">8</option>
													</select>
												</td>
											</tr>
										</table><br>
										<input type="hidden" name="menu" value="list"/>
										<button id="search" href="javascript:;" class="btn-search">Cari Tempat Kuliner</button>
									</td>
								</tr>
							</table>
							</form>
						</div>
						<!--End of 1st tab -->
						
						
						<!--End of 2nd tab -->
						
						<div id="car" style="height: 283px;" class="tab-pane fade">

							<form action="searcar.php" method="post">
							<table width="100%">
								<tr>
									<td width="2%" align="left"><h2>1</h2></td>
									<td width="20%" align="left"><b>Tujuan Perjalanan</b></td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%" align="left"><h2></h2></td>
									<td width="2%" align="left"><h2>2</h2></td>
									<td width="12%"align="left"><b style="margin-left: -162px;">Waktu Perjalanan</b></td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="2%" align="left"><h2>3</h2></td>
									<td width="20%"align="left"><b>Cari Kendaraan</b></td>
								</tr>
								<tr>	
									<td width="20%" colspan="2">Kota Tujuan :</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="15%">Tanggal Berangkat</td>
									<td width="15%" style="margin-left:5px;">Tanggal Kembali</td
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">Jumlah Penumpang :</td>
								</tr>
								<tr>
									<td width="20%" colspan="2">
									<input type="text" name="rent_kota" class="form-control" id="">
									</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">
										<table>
											<tr>
												<td>
													<input type="text" name="rent_tanggal_berangkat" class="form-control mySelectCalendar" id="datepicker5">
												</td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td>
													<input type="text" name="rent_tanggal_kembali" class="form-control mySelectCalendar" id="datepicker6">
												</td>
											</tr>
										</table>
									</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">
										<table width="100%">
											<tr>
												<td width="30%">
													<select class="form-control" style="width: 70px" name="rent_penumpang">
															  <option value="1" selected>1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
															  <option value="6">6</option>
															  <option value="7">7</option>
															  <option value="8">8</option>
													</select>
												</td>
											</tr>
										</table>
										
									</td>
								</tr>
								<tr>
									<td width="20%" colspan="2" align="center">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="4">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2" align="left">
										<input type="hidden" name="menu" value="list"/>
										<button id="search" href="javascript:;" class="btn-search">Cari Mobil</button>
									</td>
								</tr>
							</table>
							</form>
						
						</div>
						<!--End of 3rd tab -->
						
						<div id="vacations" style="height: 283px;" class="tab-pane fade">

							<form action="searcobj.php" method="post">
							<table width="100%">
								<tr>
									<td width="3%" align="center"><h2>1</h2></td>
									<td width="20%"><b>Tujuan Wisata</b></td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="3%" align="center"><h2>2</h2></td>
									<td width="20%"><b>Waktu Perjalanan</b></td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="3%" align="center"><h2>3</h2></td>
									<td width="20%"><b>Cari Tempat Wisata</b></td>
								</tr>
								<tr>
									<td width="20%" colspan="2">Kota, nama tempat wisata Tujuan :</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">Tgl Berangkat :</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">Jumlah Wisatawan :</td>
								</tr>
								<tr>
									<td width="20%" colspan="2" valign="top">
									<input type="text" name="obj_kota" class="form-control" id="">
									</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2" valign="top">
										<input type="text" name="obj_tanggal_berangkat" class="form-control mySelectCalendar" id="datepicker7">
									</td>
									<td width="2%" style="border-right: 3px solid orange;">&nbsp;</td>
									<td width="2%">&nbsp;</td>
									<td width="20%" colspan="2">
										<table>
											<tr>
												<td>
													<b>Dewasa</b>
												</td>
												<td>
													<b>Anak</b>
												</td>
											</tr>
											<tr>
												<td>
													<select class="form-control" style="width: 70px" name="obj_dewasa">
															  <option value="1" selected>1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
															  <option value="6">6</option>
															  <option value="7">7</option>
															  <option value="8">8</option>
													</select>
												</td>
												<td>
													<select class="form-control" style="width: 70px" name="obj_anak">
															  <option value="0" selected>0</option>
															  <option value="1">1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
															  <option value="6">6</option>
															  <option value="7">7</option>
															  <option value="8">8</option>
													</select>
												</td>
											</tr>
										</table><br>
										<input type="hidden" name="menu" value="list"/>
										<button id="search" href="javascript:;" class="btn-search">Cari Tempat Wisata</button>
									</td>
								</tr>
							</table>
							</form>
						</div>
					</div>
						
				</div>
			</div>
		  </div>
		</div>
		
		<div class="container cstyle07">
		
			<!-- Carousel -->
				<div class="wrapper">
					<div class="list_carousel" >
						<ul id="foo">
						<?PHP
							$qryPart = $conn->prepare("SELECT * FROM m_partner");
							$qryPart->execute();
							while ($dtpart = $qryPart->fetchObject()){
						?>
							<li style="width: 353px;margin-left: 13px;">
								<div class="col-md-4" style="width: 361px;">
								<div class="box_1 center">
									<a href="javascript:;" target="_blank" onclick="window.open('http://walanja.co.id/index.php?menu=details&<?PHP echo $dtpart->partner_link?>')">
									<img src="images/iconspace/<?PHP echo $dtpart->partner_image?>" alt=""/>
									</a>
								</div>
										<!--<p class="lato bold caps">Sistem Pelayanan Prima</p>-->
										<p style="font-size: 13px;text-align: center;margin-top: -45px;line-height: 17px;" align="center"><?PHP echo $dtpart->partner_desk?></p>
								</div>
							</li>
						<?PHP
							}
						?>
						</ul>
					</div>
				</div>
		
		<div class="divider15">&nbsp;</div>
			<div class="col-md-12" style="min-height: 84px; background-color: #FFA500; padding-top: 10px;">
				<div class="col-md-4">
					<div class="box_1 center">
							<p class="lato bold caps" style="color: #fff;">Info Promo Terbaik Dari Walanja.co.id</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box_1 center">
							<p style="font-size: 14px; text-align:center;">Daftarkan email Anda untuk info voucher, PROMO hotel dan semua diskon spesial Walanja.co.id!</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box_1 center">
							<span class="ftitle">Masukan Email Anda</span>
								<div class="relative">
									<input type="email" class="form-control fccustom" id="exampleInputEmail1" placeholder="Ketik email">
									<button type="submit" class="btn btn-default btncustom">Submit<img src="images/arrow.png" alt=""/></button>
								</div>
					</div>
				</div>
			</div>
			
					<div class="col-md-4">
						<div class="socialWidgetBox">
							<div class="socialWidgetTitle">
							  <a href="https://twitter.com/walanjacoid" title="walanjacoid di Twitter"><div class="tvContactIcon tvContactTwitterIcon"></div>walanjacoid</a>
							</div>
						   <a class="twitter-timeline" href="https://twitter.com/walanjacoid" data-widget-id="533180830760189952">Tweets by @walanjacoid</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						  </div>
						  <div class="socialWidgetBox">
					<div class="socialWidgetTitle">
					  <a href="https://facebook.com/walanjacoid" title="walanjacoid di Facebook"><div class="tvContactIcon2 tvContactFacebookIcon"></div>walanjacoid</a>
					</div>
						<iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/walanjacoid?fref=ts&amp;width=270&amp;colorscheme=light&amp;show_faces=true&amp;border_color=white&amp;stream=false&amp;header=false&amp;height=320" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:160px;"></iframe>
					</div>
						  
					</div>
					<div class="col-md-8">
						<div id="banner-fade">
							<ul class="bjqs" style="border-radius: 10px">
							  <li><a href="javascript:;" onclick="location.href='#'"><img src="images/hotelpartner/popbana.jpg"/></a></li>
							  <li><a href="javascript:;" onclick="location.href='#'"><img src="images/hotelpartner/popbanb.jpg"/></a></li>
							  <li><a href="javascript:;" onclick="location.href='#'"><img src="images/hotelpartner/harrisban.jpg"/></a></li>
							</ul>
						</div>
					</div>
					
				
		
				  
			<div class="col-md-11" style=" margin-left: 4.5%;">
					<center><h3 style="color: orange;">Kenapa mencari Hotel di Walanja.co.id <img src="images/iconspace/why.png" alt=""/></h3></center>
			</div>			
			  <div class="col-md-3">
				<div class="boxshadow center" style="background-color: orange;height: 350px;">
					<br>
					<img src="images/iconspace/sslsecure.png" alt=""/>		
					<div class="bscontainer">
						<p class="lato bold caps">Jaminan Aman Transaksi Online</p>
						
						<p style="font-size: 12px" align="center">Walanja selalu mementingkan keamanan transaksi Anda.Meggunakan teknologi SSL dari RapidSSL dengan Sertifikat yang terotentikasi Semua transaksi melalui Walanja.co.id dijamin 100% aman. Konfirmasi instan dan pemesanan dikirim ke email Anda.</p>
					</div>
				</div>
			  </div>
			  
			  <div class="col-md-3">
				<div class="boxshadow center" style="background-color: #f4b757;height: 350px">
					<br>
					<img src="images/iconspace/search.png" alt=""/>		
					<div class="bscontainer">
						<p class="lato bold caps">Hasil Pencarian Terlengkap</p>
						
						<p style="font-size: 12px" align="center">Sistem pencarian yang kami bangun akan membantu mempermudah Anda dalam membandingkan dan memilih hotel ataupun travel agent yang Anda inginkan.  </p>
					</div>
				</div>
			  </div>
			  
			  <div class="col-md-3">
				<div class="boxshadow center" style="background-color: orange;height: 350px">
					<br>
					<img src="images/iconspace/money.png" alt=""/>		
					<div class="bscontainer">
						<p class="lato bold caps">Harga Sudah Termasuk Pajak</p>
						
						<p style="font-size: 12px" align="center">Harga hotel yang ditampilkan sudah termasuk pajak.</p>
					</div>
				</div>
			  </div>
			  
			  <div class="col-md-3">
				<div class="boxshadow center" style="background-color: #f4b757;height: 350px;">
					<br>
					<img src="images/iconspace/payment.png" alt=""/>		
					<div class="bscontainer">
						<p class="lato bold caps">Berbagai Pilihan Pembayaran</p>
						
						<p style="font-size: 12px" align="center">Sistem pembayaran yang fleksibel seperti transfer ATM, Kartu Kredit ataupun Internet Banking tentunya akan lebih efisien dan mempermudah Anda dalam melakukan pembayaran.</p>
					</div>
				</div>
			  </div><br><br>
			  <div class="col-md-11" style=" margin-left: 4.5%;">
					<center><h5 style="color: #ffff;"><i> Untuk tampilan yang optimal silakan gunakan browser Google Chrome dan Mozila Firefox dari Laptop atau PC Anda.</i></h5>
					</center>
			</div>
			
		<!-- FOOTER -->

				
	</div>		
<!--<center><h3 style="color:red;text-decoration: underline;"><b>DEMO SITE</b></h3></center>	-->
	<div class="footerbg lcfix">			
				
				
				<div class="col-md-3">
					<span class="ftitle2">Find Us</span></br>
					<div class="scont3">
						<a href="http://facebook.com/walanjacoid" class="social1b"><img src="images/icon-facebook.png" alt=""/></a>
						<a href="https://twitter.com/walanjacoid" class="social2b"><img src="images/icon-twitter.png" alt=""/></a>
						<a href="#" class="social3b"><img src="images/icon-gplus.png" alt=""/></a>
						<a href="#" class="social4b"><img src="images/icon-youtube.png" alt=""/></a>
						<br/><br/>
						<!--<img src="images/logosmal.png" alt="" /><br/>-->
						&copy; 2015  |  <a href="//cmedia.co.id" target="_blank">CMedia Developers</a><br/>
						All Rights Reserved <br/><br/>	
						<img src="https://knowledge.rapidssl.com/library/VERISIGN/ALL_OTHER/Frank/RapidSSL_SEAL-90x50.gif" alt="RapidSSL Site Seal" border="0" />
						<br/><br/>	
					</div>
				</div>
				<!-- End of column 1-->
				
				<div class="col-md-3">
					<span class="ftitle2">Pencarian Hotel</span>
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
					<span class="ftitle2">Tentang Walanja</span>
					<br/><br/>
					<ul class="footerlist">
						<li><a href="javascript:;" onclick="location.href='index.php?menu=tutor'">Cara Pemesanan</a></li>
						<li><a href="javascript:;" onclick="location.href='index.php?menu=faq'">FAQ</a></li>
					</ul>				
				</div>
				<!-- End of column 3-->		
				
				<div class="col-md-3 grey">
					
					<span class="ftitle2">Customer support</span><br/><br/>
					<span class="pnr">022-9291-4001</span><br/>
					<span class="pnr2">sales@walanja.co.id</span>
				</div>			
				<!-- End of column 4-->			
			</div>	
	</div>
	<script type="text/javascript">
	function descsearch(){
		var min_length = 0; // min caracters to display the autocomplete
		var keyword = $('#tags').val();
		if (keyword.length != '') {
			$.ajax({
				url: 'getdesc.php',
				type: 'POST',
				data: {keyword:keyword},
				success:function(data){
					$('#desc_list_id').show();
					$('#desc_list_id').html(data);
				}
			});
		} else {
			$('#desc_list_id').hide();
		}
	}
	
	function set_item(item) {
			// change input value
			$('#tags').val(item);
			// hide proposition list
			$('#desc_list_id').hide();
		}
	
	jQuery(document).ready(function($) {

			jQuery("#foo").carouFredSel({
				width: "100%",
				height: 240,
				items: {
					visible: 5,
					minimum: 1,
					start: 2
				},
				scroll: {
					items: 1,
					easing: "easeInOutQuad",
					duration: 500,
					pauseOnHover: true
				},
				auto: true,
				prev: {
					button: "#prev_btn",
					key: "left"
				},
				next: {
					button: "#next_btn",
					key: "right"
				},				
				swipe: true
			});
			
          $('#banner-fade').bjqs({
            height      : 545,
            width       : 730,
			
			
			
            // transition valuess
            animtype        : 'slide',
            animduration    : 250,      // length of transition
            animspeed       : 10000,     // delay between transitions
            automatic       : true,     // enable/disable automatic slide rotation

            // control and marker configuration
            showcontrols    : false,     // enable/disable next + previous UI elements
            centercontrols  : false,     // vertically center controls
            nexttext        : 'Next',   // text/html inside next UI element
            prevtext        : 'Prev',   // text/html inside previous UI element
            showmarkers     : false,     // enable/disable individual slide UI markers
            centermarkers   : false,     // horizontally center markers

            // interaction values
            keyboardnav     : false,     // enable/disable keyboard navigation
            hoverpause      : false,     // enable/disable pause slides on hover

            // presentational options
            usecaptions     : false,     // enable/disable captions using img title attribute
            randomstart     : false,     // start from a random slide
            responsive      : false,     // enable responsive behaviour
          });

        });
	
	
	$(document).ready(function(){
		$('#search').bind("click", function () {
					var tags 	= $('input:text[name=tags]').val();
					var cekin 	= $('input:text[name=in]').val();
					var cekout 	= $('input:text[name=out]').val();
					var adult 	= Number($('select[name=adult]').val());
					var child 	= Number($('select[name=child]').val());
					var pax 	= adult + child;
					$('#loadsearch').html('<img src="images/loadvoc.gif" />').show();
					var myVarloadsrc=setInterval(function(){loadingsrc()},2000);
					function loadingsrc() {
						$('#loadsearch').html('<img src="images/loadvoc.gif" />').hide();
							
						$.ajax({
								url: 'getsearch.php',
								type: 'GET',
								data: 'tags='+tags+'&cekin='+cekin+'&cekout='+cekout+'&pax='+pax,
								cache: false,
								success: function(rescek) {
									//alert(rescek);
									$('#space').hide();
									$('#showsearch').html(rescek);
									
								}
							});
						clearTimeout(myVarloadsrc);
						
					}
		});
		
	});
	
	
	
		// fungsi autocomplete
		function autocomplete(){
			$( ".auto" ).autocomplete({
			 source: "search2.php", 
			   minLength:2,
			});
			
			// hapus inputan data 
			$(".hapus").click(function(){
				$(this).parent().parent().remove();
			});
		}
		$(function(){
			// fungsi autocomplete default
			$( ".auto_com" ).autocomplete({
			 source: "search2.php", 	
			   minLength:2,
			});
			
			// fungsi untuk menambahkan inputan data
			$("#tambah").click(function(){
				row = '<tr><td></td><td><input type="text" name="pejabat[]" class="auto" /></td>'+
				'<td><button class="hapus">Hapus</button></td></tr>';
				$(row).insertBefore("#last");
				autocomplete();
			});
		});
    
	</script>
	