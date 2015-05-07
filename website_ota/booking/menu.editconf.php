<?PHP
require ('../config/hotel.conn.php');
if(isset($_GET['idold']))
{
	
	$qrydatahot 	= $conn->query("SELECT * FROM m_hotel WHERE hotel_id = ".$_GET['idold']."");
	$datahot		= $qrydatahot->fetch(PDO::FETCH_ASSOC);
	echo '
	
		
										<!-- BASIC -->
										<div class="box">
											<div class="box-title">
												<h4>Perbaharui Hotel</h4>
											</div>
											<div class="box-body big">
												
												<form class="form-horizontal" action="../proses/addhotel.proses.php" method="POST" target="_parent" role="form" enctype="multipart/form-data">
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Nama Hotel</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" id="inputEmail3" name="hotel_nama" value="'.$datahot['hotel_nama'].'">
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
													<div class="col-sm-5">
													  <textarea class="form-control" id="inputPassword3" name="hotel_desk" value="">'.$datahot['hotel_desk'].'</textarea>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
													<div class="col-sm-5">
													  <textarea class="form-control" id="inputPassword3" name="hotel_address">'.$datahot['hotel_address'].'</textarea>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Rating</label>
													<div class="col-sm-5">
													  <select class="form-control" id="inputPassword3" name="rate_id">
															<option value="5" '.$c = $datahot['rate_id']=="5"?"selected":"".' > * * * * *</option>
															<option value="4" '.$c = $datahot['rate_id']=="4"?"selected":"".' > * * * *</option>
															<option value="3" '.$c = $datahot['rate_id']=="3"?"selected":"".' > * * *</option>
															<option value="2" '.$c = $datahot['rate_id']=="2"?"selected":"".' > * *</option>
															<option value="1" '.$c = $datahot['rate_id']=="1"?"selected":"".' > *</option>
													  </select>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Latitude</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" id="inputEmail3" name="hotel_lat" value="'.$datahot['hotel_lat'].'">
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Langitude</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" id="inputEmail3" name="hotel_lang" value="'.$datahot['hotel_lang'].'">
													</div>
												  </div>
												   <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
													<div class="col-sm-5">
													  <input type="file" class="file-input" id="inputEmail3" name="hotel_img">
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Harga Rata-Rata</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" style="text-align: right" id="inputEmail3" name="hotel_avg" value="'.$datahot['hotel_avg'].'">
													</div>
												  </div>
												  <div class="separator"></div>
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <input type="hidden" name="act" value="edit"/>
													  <input type="hidden" name="id" value="'.$_GET['idold'].'"/>
													  <a class="btn btn-inverse" onclick="javascript:parent.jQuery.fancybox.close();">Batal</a>
													  <button class="btn btn-pink">Simpan</button>
													</div>
												  </div>
												</form>

											</div>
										</div>	<!-- /BASIC -->
	
	';
}
?>