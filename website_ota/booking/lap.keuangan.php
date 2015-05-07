										
										
										
							
										<br><br><br><br>
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Kode / Tgl Pemesanan</th>
													<th>ID Pemesanan</th>
													<th>Hotel</th>
													<th>Jumlah Pesan</th>
													<th>harga Kalender</th>
													<th>Harga OTA</th>
													<th>Total Harga Pemesanan</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
											
											if(isset($hotel)){
												$htl='and a.hotel_id = '.$hotel.'';
											}else {
												$htl='';
											}
												$qryguestbook 	= "SELECT a.book_id,a.kategory_item,a.book_kode,a.very_code,a.book_kode_encrypt,a.name,a.gender,a.hrg_hari_ini,a.room_id,a.email,a.phone,DATE(a.date_input) as tgl_pesan,a.check_in,a.check_out,a.pax,a.noroom,a.flag_confirm,b.book_detail_id,c.hotel_nama FROM guest_book a LEFT JOIN guest_book_detail b ON a.book_id = b.book_id LEFT JOIN m_hotel  c ON a.hotel_id=c.hotel_id WHERE a.rinci_id IS NULL AND a.book_kode IS NOT NULL AND a.hotel_id IS NOT NULL $htl and b.book_id is not null and a.flag_batal ='0' ".$QryStrPemesanan." ORDER BY b.book_id DESC";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												$subDep=0;
												$subPend=0;
												$total=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												$i++;
												
												$dayHarga = 0;
												$harga='';
												$dtharga = 0;
												
												 $tgl1 = explode("-",$check_in);
												$tglIn = $tgl1[0]."-".$tgl1[1]."-".$tgl1[2];	 
												
												 $q = $conn->prepare("SELECT * FROM kalender_harga WHERE cal_bulan = '".$tgl1[1]."' and cal_tahun= '".$tgl1[0]."'  and room_id=".$room_id."");
												$q->execute();
												
												  $dtharga = $q->fetch(PDO::FETCH_ASSOC);
													
													$harga=explode("," ,$dtharga['cal_harga']);
												
												$jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
												
												$tgl = $jumlah_hari[$dtharga['cal_bulan'] - 1];  
												
												 if ($dtharga['cal_bulan'] == 2) {
													if ($dtharga[cal_tahun] % 400 == 0 OR ($dtharga[cal_tahun] % 4 == 0 AND $dtharga[cal_tahun] % 100 != 0)) {
														$tgl= 29; 
													} 
												}
												
												
												
													
												for($a=1;$a<=$tgl;$a++){
													if($a == $tgl1[2]){
														$dayHarga = $harga[$a-1];
													}
												}
												
												if($kategory_item == 25437857){
													$kategory = 'Pemesanan Hotel';
												}else if($kategory_item == 25437858){
													$kategory = 'Pemesanan Mobil';
												}
												
												$in		= date_create($check_in);
												$out	= date_create($check_out);
												$tot_day= date_diff($in,$out);
												$totPesan=$hrg_hari_ini * $noroom * $tot_day->format("%a") ;
												
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $book_kode?><br><b><?PHP echo fullDateDay($tgl_pesan)?></b></td>
													<td align="center"> <a href="view/detail.form.php?id=<?PHP echo $book_kode_encrypt?>" class="fancybox fancybox.iframe" > <h4><b><?PHP echo $very_code?></b></h4>  </a></td>
													<td><?PHP echo $hotel_nama?></td>
													<td align='center'><?PHP echo $noroom?></td>
													<td align='right'><?PHP echo number_format($dayHarga ,0,",",".")?></td>
													<td align='right'><?PHP echo number_format($hrg_hari_ini  ,0,",",".") ?></td>
													<td align='right'><?PHP echo number_format( $totPesan,0,",",".") ?></td>
												</tr>
											<?PHP
											$subDep=$subDep+($dayHarga*$noroom);
											$total=$total+$totPesan;
												}
											?>
											<tr>
												<td align='right' colspan='5'><b>Deposit Terpakai</td>
												<td align='right'><b><?php echo number_format($subDep,0,",",".") ?></td>
												<td align='right'></td>
												<td align='right'></td>
											</tr>
											<tr>
												<td align='right' colspan='7'><b>Pendapatan</td>
												<td align='right'><b><?php echo number_format($total,0,",",".") ?></td>
											</tr>
											<tr>
												<td align='right' colspan='7'><b>Fee</td>
												<td align='right'><b><?php echo number_format($total-$subDep,0,",",".") ?></td>
											</tr>
											</tbody>
										</table>