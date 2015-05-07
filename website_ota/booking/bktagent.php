 <?PHP
	require("../config/hotel.conn.php");
	require("../plugins/mpdf/mpdf.php");
	require("../library/function.convert.date.php");
	require('../library/function.group.agent.php');
	require("../library/function.mail.php");
	require("../plugins/phpmailermaster/PHPMailerAutoload.php");
	ini_set('max_execution_time', 300);
	$spec = $_POST['spec'];
	
	session_start();
	//$spec = 1;
	
	if(isset($spec) && $spec != ''){
		$QryCekPesanan 	= $conn->query("SELECT a.*,b.kar_id,b.kar_nama,b.kar_alamat,b.kar_kode,b.kar_email,b.total_deposit,b.id_kat_agent,c.prov_nama,d.kota_nama FROM trs_kebutuhan a INNER JOIN mst_karyawan b ON a.kar_id = b.kar_id INNER JOIN m_prov c ON a.prov_id = c.prov_id INNER JOIN m_kota d ON a.kota_id = d.kota_id WHERE a.rinci_id = '".$spec."' LIMIT 0,1");
		$QryCekPesanan	= $QryCekPesanan->fetch(PDO::FETCH_ASSOC);
		
		$agentDiscVoc 	= $conn->query("SELECT a.rinci_nomor,a.rinci_tanggal,b.voc_nilai,a.status_send FROM trs_kebutuhan a LEFT JOIN m_voucher b ON a.voc_code = b.voc_code WHERE rinci_id = '".$QryCekPesanan['rinci_id']."'");
		$agentDiscVoc	= $agentDiscVoc->fetch(PDO::FETCH_ASSOC);
		
		
		$qroom 	= $conn->query("SELECT rinci_detail_penawaran,hotel_id,rinci_detail_qty,hrg_hari_ini FROM guest_book   WHERE rinci_id = '".$spec."' ");		
		$dtRoom= $qroom->fetch(PDO::FETCH_ASSOC);
			
			$qKatAgent=$conn->query("SELECT potongan FROM mst_kategori_agent WHERE id_kat_agent = '".$QryCekPesanan['id_kat_agent']."' ");
			$disAgent= $qKatAgent->fetch(PDO::FETCH_ASSOC);
			
			$qKar 	= $conn->query("SELECT kar_id FROM m_hotel WHERE hotel_id = '".$dtRoom['hotel_id']."' ");			
			$dtKar= $qKar->fetch(PDO::FETCH_ASSOC);			
			
			$qKomisi=$conn->query("SELECT komisi,total_deposit FROM mst_karyawan WHERE kar_id = '".$dtKar['kar_id']."' ");
			$dKomisi= $qKomisi->fetch(PDO::FETCH_ASSOC);
			
			$jum   = $dtRoom['rinci_detail_qty'] * $disAgent['potongan'];
			
			//$subTot = $QryCekPesanan['total_pesanan'] + $agentDiscVoc['voc_nilai'] +$jum ;
			$totAgent=$dtRoom['hrg_hari_ini'] * $dtRoom['rinci_detail_qty'] ; 
			$persen = $totAgent * $dKomisi['komisi'] / 100;
			$subTot2 = $subTot - $persen;
			$tot= $dKomisi['total_deposit'] - $subTot2  ;

			
			
			$qupdate = "UPDATE mst_karyawan set 
							total_deposit = '".$tot."' 
							where kar_id='".$dtKar['kar_id']."'
							";
			$udate = $conn->prepare($qupdate);
			$udate->execute(); 
			
		$totalNewDeposit = $QryCekPesanan['total_deposit'] - $QryCekPesanan['total_pesanan'];
		
		 $QryUpdateDep = "UPDATE mst_karyawan SET	 	
						total_deposit		= '" . $totalNewDeposit . "'
						where kar_id		= '" . $QryCekPesanan['kar_id']. "'";
						
			$udate2 = $conn->prepare($QryUpdateDep);
			$udate2->execute(); 
		
		
		
			
		function acak($panjang)
		{
			$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$string = '';
			for ($i = 0; $i < $panjang; $i++) {
				$pos = rand(0, strlen($karakter)-1);
				$string .= $karakter{$pos};
			}
			return $string;
		}
		$autoname = acak(5);
		
		$qryupdate = "UPDATE trs_kebutuhan set 
							status_cetak = '1', 
							pdf_name_agent = 'Confirmation-AGT".$QryCekPesanan['kar_kode']."-".$autoname.".pdf', 
							pdf_name_guest = 'Confirmation-GST".$QryCekPesanan['kar_kode']."-".$autoname.".pdf' where rinci_id = '".$spec."'";
			$stmt_update = $conn->prepare($qryupdate);
			$stmt_update->execute();
			
		$html .= '<!DOCTYPE html>
						<html lang="en">
						  <head>
							<meta charset="utf-8">
							<title>CMedia OTA | Invoice</title>
							<link rel="stylesheet" href="style.css" media="all" />
							<style>
								@font-face {
								  font-family: SourceSansPro;
								  src: url(SourceSansPro-Regular.ttf);
								}

								.clearfix:after {
								  content: "";
								  display: table;
								  clear: both;
								}

								a {
								  color: #FF9600;
								  text-decoration: none;
								}

								body {
								  position: relative;
								  width: 21cm;  
								  height: 29.7cm; 
								  margin: 0 auto; 
								  color: #555555;
								  background: #FFFFFF; 
								  font-family: Arial, sans-serif; 
								  font-size: 14px; 
								  font-family: SourceSansPro;
								}



								#details {
								  margin-bottom: 50px;
								}

								#client {
								  padding-left: 6px;
								  border-left: 6px solid #FF9600;
								  float: left;
								}

								#client .to {
								  color: #777777;
								}

								h2.name {
								  font-size: 1.4em;
								  font-weight: normal;
								  margin: 0;
								}

								#invoice {
								  float: right;
								  text-align: right;
								}

								#invoice h1 {
								  font-size: 2.4em;
								  line-height: 1em;
								  font-weight: normal;
								  margin: 0  0 10px 0;
								  font-family: "Free 3 of 9";
								  align: center;
								}

								#invoice .date {
								  font-size: 1.1em;
								  color: #777777;
								}

								table {
								  width: 100%;
								  border-collapse: collapse;
								  border-spacing: 0;
								  margin-bottom: 20px;
								}

								.table 2{
								  width: 100%;
								  border-collapse: collapse;
								  border-spacing: 0;
								  margin-bottom: 20px;
								}

								table th,
								table td {
								  padding: 12px;
								  border-right: 1px solid #FFFFFF;
								}

								.table2 th,
								.table2 td {
								  padding: 5px;
								  background: #FFFFFF;
								  text-align: Left;
								  border-bottom: 1px solid #FFFFFF;
								}

								table th {
								  white-space: nowrap;        
								  font-weight: normal;
								}

								.table2 th {
								  white-space: nowrap;        
								  font-weight: normal;
								}


								.table2 td {
								  text-align: right;
								}

								table td h3{
								  color: #FF9600;
								  font-size: 1.2em;
								  font-weight: normal;
								  margin: 0 0 0.2em 0;
								}

								.table2 td h3{
								  color: #FF9600;
								  font-size: 1.2em;
								  font-weight: normal;
								  margin: 0 0 0.2em 0;
								}

								table .no {
								  color: #FFFFFF;
								  font-size: 1.2em;
								  background: #FF9600;
								}

								table .no {
								  color: #FFFFFF;
								  font-size: 1.2em;
								  background: FFFFFF;
								}

								.table2 .no2 {
								  color: #00000;
								  font-size: 1em;

								}

								table .desc {
								  text-align: center;
								}

								table .unit {
								  background: #DDDDDD;
								  min-width:100px;
								}

								.table .unit 2{
								  min-width:100px;
								  font-weight:bold;
								}

								table .qty {
								}

								table .total {
								  background: #FF9600;
								  color: #FFFFFF;
								}

								table td.unit,
								table td.qty,
								table td.total {
								  font-size: 1.2em;
								}

								table tbody tr:last-child td {
								  border: none;
								}

								table tfoot td {
								  padding: 10px 20px;
								  background: #FFFFFF;
								  border-bottom: none;
								  font-size: 1.2em;
								  white-space: nowrap; 
								  border-top: 1px solid #AAAAAA; 
								}

								table tfoot tr:first-child td {
								  border-top: none; 
								}

								table tfoot tr:last-child td {
								  color: #FF9600;
								  font-size: 1.4em;
								  border-top: 1px solid #FF9600; 

								}

								table tfoot tr td:first-child {
								  border: none;
								}

								#thanks{
								  font-size: 2em;
								}

								#notices{
								  padding-left: 6px;
								  border-left: 6px solid #FF9600;  
								}

								#notices .notice {
								  font-size: 1.2em;
								}


								.ttd {
								width:150px;
								height:90px;
								position:left;
								margin-left:519px;
								margin-top:-100px;


								}



							
							</style>
						  </head>
						  <body>
							<header class="clearfix" style="padding: 10px 0;margin-bottom: 20px;border-bottom: 1px solid #AAAAAA;">
							  <div id="logo" style="float: left;margin-top: 8px;">
								<img src="crm.png" style=" height: 60px;" />
								
							  </div>
							  <div id="company" style="float: right;text-align: right;">
								<h2 class="name">agent.walanja.co.id</h2>
								<div>Jl. Bagusrangin no. 8, Dipatiukur, Bandung</div>
								<div>(022) 929214001</div>
								<div><a href="http://agent.walanja.co.id">agent.walanja.co.id</a></div>
							  </div>
							  </div>
							</header>
							<main>
							 <div id="details" class="clearfix">
								<div id="client">
								  <div class="to">Bukti Pemesanan :</div>
								  <h2 class="name">'.$QryCekPesanan['kar_nama'].'</h2>
								  <div class="address">'.$QryCekPesanan['kar_alamat'].'</div>
								  <div class="email">'.$QryCekPesanan['kar_email'].'</div>
								</div>
							  </div>
							  
							  <!--BARU-->
							  <table width="100%" style="background-color: white;margin-top: -46px;">
								 <tr>
										<td >Kode Pemesanan </td>
										<td >:</td>
										<td ><b>'.$agentDiscVoc['rinci_nomor'].'</b></td>
										<td >Tanggal Pemesanan</td>
										<td >:</td>
										<td ><b>'.fullDateDay($agentDiscVoc['rinci_tanggal']).'</b></td>
									</tr>
								  
									<tr>
										<td >Nama Agent </td>
										<td >:</td>
										<td ><b>'.$QryCekPesanan['kar_nama'].'</b></td>
										<td >Group Agent</td>
										<td >:</td>
										<td ><b>'.groupBerlangganan($conn, $QryCekPesanan['kar_id'], "kategori_agent").'</b></td>
									</tr>
								  
								  </table>	
								  
								   <div class="notice">Setiap pembatalan yang diterima dalam waktu 2 hari sebelum tanggal kedatangan akan dikenakan biaya. Kegagalan untuk tiba di tempat akan diperlakukan sebagai Tidak Hadir dan akan dikenakan biaya.
								</div><br>
								  
								 <h2 class="name">Rincian Pemesanan: </h2> 
							  
								  <table border="1">
													<tbody>';
													$qryKategory = "SELECT b.kode_kategory FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.rinci_id = '".$spec."' GROUP BY b.kode_kategory";
													$stmtKategory 	= $conn->prepare( $qryKategory );
													$stmtKategory->execute();
													$i=0;
													while ($rowKategory = $stmtKategory->fetch(PDO::FETCH_ASSOC)){
													extract($rowKategory);
													if($kode_kategory == '25437857'){
														$namaPesanan = 'Pemesanan Hotel';
													}else if($kode_kategory == '25437858'){
														$namaPesanan = 'Pemesanan Mobil';
													}
													$i++;
									$html .= '
														<tr class="gradeA">
															<td colspan="8" style="border-right: 1px solid;background-color: orange"><b>'.$namaPesanan.'</b></td>
														</tr>';
														if($kode_kategory == '25437857'){
															require_once('load_acc_hotel.php');	
														}else if($kode_kategory == '25437858'){
															require_once('load_acc_rent.php');	
														}
													}
													
													$GrandTotal 	= $conn->query("SELECT SUM(rinci_detail_penawaran) AS grandTotal FROM guest_book WHERE rinci_id = '".$spec."'");
													$GrandTotal	= $GrandTotal->fetch(PDO::FETCH_ASSOC);
														
									$html .= '
															<tr class="gradeA">
																<td width="2%">&nbsp;</td>
																<td colspan="7" style="border-right: 1px solid">
																	<table>
																		<tr>
																				<td width="41%" align="right" colspan="4"><h4><b>Total Pemesanan</b></h4></td>
																				<td width="17%" align="right"><h4><b>Rp. '.number_format($GrandTotal['grandTotal'],2,",",".").'</b></h4></td>
																		</tr>
																		<tr>
																				<td width="41%" align="right" colspan="4"><h4><b>Disc Voucher</b></h4></td>
																				<td width="17%" align="right"><h4><b>Rp. '.number_format($agentDiscVoc['voc_nilai'],2,",",".").'</b></h4></td>
																		</tr>
																		<tr>
																				<td width="41%" align="right" colspan="4"><h4><b>Grant Total</b></h4></td>
																				<td width="17%" align="right"><h4><b>Rp. '.number_format($GrandTotal['grandTotal'] - $agentDiscVoc['voc_nilai'],2,",",".").'</b></h4></td>
																		</tr>
																	</table>
																</td>
															</tr>	
													</tbody>
												</table>
							  
							  <table width="100%">
								<tr>
									<td width="50%"><div id="thanks">Terima Kasih!</div></td>
									<td width="50%" align="center"><img style="width: 155px;" src="ttd_dir.png" /></td>
								</tr>
							  </table>
							 
							  <div id="notices">
								<div>Keterangan :</div>
								<div class="notice">Semua permintaan khusus diberikan pada saat kedatangan.</div>		
								<div class="notice">Bukti Pemesanan yang sudah terbit tidak dapat dibatalkan atau di uangkan kembali.</div>		
							  </div><br>
							  
							</main>
							<footer style="color: #777777;width: 100%;height: 30px;position: relative;bottom: 0;border-top: 1px solid #AAAAAA;padding: 8px 0;">
							  <div><p>Kartu ini merupakan media resmi <a href="//agent.walanja.co.id"><i>agent.walanja.co.id</i><a></p></div>
							  <div style="margin-top: -49px;margin-left: 517px;"><img style="width: 246px;" src="logosupport.png"></div>
							</footer>
						  </body>
						</html>';
						
		$htmlGuest .= '<!DOCTYPE html>
						<html lang="en">
						  <head>
							<meta charset="utf-8">
							<title>CMedia OTA | Invoice</title>
							<link rel="stylesheet" href="style.css" media="all" />
							<style>
								@font-face {
								  font-family: SourceSansPro;
								  src: url(SourceSansPro-Regular.ttf);
								}

								.clearfix:after {
								  content: "";
								  display: table;
								  clear: both;
								}

								a {
								  color: #FF9600;
								  text-decoration: none;
								}

								body {
								  position: relative;
								  width: 21cm;  
								  height: 29.7cm; 
								  margin: 0 auto; 
								  color: #555555;
								  background: #FFFFFF; 
								  font-family: Arial, sans-serif; 
								  font-size: 14px; 
								  font-family: SourceSansPro;
								}



								#details {
								  margin-bottom: 50px;
								}

								#client {
								  padding-left: 6px;
								  border-left: 6px solid #FF9600;
								  float: left;
								}

								#client .to {
								  color: #777777;
								}

								h2.name {
								  font-size: 1.4em;
								  font-weight: normal;
								  margin: 0;
								}

								#invoice {
								  float: right;
								  text-align: right;
								}

								#invoice h1 {
								  font-size: 2.4em;
								  line-height: 1em;
								  font-weight: normal;
								  margin: 0  0 10px 0;
								  font-family: "Free 3 of 9";
								  align: center;
								}

								#invoice .date {
								  font-size: 1.1em;
								  color: #777777;
								}

								table {
								  width: 100%;
								  border-collapse: collapse;
								  border-spacing: 0;
								  margin-bottom: 20px;
								}

								.table 2{
								  width: 100%;
								  border-collapse: collapse;
								  border-spacing: 0;
								  margin-bottom: 20px;
								}

								table th,
								table td {
								  padding: 12px;
								  border-right: 1px solid #FFFFFF;
								}

								.table2 th,
								.table2 td {
								  padding: 5px;
								  background: #FFFFFF;
								  text-align: Left;
								  border-bottom: 1px solid #FFFFFF;
								}

								table th {
								  white-space: nowrap;        
								  font-weight: normal;
								}

								.table2 th {
								  white-space: nowrap;        
								  font-weight: normal;
								}


								.table2 td {
								  text-align: right;
								}

								table td h3{
								  color: #FF9600;
								  font-size: 1.2em;
								  font-weight: normal;
								  margin: 0 0 0.2em 0;
								}

								.table2 td h3{
								  color: #FF9600;
								  font-size: 1.2em;
								  font-weight: normal;
								  margin: 0 0 0.2em 0;
								}

								table .no {
								  color: #FFFFFF;
								  font-size: 1.2em;
								  background: #FF9600;
								}

								table .no {
								  color: #FFFFFF;
								  font-size: 1.2em;
								  background: FFFFFF;
								}

								.table2 .no2 {
								  color: #00000;
								  font-size: 1em;

								}

								table .desc {
								  text-align: center;
								}

								table .unit {
								  background: #DDDDDD;
								  min-width:100px;
								}

								.table .unit 2{
								  min-width:100px;
								  font-weight:bold;
								}

								table .qty {
								}

								table .total {
								  background: #FF9600;
								  color: #FFFFFF;
								}

								table td.unit,
								table td.qty,
								table td.total {
								  font-size: 1.2em;
								}

								table tbody tr:last-child td {
								  border: none;
								}

								table tfoot td {
								  padding: 10px 20px;
								  background: #FFFFFF;
								  border-bottom: none;
								  font-size: 1.2em;
								  white-space: nowrap; 
								  border-top: 1px solid #AAAAAA; 
								}

								table tfoot tr:first-child td {
								  border-top: none; 
								}

								table tfoot tr:last-child td {
								  color: #FF9600;
								  font-size: 1.4em;
								  border-top: 1px solid #FF9600; 

								}

								table tfoot tr td:first-child {
								  border: none;
								}

								#thanks{
								  font-size: 2em;
								}

								#notices{
								  padding-left: 6px;
								  border-left: 6px solid #FF9600;  
								}

								#notices .notice {
								  font-size: 1.2em;
								}


								.ttd {
								width:150px;
								height:90px;
								position:left;
								margin-left:519px;
								margin-top:-100px;


								}



							
							</style>
						  </head>
						  <body>
							<header class="clearfix" style="padding: 10px 0;margin-bottom: 20px;border-bottom: 1px solid #AAAAAA;">
							  <div id="logo" style="float: left;margin-top: 8px;">
								<img src="crm.png" style=" height: 60px;" />
								
							  </div>
							  <div id="company" style="float: right;text-align: right;">
								<h2 class="name">agent.walanja.co.id</h2>
								<div>Jl. Bagusrangin no. 8, Dipatiukur, Bandung</div>
								<div>(022) 929214001</div>
								<div><a href="http://agent.walanja.co.id">agent.walanja.co.id</a></div>
							  </div>
							  </div>
							</header>
							<main>
							 <div id="details" class="clearfix">
								<div id="client">
								  <div class="to">Bukti Pemesanan :</div>
								  <h2 class="name">'.$QryCekPesanan['rinci_id_pel'].'</h2>
								  <div class="address">'.$QryCekPesanan['rinci_nama_pel'].'</div>
								  <div class="email">'.$QryCekPesanan['rinci_alamat_pel'].'</div>
								</div>
							  </div>
							  
							  <!--BARU-->
							  <table width="100%" style="background-color: white;margin-top: -46px;">
								 <tr>
										<td >Kode Pemesanan </td>
										<td >:</td>
										<td ><b>'.$agentDiscVoc['rinci_nomor'].'</b></td>
										<td >Tanggal Pemesanan</td>
										<td >:</td>
										<td ><b>'.fullDateDay($agentDiscVoc['rinci_tanggal']).'</b></td>
									</tr>
								  
									<tr>
										<td >Nama Agent </td>
										<td >:</td>
										<td ><b>'.$QryCekPesanan['kar_nama'].'</b></td>
										<td valign="top" >Tujuan Keberangkatan</td>
										<td >:</td>
										<td >'.$QryCekPesanan['rinci_alamat_tuj'].', '.$QryCekPesanan['kota_nama'].', - '.$QryCekPesanan['prov_nama'].'</td>
									</tr>
								  
								  </table>	
								  
								   <div class="notice">Setiap pembatalan yang diterima dalam waktu 2 hari sebelum tanggal kedatangan akan dikenakan biaya. Kegagalan untuk tiba di tempat akan diperlakukan sebagai Tidak Hadir dan akan dikenakan biaya.
								</div><br>
								  
								 <h2 class="name">Rincian Pemesanan: </h2> 
							  
								  <table border="1">
													<tbody>';
													$qryKategory = "SELECT b.kode_kategory FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.rinci_id = '".$spec."' GROUP BY b.kode_kategory";
													$stmtKategory 	= $conn->prepare( $qryKategory );
													$stmtKategory->execute();
													$i=0;
													while ($rowKategory = $stmtKategory->fetch(PDO::FETCH_ASSOC)){
													extract($rowKategory);
													if($kode_kategory == '25437857'){
														$namaPesanan = 'Pemesanan Hotel';
													}else if($kode_kategory == '25437858'){
														$namaPesanan = 'Pemesanan Mobil';
													}
													$i++;
									$htmlGuest .= '
														<tr class="gradeA">
															<td colspan="7" style="border-right: 1px solid;background-color: orange"><b>'.$namaPesanan.'</b></td>
														</tr>';
														if($kode_kategory == '25437857'){
															require_once('load_guest_hotel.php');	
														}else if($kode_kategory == '25437858'){
															require_once('load_guest_rent.php');	
														}
													}
													
														
									$htmlGuest .= '
													</tbody>
												</table>
							  
							  <table width="100%">
								<tr>
									<td width="50%"><div id="thanks">Terima Kasih!</div></td>
									<td width="50%" align="center"><img style="width: 155px;" src="ttd_dir.png" /></td>
								</tr>
							  </table>
							 
							  <div id="notices">
								<div>Keterangan :</div>
								<div class="notice">Semua permintaan khusus diberikan pada saat kedatangan.</div>		
								<div class="notice">Bukti Pemesanan yang sudah terbit tidak dapat dibatalkan atau di uangkan kembali.</div>		
							  </div><br>
							  
							</main>
							<footer style="color: #777777;width: 100%;height: 30px;position: relative;bottom: 0;border-top: 1px solid #AAAAAA;padding: 8px 0;">
							  <div><p>Kartu ini merupakan media resmi <a href="//agent.walanja.co.id"><i>agent.walanja.co.id</i><a></p></div>
							  <div style="margin-top: -49px;margin-left: 517px;"><img style="width: 246px;" src="logosupport.png"></div>
							</footer>
						  </body>
						</html>';				
		
		
		//echo $htmlGuest;
		
		
		$mpdf=new mPDF('c','A4','','',10,10,10,25,16,13); 
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('stylepdf.css');
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html);
		$mpdf->Output('doc/Confirmation-AGT'.$QryCekPesanan['kar_kode'].'-'.$autoname.'.pdf');
		
		$mpdfGuest=new mPDF('c','A4','','',10,10,10,25,16,13); 
		$mpdfGuest->SetDisplayMode('fullpage');
		$mpdfGuest->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('stylepdf.css');
		$mpdfGuest->WriteHTML($stylesheet,1);
		$mpdfGuest->WriteHTML($htmlGuest);
		$mpdfGuest->Output('doc/Confirmation-GST'.$QryCekPesanan['kar_kode'].'-'.$autoname.'.pdf');
		
		//echo "SELECT a.hotel_id,b.kar_id  FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.rinci_id IS NOT NULL AND a.rinci_id = '".$spec."' ";
			
			
			//UPDATE GUEST RESERVATION
			
			
						
			
			

			
			$form = '
				<h3>Dear, '.$QryCekPesanan['kar_nama'].'</h3><br>
				Berikut akan di informasikan bahwa pemesanan anda dengan rincian sebagai berikut (file terlampir) :<br>
				Nomor Pemesanan : '.$QryCekPesanan['rinci_nomor'].'<br>
				Tanggal Pemesanan : '.fullDateDay($QryCekPesanan['rinci_tanggal']).'<br>
				Permintaan Telah kami setujui, simpan dengan baik bukti pemesanan yang telah diterima, terlampir 2 bukti pemesanan yang di tujukan untuk agent dan tamu yang memesan, sebagai bukti pemesanan yang nanti akan di tunjukan pada saat akan melakukan reservasi. terimakasih telah memesan melalui agent.walanja.co.id nantikan promo diskon menarik dari agent.walanja.co.id, kunjungi juga website booking online resmi walanja.co.id.
			';
			
			$formPel = '
				<h3>Dear, '.$QryCekPesanan['rinci_nama_pel'].'</h3><br>
				Berikut akan di informasikan bahwa pemesanan anda dengan rincian sebagai berikut (file terlampir) :<br>
				Nomor Pemesanan : '.$QryCekPesanan['rinci_nomor'].'<br>
				Tanggal Pemesanan : '.fullDateDay($QryCekPesanan['rinci_tanggal']).'<br>
				Permintaan Telah kami setujui, simpan dengan baik bukti pemesanan yang telah diterima, bukti pemesanan yang harus anda tunjukan pada saat akan melakukan reservasi. terimakasih telah memesan melalui agent.walanja.co.id nantikan promo diskon menarik dari agent.walanja.co.id, kunjungi juga website booking online resmi walanja.co.id.
			';
		//echo $form;
		
		//FILE attach
		$QryGetFile 	= $conn->query("SELECT pdf_name_agent,pdf_name_guest FROM trs_kebutuhan WHERE rinci_id = '".$spec."' LIMIT 0,1");
		$QryGetFile	= $QryGetFile->fetch(PDO::FETCH_ASSOC);
		
		//SEND MAIL TO AGENT
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = confMailServer($conn, 'mail_outgoing_server');
			$mail->Port = 25; 
			$mail->SMTPAuth = true;
			$mail->Username = confMailServer($conn, 'mail_username');
			$mail->Password = confMailServer($conn, 'mail_password');
			$mail->SMTPSecure = 'tls';

			$mail->From = confMailServer($conn, 'mail_username');
			$mail->FromName = 'Agent System';
			$mail->addAddress($QryCekPesanan['kar_email'], $QryCekPesanan['kar_nama']);
			
			
			$mail->WordWrap = 50;
			$mail->AddAttachment( 'doc/'.$QryGetFile['pdf_name_agent'] , $QryGetFile['pdf_name_agent'] ); //attach 1
			$mail->AddAttachment( 'doc/'.$QryGetFile['pdf_name_guest'] , $QryGetFile['pdf_name_guest'] ); //attach 2
			$mail->isHTML(true);

			$mail->Subject = 'KONFIRMASI PERSETUJUAN PEMESANAN';
			$mail->Body    = $form;
			$mail->send();
			
		//SEND MAIL TO AGENT
			$mailGuest = new PHPMailer;
			$mailGuest->isSMTP();
			$mailGuest->Host = confMailServer($conn, 'mail_outgoing_server');
			$mailGuest->Port = 25; 
			$mailGuest->SMTPAuth = true;
			$mailGuest->Username = confMailServer($conn, 'mail_username');
			$mailGuest->Password = confMailServer($conn, 'mail_password');
			$mailGuest->SMTPSecure = 'tls';

			$mailGuest->From = confMailServer($conn, 'mail_username');
			$mailGuest->FromName = 'agent.walanja.co.id System';
			$mailGuest->addAddress($QryCekPesanan['rinci_email_pel'], $QryCekPesanan['rinci_nama_pel']);
			
			
			$mailGuest->WordWrap = 50;
			$mailGuest->AddAttachment( 'doc/'.$QryGetFile['pdf_name_guest'] , $QryGetFile['pdf_name_guest'] ); //attach 2
			$mailGuest->isHTML(true);

			$mailGuest->Subject = 'BUKTI PEMESANAN';
			$mailGuest->Body    = $formPel;
			$mailGuest->send();
	}
	
?>