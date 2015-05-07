												 <div class="form-group">
													<label class="col-sm-3 control-label">Nama Mobil</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['rent_merk']?> <?PHP echo $datadetailbook['hotel_nama']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl/jam Pesan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['date_input']);?> / <?PHP echo $datadetailbook['jam_pesan']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl Brangkat & Jam Pengambilan Kendaraan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['check_in'])?> : <?PHP echo $datadetailbook['rent_jam']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl Kembali & Jam Pengembalian Kendaraan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['check_out'])?> : <?PHP echo $datadetailbook['rent_jam']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Jml Hari</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $tot_day->format("%a")?></label>
													</div>
												  </div>
												   <div class="form-group">
													<label class="col-sm-3 control-label">Jml Penumpang</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['rent_jml_penumpang']?> Orang</label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Harga Per Hari</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right" style="background-color: pink">Rp. <?PHP echo number_format($datadetailbook['hotel_avg'],2,",",".")?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Total Pemesanan</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right" style="background-color: pink">Rp. <?PHP echo number_format($datadetailbook['total_stlh_disc'],2,",",".")?></label>
													</div>
												  </div>