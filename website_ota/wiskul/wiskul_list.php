<?PHP
	require ('config/hotel.conn.php');
	require_once ('library/function.cracked.php');
	require_once ('library/function.convert.date.php');
	date_default_timezone_set("Asia/Jakarta");
	//session_start();
	//UNCRACKED SPEC
	if(isset($_GET['spec'])){
		$tujuanPerjalanan	= crackedSpec($_GET['spec'],0);
		$tglBerangkat 		= crackedSpec($_GET['spec'],1);
		$jumlahOrang	 	= crackedSpec($_GET['spec'],2);
		$kodeKategory 		= crackedSpec($_GET['spec'],3);
	}else{
		header("location: index.php?menu=home");
	}
	
	
	
	
?>
<!DOCTYPE html>

<html>
  <head>
		<style>
			.offset-2 {
				padding-left: 15px;
				padding-right: 15px;
			}
			.offset-0 {
				padding-left: 0px;
				padding-right: 0px !important;
			}
			.col-md-4 {
				width: 33.3333%;
			}
			.col-md-8 {
				width: 66.6667%;
			}
			.itemlabel4 {
				background: none repeat scroll 0% 0% #FFF;
				width: 100%;
				height: 210px;
				font-family: "Open Sans";
				font-size: 13px;
				line-height: 15px;
				overflow: hidden;
				border: 1px solid #E8E8E8;
			}
			.labelright {
				float: right;
				height: 100%;
				padding: 10px;
				border-left: 1px solid #E8E8E8;
			}
			.itemlabel4 {
				font-family: "Open Sans";
				font-size: 13px;
				line-height: 15px;
			}
			.selectbtn {
				border: 2px solid #09C;
				padding: 5px 10px;
				background: none repeat scroll 0% 0% #09C;
				color: #FFF;
				border-radius: 4px;
				transition: all 0.2s ease 0s;
			}
			.mt1 {
				position: relative;
				top: 1px;
			}
			button, input, select[multiple], textarea {
				background-image: none;
			}
			input, button, select, textarea {
				font-family: inherit;
				font-size: inherit;
				line-height: inherit;
			}
			button, html input[type="button"], input[type="reset"], input[type="submit"] {
				cursor: pointer;
			}
			button, select {
				text-transform: none;
			}
			button, input {
				line-height: normal;
			}
			button, input, select, textarea {
				margin: 0px;
				font-family: inherit;
				font-size: 100%;
			}
			.labelleft2 {
				padding: 10px 0px 15px 15px;
				font-family: "Open Sans";
				font-size: 13px;
				line-height: 18px;
			}
			.cruisedropd {
				width: 100%;
				background: none repeat scroll 0% 0% #F2F2F2;
				border: 1px solid #E8E8E8;
			}
			ul.cruislist {
				list-style-type: none;
				margin: 0px;
				padding: 0px;
				width: 16.6%;
				float: left;
			}
			ul.cruislist li {
				height: 65px;
				background: url("../../../updates/update1/img/dash.png") repeat-x scroll 0% 0% transparent;
				text-align: center;
				padding: 15px 0px;
			}
			.grey2 {
				color: #666;
			}
			.grey {
				color: #999;
			}
			*, *::before, *::after {
				box-sizing: border-box;
			}
			ul.cruislist li {
				text-align: center;
			}
			ul.cruislist {
				list-style-type: none;
			}
			.purchasecontainer {
				border-top: 1px solid #E6E6E6;
				margin-top: 10px;
				padding: 10px 20px;
			}
			.purchasecontainertop {
				border-bottom: 1px solid #E6E6E6;
				margin-bottom: 10px;
				padding: 10px 20px;
			}
		</style>
  </head>
  <body id="top" class="thebg" >
	<br>
	<br>
	<br>
	<br>
    <img src="images/wiskulbanner.jpg" width="100%" />
	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-12 offset-0" style="padding-left: 55px;">
				<?PHP
				$qryKuliner 	= "SELECT a.hotel_id,a.kode_kategory,a.hotel_nama,a.hotel_address,a.hotel_img,a.hotel_avg,b.prov_nama,c.kota_nama FROM m_hotel a INNER JOIN m_prov b ON a.prov_id = b.prov_id INNER JOIN m_kota c ON a.kota_id = c.kota_id WHERE a.kode_kategory = '25437860' AND (a.hotel_nama LIKE '%".$tujuanPerjalanan."%' OR c.kota_nama LIKE '%".$tujuanPerjalanan."%' OR a.keyword LIKE '%".$tujuanPerjalanan."%')";
				$ii=0;
				$stmtKuliner 	= $conn->prepare( $qryKuliner );
				$stmtKuliner->execute();
				while ($rowKuliner = $stmtKuliner->fetch(PDO::FETCH_ASSOC))
				{
					$ii++;
				extract($rowKuliner);
				
				?>
				<div class="col-md-4">
					<div class="listitem" style="margin-top: 29px;">
						<img src="images/<?PHP echo $hotel_img?>" alt=""/>
						<div class="liover"></div>
					</div>
					<div class="itemlabel" style="height: 145px;">
						
						<b><?PHP echo $hotel_nama?> </b>
							<p class="lightgrey"><?PHP echo $hotel_address?>, <?PHP echo $kota_nama?> - <?PHP echo $prov_nama?></p>
						<div class="purchasecontainer">
							<p class="lightgrey"><span class="green size16"><b>Rp. <?PHP echo number_format($hotel_avg,2,",",".");?></b></span> rata-rata/menu</p>
							<a href="javascript:;" onclick="location.href='searckul.php?spec=book.<?PHP echo $_GET['spec']?>.<?PHP echo $hotel_id?>'" style="float: right;margin-top: -5px;"><img src="images/wiskul_icon/button_wiskul.png" /></a>
						</div>
						
					</div>
					<div class="col-md-12" style="margin-left: -15px;">
						<a href="javascript:;" data-toggle="collapse" data-target="#collapse<?PHP echo $ii?>"><img src="images/wiskul_icon/button_daftar_menu.png" width="110%" /></a>
					</div>
					
					<div class="cruisedropd collapse" id="collapse<?PHP echo $ii?>" style="background-color: orange">
							<div class="col-md-12">
							<table width="100%">
								<tr>
									<td width="50%" colspan="2" align="center" style="font-family: Edwardian Script ITC;font-size: 30px;background-color: #9a9a9a;color: white">Menu</td>
								</tr>
								<?PHP
								$qryMasakan 	= "SELECT menu_masakan_nama FROM m_menu_masakan WHERE hotel_id = '".$hotel_id."'";
								$stmtMasakan 	= $conn->prepare( $qryMasakan );
								$i=0;
								$stmtMasakan->execute();
								while ($rowMasakan = $stmtMasakan->fetch(PDO::FETCH_ASSOC))
								{
									$i++;
									extract($rowMasakan);
								?>
								<tr>
									<td width="3%" align="center" style="font-family: Freestyle Script;font-size: 25px;"><?PHP echo $i?>.</td>
									<td width="50%" style="font-family: Freestyle Script;font-size: 25px;"><?PHP echo $menu_masakan_nama?></td>
								</tr>
								<?PHP
								}
								?>
							</table>
							</div>
							<div class="clearfix"></div>
					</div>
					
				</div>
				<?PHP
				}
				?>	

					<div class="clearfix"></div>
					<div class="offset-2"><hr class="featurette-divider3"></div>
				
			</div>
			<!-- END OF LIST CONTENT-->
			
		

		</div>
		<!-- END OF container-->
		
	</div>
	<!-- END OF CONTENT -->
	<!-- FOOTER -->
		<div class="footerbgb lcfix">
		
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
						&copy; 2014  |  <a href="//cmedia.co.id" target="_blank">CMedia Developers</a><br/>
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

  </body>
</html>
