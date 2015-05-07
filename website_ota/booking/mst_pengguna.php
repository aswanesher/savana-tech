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
											Data Pengguna
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Data Pengguna</h3>
									</div>
									<div class="description">Halaman Pengguna</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						
						
						<!-- MENU HALAMAN -->
						
						
						<div class="separator"></div>
						
						<!-- TABEL YANG DI PANGGIL -->
						<div id="showtable">
						
							<?PHP
								if (isset($_GET['modul']) ){
								
								//============== MASTER HOTEL =======================
							?>
							
							<br>
							<br>
							<div class="row">
							<div class="col-sm-10">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Data Pengguna</h4>
										<div class="tools">
										<a href ='view/profil/form.php' class="fancybox fancybox.iframe" ><i class='fa fa-plus-square-o'></i> Tambah</a>
										</div>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width=30px class="hidden-xs">No.</th>
														<th>Nama Pengguna</th>
														<th>Password</th>
														<th class="hidden-xs" width=100px>Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												if(isset($_GET['very_code'])){
												$a="and very_code='".$_GET['very_code']."'";
											}
												$qryguestbook 	= "SELECT  a.code_safety,a.code_key_encrypt,a.code_id from authenticated a";
												$stmtguestbook 	= $conn->prepare( $qryguestbook );
												$stmtguestbook->execute();
												$i=0;
												while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
												extract($rowguestbook);
												$i++;
						  						
												$pass = strlen($code_key_encrypt);
											?>
												<tr class="gradeX">
													<td class="hidden-xs"><?php echo $i ?></td>
													<td><?php echo $code_safety ?></td>
													
													
													
													<td><font size=5><b>.................</b></font>
																 </td>
													
													
													<td class="hidden-xs"><?php
													if($code_id != 1){
													?>
														<a href="profil/proses.php?act=reset&user_id=<?php echo$dt['user_id']?>" onclick="if(!reset()) return false;" class="btn btn-xs btn-inverse"><i class="fa fa-gear"></i> Reset</a>
														<a href="profil/form.php?user_id=<?php echo$dt['user_id']?>" class="fancybox fancybox.iframe" ><button class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</button></a>
													
														<a href="profil/proses.php?act=hapus&user_id=<?php echo$dt['user_id']?>" onclick="if(!hapus()) return false;" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Hapus</a><?php
														}
													?>
													</td>
												</tr>
											<?PHP
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?PHP
							}
						?>
						</div>
						
<!--// JAVASCRIPT CONTENT -->	

