													<?PHP
													$QryCekPesananRent	 	= "SELECT a.*,b.* FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.kategory_item = '25437858' AND a.flag_confirm = '1' AND a.flag_closing = '0'";
													$stmtCekPesananRent 	= $conn->prepare( $QryCekPesananRent );
													$stmtCekPesananRent->execute();
													while ($rowCekPesananRent = $stmtCekPesananRent->fetch(PDO::FETCH_ASSOC)){
													extract($rowCekPesananRent);
													?>
													<div class="col-md-4">
															<!-- BOX-->
															<div class="box border primary">
																<div class="box-title">
																	<i class="fa fa-barcode"></i> <?PHP echo $book_kode?>
																</div>
																<div class="box-body">
																	<table width="100%">
																		<tr>
																			<td>Nama Tamu</td>
																			<td>:</td>
																			<td><?PHP echo $name?></td>
																		</tr>
																		<tr>
																			<td>Nama Mobil</td>
																			<td>:</td>
																			<td><?PHP echo $rent_merk.' '.$hotel_nama?></td>
																		</tr>
																		<tr>
																			<td>Tujuan</td>
																			<td>:</td>
																			<td><?PHP echo $rent_tujuan?></td>
																		</tr>
																		<tr>
																			<td>Tgl Berangkat</td>
																			<td>:</td>
																			<td><?PHP echo fullDateDay($check_in)?></td>
																		</tr>
																		<tr>
																			<td>Tgl Kembali</td>
																			<td>:</td>
																			<td><?PHP echo fullDateDay($check_out)?></td>
																		</tr>
																		<tr>
																			<td>Jml Penumpang</td>
																			<td>:</td>
																			<td><?PHP echo $rent_jml_penumpang?> Orang</td>
																		</tr>
																		<tr>
																			<td colspan="3">&nbsp;</td>
																		</tr>
																		<tr>
																			<td colspan="3" align="center"><a href="javascript:;" id="<?PHP echo '25437858.'.$book_id?>" class="btn btn-block btn-yellow">Tutup Pesanan</a></td>
																		</tr>
																	</table>
																</div>
															</div>
															<!-- /BOX -->
														</div>
														<?PHP
														}
														?>	