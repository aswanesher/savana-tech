<?PHP
	require ('../../config/hotel.conn.php');
	session_start();
	$_SESSION["hotel_id"];
?>
<!-- BOX -->
													<div class="box">
														<div class="box-body">
															<table class="table table-bordered">
																<thead>
																  <tr>
																	<th width="3%">#</th>
																	<th>Fasilitas</th>
																	<th>Fasilitas Lain</th>
																	<th width="8%">Option</th>
																  </tr>
																</thead>
																<tbody>
																<?PHP
																	$qryroom 	= "SELECT a.room_detail_id,b.fac_nama,c.ame_nama FROM m_room_detail a LEFT JOIN m_facilities b ON a.fac_id = b.fac_id LEFT JOIN m_amenities c ON a.ame_id = c.ame_id WHERE hotel_id = '".$_SESSION["hotel_id"]."'";
																	$stmtroom 	= $conn->prepare( $qryroom );
																	$stmtroom->execute();
																	$i=0;
																	while ($rowroom = $stmtroom->fetch(PDO::FETCH_ASSOC)){
																	extract($rowroom);
																	$i++;
																?>
																  <tr>
																	<td><?PHP echo $i?>.</td>
																	<td><?PHP echo $fac_nama?></td>
																	<td><?PHP echo $ame_nama?></td>
																	<td align="center"><a href="#" onclick="location.href='fac.post.php?act=del&id=<?PHP echo $room_detail_id?>&hotel_id=<?PHP echo $_SESSION["hotel_id"]?>'" alt="hapus" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
																  </tr>
																<?PHP
																}
																?>
																</tbody>
															  </table>
														</div>
													</div>
													<!-- /BOX -->