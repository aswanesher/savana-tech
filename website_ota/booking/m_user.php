<?PHP
	require ('../config/hotel.conn.php');
	//session_start();
?>
<script type="text/javascript">
    
    function hapus() {
        return window.confirm("Apakah anda yakin ingin menghapus data ini ? ") }
	function reset() {
        return window.confirm("Apakah anda yakin ingin mereset password ini ? ") }

</script>
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
											Daftar Pengguna
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Daftar Pengguna</h3>
									</div>
									<div class="description">Halaman Daftar Pengguna</div>
								</div>
							</div>
						</div>
						<?php
        if (isset($_GET['stts'])) {
            ?><div <?php echo ($_GET['stts'] == 'sukses'  ? 'class="alert alert-block alert-success  fade in"' : 'class="alert alert-block alert-warning  fade in"') ?>>
                                                                               
                                                                                <a class="close" data-dismiss="alert" href="index.php?modul=author" aria-hidden="true"><i class="fa fa-refresh"></i></a>
                                                                             
                                                                                        <p><h4><i <?php echo ($_GET['stts'] == 'sukses' ? 'class="fa fa-check' : 'class="fa fa-times') ?>"></i> <?php echo($_GET['stts']=='sukses'?'Berhasil ':'Gagal')?> !</h4> </p>
                                                                        </div> <?php
        }
		?>
						<!-- /PAGE HEADER -->
						
						
						<!-- MENU HALAMAN -->
						<!--<div class="row">
						
						<div class="col-md-2">
							<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(2);" onclick="location.href='index.php?modul=m_hotel&menu=m_fac'">
								<i class="fa fa-building-o fa-2x"></i>
								<div>Master Facilities</div>
							</a>
						</div>
						<div class="col-md-2">
							<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(3);" onclick="location.href='index.php?modul=m_hotel&menu=m_ame'">
								<i class="fa fa-building-o fa-2x"></i>
								<div>Master Amenities</div>
							</a>
						</div>
						<div class="col-md-2">
							<a class="btn btn-light-grey btn-icon input-block-level" href="javascript:void(1);" onclick="location.href='index.php?modul=m_hotel&menu=m_hotel'">
								<i class="fa fa-building-o fa-2x"></i>
								<div>Master Hotel</div>
							</a>
						</div>
						</div> 
						
						<div class="separator"></div>-->
						<div class="row">
									<div class="col-md-12">
										<!-- BASIC -->
										<div class="box">
											<div class="box-title">
												<h4>Tambah Pengguna</h4>
											</div>
											<div class="box-body big">
												
												<form class="form-horizontal" action="proses/adduser.proses.php" method="POST" role="form" enctype="multipart/form-data">
												  <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Nama Karyawan</label>
													<div class="col-sm-4">
													  <select class="form-control" name="kar_id">
														
														<option> -- PILIH KARYAWAN --</option>
														<?PHP
															$qryslchotel 	= "SELECT kar_nama,kar_id FROM mst_karyawan WHERE kar_id <> 1 ORDER BY kar_nama DESC";
															$stmtslchotel 	= $conn->prepare( $qryslchotel );
															$stmtslchotel->execute();
															while ($rowslchotel = $stmtslchotel->fetch(PDO::FETCH_ASSOC)){
															extract($rowslchotel);
															
														?>
														<option value="<?PHP echo $kar_id?>"><?PHP echo $kar_nama?></option>
														
														<?PHP
														}
														?>
													  </select>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Nama Pengguna</label>
													<div class="col-sm-4">
													  <input type="text" class="form-control" id="" name="code_safety"/>
													</div>
												  </div>
												  <div class="form-group">
													<label for="inputPassword3" class="col-sm-2 control-label">Kata Sandi</label>
													<div class="col-sm-4">
													  <input type="password" class="form-control" id="inputPassword3" name="code_key"/>
													</div>
												  </div>
												  <div class="separator"></div>
												  
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <input type="hidden" name="act" value="tambah"/>
													  <button class="btn btn-pink"><i class="fa fa-plus"></i> Add</button>
													</div>
												  </div>
												</form>

											</div>
										</div>
								</div>
							</div>
						<!-- TABEL YANG DI PANGGIL -->
						<div id="showuser">
							<div class="row">
							<div class="col-sm-12">
									<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Daftar Pengguna</h4>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="2%">#</th>
													<th width="10%">Nama Pengguna</th>
													<th width="10%">Password</th>
													<th width="15%">Nama Karyawan</th>
													<th width="13%" class="center">Option</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$qryhotel 	= "SELECT a.code_safety,a.code_key,b.kar_nama,a.code_id FROM authenticated a INNER JOIN mst_karyawan b ON a.kar_id = b.kar_id ORDER BY a.code_id DESC";
												$stmthotel 	= $conn->prepare( $qryhotel );
												$stmthotel->execute();
												$i=0;
												while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
												extract($rowhotel);
												$i++;
											?>
												<tr class="gradeX">
													<td><?PHP echo $i?>.</td>
													<td><?PHP echo $code_safety?></td>
													<td><?PHP echo '<font size="5">..............</font>'?></td>
													<td><?PHP echo $kar_nama?></td>
													
													<td align="center">
														<a href="proses/adduser.proses.php?act=reset&code_id=<?PHP echo $code_id?>" onclick="if(!reset()) return false;" class="btn btn-xs btn-inverse" title="reset"><i class="fa fa-gear"></i> Reset</a>
														
													<a href="view/edit.user.form.php?code_id=<?PHP echo $code_id?>" class="fancybox fancybox.iframe"><button class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil"></i></button></a>
													
													<a href='proses/adduser.proses.php?act=hapus&code_id=<?PHP echo $code_id?>' onclick='if(!hapus()) return false;' title="Hapus" ><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button></a>
													
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
						
						</div>
						
<!--// JAVASCRIPT CONTENT -->	

