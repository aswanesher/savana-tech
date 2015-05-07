<?PHP
	require ('config/hotel.conn.php');
	
?>
	<br>	
	<br>	
	<br>	
	<br>	
	<br>	
	<br>	
		<div class="container cstyle06">	
		<?PHP
			$query=$conn->prepare("SELECT * FROM wilayah");
			$query->execute();
			$i=0;
			while ($data=$query->fetchObject()){
			$i++;
			
		?>
			<div class="row anim2">
			  <div class="col-md-3">
				<h2><?PHP echo $data->name?></h2> 
			  </div>
			  <div class="col-md-9">
			  
			  
			  
				<!-- Carousel -->
				<div class="wrapper">
					<div class="list_carousel">
						<ul id="foo<?PHP echo $i?>">
							
							<?PHP
								$queryhot=$conn->prepare("SELECT b.hotel_id,b.hotel_nama,b.hotel_img,b.hotel_address FROM wilayah a INNER JOIN m_hotel b ON a.wilayah_id = b.wilayah_id WHERE a.wilayah_id = '".$data->wilayah_id."'");
								$queryhot->execute();
								while ($datahot=$queryhot->fetchObject()){
								
							?>
							
							<li>
								<a href="javascript:;" onclick="location.href='index.php?menu=details&id=<?PHP echo $datahot->hotel_id?>'"><img src="images/<?PHP echo $datahot->hotel_img?>" alt=""/></a>
								<div class="m1">
									<h6 class="lh1 dark"><b><?PHP echo $datahot->hotel_nama?></b></h6>
									<h6 class="lh1 green"><?PHP echo wordwrap($datahot->hotel_address,40,"<br><br> \n");?></h6>							
								</div>
							</li>
							<?PHP
								}
							?>
						</ul>
						<div class="clearfix"></div>
						<a id="prev_btn<?PHP echo $i?>" class="prev" href="#"><img src="images/spacer.png" alt=""/></a>
						<a id="next_btn<?PHP echo $i?>" class="next" href="#"><img src="images/spacer.png" alt=""/></a>
					</div>
				</div>

			  
			  </div>
			</div>	
		
			<hr class="featurette-divider2">	
			<?PHP
				}
			?>
			  </div>
			</div>	

		</div>


		
		<!-- FOOTER -->
	<div class="footerbgblack">
		<div class="container">		
				
				<div class="col-md-3">
					<span class="ftitle">Temukan Kami</span>
					<div class="scont">
						<a href="#" class="social1b"><img src="images/icon-facebook.png" alt=""/></a>
						<a href="#" class="social2b"><img src="images/icon-twitter.png" alt=""/></a>
						<a href="#" class="social3b"><img src="images/icon-gplus.png" alt=""/></a>
						<a href="#" class="social4b"><img src="images/icon-youtube.png" alt=""/></a>
						<br/><br/><br/>
						<img src="images/logosmal.png" alt="" /><br/>
						&copy; 2014  |  <a href="http:cmedia.co.id">CMedia Developers</a><br/>
						All Rights Reserved 
						<br/><br/>	
					</div>
				</div>
				<!-- End of column 1-->
				
				<div class="col-md-3">
					<span class="ftitle">Pencarian Hotel Populer di Bandung</span>
					<br/><br/>
					<ul class="footerlist">
						<li><a href="#">Bandung Barat</a></li>
						<li><a href="#">Bandung Timur</a></li>
						<li><a href="#">Bandung Selatan</a></li>
						<li><a href="#">Bandung Utara</a></li>
						<li><a href="#">Pusat Kota</a></li>	
					</ul>
				</div>
				<!-- End of column 2-->		
				
				<div class="col-md-3">
					<span class="ftitle">Tentang Walanja</span>
					<br/><br/>
					<ul class="footerlist">
						<li><a href="#">Cara Pemesanan</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Blog</a></li>
					</ul>				
				</div>
				<!-- End of column 3-->		
				
				<div class="col-md-3 grey">
					<span class="ftitle">Newsletter</span>
					<div class="relative">
						<input type="email" class="form-control fccustom" id="exampleInputEmail1" placeholder="Enter email">
						<button type="submit" class="btn btn-default btncustom">Submit<img src="images/arrow.png" alt=""/></button>
					</div>
					<br/><br/>
					<span class="ftitle">Layanan pelanggan</span><br/>
					<span class="pnr">022-9291-4001</span><br/>
					sales@walanja.co.id
				</div>			
				<!-- End of column 4-->			
			</div>	
		</div>
		
		<div class="footerbg2">
			<div class="container center grey"> 
			<a href="#">Home</a> | 
			<a href="#">Penawaran Spesial</a> | 
			<a href="#">Pencarian Hotel</a> | 
			<a href="#">Log In</a></br>
			<a href="#top" class="gotop scroll"><img src="images/spacer.png" alt=""/></a>
			</div>
		</div>
	<!-- / WRAP -->