												 <div class="form-group">
													<label class="col-sm-3 control-label">Nama Obyek Wisata</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['hotel_nama']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl Pesan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['date_input']);?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl Brangkat</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['check_in'])?></label>
													</div>
												  </div>
												   <div class="form-group">
													<label class="col-sm-3 control-label">Jml Wisatawan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['obj_dewasa']?> Dewasa, <?PHP echo $datadetailbook['obj_anak']?> Anak</label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Harga Rata-rata Tiket</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right" style="background-color: pink">Rp. <?PHP echo number_format($datadetailbook['hotel_avg'],2,",",".")?></label>
													</div>
												  </div>