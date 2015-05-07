<?PHP
	require ('../config/hotel.conn.php');
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
											Persediaan
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Persediaan</h3>
									</div>
									<div class="description">Halaman Untuk Persediaan Setiap Ruangan</div>
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
						<div id="showtable">
						
							<a href="view/addroom.form.php" class="fancybox fancybox.iframe" ><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>
							<br>
							<br>
							<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Daftar Persediaan Ruangan</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="2%">#</th>
													<th width="10%">Tipe Ruangan</th>
													<th width="10%">Tersedia</th>
													<th width="10%">Jml Tamu</th>
													<th width="10%">Tipe Kamar</th>
													<th width="10%">Info Penting</th>
													<th width="10%">Biaya Tambahan</th>
													<th width="15%">Harga</th>
													<th width="5%">Disc</th>
													<th width="13%" class="center">Option</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryhotel 	= "SELECT * FROM `m_room` WHERE hotel_id = '".$_SESSION["per"]."' ORDER BY room_id DESC";
												$stmthotel 	= $conn->prepare( $qryhotel );
												$stmthotel->execute();
												$i=0;
												while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
												extract($rowhotel);
												$i++;
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><b><?PHP echo $room_type?></b></td>
													<td><?PHP echo $room_avaibility?> Ruangan</td>
													<td><?PHP echo $room_jml_org?> Orang</td>
													<td><?PHP echo $room_tipe_kamar?></td>
													<td><?PHP echo $room_info_penting?></td>
													<td><?PHP echo $room_biaya_tambah?></td>
													<td align="right">Rp. <?PHP echo number_format($room_price,2,",",".")?></td>
													<td><?PHP echo $room_disc?>%</td>
													<td align="center">
													
													<a href="view/editroom.form.php?id=<?PHP echo $room_id?>" class="fancybox fancybox.iframe"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
													
													<a href="javascript:;" onclick="location.href='proses/addroom.proses.php?act=del&id=<?PHP echo $room_id?>'" ><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
													
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
						
						</div>
						
<!--// JAVASCRIPT CONTENT -->	

