												 <div class="form-group">
													<label class="col-sm-3 control-label">Nama Hotel</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['hotel_nama']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl/jam Pesan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['date_input']);?> / <?PHP echo $datadetailbook['jam_pesan']?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl Check-in</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['check_in'])?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tgl Check-out</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo fullDateDay($datadetailbook['check_out'])?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Tipe Ruangan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['room_type']?></label>
													</div>
												  </div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Durasi</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $tot_day->format("%a")?> Malam</label>
													</div>
												  </div>
												   <div class="form-group">
													<label class="col-sm-3 control-label">Jml Orang</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['pax']?> Orang</label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Jml Pesanan</label>
													<div class="col-sm-9">
													  <label class="form-control"><?PHP echo $datadetailbook['noroom']?> Ruangan</label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Harga /malam</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right" style="background-color: pink">Rp. <?PHP echo number_format($datadetailbook['hrg_hari_ini'],2,",",".")?></label>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-3 control-label">Total Pemesanan</label>
													<div class="col-sm-9">
													  <label class="form-control" align="right" style="background-color: pink">Rp. <?PHP echo number_format($datadetailbook['total_stlh_disc'],2,",",".")?></label>
													</div>
												  </div>