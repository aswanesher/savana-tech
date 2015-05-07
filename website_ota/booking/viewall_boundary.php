<script src="js/jquery/jquery-2.0.3.min.js"></script>
<?php

class viewall_boundary extends access {
	var $content;

	 function show($GET, $POST, $FILE, $conn) {
		include 'control/db_ctrl.php';
		
		//$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		if(isset($_GET['username'])){
			if($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==3 ){
			$a="and (menu='teknis' or menu='cs' and username <> 'admin')";
			
			}else if($_SESSION['gud_dep_id']==5 ){
			$a="and menu='prospek' and username <> 'admin' ";
			
			}
			
		}
		$this->content='
		<div id="main-content">
				<div class="container">
					<div class="row">
						<div id="content" class="col-lg-12">
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
												<a href="index.php">Beranda</a>
											</li>
											<li>
												<a href="#">Admin</a>
											</li>
											<li>Log Actifity User</li>
										</ul>
										<!-- /BREADCRUMBS -->
										<div class="clearfix">
											<h3 class="content-title pull-left">Log Actifity User</h3>
										</div>
										<div class="description">Berisi Daftar Log Actifity User</div>
									</div>
								</div>
							</div>
							<!-- /PAGE HEADER -->
							<!-- PAGE MAIN CONTENT -->
							<!-- NORMAL BUTTONS -->
							<div class="row">
								<div class="col-md-12">
									<!-- BOX -->
									<font color = "black">
									<div class="box border blue">
										
										</div>
										<div class="box-body">';
										
