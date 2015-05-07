						<?PHP
							require ('../config/hotel.conn.php');
							require ('../library/function.cracked.php');
							require ('../library/function.convert.date.php');
							if(isset($_GET['spec']) && $_GET['spec'] != ''){
								$valid 		= crackedSpec($_GET['spec'], 0);
								$validDate 	= crackedSpec($_GET['spec'], 1);
								$validDateto= crackedSpec($_GET['spec'], 2);
								//title
								$hotel= ($_GET['htl']);
								
								if($valid == 'book'){
									$title = 'Pemesanan Pelanggan';
								}else if($valid == 'cancel'){
									$title = 'Pembatalan Pemesanan';
								}else if($valid == 'inguest'){
									$title = 'Check-In';
								}else if($valid == 'pay'){
									$title = 'Pembayaran';
								}else if($valid == 'money'){
									$title = 'Keuangan';
									
								}
								
			 					
								
								//valid date start s/d to
								$dayStrNow			= $validDate;
								$keyDay 			= substr($dayStrNow, 0, -6);
								$DateOne 			= substr($dayStrNow, 0, -6);
								$DateTwo 			= substr($dayStrNow, 2, -4);
								$DateTree 			= substr($dayStrNow, -4);
								
								$dateEng			= $DateTree.'-'.$DateTwo.'-'.$DateOne;
								$dateInd			= $DateOne.'-'.$DateTwo.'-'.$DateTree;
								
								$dayStrNowTo		= $validDateto;
								$keyDayTo 			= substr($dayStrNowTo, 0, -6);
								$DateOneTo 			= substr($dayStrNowTo, 0, -6);
								$DateTwoTo 			= substr($dayStrNowTo, 2, -4);
								$DateTreeTo			= substr($dayStrNowTo, -4);
								
								$dateEngTo			= $DateTreeTo.'-'.$DateTwoTo.'-'.$DateOneTo;
								$dateIndTo			= $DateOneTo.'-'.$DateTwoTo.'-'.$DateTreeTo;
								
								if($validDateto == ''){
									$monDate 			= fullDateDay($dateInd);
									$QryStrPemesanan 	= "AND DATE(a.date_input) = '".$dateEng."'";
									$QryPesanAgent	= 	"AND DATE(a.rinci_tanggal) = '".$dateEng."'";
									$QryStrCheckIn	 	= "AND DATE(a.check_in) = '".$dateEng."'";
									$QryStrPay		 	= "AND DATE(b.tgl_transfer) = '".$dateEng."'";
								}else{
									$monDate = fullDateDay($dateInd).' s/d '.fullDateDay($dateIndTo);
									$QryStrPemesanan 	= "AND a.date_input BETWEEN '".$dateEng."' AND '".$dateEngTo."'";
									$QryPesanAgent 	= 	"AND a.rinci_tanggal BETWEEN '".$dateEng."' AND '".$dateEngTo."'";
									$QryStrCheckIn	 	= "AND a.check_in BETWEEN '".$dateEng."' AND '".$dateEngTo."'";
									$QryStrPay		 	= "AND b.tgl_transfer BETWEEN '".$dateEng."' AND '".$dateEngTo."'";
								}
								
							}else{
								header('location: index.php?modul=dash');
							}
						?>
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.php">Home</a>
										</li>
										<li>Laporan <?PHP echo $title?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Laporan <?PHP echo $title?></h3>
									</div>
									<div class="clearfix">
										<h4><b>Tanggal : <?PHP echo $monDate?></b></h4>
									</div>
								</div>
								
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<div class="row">
					
							<div class="col-sm-12">
								
								<form action="trace.php" method="post">
									<table width="100%">
									
											<?php if ($valid=='money'){?>
										<tr>
										<div class="col-sm-1">Hotel</div>
							<div class="col-sm-4">
								<select name="hotel" id="tahun_select" class=" form-control col-sm-2"   >
									<option>-----Pilih Hotel-------</option><?php
									 $sql = "SELECT * FROM  m_hotel where kode_kategory ='25437857'";
									 $stmtguestbook 	= $conn->prepare( $sql );
												$stmtguestbook->execute();
										 while ($row = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											if($row['hotel_id']==$hotel){
											?>
											 <option value="<?php echo $row['hotel_id']?>" selected><?php echo $row['hotel_nama']?></option>
											<?php
											}else {
											?>
											 <option value="<?php echo  $row['hotel_id']?>"><?php echo $row['hotel_nama'] ?></option>
																					 
											<?php
											
											}
											 
										 }
								?>
								</select>
							</div>
							</tr>
							
							<?php }?>
							
							
							<br><br><br>
										
										<tr>
											<td>Tanggal </td>
											<td>:</td>
											<td><input style="cursor: pointer" type="text" class="form-control" id="tgl_beetwen_start" placeholder="dd-mm-yyyy"  name="beetwen_start" /></td>
											<td align="center">s/d</td>
											<td><input style="cursor: pointer" type="text" class="form-control" id="tgl_beetwen_to" placeholder="dd-mm-yyyy"  name="beetwen_to" /></td>
											<td>
											<input type="hidden" name="valid" value="<?PHP echo $valid?>" />
											<button class="btn btn-success">Telusuri</button>
											</td>
										</tr>
										
									</table>
								</form>
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								Lihat Juga Laporan Lainnya : <br>
								<div class="col-md-2">
									<a class="btn btn-<?PHP echo $valid == 'book'?'pink':'grey';?> btn-icon input-block-level" href="javascript:void(0);" onclick="location.href='index.php?modul=rep&spec=book.<?PHP echo $validDate.'.'.$validDateto?>'">
										<i class="fa fa-bar-chart-o"></i>
										<div>Lap. Pemesanan</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-<?PHP echo $valid == 'cancel'?'pink':'grey';?> btn-icon input-block-level" href="javascript:void(1);" onclick="location.href='index.php?modul=rep&spec=cancel.<?PHP echo $validDate.'.'.$validDateto?>'" >
										<i class="fa fa-bar-chart-o"></i>
										<div>Lap. Pembatalan</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-<?PHP echo $valid == 'inguest'?'pink':'grey';?> btn-icon input-block-level" href="javascript:void(2);" onclick="location.href='index.php?modul=rep&spec=inguest.<?PHP echo $validDate.'.'.$validDateto?>'">
										<i class="fa fa-bar-chart-o"></i>
										<div>Lap. Check-In</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-<?PHP echo $valid == 'pay'?'pink':'grey';?> btn-icon input-block-level" href="javascript:void(3);" onclick="location.href='index.php?modul=rep&spec=pay.<?PHP echo $validDate.'.'.$validDateto?>'">
										<i class="fa fa-bar-chart-o"></i>
										<div>Lap. Pembayaran</div>
									</a>
								</div>
								<div class="col-md-2">
									<a class="btn btn-<?PHP echo $valid == 'money'?'pink':'grey';?> btn-icon input-block-level" href="javascript:void(3);" onclick="location.href='index.php?modul=rep&spec=money.<?PHP echo $validDate.'.'.$validDateto?>'">
										<i class="fa fa-bar-chart-o"></i>
										<div>Lap. Keuangan</div>
									</a>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
									<div class="box">
									<div class="box-title">
										<h4><i class="fa fa-bar-chart-o"></i>Laporan <b><?PHP echo $title?></b> Melalui <b>Website Walanja.co.id</b></h4>
									</div>
									<div class="box-body">
										<?PHP
											if($valid == 'book'){
												require ('lap.pemesanan.php');
											}else if($valid == 'cancel'){
												require ('lap.pembatalan.php');
											}else if($valid == 'inguest'){
												require ('lap.checkin.php');
											}else if($valid == 'pay'){
												require ('lap.pembayaran.php');
											}else if($valid == 'money'){
												require ('lap.keuangan.php');
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<br><?php
						if($valid=='book'){
						?>
						<div class="row">
							<div class="col-sm-12">
									<div class="box">
									<div class="box-title">
										<h4><i class="fa fa-bar-chart-o"></i>Laporan <b><?PHP echo $title?></b> Melalui <b>Agent.walanja.co.id</b></h4>
									</div>
									<div class="box-body">
										<?PHP
											if($valid == 'book'){
												require ('lap.pemesanan_agent.php');
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>