													<?PHP
													$QryCekPesananRent	 	= "SELECT a.*,b.* FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.kategory_item = '25437859' AND a.flag_confirm = '1' AND a.flag_closing = '0'";
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
																			<td><?PHP echo $obj_tujuan?></td>
																		</tr>
																		<tr>
																			<td>Nama Tempat</td>
																			<td>:</td>
																			<td><?PHP echo $hotel_nama?></td>
																		</tr>
																		<tr>
																			<td>Tgl Berangkat</td>
																			<td>:</td>
																			<td><?PHP echo fullDateDay($check_in)?></td>
																		</tr>
																		<tr>
																			<td>Jml wisatawan</td>
																			<td>:</td>
																			<td><?PHP echo 'Dewasa ('.$obj_dewasa.') Anak ('.$obj_anak.')'?></td>
																		</tr>
																		<tr>
																			<td colspan="3">&nbsp;</td>
																		</tr>
																		<tr>
																			<td colspan="3" align="center"><a href="javascript:;" id="<?PHP echo '25437859.'.$book_id?>" class="btn btn-block btn-yellow">Tutup Pesanan</a></td>
																		</tr>
																	</table>
																</div>
															</div>
															<!-- /BOX -->
														</div>
														<?PHP
														}
														?>	