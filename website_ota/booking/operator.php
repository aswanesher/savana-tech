<script>
	
    function hapus() {
        return window.confirm("Apakah anda yakin ingin membatalkan pemesanan ini ? ") }
    jQuery(document).ready(function() {		
        App.setPage("dynamic_table");  //Set current page
        App.init(); //Initialise plugins and elements
    });
</script>


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
								<p>- klik <a href="javascript:;" onclick="location.href='index.php?modul=op'"><span class="label label-success">disini</span></a> untuk merefresh ulang halaman</p>
								<p>- halaman ini akan secara otomatis membatalkan pesanan apabila dalam waktu 1 Jam terhitung dari waktu pemesanan apabila Tamu belum mengkonfirmasikan pembayarannya.</p>
								</div>
							</div>
						</div>
						<div id="result" align="center"></div><div id="message" class="alert alert-block alert-success" style="display: none">Data Berhasil Di konfirmasi</div><br>
						<!-- //KONTEN HALAMAN-->
						<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Daftar Pesanan Dari Website Walanja.co.id</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kode / Tgl Pemesanan</th>
													<th>ID Pemesanan</th>
													<th>Nama Tamu</th>
													<th>Jenis Kelamin</th>
													<th>Email</th>
													<th>Phone</th>
													<th class="center" style="background-color: ">DETAIL</th>
													<th class="center" style="background-color: ">CEK</th>
													<th class="center" style="background-color: ">UNDUH BKT</th>
													<th class="center" style="background-color: ">ACC</th>
													<th class="center" style="background-color: ">BATALKAN</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryguestbook 	= "SELECT a.book_id,a.book_kode,a.very_code,a.book_kode_encrypt,a.name,a.gender,a.flag_batal,a.email,a.phone,DATE(a.date_input) as tgl_pesan,a.check_in,a.check_out,a.pax,a.noroom,a.flag_confirm,b.book_detail_id FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id WHERE   a.rinci_id IS NULL AND a.book_kode IS NOT NULL AND a.hotel_id IS NOT NULL ORDER BY book_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												$i++;
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $book_kode?><br><b><?PHP echo fullDateDay($tgl_pesan)?></b></td>
													<td align="center"><h4><b><?PHP echo $very_code?></b></h4></td>
													<td><?PHP echo $name?></td>
													<td><?PHP echo $gender?></td>
													<td><?PHP echo $email?>&nbsp;(<a href="view/mes.form.php?id=<?PHP echo $book_id?>" class="fancybox fancybox.iframe"><i class="fa fa-envelope-o"></i></a>)</td>
													<td><?PHP echo $phone?></td>
													
													<td class="center" style="background-color: <?PHP echo $color?>"><a href="view/detail.form.php?id=<?PHP echo $book_kode_encrypt?>" class="fancybox fancybox.iframe" ><button class="btn btn-primary"><i class="fa fa-credit-card"></i></button></a></td>
													
													<td class="center" style="background-color: <?PHP echo $color?>"><a href="view/pay.form.php?id=<?PHP echo $book_kode_encrypt?>" class="fancybox fancybox.iframe" ><button class="btn btn-default">Rp</button></a></td>
													
													<td class="center" style="background-color: <?PHP echo $color?>">
													<a class="btn btn-default" href="javascript:;" onclick="location.href='../pay/aprove.php?with=op&code=<?PHP echo $book_kode_encrypt?>'"><i class="fa fa-download"></i></a>
													</td>
													
													<td class="center">
													
													<?PHP
														if($flag_confirm != 1){
															if($book_detail_id != '' and $flag_batal =='0'){
																
															
													?>
													<a href="javascript:;" id="<?PHP echo $book_kode?>" class="acc" ><button class="btn btn-success">O</button></a>
													<img id="loadbutton" style="display: none" src="../images/load.gif" />
													<?PHP
														}else{
														if($flag_batal != '0' ){
														?>
														<a href="javascript:;" ><button class="btn btn-default" disabled><i class="fa fa-times"></i></button></a>
														<?php
														
														}else{
													?>
													<a href="javascript:;" class="warning" ><button class="btn btn-success">O</button></a>
													<?PHP
													}
														}
													}else{
													?>
													<a href="javascript:;" ><button class="btn btn-default" disabled><i class="fa fa-check"></i></button></a>
													<?PHP
													}
													?>
													</td>
													
													<td class="center">
													
													<?PHP
														if($flag_batal != 1 and $flag_batal != 2 ){
															IF($flag_confirm != 1){
															
													?>
													<a href="btlpdf.php?id=<?PHP echo $book_id?>"   onclick="if(!hapus()) return false;"  ><button class="btn btn-success">O</button></a>
													<img id="loadbuttonAgent" style="display: none" src="../images/load.gif" />
													
													<?PHP
													}else{
													?>
													<a href="javascript:;" ><button class="btn btn-default" disabled><i class="fa fa-check"></i></button></a>
													<?php
													
													}
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
						<br>
						