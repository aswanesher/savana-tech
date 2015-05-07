<?PHP
	require ('config/hotel.conn.php');
	require_once ('library/function.number.php');
	require_once ('library/function.convert.date.php');
	require_once ('library/function.cracked.php');
	if(empty($_COOKIE['usr']) && empty($_COOKIE['mail'])){
		echo "<script>window.location = 'index.php?menu=login';</script>";
	}
	$QryCheckGuest 	= $conn->query("SELECT * FROM guest_book WHERE name = '".$_COOKIE['usr']."' AND email = '".$_COOKIE['mail']."' GROUP BY email,name");
	$strDataGuest 	= $QryCheckGuest->fetch(PDO::FETCH_ASSOC);
	
	
		$actionGuest = 'update';
		$gender		= $strDataGuest['gender'];
		$nama		= $strDataGuest['name'];
		$email		= $strDataGuest['email'];
		$phone		= $strDataGuest['phone'];
		$tglLahir	= $strDataGuest['brithdate'];
		$namaTmpt   = $strDataGuest['place_name'];
		$alamat     = $strDataGuest['location'];
		$kodePos	= $strDataGuest['pos_code'];
		$negaraKode	= $strDataGuest['country'];
		$kotaId		= $strDataGuest['kota_id'];
		$provId		= $strDataGuest['prov_id'];
	
		$tgl = explode("-", $tglLahir);
		$tanggalLahir = $tgl[1] . "/" . $tgl[2] . "/" . $tgl[0];
