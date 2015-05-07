<?PHP
	require ('config/hotel.conn.php');
	require_once ('library/function.cracked.php');
	require_once ('library/function.convert.date.php');
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	//UNCRACKED SPEC
	if(isset($_GET['spec'])){
		$flag		 	= crackedSpec($_GET['spec'],6);
		
	// JIKA DESTINATION 1 KALI PERJALANAN
		if(isset($flag) && $flag == 1){
		
			$asal 			= crackedSpec($_GET['spec'],0);
			$tujuan 		= crackedSpec($_GET['spec'],1);
			$tglBerangkat 	= crackedSpec($_GET['spec'],2);
			$tglKembali 	= 0;
			$adult		 	= crackedSpec($_GET['spec'],4);
			$child		 	= crackedSpec($_GET['spec'],5);
			$flagDesc	 	= crackedSpec($_GET['spec'],6);
			$kodePlane	 	= crackedSpec($_GET['spec'],7);
			$ketDesc		= "1x Perjalanan";
			
	// JIKA DESTINATION 2 KALI PERJALANAN	
		}else if(isset($flag) && $flag == 2){
		
			$asal 			= crackedSpec($_GET['spec'],0);
			$tujuan 		= crackedSpec($_GET['spec'],1);
			$tglBerangkat 	= crackedSpec($_GET['spec'],2);
			$tglKembali 	= crackedSpec($_GET['spec'],3);
			$adult		 	= crackedSpec($_GET['spec'],4);
			$child		 	= crackedSpec($_GET['spec'],5);
			$flagDesc	 	= crackedSpec($_GET['spec'],6);
			$kodePlane	 	= crackedSpec($_GET['spec'],7);
			$ketDesc		= "2x Perjalanan";
		}
	
		
		
	// TIME SET NOW
		
		
		$now 	= convertDate($tglBerangkat);
		$hari 	= dayChoice($tglBerangkat);
		
	}
	
	
?>
<!DOCTYPE html>

<html>
  <head>
	
  </head>
  <body id="top" class="thebg" >
	<br>
    <img src="images/planebanner.jpg" width="100%" />
	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-12 offset-0">
				<table width="100%">
					<tr>
						<td width="30%"><h4>Hasil Pencarian</h4></td>
						<td width="80%" align="right" style="font-size: 14px"><?PHP echo $asal?> ke <?PHP echo $tujuan?> |  <?PHP echo $ketDesc?> | Tgl Berangkat : <?PHP echo $hari?>, <?PHP echo $now?>
							<?PHP
								if ($flag == 2){
							?>
								, Tgl Kembali : <?PHP echo $hari?>, <?PHP echo $now?>
							<?PHP
								}
							?>
						| Dewasa <?PHP echo $adult?> Anak <?PHP echo $child?></td>
					</tr>
				</table>
				<!--
				<br>
				<br>
				<table width="100%" border="1">
					<tr>
						<td width="2%">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				-->
				<br>
				<br>
				<table width="100%">
				<thead>
					<tr>
						<td width="5%" style="border-bottom: 2px solid grey">&nbsp;</td>
						<td align="center" style="border-bottom: 2px solid grey"><b>Maskapai</b></td>
						<td style="border-bottom: 2px solid grey" width="8%"><b>Brgkt</b></td>
						<td style="border-bottom: 2px solid grey">&nbsp;</td>
						<td style="border-bottom: 2px solid grey" width="8%"><b>Tiba</b></td>
						<td style="border-bottom: 2px solid grey" align="center"><b>Fasilitas</b></td>
						<td style="border-bottom: 2px solid grey" align="center"><b>Durasi</b></td>
						<td style="border-bottom: 2px solid grey" align="center"><b>Harga Per Orang</b></td>
						<td style="border-bottom: 2px solid grey">&nbsp;</td>
					</tr>
				</thead>
				<?PHP
					$qryPlane 	= "SELECT hotel_id,hotel_img,hotel_nama,TIME(plane_berangkat) as berangkat,TIME(plane_tiba) as tiba,TIMESTAMPDIFF(HOUR,plane_berangkat,plane_tiba) AS jam,hotel_avg,flag_discount FROM m_hotel WHERE kode_kategory = '".$kodePlane."'";
					$stmtPlane 	= $conn->prepare( $qryPlane );
					$stmtPlane->execute();
					while ($rowPlane = $stmtPlane->fetch(PDO::FETCH_ASSOC))
					{
					extract($rowPlane);
					$waktuBerangkat = date('H:i',strtotime($berangkat));
					$waktuTiba = date('H:i',strtotime($tiba));
					if($flag_discount == 1){
						$promo = 'PROMO';
					}else{
						$promo = 'REGULAR';
					}
				?>
				<tbody style="cursor: pointer;">
					<tr>
						<td style="border-left: 1px solid grey;border-bottom: 1px solid grey;" valign="top" width="2%" rowspan="3">
						<?PHP
							if ($flag_discount == 1){
						?>
						<img src="images/icon_discount.png" /></td>
						<?PHP
						}else{
						?>
						&nbsp;
						<?PHP
						}
						?>
						<td colspan="8" style="border-right: 1px solid grey;">&nbsp;</td>
					</tr>
					<tr>
						<td align="center" style="font-size: 12px"><img src="images/<?PHP echo $hotel_img?>" /><br><?PHP echo $hotel_nama?></td>
						<td><b><?PHP echo $waktuBerangkat?></b></td>
						<td>-</td>
						<td><b><?PHP echo $waktuTiba?></b></td>
						<td align="center">
						<?PHP
							$qryFas 	= "SELECT plane_fasilitas_icon FROM plane_fasilitas WHERE hotel_id = '".$hotel_id."'";
							$stmtFas 	= $conn->prepare( $qryFas );
							$stmtFas->execute();
							while ($rowFas = $stmtFas->fetch(PDO::FETCH_ASSOC))
							{
							extract($rowFas);
						?>
							<img style="cursor: pointer;" src="images/plane_icon/<?PHP echo $plane_fasilitas_icon?>" />&nbsp;
						<?PHP
							}
						?>
						</td>
						<td align="center"><b><?PHP echo $jam?> Jam</b></td>
						<td align="right">
						<span class="red size12" style="text-decoration: line-through;"><b>Rp. <?PHP echo number_format($hotel_avg - 5000,2,",",".");?></b></span><br>
						<span class="green size18"><b>Rp. <?PHP echo number_format($hotel_avg,2,",",".");?></b></span></td>
						<td style="border-right: 1px solid grey;" align="center"><a href="javascript:;" onclick="location.href='searchplane.php?spec=book.<?PHP echo $hotel_id?>.<?PHP echo $promo?>.<?PHP echo $_GET['spec']?>'"><img src="images/button_plane.png" /></a></td>
					</tr>
					<tr>
						<td colspan="8" style="border-right: 1px solid grey;border-bottom: 1px solid grey;">&nbsp;</td>
					</tr>
				</tbody>
				<?PHP
					}
				?>
				</table>
				
			</div>
			<!-- END OF LIST CONTENT-->
			
		

		</div>
		<!-- END OF container-->
		
	</div>
	<!-- END OF CONTENT -->
	<!-- FOOTER -->
		<div class="footerbg lcfix">
		
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
