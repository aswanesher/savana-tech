<?PHP
														$qryItem = "SELECT a.hotel_id,b.kode_kategory,b.hotel_nama FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.rinci_id IS NOT NULL AND a.rinci_id = '".$spec."' AND b.kode_kategory = '".$kode_kategory."' GROUP BY a.hotel_id";
														$stmtItem 	= $conn->prepare( $qryItem );
														$stmtItem->execute();
														$i=0;
														while ($rowItem = $stmtItem->fetch(PDO::FETCH_ASSOC)){
														extract($rowItem);
														$i++;	
														$htmlGuest .= '
															<tr class="gradeA">
																<td width="2%"><span class="fa fa-angle-double-right"></span></td>
																<td colspan="6" style="border-right: 1px solid">'.$hotel_nama.'</td>
															</tr>
															<tr class="gradeA">
																<td width="2%">&nbsp;</td>
																<td colspan="6" style="border-right: 1px solid">
																	<table border="1">
																		<tr>
																			<td width="15%"><b>Nama Ruangan</b></td>
																			<td align="" width="18%"><b>Check-In</b></td>
																			<td align="" width="18%"><b>Check-Out</b></td>
																			<td align="" width="18%"><b>Jml Tamu</b></td>
																			<td align="center" style="border-right: 1px solid" width="8%"><b>Qty</b></td>
																		</tr>';
																		$qryDetailItem = "SELECT a.book_id,a.plane_dewasa,a.plane_anak,b.room_type,b.room_price,a.check_in,a.check_out,a.rinci_detail_qty,a.rinci_detail_disc,a.rinci_detail_penawaran FROM guest_book a INNER JOIN m_room b ON a.room_id = b.room_id WHERE a.rinci_id = '".$spec."' AND a.hotel_id = '".$hotel_id."'";
																		$stmtDetailItem 	= $conn->prepare( $qryDetailItem );
																		$stmtDetailItem->execute();
																		while ($rowDetailItem = $stmtDetailItem->fetch(PDO::FETCH_ASSOC)){
																		extract($rowDetailItem);
														$htmlGuest .= '
																		<tr>
																			<td>'.$room_type.'</td>
																			<td align="">'.fullDateDay($check_in).'</td>
																			<td align="">'.fullDateDay($check_out).'</td>
																			<td align="">Dewasa ('.$plane_dewasa.'), Anak ('.$plane_anak.')</td>
																			<td align="center" style="border-right: 1px solid">'.$rinci_detail_qty.'</td>
																		</tr>';
																		}
														$htmlGuest .= '
																	</table>
																</td>
															</tr>
															
															';
														}
?>