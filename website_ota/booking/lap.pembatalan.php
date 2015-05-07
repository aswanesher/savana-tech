										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kategory Pesanan</th>
													<th>Kode / Tgl Pemesanan</th>
													<th>ID Pemesanan</th>
													<th>Hotel</th>
													<th>Nama Tamu</th>
													<th>Jenis Kelamin</th>
													<th>Email</th>
													<th>Phone</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryguestbook 	= "SELECT a.book_id,a.kategory_item,a.book_kode,a.very_code,a.book_kode_encrypt,a.name,a.gender,a.email,a.phone,DATE(a.date_input) as tgl_pesan,a.check_in,a.check_out,a.pax,a.noroom,a.flag_confirm,b.book_detail_id,c.hotel_nama FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id LEFT JOIN m_hotel c ON a.hotel_id=c.hotel_id WHERE a.flag_batal = '1' AND a.rinci_id IS NULL AND a.book_kode IS NOT NULL AND a.hotel_id IS NOT NULL ".$QryStrPemesanan." ORDER BY book_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												$i++;
												if($kategory_item == 25437857){
													$kategory = 'Pemesanan Hotel';
												}else if($kategory_item == 25437858){
													$kategory = 'Pemesanan Mobil';
												}
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $kategory?></td>
													<td><?PHP echo $book_kode?><br><b><?PHP echo fullDateDay($tgl_pesan)?></b></td>
													<td align="center"><h4><b><?PHP echo $very_code?></b></h4></td>
													<td><?PHP echo $hotel_nama ?></td>
													<td><?PHP echo $name?></td>
													<td><?PHP echo $gender?></td>
													<td><?PHP echo $email?></td>
													<td><?PHP echo $phone?></td>
												</tr>
											<?PHP
												}
											?>
											</tbody>
										</table>