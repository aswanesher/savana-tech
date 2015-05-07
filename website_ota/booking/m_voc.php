<?PHP
	require ('../config/hotel.conn.php');
	$color = "grey";
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
											Voucher Discount
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Voucher Discount</h3>
									</div>
									<div class="description">Halaman Untuk Pembuatan Voucher Discount</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						
						<a href="view/addvoc.form.php" class="fancybox fancybox.iframe" ><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>
						<br>
						<br>
						<!-- //KONTEN HALAMAN-->
						<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Daftar Voucher</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th width="30%">Kode Serial Voucher / Tgl Pembuatan</th>
													<th>Nilai Voucher</th>
													<th>Masa Berlaku</th>
													<th>Status</th>
													<th class="center" style="background-color: ">Option</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryguestbook 	= "SELECT *,DATEDIFF(voc_exp,CURDATE()) AS hitung FROM m_voucher ORDER BY voc_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												//$date = new DateTime($voc_exp);
												
												
												if ($hitung < 0){
													$status = "Sudah Expire";
													$label = "warning";
												}else if ($flag_use == 1){
													$status = "Sudah Terpakai";
													$label = "info";
												}else{
													$status = "Masih Berlaku";
													$label = "danger";
												}
												$i++;
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $voc_code?><br><?PHP echo $date_input?></td>
													<td align="right">Rp. <?PHP echo number_format($voc_nilai,2,",",".")?></td>
													<td><?PHP echo $voc_exp?></td>
													<td><span class="label label-<?PHP echo $label?>"><?PHP echo $status?></span></td>
													
													<td class="center" style="background-color: <?PHP echo $color?>">
													<?PHP
													if ($flag_use != 1 && $hitung > 0){
													?>
													<a href="view/editvoc.form.php?id=<?PHP echo $voc_id?>" class="fancybox fancybox.iframe"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
													<?PHP
													}else{
													?>
													<a href="javascript:;" onclick="waredit();"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
													<?PHP
													}
													if ($flag_use != 1 && $hitung > 0){
													?>
													
													<a href="javascript:;" onclick="location.href='proses/addvoc.proses.php?act=del&id=<?PHP echo $voc_id?>'" ><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
													
													<?PHP
													}else{
													?>
													
													<a href="javascript:;" onclick="warremove();" ><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
													
													<?PHP
													}
													?>
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
						
						
<!--// JAVASCRIPT CONTENT -->	

