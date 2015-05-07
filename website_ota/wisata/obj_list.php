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
		$wisatawanDewasa 	= crackedSpec($_GET['spec'],2);
		$wisatawanAnak		= crackedSpec($_GET['spec'],3);
		$kodeKategory 		= crackedSpec($_GET['spec'],4);
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
		</style>
  </head>
  <body id="top" class="thebg" >
	<br>
	<br>
    <img src="images/animalbanner.jpg" width="100%" />
	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-12 offset-0" style="padding-left: 55px;">
				<div class="itemscontainer offset-1">
					<?PHP
					$qryRent 	= "SELECT a.hotel_id,a.kode_kategory,a.hotel_nama,a.hotel_desk,a.hotel_address,a.hotel_img,a.hotel_avg,a.keyword,b.prov_nama,c.kota_nama FROM m_hotel a INNER JOIN m_prov b ON a.prov_id = b.prov_id INNER JOIN m_kota c ON a.kota_id = c.kota_id WHERE a.kode_kategory = '".$kodeKategory."' AND (a.hotel_nama LIKE '%".$tujuanPerjalanan."%' OR a.keyword LIKE '%".$tujuanPerjalanan."%' OR c.kota_nama LIKE '%".$tujuanPerjalanan."%')";
					$stmtRent 	= $conn->prepare( $qryRent );
					$ii=0;
					$stmtRent->execute();
					while ($rowRent = $stmtRent->fetch(PDO::FETCH_ASSOC))
					{
					$ii++;
					extract($rowRent);
					?>
					<!-- Cruise -->
					<div class="offset-2">
						<div class="col-md-4 offset-0">
							<div class="listitem3">
								<img src="images/<?PHP echo $hotel_img?>" alt=""/>
								<div class="liover"></div>
							</div>
						</div>
						<div class="col-md-8 offset-0">
							<div class="itemlabel4">
								<div class="labelright">
									<br/><span class="green size18"><b>Rp. <?PHP echo number_format($hotel_avg,2,",",".");?></b></span><br/>
									<span class="rata2 grey">rata-rata/per orang</span><br/><br/><br/><br/><br/>

									 <button class="selectbtn mt1" type="button" data-toggle="collapse" data-target="#collapse<?PHP echo $ii?>">Daftar Tiket</button>	
		
								</div>
								<div class="labelleft2">			
									<span class="size16"><b><?PHP echo $hotel_nama?></b></span><br/>
									<span class="opensans size14 grey"><span class="grey2">Dari :</span> <?PHP echo $kota_nama?>, <?PHP echo $prov_nama?></span><br/><span class="opensans size14 grey"><span class="grey2">Alamat :</span> <?PHP echo $hotel_address?></span>
									<div class="line4 wh80percent"></div>
									
									<p class="grey size14 lh6">
										<span class="opensans size12 grey2"><?PHP echo $hotel_desk?></span>
									</p><br/>
								
								</div>
							</div>
						</div>

						<div class="clearfix"></div>
						<div class="cruisedropd collapse" id="collapse<?PHP echo $ii?>">
							<div class="col-md-12 offset-0">
							<br>
							<table width="100%">
								<tr>
									<td width="2%">&nbsp;</td>
									<td align="center" colspan="8" style="border-top: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;border-left: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;background-color: #f4b757;color: #000000"><h4><b>Daftar Harga Tiket</b></h4></td>
									<td width="2%">&nbsp;</td>
								</tr>
								<tr>
									<td width="2%">&nbsp;</td>
									<td width="3%" style="border-left: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">No.</div></td>
									<td width="20%" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Harga Untuk</div></td>
									<td width="25%" colspan="2" align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Senin - Jum'at</div></td>
									<td width="25%" colspan="2" align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Sabtu - Minggu</div></td>
									<td width="30%" colspan="2" align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Holiday</div></td>
									<td width="2%">&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td align="center" style="border-left: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;">&nbsp;</td>
									<td style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;">&nbsp;</td>
									<td align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Dewasa</div></td>
									<td align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Anak</div></td>
									<td align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Dewasa</div></td>
									<td align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Anak</div></td>
									<td align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Dewasa</div></td>
									<td align="center" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16b">Anak</div></td>
									<td>&nbsp;</td>
								</tr>
								<?PHP
								$qryTiket 	= "SELECT tiket_nama,flag_tiket,tiket_harga_dewasa_biasa,tiket_harga_anak_biasa,tiket_harga_dewasa_libur,tiket_harga_anak_libur,tiket_harga_dewasa_holiday,tiket_harga_anak_holiday,tiket_harga_permainan FROM m_tiket WHERE hotel_id = '".$hotel_id."'";
								$stmtTiket 	= $conn->prepare( $qryTiket );
								$i=0;
								$stmtTiket->execute();
								while ($rowTiket = $stmtTiket->fetch(PDO::FETCH_ASSOC))
								{
								$i++;
								extract($rowTiket);
								?>
								<tr>
									<td>&nbsp;</td>
									<td align="center" style="border-left: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16"><?PHP echo $i?>.</div></td>
									<td style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><div class="size16"><?PHP echo $tiket_nama?></div></td>
									<div class="size16"><?PHP
										if($flag_tiket == 1){
									?>
									</div>
										<td align="center" colspan="6" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo number_format($tiket_harga_permainan,2,",",".");?> /1x</td>
									<?PHP
									}else{
									?>
									<td align="right" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo number_format($tiket_harga_dewasa_biasa,2,",",".");?></td>
									<td align="right" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo number_format($tiket_harga_anak_biasa,2,",",".");?></td>
									<td align="right" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo number_format($tiket_harga_dewasa_libur,2,",",".");?></td>
									<td align="right" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo number_format($tiket_harga_anak_libur,2,",",".");?></td>
									<td align="right" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo number_format($tiket_harga_dewasa_holiday,2,",",".");?></td>
									<td align="right" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo number_format($tiket_harga_anak_holiday,2,",",".");?></td>
									<?PHP
									}
									?>
									
									<td>&nbsp;</td>
								</tr>
								<?PHP
								}
								?>
								<tr>
									<td>&nbsp;</td>
									<td colspan="2" style="border-top: 1px solid #cdcdcd;border-left: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><b>Kendaraan</b></td>
									<td align="center" colspan="6" style="border-bottom: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;">&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<?PHP
								$qryParking 	= "SELECT kendaraan_nama,kendaraan_harga,kendaraan_durasi,kendaraan_satuan FROM m_kendaraan WHERE hotel_id = '".$hotel_id."'";
								$stmtParking 	= $conn->prepare( $qryParking );
								$stmtParking->execute();
								while ($rowParking = $stmtParking->fetch(PDO::FETCH_ASSOC))
								{
								extract($rowParking);
								?>
								<tr>
									<td>&nbsp;</td>
									<td colspan="2" style="border-top: 1px solid #cdcdcd;border-left: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;"><?PHP echo $kendaraan_nama?></td>
									<td align="center" colspan="6" style="border-bottom: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd;"><?PHP echo number_format($kendaraan_harga,2,",",".");?> /<?PHP echo $kendaraan_durasi?> <?PHP echo $kendaraan_satuan?></td>
									<td>&nbsp;</td>
								</tr>
								<?PHP
								}
								?>
							</table>
							<br>
							<table width="100%">
								<tr>
									<td align="right"><a href="javascript:;" onclick="location.href='searcobj.php?spec=book.<?PHP echo $_GET['spec']?>.<?PHP echo $hotel_id?>'"><img src="images/wisata_icon/button_wisata.png"/></a></td>
									<td width="2%">&nbsp;</td>
								</tr>
							</table>
							<br>
							<table width="100%">
								<tr>
									<td width="2%">&nbsp;</td>
									<td><b>Keterangan</b></td>
									<td width="2%">&nbsp;</td>
								</tr>
								<?PHP
								$qryParking 	= "SELECT keterangan_nama FROM m_keterangan WHERE hotel_id = '".$hotel_id."'";
								$stmtParking 	= $conn->prepare( $qryParking );
								$i=0;
								$stmtParking->execute();
								while ($rowParking = $stmtParking->fetch(PDO::FETCH_ASSOC))
								{
								extract($rowParking);
								$i++;
								?>
								<tr>
									<td width="2%">&nbsp;</td>
									<td><?PHP echo $i?>. <?PHP echo $keterangan_nama?></td>
									<td width="2%">&nbsp;</td>
								</tr>
								<?PHP
								}
								?>
							</table>
							</div>
							<div class="clearfix"></div>
							<div class="crclose">
								<button class="bookbtn crpos right" type="button" data-toggle="collapse" data-target="#collapse<?PHP echo $ii?>"><span class="glyphicon glyphicon-remove"></span></button>
								<div class="clearfix"></div>
							</div>
							</div>
						
					</div>
					<!-- End of Cruise -->
					<?PHP 
					}
					?>
					<div class="clearfix"></div>
					<div class="offset-2"><hr class="featurette-divider3"></div>	
					
					
					
					
				</div>	
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