											 $qry3 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) = 0 $a order by id desc ");
											 $dt3 = mysqli_fetch_assoc($qry3);
											 $waktu = explode(" ",$dt3['waktu']);	
											$tgl3 = explode("-",$waktu[0]);	
											$tgl_akt3 = $tgl3[2]." ".getBulan($tgl3[1])." ".$tgl3[0];					
																					
											 $this->content.='
											 
											 <form name="myform" action="class/log_activity/proses.php" method="post">
											 ';
											if($dt3['waktu']>0){
											 $this->content.='
											<h5><b>Hari Ini</h5>
											';
											}
											$this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d'))= 0 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status ';
											}else{
												$menu = ' menghapus';
											}
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											 
											$sql = mysqli_query($conn, "SELECT * FROM tek_perbaikan WHERE 1=1 and perbaikan_id =".$dt['id_data']." order by tanggal_surat desc");
											$dt1 = mysqli_fetch_array($sql);
											$q1=mysqli_query($db, 'SELECT * FROM trs_kontrak b, mst_pelanggan c WHERE b.cust_id = c.cust_id and kontrak_id = '.$dt1['kontrak_id'].' ');
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
												
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp where comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$qq=mysqli_query($db,"select * from trs_kontrak b, mst_pelanggan c  WHERE b.kontrak_id = ".$data['kontrak_id']." and b.cust_id = c.cust_id");
												$dt=mysqli_fetch_array($qq) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($dt['company_name']==''?($dt['company_name']==''?$dt['cust_nama']:$dt['cust_nama2']):$dt['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
						
											
											</table>
											 </form>
											';
											
											 $qry1 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =1 $a order by id desc ");
											 $dt1 = mysqli_fetch_assoc($qry1);
											 $waktu1 = explode(" ",$dt1['waktu']);	
											$tgl1 = explode("-",$waktu1[0]);	
											$tgl_akt1 = $tgl1[2]." ".getBulan($tgl1[1])." ".$tgl1[0];					
																					
											 $this->content.='
											<form name="myform" action="class/log_activity/proses.php" method="post">
											';
											if($dt1['waktu']>0){
											 $this->content.='
											<h5><b>Kemarin</h5>
											';
											}
											 $this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d'))=1 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}
											
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status';
											}else{
												$menu = ' menghapus';
											}
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											 
											$sql = mysqli_query($conn, "SELECT * FROM tek_perbaikan WHERE 1=1 and perbaikan_id =".$dt['id_data']." order by tanggal_surat desc");
											$dt1 = mysqli_fetch_array($sql);
											$q1=mysqli_query($db, 'SELECT * FROM trs_kontrak b, mst_pelanggan c WHERE b.cust_id = c.cust_id and kontrak_id = '.$dt1['kontrak_id'].' ');
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
												
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
											
											</table>
											 </form>';
											
											 $qry2 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =2 $a order by id desc ");
											 $dt2 = mysqli_fetch_assoc($qry2);
											 $waktu2 = explode(" ",$dt2['waktu']);	
											$tgl2 = explode("-",$waktu2[0]);	
											$tgl_akt2 = $tgl2[2]." ".getBulan($tgl2[1])." ".$tgl2[0];					
																					
											 $this->content.='
											 <form name="myform" action="class/log_activity/proses.php" method="post">
											 ';
											if($dt2['waktu']>0){
											 $this->content.='
											<h5><b>'.$tgl_akt2.'</h5>
											';
											}
											 $this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d'))=2 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}else{
											
												
												
											}
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status';
											}else{
												$menu = ' menghapus';
											}
											
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											 
											$sql = mysqli_query($conn, "SELECT * FROM tek_perbaikan WHERE 1=1 and perbaikan_id =".$dt['id_data']." order by tanggal_surat desc");
											$dt1 = mysqli_fetch_array($sql);
											$q1=mysqli_query($db, 'SELECT * FROM trs_kontrak b, mst_pelanggan c WHERE b.cust_id = c.cust_id and kontrak_id = '.$dt1['kontrak_id'].' ');
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
												
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
											
											</table>
											 </form>';
											 $qry3 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =3 $a order by id desc ");
											 $dt3 = mysqli_fetch_assoc($qry3);
											 $waktu3 = explode(" ",$dt3['waktu']);	
											$tgl3 = explode("-",$waktu3[0]);	
											$tgl_akt3 = $tgl3[2]." ".getBulan($tgl3[1])." ".$tgl3[0];					
																					
											 $this->content.='
											 
											 <form name="myform" action="class/log_activity/proses.php" method="post">
											 ';
											if($dt3['waktu']>0){
											 $this->content.='
											<h5><b>'.$tgl_akt3.'</h5>
											';
											}
											$this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d'))=3 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											$menu='';
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status';
											}else{
												$menu = ' menghapus';
											}
											
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											 
											$sql = mysqli_query($conn, "SELECT * FROM tek_perbaikan WHERE 1=1 and perbaikan_id =".$dt['id_data']." order by tanggal_surat desc");
											$dt1 = mysqli_fetch_array($sql);
											$q1=mysqli_query($db, 'SELECT * FROM trs_kontrak b, mst_pelanggan c WHERE b.cust_id = c.cust_id and kontrak_id = '.$dt1['kontrak_id'].' ');
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
												
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
											
											</table>
											 </form>';
											 $qry4 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =4 $a order by id desc ");
											 $dt4 = mysqli_fetch_assoc($qry4);
											 $waktu4 = explode(" ",$dt4['waktu']);	
											$tgl4 = explode("-",$waktu4[0]);	
											$tgl_akt4 = $tgl4[2]." ".getBulan($tgl4[1])." ".$tgl4[0];					
																					
											 $this->content.='
											 
											 <form name="myform" action="class/log_activity/proses.php" method="post">
											 ';
											if($dt4['waktu']>0){
											 $this->content.='
											<h5><b>'.$tgl_akt4.'</h5>
											';
											}
											$this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d'))=4 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status';
											}else{
												$menu = ' menghapus';
											}
											
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											 
											$sql = mysqli_query($conn, "SELECT * FROM tek_perbaikan WHERE 1=1 and perbaikan_id =".$dt['id_data']." order by tanggal_surat desc");
											$dt1 = mysqli_fetch_array($sql);
											$q1=mysqli_query($db, 'SELECT * FROM trs_kontrak b, mst_pelanggan c WHERE b.cust_id = c.cust_id and kontrak_id = '.$dt1['kontrak_id'].' ');
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
												
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
											
											</table>
											 </form>';
											 $qry5 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =5 $a order by id desc ");
											 $dt5 = mysqli_fetch_assoc($qry5);
											 $waktu5 = explode(" ",$dt5['waktu']);	
											$tgl5 = explode("-",$waktu5[0]);	
											$tgl_akt5 = $tgl5[2]." ".getBulan($tgl5[1])." ".$tgl5[0];					
																					
											 $this->content.='
											 
											 <form name="myform" action="class/log_activity/proses.php" method="post">
											 ';
											 if($dt5['waktu'] > 0){
											 $this->content.='
											 <h5><b>'.$tgl_akt5.'</h5>
											 ';
											 }
											 $this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d'))=5 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status';
											}else{
												$menu = ' menghapus';
											}
											
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											 
											$sql = mysqli_query($conn, "SELECT * FROM tek_perbaikan WHERE 1=1 and perbaikan_id =".$dt['id_data']." order by tanggal_surat desc");
											$dt1 = mysqli_fetch_array($sql);
											$q1=mysqli_query($db, 'SELECT * FROM trs_kontrak b, mst_pelanggan c WHERE b.cust_id = c.cust_id and kontrak_id = '.$dt1['kontrak_id'].' ');
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
												
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
											
											</table>
											 </form>';
											 $qry6 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =6 $a order by id desc ");
											 $dt6 = mysqli_fetch_assoc($qry6);
											 $waktu6 = explode(" ",$dt6['waktu']);	
											$tgl6 = explode("-",$waktu6[0]);	
											$tgl_akt6 = $tgl6[2]." ".getBulan($tgl6[1])." ".$tgl6[0];					
																					
											 $this->content.='
											 
											 <form name="myform" action="class/log_activity/proses.php" method="post">
											  ';
											if($dt6['waktu']>0){
											 $this->content.='
											<h5><b>'.$tgl_akt6.'</h5>
											';
											}
											$this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d'))=6 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status';
											}else{
												$menu = ' menghapus';
											}
											
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											 
											$sql = mysqli_query($conn, "SELECT * FROM tek_perbaikan WHERE 1=1 and perbaikan_id =".$dt['id_data']." order by tanggal_surat desc");
											$dt1 = mysqli_fetch_array($sql);
											$q1=mysqli_query($db, 'SELECT * FROM trs_kontrak b, mst_pelanggan c WHERE b.cust_id = c.cust_id and kontrak_id = '.$dt1['kontrak_id'].' ');
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
												
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
											
											</table>
											 </form>';
											 $qry7 = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =7 $a order by id desc ");
											 $dt7 = mysqli_fetch_assoc($qry7);
											 $waktu7 = explode(" ",$dt7['waktu']);	
											$tgl7 = explode("-",$waktu7[0]);	
											$tgl_akt7 = $tgl7[2]." ".getBulan($tgl7[1])." ".$tgl7[0];
											
											
											
											 $this->content.='
											 
											 <form name="myform" action="class/log_activity/proses.php" method="post">
											  ';
											if($dt7['waktu']>0){
											 $this->content.='
											<h5><b>'.$tgl_akt7.'</h5>
											';
											}
											$this->content.='
											<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
												
												<tbody>';
												
												
											$qry = mysqli_query($conn,"SELECT * from tabel_histori where datediff(curdate(),date_format(waktu,'%Y-%m-%d')) =7 $a order by id desc ");
											
											$i=0;
											while ($dt = mysqli_fetch_assoc($qry))
											{
																					
											$data='';
											if($dt['jenis_transaksi']=='ubahst'){
												if($dt['menu']=='prospek'){
													$data = getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']) ;
													$data.=' mengubah status menjadi '.$dt['class'];
												}
											}
											if($data==''){
												$data = '--Data Telah Dihapus--';
											}
											
											if($dt['jenis_transaksi']=='tambah'){
												$menu = ' menambah ';
											}else if($dt['jenis_transaksi']=='ubah'){
												$menu = ' mengubah';
											}else if($dt['jenis_transaksi']=='ubahst'){
												$menu = ' mengubah status';
											}else{
												$menu = ' menghapus';
											}
											
											if($dt['class']=='teknis'){	
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = '  teknis pelanggan';
											}else if($dt['class']=='perbaikan'){
											$q1=mysqli_query($conn, 'select * from tek_perbaikan a, trs_kontrak b, mst_pelanggan c, mst_kategoripelanggan d WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and b.kontrak_jproduct = d.kapel_id and perbaikan_id ='.$dt['id_data'].' '
												);
											$data = mysqli_fetch_array($q1) ;
											$jum=mysqli_num_rows($q1);
												if($jum>0){
												$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class = ' perbaikan';
											}else if($dt['class']=='instalasi'){
												$class = ' instalasi';
											}else if($dt['class']=='pemeliharaan'){
											
												$class = ' pemeliharaan';
											}else if($dt['class']=='tra_kontrak'){
												$class = ' kontrak';
											}else if($dt['class']=='aktifitas2'){											
												$q=mysqli_query($conn, 'select * from trs_aktifitas a, mst_calonpelanggan b WHERE a.calon_id = b.calon_id and  a.akt_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0 ){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}													
											$class = ' aktifitas';
												
											}else if($dt['class']=='aktifitas'){
												$q=mysqli_query($conn, 'select * from mst_calonpelanggan WHERE calon_id ='.$dt['id_data'].' ');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												if($jum>0){
													$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}				
											$class = ' penawaran';
											
											}else if($dt['class']=='peng_pelanggan'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt="untuk ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$class = ' pengaduan';
											
											}else if($dt['class']=='survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey-Open';												
												$dt_class = ' Open';
											}else if($dt['class']=='survey-On Progress'){
												$menu1 = 'teknis';
												$class = 'survey-On Progress';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey-Close';												
												$dt_class = ' Close';
											}
											
											
											
											else if($dt['class']=='survey2'){
												$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$class=' form survey detail';
											}else if($dt['class']=='peng_pelanggan2'){
												$q=mysqli_query($conn, 'select * from cs_cust_comp a, trs_kontrak b, mst_pelanggan c, tabel_obrolan d  WHERE a.kontrak_id = b.kontrak_id and b.cust_id = c.cust_id and a.comp_cust_id = d.comp_cust_id and d.comp_cust_id= '.$dt['id_data'].'');
												$data=mysqli_fetch_array($q) ;
												
												$jum=mysqli_num_rows($q);
												
												if($jum > 0 ){
													$aktt=" '".$data['obrolan']."' untuk pengaduan pelanggan ".($data['company_name']==''?($data['company_name']==''?$data['cust_nama']:$data['cust_nama2']):$data['company_name'])."";
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												
											$class='obrolan';											
											;
											}else if($dt['class']=='form_survey-On Progress'){
												$menu1 = 'cs';
												$class = 'form_survey2';												
												$dt_class = ' On Progress';
											}else if($dt['class']=='form_survey-Open'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$dt_class= ' Open';
												$id_data1 = $dt['id_data'];
											}else if($dt['class']=='form_survey-Close'){
												$menu1 = 'teknis';
												$class = 'survey';	
												$id_data = $dt['id_data'];												
												$dt_class = ' Close';
											} 	
											if(($dt['class']=='aktifitas-expired' or $dt['class']=='aktifitas-unexpired') and ($_SESSION['gud_dep_id']==1 or $_SESSION['gud_dep_id']==5)){
													
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td> '.ucfirst($dt['username']).' '.$menu.' Status Penawaran <a href="class/prosesUpdate.php?menu=prospek&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=aktifitas" ">'.($dt['class']=='aktifitas-expired'?'Expired':'Unexpired').' untuk '.getValue($conn, 'SELECT calon_subjek from mst_calonpelanggan', 'calon_id', $dt['id_data']).'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											
											}									
											else if($dt['class']=='form_survey-Close' or $dt['class']=='form_survey-On Progress' or $dt['class']=='form_survey-Open'){
											
												$sql=mysqli_query($conn,'select * from  trs_survey a, mst_calonpelanggan c where a.calon_id=c.calon_id and a.survey_id='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status survey <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" >'.$class1.' '.$dt_class.'   </a>'.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else if(($_SESSION['gud_dep_id']==2 or $_SESSION['gud_dep_id']==1) and $dt['class']=='form_survey2' ){
											
											$sql=mysqli_query($conn,'select * from  trs_survey a,survey_detail b, mst_calonpelanggan c where a.survey_id=b.survey_id and a.calon_id=c.calon_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
											
											$this->content.='
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.'<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  keputusan  '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'</a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $calon_id).' = '.getValue($conn, 'SELECT keputusan from survey_detail', 'survey_id_detail', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}else if ( $dt['class']=='trial-habis'){
											$this->content.='
											<tr class="gradeA">
												<td> '.ucfirst($dt['username']).' '.$menu.' <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class=survey2" >  Trial habis </a> untuk '.getValue($conn, 'SELECT calon_nama from mst_calonpelanggan', 'calon_id', $dt['id_data']).', '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $dt['id_data']).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>
											';
											}
											else if(($_SESSION['gud_dep_id']==5 or $_SESSION['gud_dep_id']==1) and $dt['class']=='survey2' ){
											$sql = mysqli_query($conn, 'select * from  trs_survey a,survey_detail b where a.survey_id=b.survey_id and b.survey_id_detail='.$dt[id_data].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
											$this->content.='
											
											<tr class="gradeA">
												<td>'.ucfirst($dt['username']).' '.$menu.' Hasil aktifitas <a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his ='.$dt['id'].'&class='.$dt['class'].'" > '.getValue($conn, 'SELECT aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).' </a><br>'.getValue($conn, 'SELECT hasil_aktifitas from survey_detail', 'survey_id_detail', $dt['id_data']).'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$waktu[1].'.</td>
											</tr>	
												
												';
												}else {
													echo "";
												}
											}
											
											else if($dt['class']=='survey-Open' or $dt['class']=='survey-On Progress' or $dt['class']=='survey-Close' ){
											$sql=mysqli_query($conn,'SELECT * FROM trs_survey where survey_id='.$dt['id_data'].'');
												$data=mysqli_fetch_array($sql) ;
												$jum=mysqli_num_rows($sql);
												if($jum > 0 ){
												$aktt="untuk ".$data['calon_nama']." / ".$data['calon_perusahaan']." ";	
												}else {
													$aktt=' ( --Data Telah Dihapus-- )';
												}
												$this->content .= '
											
											<tr class="gradeA">
																									
													<td>'.ucfirst($dt['username']).' '.$menu.' status Survey  '.getValue($conn, 'SELECT calon_perusahaan from mst_calonpelanggan', 'calon_id', $data['calon_id']).'  = <a href="class/prosesUpdate.php?menu='.$menu1.'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$class.'" > '.$dt_class.'   </a>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>'. $waktu[1] .'</td>
																	
													
												</tr>
											';	
											}else{										
											
											
											
											$waktu = explode(" ",$dt['waktu']);	
											$tgl = explode("-",$waktu[0]);	
												
											
											$tgl_akt = $tgl[2]." ".getBulan2($tgl[1])." ".$tgl[0];
												
											$this->content .= '
												
												<tr class="gradeA">';
													
											
													$this->content .= '
													<td>'. ucfirst($dt['username']).' &nbsp; '.$menu.' &nbsp;<a href="class/prosesUpdate.php?menu='.$dt['menu'].'&id='.$dt['id_data'].'&id_his='.$dt['id'].'&class='.$dt['class'].'" >'.$class.'</a> '.$aktt.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $waktu[1] .'</td>
												
												</tr>';
												$id = $id.$dt['id'].",";
											}
										}
        $this->content.='</tbody>
						
											
											</table>
											 </form>
											 
											
										</div>
									</div>
										</font>
									<!-- /BOX -->
								</div>
							</div>
							<div class="footer-tools">
								<span class="go-top">
									<i class="fa fa-chevron-up"></i> Top
								</span>
							</div>
						</div><!-- /CONTENT-->
					</div>
				</div>
			</div>
		';
	
	}
}

?>
<script type="text/javascript">
function checkAll(formname, checktoggle)
{
     var checkboxes = new Array();
      checkboxes = document[formname].getElementsByTagName('input');
      for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type === 'checkbox') {
               checkboxes[i].checked = checktoggle;
          }
      }
}
</script>
<script src="js/script.js"></script>
<script>
    jQuery(document).ready(function() {		
        App.setPage("dynamic_table");  //Set current page
        App.init(); //Initialise plugins and elements
    });
</script>
