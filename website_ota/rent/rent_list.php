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
		$tglKembali		 	= crackedSpec($_GET['spec'],2);
		$jmlPenumpang	 	= crackedSpec($_GET['spec'],3);
		$kodeKategory 		= crackedSpec($_GET['spec'],4);
	}else{
		header("location: index.php?menu=home");
	}
	
	
?>
<!DOCTYPE html>

<html>
  <head>
		<style>
			.carscontainer {
				border: 1px solid #E6E6E6;
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
			.center {
				margin: 0px auto;
				text-align: center;
			}
			.hpadding20 {
				padding: 0px 20px;
			}
		</style>
  </head>
  <body id="top" class="thebg" >
	<br>
	<br>
    <img src="images/rentbanner.jpg" width="100%" style=" margin-top: 62px;"/>
	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-12 offset-0" style="padding-left: 55px;">
				<div class="itemscontainer offset-1">
				<center><h3 style="color:red;text-decoration: underline;"><b>DEMO SITE<b></h3></center>	
				<?PHP
					$qryRent 	= "SELECT hotel_id,hotel_nama,hotel_img,rent_type,rent_merk,rent_tahun,rent_kondisi,rent_penumpang,rent_harga_supir,rent_transmisi,hotel_avg FROM m_hotel WHERE kode_kategory = '".$kodeKategory."'";
					$stmtRent 	= $conn->prepare( $qryRent );
					$stmtRent->execute();
					while ($rowRent = $stmtRent->fetch(PDO::FETCH_ASSOC))
					{extract($rowRent);
				?>
					<div id="listCar">
					<div class="col-md-4 border" style="margin-top: 15px;">
						<!-- CONTAINER-->
						<div class="carscontainer">
							<div class="purchasecontainertop">
								<span class="size18 bold red mt5"><?PHP echo $rent_merk?></span><br/>
							</div>
							<div class="center">
								<img src="images/<?PHP echo $hotel_img?>" alt=""/>
							</div>
							<div class="hpadding20">
								<span class="size16 bold dark"><?PHP echo $hotel_nama?></span><br/>
								<span class="size13 bold grey mt-5"><?PHP echo $rent_type?></span><br/>
								<span class="size13 grey">
									<span class="icn-gear"></span><?PHP echo $rent_transmisi?><br/>
								</span>
							</div>
							<div class="purchasecontainer">
								<span class="size18 bold green mt5">Rp. <?PHP echo number_format($hotel_avg,2,",",".");?></span><br/>
								<span class="size12 mt-3 grey"><i>per hari</i></span>
								<a href="javascript:;" class="right margtop-20" onclick="location.href='searcar.php?spec=book.<?PHP echo $_GET['spec']?>.<?PHP echo $hotel_id?>'"><img src="images/rent_icon/button_car.png" /></a>	
							</div>
						</div>
						<!-- END OF CONTAINER-->
					</div>
					</div>
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

<center><h3 style="color:red;text-decoration: underline;"><b>DEMO SITE<b></h3></center>	
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
						All Rights Reserved 
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

  </body>
</html>
