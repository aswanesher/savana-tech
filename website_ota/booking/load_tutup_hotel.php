													<?PHP
													$QryCekPesanan	 	= "SELECT a.*,b.hotel_nama,c.room_type FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id INNER JOIN m_room c ON a.room_id = c.room_id WHERE a.kategory_item = '25437857' AND a.flag_confirm = '1' AND a.flag_closing = '0'";
													$stmtCekPesanan 	= $conn->prepare( $QryCekPesanan );
													$stmtCekPesanan->execute();
													while ($rowCekPesanan = $stmtCekPesanan->fetch(PDO::FETCH_ASSOC)){
													extract($rowCekPesanan);
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
																			<td>Nama Hotel</td>
																			<td>:</td>
																			<td><?PHP echo $hotel_nama?></td>
																		</tr>
																		<tr>
																			<td>Type Ruangan</td>
																			<td>:</td>
																			<td><?PHP echo $room_type?></td>
																		</tr>
																		<tr>
																			<td>Check-in</td>
																			<td>:</td>
																			<td><?PHP echo fullDateDay($check_in)?></td>
																		</tr>
																		<tr>
																			<td>Check-out</td>
																			<td>:</td>
																			<td><?PHP echo fullDateDay($check_out)?></td>
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
																			<td colspan="3" align="center"><a href="javascript:;" id="<?PHP echo '25437857.'.$book_id?>" class="btn btn-block btn-yellow">Tutup Pesanan</a></td>
																		</tr>
																	</table>
																</div>
															</div>
															<!-- /BOX -->
														</div>
														<?PHP
														}
														?>	