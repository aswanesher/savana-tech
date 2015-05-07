<?PHP
	require ('../../config/hotel.conn.php');
	if ($_GET['type'] == 'approval'){
		$qrydatahot 	= $conn->query("SELECT * FROM guest_book_detail WHERE book_detail_id = '".$_GET['detid']."'");
		$datahot		= $qrydatahot->fetch(PDO::FETCH_ASSOC);
?>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Judul</label>
		<div class="col-sm-6">
			 <input type="text" name="title" class="form-control" value="KONFIRMASI PERSETUJUAN PEMESANAN" />
		</div>
	</div>
	<br>
	<br>
	<div class="form-group">
		<label class="col-sm-3 control-label">Isi Pesan</label>
		<div class="col-sm-12">
			<textarea type="text" name="content" style="height: 150px" class="form-control">Terima kasih Atas Pemesanan Anda Melalui Walanja, Pembayaran Telah Kami terima pada: Tanggal : <?PHP echo $datahot['tgl_transfer']?>, Asal Bank : <?PHP echo $datahot['asal_bank']?>, Atas Nama : <?PHP echo $datahot['atas_nama']?></textarea>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="separator"></div>
												  
		 <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Batal</a>
				<button class="btn btn-pink">Kirim</button>
			</div>
		</div>

<?PHP
	}else if ($_GET['type'] == 'cancel'){
?>

	<div class="form-group">
		<label class="col-sm-3 control-label">Judul</label>
		<div class="col-sm-6">
			 <input type="text" name="title" class="form-control" value="KONFIRMASI PEMBATALAN PEMESANAN" />
		</div>
	</div>
	<br>
	<br>
	<div class="form-group">
		<label class="col-sm-3 control-label">Isi Pesan</label>
		<div class="col-sm-12">
			<textarea type="text" name="content" style="height: 150px" class="form-control">Terima kasih Atas Pemesanan Anda Melalui Walanja, Mohon Maaf Pemesanan Anda Belum Dapat Kami Peroses Di karenakan batas waktu pembayaran telah melewati jatuh tempo. Silahkan Ulangi Kembali Tahap Pemesanan.</textarea>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="separator"></div>
												  
		 <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Batal</a>
				<button class="btn btn-pink">Kirim</button>
			</div>
		</div>

<?PHP
	}else if ($_GET['type'] == ''){
		echo '<script>alert("SIlahkan Pilih Jenis Pesan")</script>';
		echo '
		
	<div class="form-group">
													<label class="col-sm-3 control-label">Judul</label>
													<div class="col-sm-6">
														 <input type="text" name="title" class="form-control" disabled />
													</div>
												</div>
												<br>
												<br>
												<div class="form-group">
													<label class="col-sm-3 control-label">Isi Pesan</label>
													<div class="col-sm-12">
														<textarea type="text" name="content" style="height: 150px" class="form-control" disabled></textarea>
													</div>
												</div>
												<br><br><br><br><br><br><br><br><br><br>
												<div class="separator"></div>
																							  
													 <div class="form-group">
														<div class="col-sm-offset-2 col-sm-10">
															<a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Batal</a>
														</div>
													</div>
		
		';
	}
?>