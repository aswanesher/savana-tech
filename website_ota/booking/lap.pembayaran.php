										<table style="font-size: 12px" id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kode / Tgl Pemesanan</th>
													<th>ID Pemesanan</th>
													<th>Hotel</th>
													<th>Nama Tamu</th>
													<th>Jenis Kelamin</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Bank Tujuan / Tgl Transfer</th>
													<th>Asal Bank</th>
													<th>A/N</th>
													<th>Jml Transfer</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
											
											if(isset($_GET['very_code'])){
												$a="and very_code='".$_GET['very_code']."'";
											}
										//	echo "SELECT a.book_id,a.kategory_item,a.book_kode,a.very_code,a.book_kode_encrypt,a.name,a.gender,a.email,a.phone,DATE(a.date_input) as tgl_pesan,a.check_in,a.check_out,a.pax,a.noroom,a.flag_confirm,b.book_detail_id,b.asal_bank,b.bank_tujuan,b.atas_nama,b.tgl_transfer,b.jml_transfer,b.upload,c.hotel_nama,a.flag_batal FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id LEFT JOIN m_hotel c on a.hotel_id=c.hotel_id WHERE a.rinci_id IS NULL AND a.book_kode IS NOT NULL AND a.kategory_item = '25437857' AND a.hotel_id IS NOT NULL ".$QryStrPay." $a ORDER BY book_id DESC";
												$qryguestbook 	= "SELECT a.book_id,a.kategory_item,a.book_kode,a.very_code,a.book_kode_encrypt,a.name,a.gender,a.email,a.phone,DATE(a.date_input) as tgl_pesan,a.check_in,a.check_out,a.pax,a.noroom,a.flag_confirm,b.book_detail_id,b.asal_bank,b.bank_tujuan,b.atas_nama,b.tgl_transfer,b.jml_transfer,b.upload,c.hotel_nama,a.flag_batal FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id LEFT JOIN m_hotel c on a.hotel_id=c.hotel_id WHERE a.rinci_id IS NULL AND a.book_kode IS NOT NULL AND a.kategory_item = '25437857' AND a.hotel_id IS NOT NULL ".$QryStrPay." $a ORDER BY book_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												$i++;
												if($bank_tujuan == 'BCA'){
													$namaBank = 'BCA (777.054.0300)';
												}else{
													$namaBank = 'Mandiri (132.001.099.7022)';
												}
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $book_kode?><br><b><?PHP echo fullDateDay($tgl_pesan)?></b></td>
													<td align="center"><a href="view/detail.form.php?id=<?PHP echo $book_kode_encrypt?>" class="fancybox fancybox.iframe" ><h4><b><?PHP echo $very_code?></b></h4></a></td>
													<td><?PHP echo $hotel_nama?></td>
													<td><?PHP echo $name?></td>
													<td><?PHP echo $gender?></td>
													<td><?PHP echo $email?></td>
													<td><?PHP echo $phone?></td>
													<td><?PHP echo $namaBank?><br><b><?PHP echo fullDateDay($tgl_transfer)?></b></td>
													<td><?PHP echo $asal_bank?></td>
													<td><?PHP echo $atas_nama?></td>
													<td><?PHP echo number_format($jml_transfer,2,",",".")?></td>
													<td><?PHP echo ($flag_batal=='0'?'':($flag_batal=='2'?'Dibatalkan oleh Operator':'Dibatalkan Oleh Sistem'))?></td>
												</tr>
											<?PHP
												}
											?>
											</tbody>
										</table>