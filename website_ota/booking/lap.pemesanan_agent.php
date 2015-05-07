	
									<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kategory Pesanan</th>
													<th>Kode / Tgl Pemesanan</th>
													<th>Kode Agent</th>
													<th>Nama Agent</th>
													<th>Hotel</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
										//	echo "SELECT d.kode_kategory,d.hotel_nama,a.rinci_id,a.rinci_nomor,a.status_cetak,a.rinci_tanggal,b.kar_nama,b.kar_kode FROM trs_kebutuhan a INNER JOIN mst_karyawan b ON a.kar_id = b.kar_id INNER JOIN guest_book c ON a.rinci_id = c.rinci_id INNER JOIN m_hotel d ON cs.hotel_id = d.hotel_id  WHERE a.status_send = '1' ".$QryPesanAgent."  ORDER BY a.rinci_id DESC";
												$qryagent 	= "SELECT d.kode_kategory,d.hotel_nama,a.rinci_id,a.rinci_nomor,a.status_cetak,a.rinci_tanggal,b.kar_nama,b.kar_kode FROM trs_kebutuhan a INNER JOIN mst_karyawan b ON a.kar_id = b.kar_id INNER JOIN guest_book c ON a.rinci_id = c.rinci_id INNER JOIN m_hotel d ON c.hotel_id = d.hotel_id  WHERE a.status_send = '1' ".$QryPesanAgent."  ORDER BY a.rinci_id DESC";
												$stmtagent	= $conn->prepare( $qryagent );
												$stmtagent->execute();
												$i=0;
												while ($rowguestbook = $stmtagent->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												
												
												$i++;
												if($kode_kategory == 25437857){
													$kategory = 'Pemesanan Hotel';
												}else if($kode_kategory == 25437858){
													$kategory = 'Pemesanan Mobil';
												}
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $kategory?></td>
													<td><?PHP echo $rinci_nomor?><br><b><?PHP echo fullDateDay($rinci_tanggal)?></b></td>
													<td align="center"> <a href="view/detailpemesanan.form.php?id=<?PHP echo $rinci_id?>" class="fancybox fancybox.iframe" > <h4><b><?PHP echo $kar_kode?></b></h4>  </a></td>
													<td><?PHP echo $kar_nama?></td>
													<td><?PHP echo $hotel_nama?></td>
												</tr>
											<?PHP
												}
											?>
											</tbody>
										</table>