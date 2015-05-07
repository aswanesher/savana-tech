<?PHP
	require ('../config/hotel.conn.php');
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
											Data Hotel
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Data Hotel</h3>
									</div>
									<div class="description">Halaman Semua Tentang hotel</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						
						
						<!-- MENU HALAMAN -->
						
						
						<!-- TABEL YANG DI PANGGIL -->
						<div id="showtable">
						
							<?PHP
								if ($_GET['modul'] == 'm_hotel' && $_GET['menu'] == 'm_hotel'){
								
								//============== MASTER HOTEL =======================
							?>
							<div class="row">
						
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(2);" onclick="location.href='index.php?modul=m_hotel&menu=m_fac'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Fasilitas Hotel</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(3);" onclick="location.href='index.php?modul=m_hotel&menu=m_ame'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Fasilitas Ruangan</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(1);" onclick="location.href='index.php?modul=m_hotel&menu=m_hotel'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Master Hotel</div>
									</a>
								</div>
								</div>
								
								<div class="separator"></div>
							<a href="view/addhotel.form.php" class="fancybox fancybox.iframe" ><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>
							<br>
							<br>
							<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Master Hotel</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th width="20%">Hotel Nama / Rate</th>
													<th>Hotel Address</th>
													<th width="15%">Latitude /<br>Langitude</th>
													<th width="15%">Harga Rata-rata</th>
													<th width="13%" class="center">Fasilitas</th>
													<th width="13%" class="center">Detail Info</th>
													<th width="13%" class="center">Option</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryhotel 	= "SELECT hotel_id,hotel_nama,hotel_desk,hotel_address,rate_id,hotel_lat,hotel_lang,hotel_img,hotel_avg FROM `m_hotel` WHERE kode_kategory = '25437857'";
												$stmthotel 	= $conn->prepare( $qryhotel );
												$stmthotel->execute();
												$i=0;
												while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
												extract($rowhotel);
												$i++;
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $hotel_nama?><br>
													<?PHP 
														for ($x=1; $x<=$rate_id; $x++) {
														  echo "<i class='fa fa-star'></i>";
														} 
													?>
													</td>
													<td><?PHP echo $hotel_address?></td>
													<td><?PHP echo $hotel_lat?> /<br><?PHP echo $hotel_lang?></td>
													<td align="right">Rp. <?PHP echo number_format($hotel_avg,2,",",".")?></td>
													<td align="center">
													<a href="view/addfac.form.php?id=<?PHP echo $hotel_id?>" class="fancybox fancybox.iframe"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
													</td>
													<td align="center">
													
													<a href="view/infohotel.form.php?id=<?PHP echo $hotel_id?>" class="fancybox fancybox.iframe"><button class="btn btn-info"><i class="fa fa-info"></i></button></a>
													
													</td>
													<td align="center">
													
													<a href="view/edithotel.form.php?id=<?PHP echo $hotel_id?>" class="fancybox fancybox.iframe"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
													
													<a href="javascript:;" onclick="location.href='proses/addhotel.proses.php?act=del&id=<?PHP echo $hotel_id?>'" ><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
													
													</td>
												</tr>
											<?PHP
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?PHP
							}else if($_GET['modul'] == 'm_hotel' && $_GET['menu'] == 'm_fac'){
							
							//====================MASTER FACILITITES======================
						?>
							<div class="row">
						
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(2);" onclick="location.href='index.php?modul=m_hotel&menu=m_fac'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Fasilitas Hotel</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(3);" onclick="location.href='index.php?modul=m_hotel&menu=m_ame'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Fasilitas Ruangan</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(1);" onclick="location.href='index.php?modul=m_hotel&menu=m_hotel'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Master Hotel</div>
									</a>
								</div>
								</div>
						<!--<a href="#" id="<?PHP echo $book_kode?>" class="fancybox fancybox.iframe" ><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>-->
							<br>
							<br>
							<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Room Facilities</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="20%">Facilities Nama</th>
													<th width="30%">Facilities Desk</th>
													<th width="13%" class="center">Option</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryhotel 	= "SELECT * FROM m_facilities";
												$stmthotel 	= $conn->prepare( $qryhotel );
												$stmthotel->execute();
												$i=0;
												while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
												extract($rowhotel);
												$i++;
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $fac_nama?></td>
													<td><?PHP echo $fac_desk?></td>
													<td align="center">
													
													<a href="view/editfac.form.php?id=<?PHP echo $fac_id?>" class="fancybox fancybox.iframe"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
													
													<!--<a href="#" id="" class="acc" ><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>-->
													
													</td>
												</tr>
											<?PHP
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						<?PHP
						}else if($_GET['modul'] == 'm_hotel' && $_GET['menu'] == 'm_ame'){
						
						//==========================MASTER AMENITIES===============================
						?>
						
						<div class="row">
						
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(2);" onclick="location.href='index.php?modul=m_hotel&menu=m_fac'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Fasilitas Hotel</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(3);" onclick="location.href='index.php?modul=m_hotel&menu=m_ame'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Fasilitas Ruangan</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(1);" onclick="location.href='index.php?modul=m_hotel&menu=m_hotel'">
										<i class="fa fa-building-o fa-2x"></i>
										<div>Master Hotel</div>
									</a>
								</div>
								</div>
						<!--<a href="#" id="" class="fancybox fancybox.iframe" ><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>-->
							<br>
							<br>
							<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Room Amenities</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="20%">Amenities Nama</th>
													<th width="30%">Amenities Desk</th>
													<th width="13%" class="center">Option</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryhotel 	= "SELECT * FROM m_amenities";
												$stmthotel 	= $conn->prepare( $qryhotel );
												$stmthotel->execute();
												$i=0;
												while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
												extract($rowhotel);
												$i++;
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $ame_nama?></td>
													<td><?PHP echo $ame_desk?></td>
													<td align="center">
													
													<a href="view/editame.form.php?id=<?PHP echo $ame_id?>" class="fancybox fancybox.iframe"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
													
													
													</td>
												</tr>
											<?PHP
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						<?PHP
						}
						?>
						</div>
						
<!--// JAVASCRIPT CONTENT -->	

