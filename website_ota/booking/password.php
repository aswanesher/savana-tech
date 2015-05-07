<?PHP
session_start();
	require ('../config/hotel.conn.php');
	
	
?>

<script type="text/javascript">
   
    function hapus() {
        return window.confirm("Apakah anda yakin ingin menghapus data ini ? ") }
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
											Ubah Password
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Ubah Password</h3>
									</div>
									<div class="description">Halaman Ubah Password</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<?php
        if (isset($_GET['sts'])) {
            ?><div <?php echo ($_GET['sts'] == 'cck' ? 'class="alert alert-block alert-success  fade in"' : 'class="alert alert-block alert-warning  fade in"') ?>>
                                                                               
                                                                                <a class="close" data-dismiss="alert" href="index.php?modul=pass" aria-hidden="true"><i class="fa fa-refresh"></i></a>
                                                                             
                                                                                        <p><h4><i <?php echo ($_GET['sts'] == 'cck' ? 'class="fa fa-check' : 'class="fa fa-times') ?>"></i> <?php echo($_GET['sts']=='cck'?'Ubah password sukses':($_GET['sts']=='tcck2'?'Password lama tidak cocok':'Password baru tidak cocok'))?> !</h4> </p>
                                                                        </div> <?php
        }
		?>
						
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
										<h4><i class="fa fa-table"></i>Ubah Password</h4>
									</div>
									<div class="box-body">
										<form id="wizForm" class="form-horizontal" role="form" action="view/profil/proses.php" method="post">
												<div class="wizard-form">
													<div class="wizard-content">			
														<div class="tab-content">				 
															<div class="tab-pane active" id="account">
																<div class="form-group">
																	<label class="control-label col-md-3">Password Lama <span class="required">*</span></label>
																		<div class="col-md-9">
																		<input type="password" class="form-control" name="password_lama" placeholder="Password Lama" value=""/>
																		<span class="error-span"></span>
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-3">Password Baru<span class="required">*</span></label>
																		<div class="col-md-9">
																		<input type="password" class="form-control" name="password_baru" placeholder="Password Baru" value=""/>
																		<span class="error-span"></span>
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-3">Konfirmasi Password Baru<span class="required">*</span></label>
																		<div class="col-md-9">
																		<input type="password" class="form-control" name="password_baru2" placeholder="Konfirmasi Password Baru" value=""/>
																		<span class="error-span"></span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<input type="hidden" name="code_id" value="<?php echo $_SESSION['code_id']?>">
												<input type="hidden" name="aksi" value="ubahpass">
												<button type="button" class="btn btn-inverse" data-dismiss="modal" onclick="javascript:parent.jQuery.fancybox.close();"><i class="fa fa-angle-left"></i> Batal</button>
												<button type="submit" class="btn btn-success tip-bottom" title=""><i class="fa fa-save"></i> Simpan</button>
											</form>
									</div>
								</div>
							</div>
						</div>
						<?PHP
							}
						?>
						</div>
<!--// JAVASCRIPT CONTENT -->	

