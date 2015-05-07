						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.html">Home</a>
										</li>
										<li>Dashboard</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Dashboard</h3>
									</div>
									<div class="description">Halaman ini berisi grafik dan monitoring aktivitas pemesanan</div>
									<div class="col-sm-6" style="margin-left: 513px;margin-top: -70px;">
									<form action="search.php" method="post">
									<table width="100%">
										<tr>
											<td>Dimulai dari <td>
											<td>:<td>
											<td><input type="text" class="form-control" id="picker_dayin" placeholder="dd-mm-yyyy"  name="dayin" /><td>
											<td>
											<input type="hidden" name="keyword" value="dayin" />
											<button class="btn btn-success">Telusuri</button>
											<td>
										</tr>
									</table>
									</form>
									</div>
								</div>
								
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<?PHP
							
							require ('../config/hotel.conn.php');
							require ('../library/function.cracked.php');
							$dayNow = date('dmY');
							//Monitoring Aktivitas hari ini========================================================================
							
							//Keyword Pencarian
							
							if(isset($_GET['key']) && $_GET['key'] != ''){
								$dayStrNow			= $_GET['key'];
								$keyDay 			= substr($dayStrNow, 0, -6);
								$DateOne 			= substr($dayStrNow, 0, -6);
								$DateTwo 			= substr($dayStrNow, 2, -4);
								$DateTree 			= substr($dayStrNow, -4);
								$dateEng			= $DateTree.'-'.$DateTwo.'-'.$DateOne;
								$dateInd			= $DateOne.$DateTwo.$DateTree;
							}else{
								$keyDay 			= substr($dayNow, 0, -6);
								$DateOne 			= substr($dayNow, 0, -6);
								$DateTwo 			= substr($dayNow, 2, -4);
								$DateTree 			= substr($dayNow, -4);
								$dateEng			= $DateTree.'-'.$DateTwo.'-'.$DateOne;
								$dateInd			= $DateOne.$DateTwo.$DateTree;
							}
							//Pencarian Aktivitas Harian
							if(isset($_GET['key']) && $_GET['key'] != ''){
								
								//For Pesanan
								$QryStrPemesanan 	= "AND DATE(date_input) = '".$dateEng."'";
								//For Pembatalan
								$QryStrPembatalan 	= "AND DATE(date_input) = '".$dateEng."'";
								//For Check-In Hotel
								$QryStrCheckIn	 	= "AND DATE(check_in) = '".$dateEng."'";
								//For Pembayaran
								$QryStrPembayaran 	= "AND DATE(a.date_input) = '".$dateEng."'";				
							}else{
								
								$QryStrPemesanan 	= "AND DATE(date_input) = DATE(CURDATE())";
								$QryStrPembatalan 	= "AND DATE(date_input) = DATE(CURDATE())";
								$QryStrCheckIn	 	= "AND DATE(check_in) = DATE(CURDATE())";
								$QryStrPembayaran 	= "AND DATE(a.date_input) = DATE(CURDATE())";
							}
							
							//Monitoring Pemesanan
							$QryBooking 		= $conn->query("SELECT COUNT(book_id) AS jumlahPesan FROM guest_book WHERE rinci_id IS NULL AND kategory_item = '25437857' AND book_kode IS NOT NULL AND hotel_id IS NOT NULL ".$QryStrPemesanan."");
							$QryBooking 		= $QryBooking->fetch(PDO::FETCH_ASSOC);
							$jumlahPesan	 	= $QryBooking['jumlahPesan'];
							
							//Monitoring Pembatalan
							$QryPembatalan 		= $conn->query("SELECT COUNT(book_id) AS jumlahBatal FROM guest_book WHERE rinci_id IS NULL AND kategory_item = '25437857' AND flag_batal = '1' AND book_kode IS NOT NULL AND hotel_id IS NOT NULL ".$QryStrPembatalan."");
							$QryPembatalan 		= $QryPembatalan->fetch(PDO::FETCH_ASSOC);
							$jumlahBatal	 	= $QryPembatalan['jumlahBatal'];
							
							//Monitoring Check-In Hotel
							$QryCheckIn 		= $conn->query("SELECT COUNT(book_id) AS jumlahCheckin FROM guest_book WHERE rinci_id IS NULL AND kategory_item = '25437857' AND flag_confirm = '1' AND book_kode IS NOT NULL AND hotel_id IS NOT NULL ".$QryStrCheckIn."");
							$QryCheckIn 		= $QryCheckIn->fetch(PDO::FETCH_ASSOC);
							$jumlahCheckin	 	= $QryCheckIn['jumlahCheckin'];
							
							//Monitoring Pembayaran
							$QryPembayaran 		= $conn->query("SELECT COUNT(a.book_detail_id) AS jumlahPembayaran FROM guest_book_detail a INNER JOIN guest_book b ON a.book_id = b.book_id WHERE b.kategory_item = '25437857' AND book_kode IS NOT NULL AND hotel_id IS NOT NULL ".$QryStrPembayaran."");
							$QryPembayaran 		= $QryPembayaran->fetch(PDO::FETCH_ASSOC);
							$jumlahPembayaran 	= $QryPembayaran['jumlahPembayaran'];
							
							
							//=====================================================================================================
							// monitoring aktivitas dari agent
							
							//Pencarian Aktivitas Harian
							if(isset($_GET['key']) && $_GET['key'] != ''){
								//For Pesanan
								$QryStrPemesanan 	= $dateEng;
								//For Pembatalan
								$QryStrPembatalan 	= $dateEng;
								//For Check-In Hotel
								$QryStrCheckIn	 	= $dateEng;
								//For Pembayaran
								$QryStrPembayaran 	= $dateEng;				
							}else{
								$QryStrPemesanan 	= "DATE(CURDATE())";
								$QryStrPembatalan 	= "DATE(CURDATE())";
								$QryStrCheckIn	 	= "DATE(CURDATE())";
								$QryStrPembayaran 	= "DATE(CURDATE())";
							}
							
							//Monitoring Pemesanan
							$QryBookingAgent	= $conn->query("SELECT COUNT(rinci_id) AS jumlahPesan FROM trs_kebutuhan WHERE DATE(rinci_tanggal) = ".$QryStrPemesanan."");
							$QryBookingAgent 		= $QryBookingAgent->fetch(PDO::FETCH_ASSOC);
							$jumlahPesanAgent	 	= $QryBookingAgent['jumlahPesan'];
							
							//Monitoring Pembatalan
							$QryPembatalanAgent	= $conn->query("SELECT COUNT(rinci_id) AS jumlahBatal FROM trs_kebutuhan WHERE DATE(rinci_tanggal) = ".$QryStrPembatalan." AND status_cetak = '2'");
							$QryPembatalanAgent	= $QryPembatalanAgent->fetch(PDO::FETCH_ASSOC);
							$jumlahBatalAgent 	= $QryPembatalanAgent['jumlahBatal'];
							
							//Monitoring Pembayaran
							$QryPembayaranAgent	= $conn->query("SELECT COUNT(rinci_id) AS jumlahPembayaran FROM trs_kebutuhan WHERE DATE(rinci_tanggal) = ".$QryStrPembayaran." AND status_cetak = '1'");
							$QryPembayaranAgent = $QryPembayaranAgent->fetch(PDO::FETCH_ASSOC);
							$jumlahPembayaranAgent 	= $QryPembayaranAgent['jumlahPembayaran'];
							//=====================================================================================================
						?>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-9" style="margin-left: -20px;">
									<div id="chartBook" style="margin-top: -21px;"></div>
								</div>
								<div class="col-sm-3" style="margin-top: -33px;">
									<p><h4>Monitoring Aktivitas Hari Ini</h4></p>
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left blue">
												<a href="javascript:;" onclick="location.href='index.php?modul=rep&spec=book.<?PHP echo $dateInd.'.'?>'"><i class="fa fa-shopping-cart fa-3x"></i></a>
										   </div>
										   <div class="panel-right">
												<div class="number"><?PHP echo $jumlahPesan + $jumlahPesanAgent?></div>
												<div class="title">Pemesanan</div>
										   </div>
										</div>
									 </div>
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<a href="javascript:;" onclick="location.href='index.php?modul=rep&spec=cancel.<?PHP echo $dateInd.'.'?>'"><i class="fa fa-share-square-o fa-3x"></i></a>
										   </div>
										   <div class="panel-right">
												<div class="number"><?PHP echo $jumlahBatal + $jumlahBatalAgent?></div>
												<div class="title">Pembatalan</div>
										   </div>
										</div>
									 </div>
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left blue">
												<a href="javascript:;" onclick="location.href='index.php?modul=rep&spec=inguest.<?PHP echo $dateInd.'.'?>'"><i class="fa fa-sign-in fa-3x"></i></a>
										   </div>
										   <div class="panel-right">
												<div class="number"><?PHP echo $jumlahCheckin?></div>
												<div class="title">Check-In</div>
										   </div>
										</div>
									 </div>
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<a href="javascript:;" onclick="location.href='index.php?modul=rep&spec=pay.<?PHP echo $dateInd.'.'?>'"><i class="fa fa-money fa-3x"></i></a>
										   </div>
										   <div class="panel-right">
												<div class="number"><?PHP echo $jumlahPembayaran + $jumlahPembayaranAgent?></div>
												<div class="title">Conf. Pembayaran</div>
										   </div>
										</div>
									 </div>
								 </div>
							</div>
						</div>