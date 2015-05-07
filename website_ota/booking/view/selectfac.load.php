<?PHP
	require ('../../config/hotel.conn.php');
	session_start();
	$_SESSION["hotel_id"];
?>
									<div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Fasilitas</label>
													<div class="col-sm-5">
													  <select class="form-control" name="fac_id">
																<option value="">-- Pilih Fasilitas -</option>
															<?PHP
																$qryfac 	= "SELECT * FROM m_facilities WHERE fac_id NOT IN (SELECT fac_id FROM m_room_detail WHERE hotel_id = '".$_SESSION["hotel_id"]."')";
																$stmtfac 	= $conn->prepare( $qryfac );
																$stmtfac->execute();
																$i=0;
																while ($rowfac = $stmtfac->fetch(PDO::FETCH_ASSOC)){
																extract($rowfac);
															?>
															
																<option value="<?PHP echo $fac_id?>"><?PHP echo $fac_nama?></option>
																
															<?PHP
															}
															?>
													  </select>
													</div>
												  </div>
												   <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Fasilitas Lain</label>
													<div class="col-sm-5">
													  <select class="form-control" name="ame_id">
															<option value="">-- Pilih Fasilitas -</option>
															<?PHP
																$qryfac 	= "SELECT * FROM m_amenities WHERE ame_id NOT IN (SELECT ame_id FROM m_room_detail WHERE hotel_id = '".$_SESSION["hotel_id"]."')";
																$stmtfac 	= $conn->prepare( $qryfac );
																$stmtfac->execute();
																$i=0;
																while ($rowfac = $stmtfac->fetch(PDO::FETCH_ASSOC)){
																extract($rowfac);
															?>
															
																<option value="<?PHP echo $ame_id?>"><?PHP echo $ame_nama?></option>
																
															<?PHP
															}
															?>
													  </select>
													</div>
												  </div>