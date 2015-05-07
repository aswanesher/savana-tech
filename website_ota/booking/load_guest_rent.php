<?PHP
													$htmlGuest .= '
															<tr class="gradeA">
																<td width="2%">&nbsp;</td>
																<td width="15%"><b>Nama Mobil</b></td>
																<td width="18%"><b>Include Supir</b></td>
																<td width="18%"><b>Tgl Brangkat s/d Kembali</b></td>
																<td width="18%"><b>Jam Pengambilan</b></td>
																<td width="18%"><b>Jml Penumpang</b></td>
																<td width="8%" align="center" style="border-right: 1px solid"><b>Qty</b></td>
															</tr>
															
															';
														$qryItem = "SELECT a.book_id,a.check_in,a.check_out,a.rent_jam,a.rent_jml_penumpang,b.rent_merk,b.hotel_nama,b.hotel_avg,b.rent_harga_supir,a.flag_supir,a.rinci_detail_qty,a.rinci_detail_disc,a.rinci_detail_penawaran FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.rinci_id = '".$spec."' AND a.kategory_item = '".$kode_kategory."'";
														$stmtItem 	= $conn->prepare( $qryItem );
														$stmtItem->execute();
														while ($rowItem = $stmtItem->fetch(PDO::FETCH_ASSOC)){
														extract($rowItem);
															if($flag_supir == 1){
																$withDrive = 'Ya';
																$tarif = $rent_harga_supir;
															}else{
																$withDrive = 'Tidak';
																$tarif = 0;
															}
														
														$i++;	
														$htmlGuest .= '
															<tr class="gradeA">
																<td width="2%">&nbsp;</td>
																<td>'.$rent_merk.' '.$hotel_nama.'</td>
																<td valign="top">'.$withDrive.'</td>
																<td valign="top">'.fullDateDay($check_in).'s/d<br>'.fullDateDay($check_out).'</td>
																<td valign="top">'.$rent_jam.'</td>
																<td valign="top">'.$rent_jml_penumpang.'</td>
																<td align="center" style="border-right: 1px solid">'.$rinci_detail_qty.'</td> 
															</tr>
															
															';
														}
?>