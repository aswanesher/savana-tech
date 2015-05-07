<?PHP
	require ('../config/hotel.conn.php');
	require ('../library/function.convert.date.php');
	$color = "grey";
?>
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.html">Home</a>
										</li>
										<li>
											Operator
										</li>
									</ul>
									<div class="clearfix">
										<h3 class="content-title pull-left">Operator</h3>
									</div>
									<div class="description">Halaman Untuk Persetujuan Pemesanan</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-block alert-warning fade in">
								<p></p><h4><i class="fa fa-exclamation-circle"></i> Perhatian</h4> 
								<p>- Terdapat 2 daftar pemesanan diantaranya pemesanan yang dilakukan melalui website walanja.co.id dan pemesanan yang di lakukan melalui agent.walanja.co.id.</p>
								<p>- Mohon untuk selalu merefresh ulang halaman Operator ini untuk mendapatkan update'n daftar tamu dan setiap akan melakukan persetujuan pemesanan.</p>
								<p>- klik <a href="javascript:;" onclick="location.href='index.php?modul=opagt'"><span class="label label-success">disini</span></a> untuk merefresh ulang halaman</p>
								<p>- halaman ini akan secara otomatis membatalkan pesanan apabila dalam waktu 1 Jam terhitung dari waktu pemesanan apabila Tamu belum mengkonfirmasikan pembayarannya.</p>
								</div>
							</div>
						</div>
						
						<br>
						<div id="result" align="center"></div><div id="messageAgent" class="alert alert-block alert-success" style="display: none">Data Berhasil Di konfirmasi</div><br>
						<div class="row">
							<div class="col-sm-12">
									<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Daftar Pesanan Dari App Travel Agent</h4>
									</div>
									<div class="box-body">
										<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kode / Tgl Pemesanan</th>
													<th>Kode Agent</th>
													<th>Nama Agent</th>
													<th>Status Pesanan</th>
													<th class="center" style="background-color: ">DETAIL</th>
													<th class="center" style="background-color: ">CEK</th>
													<th class="center" style="background-color: ">UNDUH BKT AGENT</th>
													<th class="center" style="background-color: ">ACC</th>
													<th class="center" style="background-color: ">BATALKAN</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryguestbook 	= "SELECT a.rinci_id,a.rinci_nomor,a.status_cetak,a.rinci_tanggal,b.kar_nama,b.kar_kode FROM trs_kebutuhan a INNER JOIN mst_karyawan b ON a.kar_id = b.kar_id WHERE a.status_send = '1' ORDER BY a.rinci_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												$i++;
													if($status_cetak == 0){
														$statusPesan = 'Menunggu Konfirmasi';
													}else if($status_cetak == 1){
														$statusPesan = 'Di ACC';
														$icon = 'fa fa-check';
													}else if($status_cetak == 2){
														$statusPesan = 'Dibatalkan';
														$icon = 'fa fa-times';
													}
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $rinci_nomor?><br><b><?PHP echo fullDateDay($rinci_tanggal)?></b></td>
													<td align="center"><h4><b><?PHP echo $kar_kode?></b></h4></td>
													<td><?PHP echo $kar_nama?></td>
													<td><b><?PHP echo $statusPesan?></b></td>
													
													<td class="center" style="background-color: <?PHP echo $color?>"><a href="view/detailpemesanan.form.php?id=<?PHP echo $rinci_id?>" class="fancybox fancybox.iframe" ><button class="btn btn-primary"><i class="fa fa-credit-card"></i></button></a></td>
													
													<td class="center" style="background-color: <?PHP echo $color?>"><a href="view/cekdeposit.form.php?id=<?PHP echo $rinci_id?>" class="fancybox fancybox.iframe" ><button class="btn btn-default">Rp</button></a></td>
													
													<td class="center" style="background-color: <?PHP echo $color?>">
													<a class="btn btn-default" href="javascript:;" onclick="location.href='downloadfile.php?with=agent&id=<?PHP echo $rinci_id?>'"><i class="fa fa-download"></i></a>
													</td>
													
													<td class="center">
													
													<?PHP
														if($status_cetak != 1 && $status_cetak != 2){
															
													?>
													<a href="javascript:;" id="<?PHP echo $rinci_id.'.'.$rinci_nomor?>" class="accAgent" ><button class="btn btn-success">O</button></a>
													<img id="loadbuttonAgent" style="display: none" src="../images/load.gif" />
													
													<?PHP
													}else{
													?>
													<a href="javascript:;" ><button class="btn btn-default" disabled><i class="<?PHP echo $icon?>"></i></button></a>
													<?PHP
													}
													?>
													</td>
													
													<td class="center">
													
													<?PHP
														if($status_cetak != 1 && $status_cetak != 2){
															
													?>
													<a href="javascript:;" id="<?PHP echo $rinci_id.'.'.$rinci_nomor?>" class="btlAgent" ><button class="btn btn-success">O</button></a>
													<img id="loadbuttonAgent" style="display: none" src="../images/load.gif" />
													
													<?PHP
													}else{
													?>
													<a href="javascript:;" ><button class="btn btn-default" disabled><i class="fa fa-times"></i></button></a>
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