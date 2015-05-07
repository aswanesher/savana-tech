													<?PHP
													$QryCekPesananRent	 	= "SELECT a.*,b.* FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.kategory_item = '25437860' AND a.flag_confirm = '1' AND a.flag_closing = '0'";
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
																			<td>Tujuan</td>
																			<td>:</td>
																			<td><?PHP echo $wiskul_tujuan?></td>
																		</tr>
																		<tr>
																			<td>Nama Tempat</td>
																			<td>:</td>
																			<td><?PHP echo $hotel_nama?></td>
																		</tr>
																		<tr>
																			<td>No Meja</td>
																			<td>:</td>
																			<td><?PHP echo $meja_nomor?></td>
																		</tr>
																		<tr>
																			<td>Tgl Kunjungan</td>
																			<td>:</td>
																			<td><?PHP echo fullDateDay($check_in)?></td>
																		</tr>
																		<tr>
																			<td>Jml Orang</td>
																			<td>:</td>
																			<td><?PHP echo $pax?> Orang</td>
																		</tr>
																		<tr>
																			<td colspan="3">&nbsp;</td>
																		</tr>
																		<tr>
																			<td colspan="3" align="center"><a href="javascript:;" id="<?PHP echo '25437860.'.$book_id.'.'.$meja_nomor_pesanan?>" class="btn btn-block btn-yellow">Tutup Pesanan</a></td>
																		</tr>
																	</table>
																</div>
															</div>
															<!-- /BOX -->
														</div>
														<?PHP
														}
														?>	