?>
<!DOCTYPE html>
<html>
  <body id="top" class="thebg" >
    <div class="container breadcrub" style="margin-top: 31px">
	    <div>
			<div class="left">
				<ul class="bcrumbs">
					<li>SELAMAT DATANG, <?PHP echo $_COOKIE['usr']?></li>					
				</ul>				
			</div>
			<div class="right">
				<ul class="bcrumbs">
				<a style="text-decoration: none" href="javascript:;" onclick="location.href='checklogout.php'">Keluar</a>
				</ul>
			</div>
			
		</div>
		<div class="verif">		
		Untuk konfirmasi pembayaran silakan masuk ke menu<a style="text-decoration: none" data-toggle="tab" href="javascript:" onclick="mySelectUpdate()" data-target="#history"> Riwayat & Pembayaran	</a> 			
			</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<div class="container">

		
		<div class="container mt25 offset-0">
			
			
			<!-- CONTENT -->
			<!-- CONTENT -->
			<div class="col-md-12 pagecontainer2 offset-0">
				
				<!-- LEFT MENU -->
				<div class="col-md-1 offset-0">
					<!-- Nav tabs -->
					<ul class="nav profile-tabs" style="width: 131px;">
					  <li class="active" style="height: 154px;width: 154px;">
						  <a href="javascript:;" style="margin-left: -42px;" data-toggle="tab" data-target="#history" onclick="mySelectUpdate()">
						  <span class="history-icon"></span>								  
						 Riwayat & Pembayaran
						  </a></li>
					  <li class="" style="height: 154px;width: 154px;cursor: pointer">
						<a href="javascript:;" style="margin-left: -42px;" data-toggle="tab" data-target="#profile">
						<span class="profile-icon"></span>
						Profil Anda
						</a></li>
					  <li style="height: 154px;width: 154px;">
						  <a href="javascript:;" style="margin-left: -42px;" data-toggle="tab" data-target="#bookings" onclick="mySelectUpdate()">
						  <span class="bookings-icon"></span>						  
						Pemesanan Terakhir
						  </a></li>
					  <li style="height: 154px;width: 154px;">
						  <a href="javascript:;" style="margin-left: -42px;" data-toggle="tab" data-target="#password" onclick="mySelectUpdate()">
						  <span class="password-icon"></span>							  
						  Ubah Sandi
						  </a></li>
					  <li style="height: 154px;width: 154px;">
						  <a href="javascript:;" style="margin-left: -42px;" data-toggle="tab" data-target="#newsletter" onclick="mySelectUpdate()">
						  <span class="newsletter-icon"></span>									  
						  Berita Berlangganan
						  </a></li>
					  <li style="height: 154px;width: 154px;">
						  <a href="javascript:;" style="margin-left: -42px;" data-toggle="tab" data-target="#download" onclick="mySelectUpdate()">
						  <span class="settings-icon"></span>									  
						  Unduh Bukti
						  </a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<!-- LEFT MENU -->
					
				<!-- RIGHT CPNTENT -->
				<div class="col-md-11 offset-0">
					<!-- Tab panes from left menu -->
					<div class="tab-content5">
					
					  <!-- TAB 1 -->
					  <div class="tab-pane" id="profile">
						  
						<div class="clearfix"></div>
						
						<div class="relative margtop10" style="margin-top: 43px!important;margin-left: 130px; width:80%">
							<form action="pay/updateprof.php" method="post">
							<span class="size16 bold">Detail Data Pribadi (<i>Silahkan lengkapi data diri anda</i>)</span>
							<div class="line2"></div>
							<table>
								<tr>
									<td>
										<div class="radio left">
										  <label>
											<input type="radio" <?php echo $gen = $gender=='Laki-Laki'?'checked':'';?> name="gender" value="Laki-Laki" >
											Laki-laki 
										  </label>
										</div>
									</td>
									<td>
										<div class="radio">
										  <label>
											<input type="radio" <?php echo $gen = $gender=='Perempuan'?'checked':'';?> name="gender" value="Perempuan">
											Perempuan
										  </label>
										</div>
									</td>
								</tr>
							</table>
							
							
							<br/>
							Nama*:
							<input type="text" class="form-control" name="name" data-content="This field is mandatory" value="<?PHP echo $nama?>" >
							<br/>
							E-mail*:
							<input type="text" class="form-control" name="email"  value="<?PHP echo $email?>">
							<br/>
							No Tlp:
							<input type="text" class="form-control" name="phone" value="<?PHP echo $phone?>">	
							
							<br/>
							Tgl Lahir:<br/>
							<div class="row">
								<div class="col-md-4">
									<input type="text" name="brithdate" value="<?PHP echo $tanggalLahir?>" id="tglLahir" class="form-control mySelectCalendar" />
								</div>
								
							</div>


						
				
						<br/>
						<br/>						
						<span class="size16 bold">Informasi Alamat</span>
						<div class="line2"></div>
						
						<br/>
						Nama Perusahaan / Tempat:
						<input type="text" value="<?PHP echo $namaTmpt?>" name="place_name" class="form-control" placeholder="">	
						
						<br/>
						Alamat*:
						<input type="text" value="<?PHP echo $alamat?>" name="address" class="form-control" placeholder="">							
						
						<br/>
						Kode Pos*:
						<input type="text" value="<?PHP echo $kodePos?>" name="pos_code" class="form-control" placeholder="">

						<br/>
						Negara*:
						<select class="form-control" name="country" onchange="slCount(this)">
						  <option value="">Negara...</option>
							
							<?PHP
								$qrycountry 	= "SELECT * FROM m_country";
								$stmtcountry 	= $conn->prepare( $qrycountry );
								$stmtcountry->execute();		 
								while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
								extract($rowcountry);
									echo '<option value="'.$count_kode.'" >'.$count_name.'</option>';
							}
							?>
						</select>
						
						<br/><br/>
						Provinsi*:
						<select class="form-control" id="showProv" onchange="slProv(this)" name="prov_id">
							<?PHP
									$qrycountry 	= "SELECT * FROM m_prov";
									$stmtcountry 	= $conn->prepare( $qrycountry );
									$stmtcountry->execute();		 
									while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
									extract($rowcountry);
										if($provId == $prov_id){
											echo '<option value="'.$prov_id.'" >'.$prov_nama.'</option>';
										}
									}
								
							?>
						</select>
						<br/><br/>
						Kota*:
						<select class="form-control" id="showCity" name="kota_id">
							<?PHP
							$qrycountry 	= "SELECT * FROM m_kota";
							$stmtcountry 	= $conn->prepare( $qrycountry );
							$stmtcountry->execute();		 
							while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
							extract($rowcountry);
								if($kotaId == $kota_id){
									echo '<option value="'.$kota_id.'" >'.$kota_nama.'</option>';
								}
							}
							?>
						</select>
						<input type="hidden" name="actionGuest" value="<?PHP echo $actionGuest?>" />
						<input type="hidden" name="setMail" value="<?PHP echo $_COOKIE['mail']?>" />
						<input type="hidden" name="setName" value="<?PHP echo $_COOKIE['usr']?>" />
					    <button type="submit" class="greenbtn  margtop20">Perbaharui</button>
						</form>
						</div>
						  
						
						
						  

						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
								
						</div>
						<!-- END OF COL 1 -->
						
						<div class="clearfix"></div><br/><br/><br/>
						
					  </div>
					  <!-- END OF TAB 1 -->		

					  <?PHP
						$QryCheckTerakhir 	= $conn->query("SELECT * FROM guest_book WHERE book_id IN (SELECT MAX(book_id) as book_id FROM guest_book WHERE name = '".$_COOKIE['usr']."' AND email = '".$_COOKIE['mail']."' AND book_kode IS NOT NULL)");
						$strDataTerakhir 	= $QryCheckTerakhir->fetch(PDO::FETCH_ASSOC);
						if($strDataTerakhir['kategory_item'] == 25437857){
							$pesanName = 'Hotel';
						}else if($strDataTerakhir['kategory_item'] == 25437858){
							$pesanName = 'Mobil';
						}else if($strDataTerakhir['kategory_item'] == 25437859){
							$pesanName = 'Tiket Wisata';
						}else if($strDataTerakhir['kategory_item'] == 25437860){
							$pesanName = 'Restoran';
						}
							$tglBrangkat 	= convertDate($strDataTerakhir['check_in']);
							$hariBerangkat 	= dayChoice($strDataTerakhir['check_in']);
							
							$tglKembali 	= convertDate($strDataTerakhir['check_out']);
							$hariKembali 	= dayChoice($strDataTerakhir['check_out']);
					  ?>
					  
					  <!-- TAB 2 -->					  
					  <div class="tab-pane" id="bookings">
						<?PHP
							if($strDataTerakhir['kategory_item'] != ''){
						?>
							<div class="relative margtop10" style="margin-top: 69px!important;margin-left: 63px;margin-right: 42px;">
								<table class="table table-bordered  mt-10">
									<tr>
										<td>PESANAN TERAKHIR ANDA </td>
									</tr>
								</table>
							</div>
							<div class="relative margtop10" style="margin-top: 69px!important;margin-left: 100px;margin-right: 42px;">
								<table>
									<tr>
										<td>Anda Telah Memesan <b><?PHP echo $pesanName?></b> dengan rincian sebagai berikut:</td>
									</tr>
								</table>
								
							<?PHP
							$qrycek 	= $conn->query("SELECT voc_nilai FROM m_voucher WHERE voc_code_encrypt = '".$strDataTerakhir['xcode_voc']."'");
							$datavoc	= $qrycek->fetch(PDO::FETCH_ASSOC);
									switch ($strDataTerakhir['kategory_item']) {
									case 25437860: require_once('load_recent_kuliner.php'); break;
									case 25437859: require_once('load_recent_obyek.php'); break;
									case 25437857: require_once('load_recent_hotel.php'); break;
									case 25437858: require_once('load_recent_rental.php'); break;
									}
							?>
								
							</div>
							<?PHP 
							}else{
							?>	
								<div class="relative margtop10" style="margin-top: 69px!important;margin-left: 63px;margin-right: 42px;">
								<table class="table table-bordered  mt-10">
									<tr>
										<td>BELUM ADA PEMESANAN </td>
									</tr>
								</table>
							</div>
							<?PHP
							}
							?>
					  </div>
					  <!-- END OF TAB 2 -->	
					  
					  <!-- TAB 3 -->						  
					  <div class="tab-pane padding40 active" id="history">
							<div class="relative margtop10" style="margin-top: 28px!important;margin-left: 95px;margin-right: 42px;">
								<table>
									<tr>
										<td style="font-style:italic;">Untuk melakukan konfirmasi pembayaran Anda silakan klik <font style="color:red;">ID Pemesanan </font>Anda</td>
									</tr>
								</table>
							</div>
							<div class="relative margtop10" style="margin-top: 69px!important;margin-left: 94px;margin-right: 42px;">
								<table class="table table-bordered  mt-10">
									<tr>
										<td><b>Nama Pesanan</b></td>
										<td><b>Tgl Pesanan</b></td>
										<td><b>Kode Pesanan</b></td>
										<td><b>ID Pemesanan</b></td>
										<td><b>Status Pesanan</b></td>
									</tr>
									<?PHP
										$qryHistory	= "SELECT a.*,b.book_detail_id FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id WHERE a.email = '".$_COOKIE['mail']."' AND a.book_kode IS NOT NULL ORDER BY a.book_id ASC";
										$stmtHistory	= $conn->prepare( $qryHistory );
										$stmtHistory->execute();		 
										while ($rowHistory = $stmtHistory->fetch(PDO::FETCH_ASSOC)){
										extract($rowHistory);
											if($kategory_item == 25437857){
												$katName = 'Pemesanan Hotel';
											}else if($kategory_item == 25437858){
												$katName = 'Pemesanan Mobil';
											}else if($kategory_item == 25437859){
												$katName = 'Pemesanan Tiket Wisata';
											}else if($kategory_item == 25437860){
												$katName = 'Pemesanan Restoran';
											}
											
											if($flag_batal == 1){
												$status = 'Dibatalkan'; 
											}else if($book_detail_id != ''){
												$status	= 'Sudah Dibayar';
											}else{
												$status = 'Blm Dibayar';
											}
											
											//CONVERT DATE RESERVATION---------------------------
											$tglPesan 	= convertDate($date_input);
											$hariPesan 	= dayChoice($date_input);
											//---------------------------------------------------
											if($flag_batal == 1){
												?>
												<tr>
													<td><?PHP echo $katName?></td>
													<td><?PHP echo $hariPesan?>, <?PHP echo $tglPesan?></td>
													<td><?PHP echo $book_kode?></td>
													<td align="center" style="background-color: orange;color: white"><b><?PHP echo $very_code?></b></td>
													<td><?PHP echo $status?></td>
												</tr>
												<?PHP
											}else if($book_detail_id != ''){
												?>
												<tr style="cursor: pointer" class="cekCode" data-id="<?PHP echo $very_code?>">
													<td><?PHP echo $katName?></td>
													<td><?PHP echo $hariPesan?>, <?PHP echo $tglPesan?></td>
													<td><?PHP echo $book_kode?></td>
													<td align="center" style="background-color: orange;color: white"><b><?PHP echo $very_code?></b></td>
													<td><?PHP echo $status?></td>
												</tr>
												<?PHP
											}else{
												?>
												<tr style="cursor: pointer;" class="cekCode" data-id="<?PHP echo $very_code?>">
													<td><?PHP echo $katName?></td>
													<td><?PHP echo $hariPesan?>, <?PHP echo $tglPesan?></td>
													<td><?PHP echo $book_kode?></td>
													<td align="center" style="background-color: orange;color: white"><b><?PHP echo $very_code?></b></td>
													<td><?PHP echo $status?></td>
												</tr>
												<?PHP
											}
										
										}
									?>
								</table>
								<div class="relative margtop10" style="margin-top: 69px!important;margin-left: 63px;margin-right: 42px;">
								<div id="loading" align="center" style="display: none"><img src="images/load.gif"/><br>Silahkan Tunggu..</div><br>
								<div id="feri"></div>
								
								</div>
							</div>
					  </div>
					  <!-- END OF TAB 5 -->	
					  <!-- END OF TAB 3 -->	
					  
					  <!-- TAB 4 -->					  
					  <div class="tab-pane" id="download">
							<div class="relative margtop10" style="margin-top: 28px!important;margin-left: 95px;margin-right: 42px;width: 793px;">
							Silahkan Unduh Bukti Pemesanan Anda disini, apabila Status Pesanan <b>Masih Dalam Proses</b> silahkan kunjungi kembali beberapa saat lagi karena permintaan anda masih dalam pemeriksaan operator kami.
							</div>
							<div class="relative margtop10" style="margin-top: 28px!important;margin-left: 95px;margin-right: 42px;">
							<table class="table table-bordered  mt-10">
									<tr>
										<td><b>Nama Pesanan</b></td>
										<td><b>Tgl Pesanan</b></td>
										<td><b>Kode Pesanan</b></td>
										<td><b>Status Pesanan</b></td>
										<td align="center"><b>Pilihan</b></td>
									</tr>
									<?PHP
										$qryHistory	= "SELECT a.*,b.book_detail_id FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id WHERE a.name = '".$_COOKIE['usr']."' AND a.book_kode IS NOT NULL ORDER BY a.book_id ASC";
										$stmtHistory	= $conn->prepare( $qryHistory );
										$stmtHistory->execute();		 
										while ($rowHistory = $stmtHistory->fetch(PDO::FETCH_ASSOC)){
										extract($rowHistory);
											if($kategory_item == 25437857){
												$katName = 'Pemesanan Hotel';
											}else if($kategory_item == 25437858){
												$katName = 'Pemesanan Mobil';
											}else if($kategory_item == 25437859){
												$katName = 'Pemesanan Tiket Wisata';
											}else if($kategory_item == 25437860){
												$katName = 'Pemesanan Restoran';
											}
											
											if($flag_batal == 1){
												$status = 'Dibatalkan'; 
											}else if($flag_confirm == 1){
												$status	= 'Pesanan Disetujui';
											}else{
												$status = 'Masih dalam Proses';
											}
											
											//CONVERT DATE RESERVATION---------------------------
											$tglPesan 	= convertDate($date_input);
											$hariPesan 	= dayChoice($date_input);
											//---------------------------------------------------
											//CONVERT DATE DESTINATION---------------------------
											//$tglDesc 	= convertDate($databook['check_in']);
											//$hariDesc 	= dayChoice($databook['check_in']);
											//---------------------------------------------------
									?>
									<tr>
										<td><?PHP echo $katName?></td>
										<td><?PHP echo $hariPesan?>, <?PHP echo $tglPesan?></td>
										<td><?PHP echo $book_kode?></td>
										<td><?PHP echo $status?></td>
										<td align="center">
											<a href="javascript:;" onclick="location.href='pay/aprove.php?code=<?PHP echo $book_kode_encrypt?>'" style="text-decoration: none">Unduh</a>
										</td>
									</tr>
									<?PHP
										}
									?>
								</table>
							</div>
							<footer style="margin-top: 450px;">
								<div class="footer">
									<a href="javascript:;" id="gotop2" class="gotop"><img src="images/spacer.png" alt=""/></a>
								</div>
							</footer>
					  </div>
					  <!-- END OF TAB 4 -->	
					  
					 
					  
					  <!-- TAB 6 -->					  
					  <div class="tab-pane" id="password">
						<div class="padding40" style="margin-left: 78px;">
						
							<span class="dark size18">Ubah Kata Sandi</span>
							<div class="line4"></div>
							
							<br/>
							Kata Sandi Lama<br/>
							<input type="text" name="oldKey" value="<?PHP echo $strDataGuest['password']?>" class="form-control " placeholder="" readonly>
							<br/>
							Kata Sandi Baru<br/>
							<input type="text" name="newKey" class="form-control " placeholder="">
							<br/>
							<button type="submit" id="ubahSandi" class="btn-search5">Ubah Sandi</button>
							<div id="loadSandi" align="center" style="width: 43px;margin-left: 154px;margin-top: -34px;display: none"><img src="images/load.gif"/></div>
							<div id="msgSandi" align="center" style="width: 223px;margin-left: 161px;margin-top: -30px;display: none">Kata Sandi Berhasil di ubah !</div>
							
							<br/>
							<br/>
							<br/>
							<span class="dark size18">Pengamanan Akun</span>
							<div class="line4"></div>
							<br/>
							Pilih Pertanyaan Pengamanan<br/>
							<select class="form-control mySelectBoxClass hasCustomSelect cpwidth3" name="question">
							  <option value="Apa Nama Tengah ayah kamu?">Apa Nama Tengah ayah kamu?</option>
							  <option value="Nama Pertama Binatang Peliharaan">Nama Pertama Binatang Peliharaan</option>
							  <option value="Berapa Nomor Telepon Pertama Kamu">Berapa Nomor Telepon Pertama Kamu</option>
							</select>
							
							<br/>
							<br/>
							Jawaban Dari pertanyaan yang di pilih<br/>
							<input type="text" class="form-control " value="<?PHP echo $strDataGuest['answer']?>" name="answer" placeholder="">
					
							<br/>
							<button type="submit" id="securQues" class="btn-search5">Simpan Pengamanan</button>
							<div id="loadSecur" align="center" style="width: 43px;margin-left: 216px;margin-top: -34px;display: none"><img src="images/load.gif"/></div>
							<div id="msgSecur" align="center" style="width: 304px;margin-left: 211px;margin-top: -30px;display: none">Pengamanan Berhasil di terapkan !</div>
						</div>
					  </div>
					  <!-- END OF TAB 6 -->	
					  
					  <!-- TAB 7 -->					  
					  <div class="tab-pane" id="newsletter" style="margin-left: 70px;">
						<div class="padding40">

							<span class="dark size18">Berlangganan Berita</span>
							<p id="msgNewsYes" style="display: none"><span class="red size18">Anda Telah Berlangganan Berita Bulanan !!!</span></p>
							<p id="msgNewsNo" style="display: none"><span class="red size18">Anda Telah Berhenti Berlangganan Berita Bulanan !!!</span></p>
							<div class="line4"></div>
						
							<div class="checkbox dark">
							  <label>
								<input type="checkbox" id="news" <?php echo $news = $strDataGuest['flag_news']=='1'?'checked':'';?>> Centang kotak ini untuk berlangganan berita bulanan
							  </label>
							</div>
							
							<br/>
							<button type="submit" id="newsTetap" class="btn-search5">Tetapkan</button>							
						
						</div>
						<footer style="margin-top: 600px;">
								<div class="footer">
									<a href="javascript:;" id="gotop2" class="gotop"><img src="images/spacer.png" alt=""/></a>
								</div>
							</footer>
					  </div>
					  <!-- END OF TAB 7 -->	
					  
					  

					  
					</div>
					<!-- End of Tab panes from left menu -->	
					
				</div>
				<!-- END OF RIGHT CPNTENT -->
			
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
			

			
		</div>
				
		
	</div>
	<link rel='stylesheet' type='text/css' href='plugins/fancybox/source/jquery.fancybox.css?v=2.1.5' media='screen' />
	<script type='text/javascript' src='plugins/fancybox/source/jquery.fancybox.js?v=2.1.5'></script> 
	<script type="text/javascript">
		function slCount(strCount) {
		   var countId = strCount.value;
		   //alert(countId);
		   $.ajax({
				url: 'pay/getprov.php',
				type: 'GET',
				data: 'strCount=' + countId,
				cache: false,
				success: function(htmlCallBack) {
					$('#showProv').html(htmlCallBack);
				}
			});
		}
		
		function slProv(strProv) {
		   var provId = strProv.value;
		   $.ajax({
				url: 'pay/getkota.php',
				type: 'GET',
				data: 'strProv=' + provId,
				cache: false,
				success: function(htmlCallBack) {
					$('#showCity').html(htmlCallBack);
				}
			});
		}
	
		$(function() {
			$( "#tglLahir" ).datepicker({
			  changeMonth: true,
			  changeYear: true,
			  yearRange: "1960:2015",
			  defaultDate: '01/01/1990'
			});
		  });
		var dateToday = new Date(); 
		$(function() {
			$( "#tglBayar" ).datepicker({
				showButtonPanel: true,
				minDate: dateToday
			});
		});
		
	$(document).ready(function(){
			
		$('#newsTetap').bind("click", function () {	
			if ($('#news').is(':checked')) {
					var nilai = $('#news').is(':checked');
					$('#msgNewsYes').show();
				}  
				else {
					var nilai = $('#news').is();
					$('#msgNewsNo').show();
				}
					$.ajax({
						url: 'pay/newsletter.php',
						type: 'GET',
						data: 'nilai=' + nilai,
						cache: false,
						success: function(htmlCallBack) {
							var myVarload	= setInterval(function(){
								$('#msgNewsYes').hide();
								$('#msgNewsNo').hide();
								},5000);
						}
					});
		});
	
		$('#securQues').bind("click", function () {	
			var question 	= $('select[name=question]').val();
			var answer 		= $('input:text[name=answer]').val();
			if(answer == ''){
					alert('Jawaban Tidak Boleh Kosong !!!');
			}else{
				$('#loadSecur').show();
				var timePost	= setInterval(function(){loadtime()},4000);	
							$('#loadSecur').show();
							function loadtime() {
							$('#loadSecur').hide();
							$('#msgSecur').show();
								$.ajax({
									url: 'pay/securykey.php',
									type: 'GET',
									data: 'question=' + question + '&answer=' + answer,
									cache: false,
									success: function(htmlCallBack) {
										var timeMsg	= setInterval(function(){loadMsg()},2000);	
										function loadMsg() {
											$('input:text[name=answer]').val(answer);
											$('#msgSecur').hide();
										}
									}
								});
								clearTimeout(timePost);
						}
			}
			
		});
	
		$('#ubahSandi').bind("click", function () {	
			var newKey 		= $('input:text[name=newKey]').val();
				if(newKey == ''){
					alert('Kata Sandi Tidak Boleh Kosong!!!');
				}else{
					var timePost	= setInterval(function(){loadtime()},4000);	
							$('#loadSandi').show();
							function loadtime() {
							$('#loadSandi').hide();
							$('#msgSandi').show();
								$.ajax({
									url: 'pay/repairkey.php',
									type: 'GET',
									data: 'newKey=' + newKey,
									cache: false,
									success: function(htmlCallBack) {
										var timeMsg	= setInterval(function(){loadMsg()},2000);	
										function loadMsg() {
											$('input:text[name=oldKey]').val(newKey);
											$('input:text[name=newKey]').val('');
											$('#msgSandi').hide();
										}
									}
								});
								clearTimeout(timePost);
						}
				}
		});
		$('.cekCode').bind("click", function () {	
				var veryCode 	= $(this).data("id");
				var myVarload	= setInterval(function(){loadtime()},1000);
				$("#loading").show();
					function loadtime() {
						$.ajax({
							url: 'pay/getbook.php',
							type: 'GET',
							data: 'code=' + veryCode,
							cache: false,
							success: function(htmlCallBack) {
								$("#loading").hide();
								$('#feri').html(htmlCallBack);
							}
						});
						clearTimeout(myVarload);
					}
				
				
		});
	});
	
	</script>
  </body>
</html>
