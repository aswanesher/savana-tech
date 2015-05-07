<?PHP
	require ('../config/hotel.conn.php');
	require ('../library/function.cracked.php');
	require ('../library/function.convert.date.php');
?>

<!-- //CSS CONTENT -->
	

	
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
											<a href="index.html">Home</a>
										</li>
										<li>
											Data Pembayaran
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Data Pembayaran</h3>
									</div>
									<div class="description">Halaman Pembayaran</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						
						
						<!-- MENU HALAMAN -->
						
						
						<div class="separator"></div>
						
						<!-- TABEL YANG DI PANGGIL -->
						<div id="showtable">
						
											
								<!-- hari ini ---------------------------------- -->			
							<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 0 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 0";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											
												
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b>Hari Ini</b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt  FROM guest_book a 
											LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  
											left join guest_book_detail c on a.book_id=c.book_id
											where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 0
											or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 0  
											ORDER BY c.date_input,a.input_date_penawaran,a.date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>
											
											
								<!-- 1 hari yang lalu ---------------------------------- -->			
											
											<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id where datediff(curdate(),date_format(a.input_date_penawaran,'%Y-%m-%d')) = 1 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) =  1 ";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b>Kemarin</b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj ,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt FROM guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 1 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 1  ORDER BY input_date_penawaran,date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>
											
								<!-- 2 hari yang lalu ---------------------------------- -->			
								
											<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(a.input_date_penawaran,'%Y-%m-%d')) = 2 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) =  2 ";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											$tgl=explode(" ",($rowbyr['date_input']==''?$rowbyr['rinci_tanggal']:$rowbyr['date_input']));
											$tgl1=	$tgl[0];
												
																					
											?>
											 
											 
											 <?php
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b><?php echo $tgl1?></b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt FROM guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 2 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 2  ORDER BY input_date_penawaran,date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>
									
											
								<!-- 3 hari yang lalu ---------------------------------- -->	
								
								
										<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(a.input_date_penawaran,'%Y-%m-%d')) = 3 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) =  3 ";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											$tgl=explode(" ",($rowbyr['date_input']==''?$rowbyr['rinci_tanggal']:$rowbyr['date_input']));
											$tgl1=	$tgl[0];
												
																					
											?>
											 
											 
											 <?php
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b><?php echo $tgl1?></b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj ,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt FROM guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 3 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 3  ORDER BY input_date_penawaran,date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>

											
								<!-- 4 hari yang lalu ---------------------------------- -->	
										
										<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(a.input_date_penawaran,'%Y-%m-%d')) = 4 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) =  4  ";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											$tgl=explode(" ",($rowbyr['date_input']==''?$rowbyr['rinci_tanggal']:$rowbyr['date_input']));
											$tgl1=	$tgl[0];
												
																					
											?>
											 
											 
											 <?php
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b><?php echo $tgl1?></b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj ,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt FROM guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 4 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 4  ORDER BY input_date_penawaran,date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar ?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>
											
											
											
								<!-- 5 hari yang lalu ---------------------------------- -->			
											
											<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(a.input_date_penawaran,'%Y-%m-%d')) = 5 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) =  5  ";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											$tgl=explode(" ",($rowbyr['date_input']==''?$rowbyr['rinci_tanggal']:$rowbyr['date_input']));
											$tgl1=	$tgl[0];
												
																					
											?>
											 
											 
											 <?php
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b><?php echo $tgl1?></b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj ,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt FROM guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 5 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 5  ORDER BY input_date_penawaran,date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>
											
								<!-- 6 hari yang lalu ---------------------------------- -->
									<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(a.input_date_penawaran,'%Y-%m-%d')) = 6 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) =  6  ";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											$tgl=explode(" ",($rowbyr['date_input']==''?$rowbyr['rinci_tanggal']:$rowbyr['date_input']));
											$tgl1=	$tgl[0];
												
																					
											?>
											 
											 
											 <?php
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b><?php echo $tgl1 ?></b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj ,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt FROM guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 6 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 6  ORDER BY input_date_penawaran,date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>
											
								<!-- 7 hari yang lalu ---------------------------------- -->					
								<?PHP
							$q	= "SELECT a.date_input,b.rinci_tanggal FROM  guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(a.input_date_penawaran,'%Y-%m-%d')) = 7 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) =  7  ";
											$stmtbyr 	= $conn->prepare( $q );
											$stmtbyr->execute();
											$i=0;
											$rowbyr = $stmtbyr->fetch(PDO::FETCH_ASSOC);
											$tgl=explode(" ",($rowbyr['date_input']==''?$rowbyr['rinci_tanggal']:$rowbyr['date_input']));
											$tgl1=	$tgl[0];
												
																					
											?>
											 
											 
											 <?php
											if($rowbyr['date_input']!= '' or $rowbyr['rinci_tanggal']!='' ) {
											?>
											<h5><b><?php echo $tgl1?></b></h5>
											<?php 
											}
								?>
							
							
									<div class="box-body">
										
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody> 
											<?php
											
											$qryguestbook 	= "SELECT a.book_id,a.very_code as codeWlj ,a.name,a.input_date_penawaran,a.date_input,b.rinci_nama_pel,b.rinci_id,b.very_code as codeAgt FROM guest_book a LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  where datediff(curdate(),date_format(input_date_penawaran,'%Y-%m-%d')) = 7 or datediff(curdate(),date_format(a.date_input,'%Y-%m-%d')) = 7  ORDER BY input_date_penawaran,date_input desc ";
											$stmtguestbook 	= $conn->prepare( $qryguestbook );
											$stmtguestbook->execute();
											$i=0;
											while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
											extract($rowguestbook);
											//echo "SELECT tgl_transfer,date_input FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$qq 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail	= $conn->prepare( $qq );
											$stmtdetail->execute();	
											$dtdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
											
											$qq2 	= "SELECT * FROM guest_book_detail where book_id=".$rowguestbook['book_id']."";
											$stmtdetail2	= $conn->prepare( $qq2 );
											$stmtdetail2->execute();	
											$rows = $stmtdetail2->fetch(PDO::FETCH_NUM);
											
											if($rows > 0){
											$bayar='Telah Membayar';
											$jam=explode(" ",$dtdetail['date_input']);
											$waktu=$jam[1];
											}else{
											$jam=explode(" ",($date_input==''?$input_date_penawaran:$date_input));
											$waktu=$jam[1];
											
												$bayar='';
											}
											$i++;
											?>
											<tr class="gradeA">
																							
													<td>
													Pemesanan Baru untuk
													ID Pemesanan <a href="prosesUpdate.php?very_code=<?PHP echo $codeWlj ?>&rinci_id=<?php echo $rinci_id?>" ><b><?php echo ($codeWlj==''?$codeAgt:$codeWlj) ?></a></b> atas nama <b><?php echo ($name==''?$rinci_nama_pel:$name) ?></b> (<?php echo $bayar?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $waktu?>
													</td>
																	
													
												</tr>
											<?php
											}
											?>
											</tbody>
						
						
											
											</table>
								
									</div>