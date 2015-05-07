<?PHP
														$qryItem 	= "SELECT a.hotel_id,a.kar_id,b.kode_kategory,b.hotel_nama FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.rinci_id IS NOT NULL AND a.rinci_id = '".$_GET['id']."' AND b.kode_kategory = '".$kode_kategory."' GROUP BY a.hotel_id";
														$stmtqryItem 	= $conn->prepare( $qryItem );
														$stmtqryItem->execute();
														$i=0;
														while ($rowqryItem = $stmtqryItem->fetch(PDO::FETCH_ASSOC)){
														extract($rowqryItem);
														
														$i++;	
														echo '
															<tr class="gradeA">
																<td width="2%"><span class="fa fa-angle-double-right"></span></td>
																<td colspan="8">'.$hotel_nama.'</td>
															</tr>
															<tr class="gradeA">
																<td width="2%">&nbsp;</td>
																<td colspan="8">
																	<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
																		<tr>
																			<td width="30%"><b>Nama Ruangan</b></td>
																			<td width="15%"><b>Harga</b></td>
																			<td align="center" width="8%"><b>Durasi Malam</b></td>
																			<td align="center" width="8%"><b>Qty</b></td>
																			<td align="center" width="10%"><b>Disc ('.groupBerlangganan($conn, $kar_id, "kategori_agent").')</b></td>
																			<td width="18%"><b>Total Harga</b></td>
																		</tr>';
																			
																		$qryDetailItem 	= "SELECT a.book_id,b.room_type,a.kar_id,b.room_price,b.room_id,a.check_in,a.check_out,a.rinci_detail_qty,a.rinci_detail_disc,a.rinci_detail_penawaran,a.hrg_hari_ini,b.disc_agent FROM guest_book a INNER JOIN m_room b ON a.room_id = b.room_id WHERE a.rinci_id = '".$_GET['id']."' AND a.hotel_id = '".$hotel_id."'";
																		$stmtDetailItem 	= $conn->prepare( $qryDetailItem );
																		$stmtDetailItem->execute();
																		$i=0;
																		while ($rowDetailItem = $stmtDetailItem->fetch(PDO::FETCH_ASSOC)){
																		extract($rowDetailItem);
																		
																		$dayHarga=0;
																		$harga='';
																		$dtharga=0;
																		  $jum=0;
																		 $q = "SELECT * FROM kalender_harga WHERE cal_bulan = month(curdate()) and cal_tahun= year(curdate())  and room_id=".$room_id."";
																		 $qdetail	= $conn->prepare( $q );
																		$qdetail->execute();	
																		
																		$jum = $qdetail->fetch(PDO::FETCH_NUM);
																		//$jum =  mysqli_num_rows(mysqli_query($conn,$q));
																		if($jum > 0){
																			$qq = "SELECT * FROM kalender_harga WHERE cal_bulan = month(curdate()) and cal_tahun= year(curdate())  and room_id=".$room_id."";
																			 $qdetail2	= $conn->prepare( $qq );
																			$qdetail2->execute();	
																		$dtharga	= $qdetail2->fetch(PDO::FETCH_ASSOC); 
																		$harga=explode("," ,$dtharga['cal_harga']);
																		
																		$jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
																		
																		$tgl= $jumlah_hari[$dtharga['cal_bulan'] - 1];  
																		
																		 if ($dtharga['cal_bulan'] == 2) {
																			if ($dtharga[cal_tahun] % 400 == 0 OR ($dtharga[cal_tahun] % 4 == 0 AND $dtharga[cal_tahun] % 100 != 0)) {
																				$tgl= 29; 
																			} 
																		}
																		
																		$qday = $conn->query("SELECT day(curdate()) as day");	
																		$dd	  = $qday->fetch(PDO::FETCH_ASSOC); 
																			
																		for($a=1;$a<=$tgl;$a++){
																			if($a == $dd['day']){
																				$dayHarga=$harga[$a-1];
																			}
																		}
																		}
																		
																		$disc=$rowDetailItem['disc_agent']/100 * $hrg_hari_ini ;
		
																		$totUp=$hrg_hari_ini + $disc ;
																		
																		
																			$in		 = date_create($check_in);
																			$out	 = date_create($check_out);
																			$tot_day = date_diff($in,$out);
														echo '
																		<tr>
																			<td>'.$room_type.'</td>
																			<td align="right">Rp. '.number_format($totUp,2,",",".").'</td>
																			<td align="center">'.$tot_day->format("%a").'</td>
																			<td align="center">'.$rinci_detail_qty.'</td>
																			<td align="right">Rp. '.number_format(groupBerlangganan($conn, $kar_id, "potongan") * $tot_day->format("%a"),2,",",".").'</td>
																			<td align="right">Rp. '.number_format($rinci_detail_penawaran,2,",",".").'</td>
																		</tr>';
																			
																		}
														echo '
																	</table>
																</td>
															</tr>
															
															';
														}
?>