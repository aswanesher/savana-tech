							<?PHP
							session_start();
							require ('config/hotel.conn.php');
							$connOther 	= mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
							$_SESSION['rcnpg'] = $_GET['fill'];
							
							if (isset($_GET['fill']) && $_GET['fill'] == 'codeLoc'){
							
							//RESULT HASIL PENCARIAN
							$tgl1 = explode("/",$_GET['in']);
							$tglIn = $tgl1[2]."-".$tgl1[0]."-".$tgl1[1];
							
							if(isset($_GET['loc']))
							{
								$dataSearch	= mysqli_real_escape_string($connOther, $_GET['loc']);
								if (!empty($dataSearch)){
									//echo "SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id INNER JOIN m_wilayah c ON a.wil_id = c.wil_id WHERE (a.hotel_nama LIKE '%".$dataSearch."%') OR (a.keyword LIKE '%".$dataSearch."%') OR (a.hotel_address LIKE '%".$dataSearch."%') OR (c.wil_nama LIKE '%".$dataSearch."%')  ORDER BY a.hotel_id ASC";
									
									$query = mysqli_query($connOther, "SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id INNER JOIN m_wilayah c ON a.wil_id = c.wil_id WHERE (a.hotel_nama LIKE '%".$dataSearch."%') OR (a.keyword LIKE '%".$dataSearch."%') OR (a.hotel_address LIKE '%".$dataSearch."%') OR (c.wil_nama LIKE '%".$dataSearch."%')  ORDER BY a.hotel_id ASC");
									if (mysqli_num_rows($query) != 0){
									while ($row = mysqli_fetch_assoc($query))
									{
										
										$priceMin 		= $conn->query("SELECT room_id, room_price,room_disc FROM m_room WHERE hotel_id = '".$row['hotel_id']."' ORDER BY room_price ASC LIMIT 0,1");
										$priceMin 		= $priceMin->fetch(PDO::FETCH_ASSOC);
										
										$dayHarga = 0;
										$harga='';
										$dtharga = 0;
										  $jum = 0;
										  
										  $q = $conn->query("SELECT * FROM kalender_harga WHERE cal_bulan = month(curdate()) and cal_tahun= year(curdate())  and room_id=".$priceMin['room_id']."");
										
										  $dtharga = $q->fetch(PDO::FETCH_ASSOC);
											
											$harga=explode("," ,$dtharga['cal_harga']);
										
										$jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
										
										$tgl= $jumlah_hari[$dtharga['cal_bulan'] - 1];  
										
										 if ($dtharga['cal_bulan'] == 2) {
											if ($dtharga[cal_tahun] % 400 == 0 OR ($dtharga[cal_tahun] % 4 == 0 AND $dtharga[cal_tahun] % 100 != 0)) {
												$tgl= 29; 
											} 
										}
										
										/*$tgl=explode("/",$_GET['in']);
										$tglIn=$tgl[2]."-".$tgl[0]."-".$tgl[1];
										$tgl2=explode("/",$_GET['out']);
										$tglOut=$tgl2[2]."-".$tgl2[0]."-".$tgl2[1]; */
										
										
										
										$qday =$conn->query("SELECT day(curdate()) as day");	
										
										$dd=$qday->fetch(PDO::FETCH_ASSOC);
											
										for($a=1;$a<=$tgl;$a++){
											if($a == $tgl1[1]){
												$dayHarga=$harga[$a-1];
											}
										}
										
										
										$disc=0;
										$disc 			= $priceMin['room_disc'] / 100 * $dayHarga;
										$totStlhDisc = $disc + $dayHarga;
										$RoomPriceMin 	= $totStlhDisc;
									
							?>
							
							
									<table width="100%">
									<tr>
										<td style="border-top: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td rowspan="6" align="center" width="20%">
										
											<div class="listitem2">
												<img src="images/<?PHP echo $row['hotel_img']?>" alt=""/>
												<div class="liover"></div>
											</div>
										
										</td>
										<td width="25%"><span class="orange size14"><a href="javascript:;"onclick="window.open('index.php?menu=details&id=<?PHP echo $row['hotel_id']?>&in=<?PHP echo $_GET['in']?>&out=<?PHP echo $_GET['out']?>&pax=<?PHP echo $_GET['pax']?>')"><b><?PHP echo $row['hotel_nama']?></b></a></span></td>
										<td width="2%">&nbsp;</td>
										<td><img src="images/<?PHP echo $row['rate_icon']?>" width="120" height="20" alt=""/></td>
										<td rowspan="2" width="25%" align="right"><span class="opensans size30 bold #ebebeb2">4.5</span>/5<br/>Baik </td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td colspan="3"><span class="black size12"><?PHP echo $row['hotel_address']?></span></td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
									
									
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										
										<td colspan="4">
										
										<ul class="hotelpreferences">
										
											<?PHP
										/*$query_fac 	= "SELECT c.fac_icon
														FROM m_room_detail a
														INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id
														INNER JOIN m_facilities c ON c.fac_id = a.fac_id
														WHERE a.hotel_id =  '".row['hotel_id']."'";*/
										$stmt_fac 	= $conn->prepare( $query_fac );
										$stmt_fac->execute();
										 
										$num_fac 	= $stmt_fac->rowCount();
										while ($row_fac = $stmt_fac->fetch(PDO::FETCH_ASSOC)){
										extract($row_fac);
										?>
											<li class="<?PHP echo $fac_icon?>"></li>
										<?PHP
										}
										?>
										
										</ul>
										
										</td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td colspan="2">&nbsp;</td>
										<td align="right"><span class="red size12"><b>&nbsp;</b></span></td>
										<td rowspan="4" align="right">
											<a href="javascript:;" target="_blank" onclick="window.open('index.php?menu=details&id=<?PHP echo $row['hotel_id']?>&in=<?PHP echo $_GET['in']?>&out=<?PHP echo $_GET['out']?>&pax=<?PHP echo $_GET['pax']?>')">
											<img src="images/lihatkamar.png" style=" width: 125px; margin-right: -21px;">
											</a>
										</td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
										
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td colspan="3" style="border-right: 2px solid #ebebeb;" align="center" ><span class="green size17"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp. <?PHP echo number_format($RoomPriceMin,2,",",".");?></b></span></td>
										
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td colspan="3" style="border-right: 2px solid #ebebeb; font-size: 16px;color:blue;" align="center"><b>&nbsp;&nbsp;&nbsp;!&nbsp;</b>Harga Termasuk Pajak</td>
										
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
								</table>
							
							<?PHP
									}
									}else{
									
							?>
							
								<table width="100%">
									<tr>
										<td style="border-left: 2px solid #ebebeb;border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;" align="center"><img src="images/not-found.png" width="100%"/></td>
									</tr>
								</table>
							
							<?PHP
									
									}
									
								}
							}else{
							?>
							
								<table width="100%">
									<tr>
										<td style="border-left: 2px solid #ebebeb;border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;" align="center"><img src="images/not-found.png" width="100%"/></td>
									</tr>
								</table>
							
							<?PHP
							
							}
							
							?>
								<table width="100%">
									<tr>
										<td style="border-left: 2px solid #ebebeb;border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;" align="center"><span class="grey size14">Halaman</span></td>
									</tr>
								</table>
							
							<?PHP
								
							
							}else{
							
							if (isset($_GET['fill']) && $_GET['fill'] == 'termurah'){
								$fillteringQry	=	"SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id ORDER BY hotel_avg ASC";
							}else if (isset($_GET['fill']) && $_GET['fill'] == 'tertinggi'){
								$fillteringQry	=	"SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id ORDER BY hotel_avg DESC";
							}else if (isset($_GET['fill']) && $_GET['fill'] == 'price review'){
								$fillteringQry	=	"SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id ORDER BY hotel_avg DESC";
							}else if (isset($_GET['fill']) && $_GET['fill'] == 'popular'){
								$fillteringQry	=	"SELECT a.*,c.rate_icon FROM m_hotel a INNER JOIN m_rating c ON a.rate_id = c.rate_id WHERE hotel_id = (SELECT MAX(hotel_id) FROM guest_book b WHERE b.hotel_id = a.hotel_id)";
							}else if (isset($_GET['fill']) && $_GET['fill'] == 'range'){
								$fillteringQry	=	"SELECT a.*,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE hotel_avg BETWEEN 0 AND '".$_GET['rangMax']."'";
							}else if (isset($_GET['fill']) && $_GET['fill'] == 'pointOne' || $_GET['fill'] == 'pointTwo' || $_GET['fill'] == 'pointTree' || $_GET['fill'] == 'pointFour' || $_GET['fill'] == 'pointFive' || $_GET['fill'] == 'pointAll'){
								
								$fillteringQry	= $_GET['QryStatment'];
								
							}else if (isset($_GET['fill']) && $_GET['fill'] == 'getKey'){
								
								$fillteringQry	=	"SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE (a.hotel_nama LIKE '%".$_GET['keyword']."%') OR (a.keyword LIKE '%".$_GET['keyword']."%') OR (a.hotel_address LIKE '%".$_GET['keyword']."%') ORDER BY a.hotel_id ASC";
							
							}else if (isset($_GET['fill']) && $_GET['fill'] == 'slideRange'){
								
								$fillteringQry	=	"SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE a.hotel_avg BETWEEN '".$_GET['rangMin']."' AND '".$_GET['rangMax']."' ORDER BY a.hotel_id ASC";
							
							}
						
							$query_hot 	= $fillteringQry;
							$stmt_hot 	= $conn->prepare( $query_hot );
							$stmt_hot->execute();
							 
							$num_hot 	= $stmt_hot->rowCount();
							while ($row_hot = $stmt_hot->fetch(PDO::FETCH_ASSOC)){
							extract($row_hot);
							if($hotel_id != ''){
							$dayHarga = 0;
							$harga='';
							$dtharga = 0;
							  $jum = 0;
							  
								$priceMin 		= $conn->query("SELECT room_price,room_id FROM m_room WHERE hotel_id = '".$hotel_id."' ORDER BY room_price ASC LIMIT 0,1");
								$priceMin 		= $priceMin->fetch(PDO::FETCH_ASSOC); 
								
							  $q = $conn->query("SELECT * FROM kalender_harga WHERE cal_bulan = month(curdate()) and cal_tahun= year(curdate())  and room_id=".$priceMin['room_id']."");
							
							  $dtharga = $q->fetch(PDO::FETCH_ASSOC);
								
								$harga=explode("," ,$dtharga['cal_harga']);
							
							$jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
							
							$tgl= $jumlah_hari[$dtharga['cal_bulan'] - 1];  
							
							 if ($dtharga['cal_bulan'] == 2) {
								if ($dtharga[cal_tahun] % 400 == 0 OR ($dtharga[cal_tahun] % 4 == 0 AND $dtharga[cal_tahun] % 100 != 0)) {
									$tgl= 29; 
								} 
							}
							
							$qday =$conn->query("SELECT day(curdate()) as day");	
							$dd=$qday->fetch(PDO::FETCH_ASSOC);
								
							for($a=1;$a<=$tgl;$a++){
								if($a == $dd['day']){
									$dayHarga=$harga[$a-1];
								}
							}	
								
								$RoomPriceMin 	= $dayHarga;
							?>
								<table width="100%">
									<tr>
										<td style="border-top: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;">&nbsp;</td>
										<td style="border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td rowspan="6" align="center" width="20%">
										
											<div class="listitem2">
												<img src="images/<?PHP echo $hotel_img?>" alt=""/>
												<div class="liover"></div>
											</div>
										
										</td>
										<td width="25%"><span class="orange size14"><a href="javascript:;"><b><?PHP echo $hotel_nama?></b></a></span></td>
										<td width="2%">&nbsp;</td>
										<td><img src="images/<?PHP echo $rate_icon?>" width="120" height="20" alt=""/></td>
										<td rowspan="2" width="25%" align="right"><span class="opensans size30 bold #ebebeb2">4.5</span>/5<br/>Baik</td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td colspan="3"><span class="black size12"><?PHP echo $hotel_address?></span></td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td colspan="4">
										
										<ul class="hotelpreferences">
										
										<?PHP
										$query_fac 	= "SELECT d.fac_icon FROM m_room a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id LEFT JOIN m_room_detail c ON a.room_id = c.room_id INNER JOIN m_facilities d ON c.fac_id = d.fac_id WHERE a.hotel_id = '$hotel_id' GROUP BY c.fac_id ORDER BY a.room_id ASC";
										$stmt_fac 	= $conn->prepare( $query_fac );
										$stmt_fac->execute();
										 
										$num_fac 	= $stmt_fac->rowCount();
										while ($row_fac = $stmt_fac->fetch(PDO::FETCH_ASSOC)){
										extract($row_fac);
										?>
											<li class="<?PHP echo $fac_icon?>"></li>
										<?PHP
										}
										?>
										
										</ul>
										
										</td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td colspan="2">&nbsp;</td>
										<td align="right"><span class="red size12"><b>&nbsp;</b></span></td>
										
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td align="right" ><span class="green size17"><b>Rp. <?PHP echo number_format($RoomPriceMin,2,",",".");?></b></span></td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td align="right" style="font-size: 12px;color: blue"><b>!</b>Harga Termasuk Pajak</td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
									<tr>
										<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td rowspan="3" align="right">
											<a href="javascript:;" onclick="location.href='index.php?menu=details&id=<?PHP echo $hotel_id?>&in=<?PHP echo $_GET['in']?>&out=<?PHP echo $_GET['out']?>&pax=<?PHP echo $_GET['pax']?>'">
											<img src="images/lihatkamar.png" style=" width: 125px; margin-right: -21px;">
											</a>
										</td>
										<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
									</tr>
								</table>
							<?PHP
								}else{
								
								
							?>

								<table width="100%">
									<tr>
										<td style="border-left: 2px solid #ebebeb;border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;" align="center"><img src="images/not-found.png" width="100%"/></td>
									</tr>
								</table>

							<?PHP
								}
								}
							?>
								<table width="100%">
									<tr>
										<td style="border-left: 2px solid #ebebeb;border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;" align="center"><span class="grey size14">Halaman</span></td>
									</tr>
								</table>
							<?PHP
							}
							?>
							