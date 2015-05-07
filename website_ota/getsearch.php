<?PHP
require ('config/hotel.conn.php');
if ($_GET['tags'] != '')
{	
		echo '<div class="container"><h3>Hasil Pencarian</h3></div>';
		$query_hot 	= "SELECT hotel_id,hotel_nama ,hotel_avg,hotel_desk,rate_id,hotel_img FROM m_hotel WHERE hotel_nama LIKE '%".strtoupper($_GET['tags'])."%' UNION ALL SELECT hotel_id,hotel_nama,hotel_avg,hotel_desk,rate_id,hotel_img FROM m_hotel WHERE hotel_nama LIKE '%".strtoupper($_GET['tags'])."%' UNION ALL SELECT hotel_id,hotel_address,hotel_avg,hotel_desk,rate_id,hotel_img FROM m_hotel WHERE hotel_address LIKE '%".strtoupper($_GET['tags'])."%'";
		$stmt_hot 	= $conn->prepare( $query_hot );
		$stmt_hot->execute();
		while ($row_hot = $stmt_hot->fetch(PDO::FETCH_ASSOC)){
		extract($row_hot);
		if ($hotel_id != ''){
?>
					<div class="container">
					<div class="container pagecontainer offset-0">
						<div class="col-md-4 offset-0">
							<div class="listitem2">
								<a href="images/<?PHP echo $hotel_img?>" data-footer="A custom footer text" data-title="A random title" data-gallery="multiimages" data-toggle="lightbox"><img src="images/<?PHP echo $hotel_img?>" alt=""/></a>
								<div class="liover"></div>
							</div>
						</div>
						<div class="col-md-8 offset-0">
							<div class="itemlabel3">
								<div class="labelright">
									<span class="green size18"><b>Rp. <?PHP echo number_format($hotel_avg,2,",",".");?></b></span><br/>
									<span class="size11 grey">Rata-rata/Malam</span><br/><br/><br/>
									<form action="index.php?menu=details&id=<?PHP echo $hotel_id?>&in=<?PHP echo $_GET['cekin']?>&out=<?PHP echo $_GET['cekout']?>&pax=<?PHP echo $_GET['pax']?>" method="POST">
									 <button class="bookbtn mt1" type="submit">Selengkapnya ></button>	
									</form>									
								</div>
								<div class="labelleft2">			
									<h4><b><?PHP echo $hotel_nama?></b></h4>	
									<p class="grey"><?PHP echo $hotel_desk?></p><br/><br/>
									<ul class="hotelpreferences">
									<?PHP
										$query_fac 	= "SELECT d.fac_icon FROM m_room a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id LEFT JOIN m_room_detail c ON a.room_id = c.room_id INNER JOIN m_facilities d ON c.fac_id = d.fac_id WHERE a.hotel_id = '$hotel_id' GROUP BY c.fac_id ORDER BY a.room_id ASC";
										$stmt_fac 	= $conn->prepare( $query_fac );
										$stmt_fac->execute();
										 
										$num_fac 	= $stmt_fac->rowCount();
										while ($row_fac = $stmt_fac->fetch(PDO::FETCH_ASSOC)){
										extract($row_fac);
									?>
										<li class="<?PHP echo $fac_icon?>"></li>
									<?PHP
									}
									?>
									</ul>
									
								</div>
							</div>
						</div>
					</div>

					<div class="clearfix"></div>
					<div class="offset-2"><hr class="featurette-divider3"></div>
					</div>
<?PHP
}else{
?>
	<div class="container"><h3>Hasil Pencarian Tidak Ada</h3></div>
<?PHP
}
}
?>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>

<?PHP		
}else{
?>
		<div class="container"><h3>Hasil Pencarian Tidak Ditemukan</h3></div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
<?PHP
}
?>