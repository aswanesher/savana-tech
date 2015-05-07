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
											<a href="javascript:;" onclick="location.href='//walanja.co.id/booking/'">Home</a>
										</li>
										<li>
											Penutupan Pesanan
										</li>
									</ul>
									<div class="clearfix">
										<h3 class="content-title pull-left">Penutupan Pesanan</h3>
									</div>
									<div class="description">Halaman Untuk Penutupan Pesanan Apabila Pesanan telah selesai</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-block alert-warning fade in">
								<p></p><h4><i class="fa fa-exclamation-circle"></i> Perhatian</h4> 
								<p>- Daftar Pesanan di bawah telah di urutkan berdasarkan tanggal pesanan terbaru dan sudah melewati tahap persetujuan oleh operator</p>
								<p>- Pilih atau klik salah satu kategori untuk menbuka rincian pemesanan yang akan di tutup pemesanannya</p>
								<p>- Apabila pesanan dalam waktu yg lama tidak di tutup (closing) maka daftar item yang terdapat di halaman website tidak akan bisa di pesanan.</p>
								</div>
							</div>
						</div>
								<div class="alert alert-block alert-success" style="display: none">Data Berhasil Di Tutup</div><br>
									<div class="box-body">
										<div class="panel-group" id="accordion">
										<?PHP
											$QryCekKategory 	= "SELECT kode_kategory FROM m_hotel GROUP BY kode_kategory";
											$stmtCekKategory 	= $conn->prepare( $QryCekKategory );
											$stmtCekKategory->execute();
											$i=0;
											while ($rowCekKategory = $stmtCekKategory->fetch(PDO::FETCH_ASSOC)){
											extract($rowCekKategory);
											$i++;
											if($kode_kategory == 25437857){
												$namaKategory = 'Hotel';
											}else if($kode_kategory == 25437858){
												$namaKategory = 'Mobil';
											}else if($kode_kategory == 25437859){
												$namaKategory = 'Tiket Wisata';
											}else if($kode_kategory == 25437860){
												$namaKategory = 'Restoran';
											}
										?>
										
											  <div class="panel panel-default">
												 <div class="panel-heading">
													<h3 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#<?PHP echo $kode_kategory.$i?>" href="javascript:;"><b>Daftar Pemesanan <?PHP echo $namaKategory?> </b></a> </h3>
												 </div>
												 <div id="<?PHP echo $kode_kategory.$i?>" class="panel-collapse collapse" style="height: auto;">
													<div class="panel-body">
													<?PHP
														switch ($kode_kategory) {
															case 25437857: require_once('load_tutup_hotel.php'); break;
															case 25437858: require_once('load_tutup_rent.php'); break;
															case 25437859: require_once('load_tutup_wisata.php'); break;
															case 25437860: require_once('load_tutup_rentoran.php'); break;
															default:
														}
													?>
													</div>
												 </div>
											  </div>
										<?PHP
											}
										?>  
										  
										  
									   </div>
									</div>