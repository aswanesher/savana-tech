<?PHP
	require ('../config/hotel.conn.php');
	require ('../library/function.cracked.php');
	require ('../library/function.convert.date.php');
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
											Data Pembayaran
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Data Pembayaran</h3>
									</div>
									<div class="description">Halaman Pembayaran</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						
						
						<!-- MENU HALAMAN -->
						
						
						<div class="separator"></div>
						
						<!-- TABEL YANG DI PANGGIL -->
						<div id="showtable">
						
							<?PHP
								if (isset($_GET['modul']) ){
								if((isset($_GET['very_code']) and $_GET['very_code'] != '' ) ){
									$a="and very_code='".$_GET['very_code']."'";
								
								//============== MASTER HOTEL =======================
							?>
							
							<br>
							<br>
							<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Data Pembayaran</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kode / Tgl Pemesanan</th>
													<th>ID Pemesanan</th>
													<th>Hotel</th>
													<th>Nama Tamu</th>
													<th>Jenis Kelamin</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Bank Tujuan / Tgl Transfer</th>
													<th>Asal Bank</th>
													<th>A/N</th>
													<th>Jml Transfer</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												
												//echo "SELECT a.book_id,a.kategory_item,a.book_kode,a.very_code,a.book_kode_encrypt,a.name,a.gender,a.email,a.phone,DATE(a.date_input) as tgl_pesan,a.check_in,a.check_out,a.pax,a.noroom,a.flag_confirm,c.hotel_nama FROM guest_book a  LEFT JOIN m_hotel c on a.hotel_id=c.hotel_id WHERE a.rinci_id IS NULL AND a.book_kode IS NOT NULL AND a.kategory_item = '25437857' AND a.hotel_id IS NOT NULL $a ORDER BY book_id DESC";
												
												$qryguestbook 	= "SELECT a.book_id,a.kategory_item,a.book_kode,a.very_code,a.book_kode_encrypt,a.name,a.gender,a.email,a.phone,DATE(a.date_input) as tgl_pesan,a.check_in,a.check_out,a.pax,a.noroom,a.flag_confirm,c.hotel_nama FROM guest_book a  LEFT JOIN m_hotel c on a.hotel_id=c.hotel_id WHERE 1=1 $a ORDER BY book_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												
												$qq 	= "SELECT b.book_detail_id,b.asal_bank,b.bank_tujuan,b.atas_nama,b.tgl_transfer,b.jml_transfer,b.upload from guest_book_detail b where book_id ='".$book_id."' ";
												$stmtdetail	= $conn->prepare( $qq );												
												$stmtdetail->execute();
												$rowdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
												extract($rowdetail);
												
												$qq2 	= "SELECT book_detail_id from guest_book_detail b where book_id ='".$book_id."' ";
												$stmtdetail2	= $conn->prepare( $qq2 );												
												$stmtdetail2->execute();
												$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
												extract($rows); 
												
												$i++;
												if($rows > 0){
													if($bank_tujuan == 'BCA'){
														$namaBank = 'BCA (777.054.0300)';
														$tgl_transfer=fullDateDay($tgl_transfer);
													}else{
														$namaBank = 'Mandiri (132.001.099.7022)';
														$tgl_transfer=fullDateDay($tgl_transfer);
													}
												}else {
													$tgl_transfer='';
													$namaBank='';
												}
												
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $book_kode?><br><b><?PHP echo fullDateDay($tgl_pesan)?></b></td>
													<td align="center"><h4><b><?PHP echo $very_code?></b></h4></td>
													<td><?PHP echo $hotel_nama?></td>
													<td><?PHP echo $name?></td>
													<td><?PHP echo $gender?></td>
													<td><?PHP echo $email?></td>
													<td><?PHP echo $phone?></td>
													<td><?PHP echo $namaBank?><br><b><?PHP echo $tgl_transfer?></b></td>
													<td><?PHP echo $asal_bank?></td>
													<td><?PHP echo $atas_nama?></td>
													<td><?PHP echo number_format($jml_transfer,2,",",".")?></td>
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
						<?php 
						
						} else {
							$a="and a.rinci_id='".$_GET['rinci_id']."'";
						
						?>
						<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Data Pembayaran</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kode / Tgl Pemesanann</th>
													<th>ID Pemesanan</th>
													<th>Hotel</th>
													<th>Nama Tamu</th>
													<th>Jenis Kelamin</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Bank Tujuan / Tgl Transfer</th>
													<th>Asal Bank</th>
													<th>A/N</th>
													<th>Jml Transfer</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												//echo "SELECT a.book_id,b.asal_bank,b.bank_tujuan,b.atas_nama,b.tgl_transfer,b.jml_transfer,c.hotel_nama,d.rinci_nomor,d.rinci_nama_pel,d.rinci_jenkel_pel,d.rinci_email_pel,d.rinci_tlp_pel FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id LEFT JOIN m_hotel c on a.hotel_id=c.hotel_id LEFT JOIN trs_kebutuhan d ON b.rinci_id=d.rinci_id WHERE a.rinci_id IS NOT NULL AND a.book_kode IS  NULL AND a.kategory_item = '25437857' AND a.hotel_id IS NOT NULL $a ORDER BY book_id DESC";
												$qryguestbook 	= "SELECT a.book_id,c.hotel_nama,d.rinci_id,d.rinci_tanggal,d.rinci_nomor,d.rinci_nama_pel,d.rinci_jenkel_pel,d.rinci_email_pel,d.rinci_tlp_pel FROM guest_book a  LEFT JOIN m_hotel c on a.hotel_id=c.hotel_id LEFT JOIN trs_kebutuhan d ON a.rinci_id=d.rinci_id WHERE a.rinci_id IS NOT NULL AND a.book_kode IS  NULL AND a.kategory_item = '25437857' AND a.hotel_id IS NOT NULL $a ORDER BY book_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												
												$qq 	= "SELECT b.book_detail_id,b.asal_bank,b.bank_tujuan,b.atas_nama,b.tgl_transfer,b.jml_transfer,b.upload from guest_book_detail b where book_id ='".$book_id."' ";
												$stmtdetail	= $conn->prepare( $qq );												
												$stmtdetail->execute();
												$rowdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
												extract($rowdetail);
												
												$qq2 	= "SELECT book_detail_id from guest_book_detail b where book_id ='".$book_id."' ";
												$stmtdetail2	= $conn->prepare( $qq2 );												
												$stmtdetail2->execute();
												$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
												extract($rows); 
												
												$i++;
												if($rows > 0){
													if($bank_tujuan == 'BCA'){
														$namaBank = 'BCA (777.054.0300)';
														$tgl_transfer=fullDateDay($tgl_transfer);
													}else{
														$namaBank = 'Mandiri (132.001.099.7022)';
														$tgl_transfer=fullDateDay($tgl_transfer);
													}
												}else {
													$tgl_transfer='';
													$namaBank='';
												}
												
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $rinci_nomor?><br><b><?PHP echo fullDateDay($rinci_tanggal)?></b></td>
													<td align="center"><h4><b><?PHP echo $rinci_id?></b></h4></td>
													<td><?PHP echo $hotel_nama?></td>
													<td><?PHP echo $rinci_nama_pel?></td>
													<td><?PHP echo $rinci_jenkel_pel?></td>
													<td><?PHP echo $rinci_email_pel?></td>
													<td><?PHP echo $rinci_tlp_pel?></td>
													<td><?PHP echo $namaBank?><br><b><?PHP echo $tgl_transfer?></b></td>
													<td><?PHP echo $asal_bank?></td>
													<td><?PHP echo $atas_nama?></td>
													<td><?PHP echo number_format($jml_transfer,2,",",".")?></td>
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
							}
						?>
						</div>
						
<!--// JAVASCRIPT CONTENT -->	

