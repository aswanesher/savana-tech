<?PHP
	require ('../config/hotel.conn.php');
	$qrydatahot 	= $conn->query("SELECT a.*,b.count_name,c.prov_nama,d.kota_nama FROM m_hotel a INNER JOIN m_country b ON a.count_id = b.count_id INNER JOIN m_prov c ON a.prov_id = c.prov_id INNER JOIN m_kota d ON a.kota_id = d.kota_id WHERE a.hotel_id = ".$_SESSION['per']."");
	$datahot		= $qrydatahot->fetch(PDO::FETCH_ASSOC);
	//session_start();
?>

<!-- //CSS CONTENT -->
	

	
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
										<li>
											Konfigurasi Hotel
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Konfigurasi Hotel</h3>
									</div>
									<div class="description">Halaman Untuk Konfigurasi Dan Monitoring Pemesanan Hotel</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						
						
						<!-- MENU HALAMAN -->
						<!--<div class="row">
						
						<div class="col-md-2">
							<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(2);" onclick="location.href='index.php?modul=m_hotel&menu=m_fac'">
								<i class="fa fa-building-o fa-2x"></i>
								<div>Master Facilities</div>
							</a>
						</div>
						<div class="col-md-2">
							<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(3);" onclick="location.href='index.php?modul=m_hotel&menu=m_ame'">
								<i class="fa fa-building-o fa-2x"></i>
								<div>Master Amenities</div>
							</a>
						</div>
						<div class="col-md-2">
							<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(1);" onclick="location.href='index.php?modul=m_hotel&menu=m_hotel'">
								<i class="fa fa-building-o fa-2x"></i>
								<div>Master Hotel</div>
							</a>
						</div>
						</div> 
						
						<div class="separator"></div>-->
						
						<!-- TABEL YANG DI PANGGIL -->
						<!-- USER PROFILE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-user"></i><span class="hidden-inline-mobile">Hello, <?PHP echo $datahot['hotel_nama']?></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs user-profile">
											<br>
											<br>
											<br>
											<div class="tab-content">
											   <!-- OVERVIEW -->
											   <div class="tab-pane fade in active" id="pro_overview">
												  <div class="row">
													<!-- PROFILE PIC -->
													<div class="col-md-3">
														<div class="list-group">
														  <li class="list-group-item zero-padding">
															<img alt="" class="img-responsive" src="../images/<?PHP echo $datahot['hotel_img']?>">
														  </li>
														  <div class="list-group-item profile-details">
																<?PHP 
																	for ($x=1; $x<=$datahot['rate_id']; $x++) {
																	  echo "<i class='fa fa-star'></i>";
																	} 
																?>
																<br>
																<h4><?PHP echo $datahot['hotel_nama']?></h4><br>
																<?PHP echo $datahot['hotel_address']?>
																<!--<ul class="list-inline">
																   <li><i class="fa fa-facebook fa-2x"></i></li>
																   <li><i class="fa fa-twitter fa-2x"></i></li>
																   <li><i class="fa fa-dribbble fa-2x"></i></li>
																   <li><i class="fa fa-bitbucket fa-2x"></i></li>
																</ul>-->
														 </div>
														  
														  <a href="view/edithotel.form.php?id=<?PHP echo $datahot['hotel_id']?>&res=profile" style="text-decoration: none" class="fancybox fancybox.iframe" ><button class="list-group-item"><i class="fa fa-gear"></i> Konfigurasi Profil Hotel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
														  
														</div>														
													</div>
													<!-- /PROFILE PIC -->
													<!-- PROFILE DETAILS -->
													<div class="col-md-9">
														
														<div id="showmod">
														
															<!-- ROW 2 -->
														<div class="row">
															<div class="col-md-12">
															<div class="box border blue">
															<div class="box-title">
																<h4><i class="fa fa-columns"></i> <span class="hidden-inline-mobile">Tab Informasi</span></h4>																
															</div>
															<div class="box-body">
																<div class="tabbable">
																	<ul class="nav nav-tabs">
																	   <li>
																	   <a href="#sales" data-toggle="tab"><i class="fa fa-desktop"></i> <span class="hidden-inline-mobile">Monitoring Pemesanan</span></a>
																	   </li>
																	   <li>
																	   <a href="#feed" data-toggle="tab"><i class="fa fa-rss"></i> <span class="hidden-inline-mobile">Aktifitas Terakhir</span></a>
																	   </li>
																	   <li class="active">
																	   <a href="#info" data-toggle="tab"><i class="fa fa-info"></i> <span class="hidden-inline-mobile">Detail Informasi</span></a>
																	   </li>
																	</ul>
																	<div class="tab-content">
																	   <div class="tab-pane" id="sales">
																		  <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
																			 <thead>
																				<tr>
																				   <th>Tanggal</th>
																				   <th class="hidden-xs">Nama Ruangan</th>
																				   <th>Jml Pemesanan</th>
																				</tr>
																			 </thead>
																			 <tbody>
																				<?PHP
																					$qryhotel 	= "SELECT DATE(a.date_input) as tgl_pesan,b.room_type,COUNT(b.room_id) AS jumlah FROM guest_book a INNER JOIN m_room b ON a.room_id = b.room_id WHERE a.hotel_id = '".$datahot['hotel_id']."' GROUP BY DATE(a.date_input) ORDER BY a.book_id DESC";
																					$stmthotel 	= $conn->prepare( $qryhotel );
																					$stmthotel->execute();
																					$i=0;
																					while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
																					extract($rowhotel);
																					$i++;
																				?>
																				<tr>
																				   <td><?PHP echo $tgl_pesan?></td>
																				   <td class="hidden-xs"><?PHP echo $room_type?></td>
																				   <td><?PHP echo $jumlah?></td>
																				</tr>
																				<?PHP
																				}
																				?>
																			 </tbody>
																		  </table>
																	   </div>
																	   <div class="tab-pane" id="feed">
																		  <div class="scroller" data-height="250px" data-always-visible="1" data-rail-visible="1">
																		  <?PHP
																					$qryhotel 	= "SELECT b.room_type, a.date_input as tgl_pesan FROM guest_book a INNER JOIN m_room b ON a.room_id = b.room_id WHERE a.hotel_id = '".$datahot['hotel_id']."'";
																					$stmthotel 	= $conn->prepare( $qryhotel );
																					$stmthotel->execute();
																					$i=0;
																					while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
																					extract($rowhotel);
																					$i++;
																		?>
																			  <div class="feed-activity clearfix">
																				<div>
																					<i class="pull-left roundicon fa fa-home btn btn-info"></i>
																					<h3><?PHP echo $room_type?></h3>
																				</div>
																				<div class="time">
																					<i class="fa fa-clock-o"></i>
																					<?PHP echo $tgl_pesan?>
																				</div>
																			  </div>
																		<?PHP
																		}
																		?>
																		  </div>
																	   </div>
																	   <div class="tab-pane active" id="info">
																			<div class="scroller" data-height="250px" data-always-visible="1" data-rail-visible="1">
																			<table width="100%">
																				<tr>
																					<td colspan="3"><h4><b>Profil Hotel</b></h4></td>
																				</tr>
																				<tr>
																					<td>Nama Hotel</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['hotel_nama']?></td>
																				</tr>
																				<tr>
																					<td>Alamat Hotel</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['hotel_address']?></td>
																				</tr>
																				<tr>
																					<td>Negara</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['count_name']?></td>
																				</tr>
																				<tr>
																					<td>Provinsi</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['prov_nama']?></td>
																				</tr>
																				<tr>
																					<td>Kota</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['kota_nama']?></td>
																				</tr>
																				<tr>
																					<td>Area</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['hotel_area']?></td>
																				</tr>
																				<tr>
																					<td>Rating</td>
																					<td>:</td>
																					<td>
																					<?PHP 
																						for ($x=1; $x<=$datahot['rate_id']; $x++) {
																						  echo "<i class='fa fa-star'></i>";
																						} 
																					?>
																					</td>
																				</tr>
																				<tr>
																					<td>Jumlah Kamar</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['hotel_jml_kamar']?></td>
																				</tr>
																				<tr>
																					<td>Jumlah Lantai</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['hotel_jml_lantai']?></td>
																				</tr>
																				<tr>
																					<td>Latitude</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['hotel_lat']?></td>
																				</tr>
																				<tr>
																					<td>Longitude</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['hotel_lang']?></td>
																				</tr>
																				<tr>
																					<td>Keyword Pencarian</td>
																					<td>:</td>
																					<td><?PHP echo $datahot['keyword']?></td>
																				</tr>
																			</table>
																			<table width="100%">
																				<tr>
																					<td colspan="3"><h4><b>Tempat Menarik Terdekat</b></h4></td>
																				</tr>
																				<?PHP
																					$qryhotel 	= "SELECT * FROM m_tmpt WHERE hotel_id = '".$datahot['hotel_id']."'";
																					$stmthotel 	= $conn->prepare( $qryhotel );
																					$stmthotel->execute();
																					$i=0;
																					while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
																					extract($rowhotel);
																					$i++;
																				?>
																				<tr>
																					<td align="center" width="5%"><i class='fa fa-truck'></i></td>
																					<td width="20%"><?PHP echo $tmpt_nama?></td>
																					<td><?PHP echo $tmpt_jarak?> (<?PHP echo $tmpt_satuan?>)</td>
																				</tr>
																				<?PHP
																				}
																				?>
																			</table>
																			<table width="100%">
																				<tr>
																					<td colspan="2"><h4><b>Fasilitas Hotel</b></h4></td>
																				</tr>
																				<?PHP
																					$qryhotel 	= "SELECT b.ame_nama FROM m_room_detail a INNER JOIN m_amenities b ON a.ame_id = b.ame_id WHERE a.hotel_id = '".$datahot['hotel_id']."'";
																					$stmthotel 	= $conn->prepare( $qryhotel );
																					$stmthotel->execute();
																					$i=0;
																					while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
																					extract($rowhotel);
																					$i++;
																				?>
																				<tr>
																					<td align="center" width="5%"><i class='fa fa-arrow-circle-o-right'></i></td>
																					<td><?PHP echo $ame_nama?></td>
																				</tr>
																				<?PHP
																				}
																				?>
																			</table>
																			<table width="100%">
																				<tr>
																					<td colspan="3"><h4><b>Deskripsi Hotel</b></h4></td>
																				</tr>
																				<?PHP
																					$qryhotel 	= "SELECT * FROM m_hotel_desk WHERE hotel_id = '".$datahot['hotel_id']."'";
																					$stmthotel 	= $conn->prepare( $qryhotel );
																					$stmthotel->execute();
																					$i=0;
																					while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
																					extract($rowhotel);
																					$i++;
																				?>
																				<tr>
																					<td align="center" width="5%"><i class='fa fa-book'></i></td>
																					<td width="20%"><b><?PHP echo $desk_judul?></b></td>
																					<td>&nbsp;</td>
																				</tr>
																				<tr>
																					<td align="center" width="5%"></td>
																					<td width="2%" align="center">&nbsp;</td>
																					<td><?PHP echo $desk_konten?></td>
																				</tr>
																				<?PHP
																				}
																				?>
																			</table>
																			<table width="100%">
																				<tr>
																					<td colspan="3"><h4><b>Kebijakan Hotel</b></h4></td>
																				</tr>
																				<?PHP
																					$qryhotel 	= "SELECT * FROM m_hotel_kebijakan WHERE hotel_id = '".$datahot['hotel_id']."'";
																					$stmthotel 	= $conn->prepare( $qryhotel );
																					$stmthotel->execute();
																					$i=0;
																					while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
																					extract($rowhotel);
																					$i++;
																				?>
																				<tr>
																					<td align="center" width="5%"><i class='fa fa-book'></i></td>
																					<td width="20%"><b><?PHP echo $keb_judul?></b></td>
																					<td>&nbsp;</td>
																				</tr>
																				<tr>
																					<td align="center" width="5%"></td>
																					<td width="2%" align="center">&nbsp;</td>
																					<td><?PHP echo $keb_konten?></td>
																				</tr>
																				<?PHP
																				}
																				?>
																			</table>
																			</div>
																	   </div>
																	</div>
																 </div>
															</div>
															</div>
															</div>
														</div>
														<!-- /ROW 2 -->
														
														
														</div>
														
														
													</div>
													<!-- /PROFILE DETAILS -->
												  </div>
											   </div>
											   <!-- /OVERVIEW -->
											   
											  
											</div>
										</div>
										</div>
										</div>
										</div>
										</div>
										<!-- /USER PROFILE -->
						
						
<!--// JAVASCRIPT CONTENT -->	

