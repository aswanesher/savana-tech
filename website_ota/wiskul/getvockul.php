<?PHP
	require ('../config/hotel.conn.php');
	session_start();
	
	$kulId 		= $_GET['kulId'];
	$vocode 	= $_GET['vocode'];
	$totyar 	= $_GET['totprice'];
	$xcode 		= crypt(md5($vocode), md5($vocode));
	
	
	//CHECK VOCHER
		$qrycek 	= $conn->query("SELECT *,DATEDIFF(voc_exp,CURDATE()) as exp, IF(DATEDIFF(voc_exp,CURDATE()) < 0,'expire','longex') AS status FROM m_voucher WHERE voc_code_encrypt = '".$xcode."' AND flag_use = '0'");
		$datavoc	= $qrycek->fetch(PDO::FETCH_ASSOC);
		$totalSetelahDisc	= $totyar - $datavoc['voc_nilai'];
		if($datavoc['voc_id'] != '' && $datavoc['status'] == 'longex'){
		$_SESSION['xcd'] = $datavoc['voc_code_encrypt'];
?>
							
							<tr>
								<td style="border-bottom: 2px solid grey;"><span class="label label-danger arrow-in arrow-in-right"><i class="fa fa-plus-circle"></i> Discount</span><td>
								<td align="right" style="border-bottom: 2px solid grey;"><h4><b>Rp. <?PHP echo (number_format($datavoc['voc_nilai'],2,",","."))?></b></h4><td>
							</tr>
							<tr>
								<td><h4><b>Total Setelah Discount</b></h4><td>
								<td align="right"><h4><b>Rp. <?PHP echo (number_format($totyar - $datavoc['voc_nilai'],2,",","."))?></b></h4>
								<input type="hidden" name="totprice" value="'.$totalSetelahDisc.'" />
								<td>
							</tr>
							<tr>
								<td colspan="3" style="color: red"><span class="fa fa-exclamation-triangle"></span><b> Voucher Ini Hanya Berlaku Untuk 1x Pemakaian</b><td>
							</tr>
<?PHP
		}else if($datavoc['status'] == 'expire'){
			unset($_SESSION['xcd']);
?>
							<tr>
								<td><h4><b>Total Pembayaran</b></h4><td>
								<td align="right"><h4><b id="tarifStlhSupir">Rp. <?PHP echo (number_format($totyar,2,",","."))?></b></h4><td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;<td>
							</tr>
							<tr>
								<td colspan="3" align="center">&nbsp;<div class="alert alert-block alert-danger fade in" id="warvoc">Masa Berlaku Voucher Telah Berakhir !!!</div></td>
							</tr>
			
<?PHP
		}else if($datavoc['voc_id'] == ''){
			unset($_SESSION['xcd']);
?>
							<tr>
								<td><h4><b>Total Pembayaran</b></h4><td>
								<td align="right"><h4><b id="tarifStlhSupir">Rp. <?PHP echo (number_format($totyar,2,",","."))?></b></h4><td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;<td>
							</tr>
							<tr>
								<td colspan="3" align="center">&nbsp;<div class="alert alert-block alert-danger fade in" id="warvoc">Nomor Voucher Tidak Berlaku !!!</div></td>
							</tr>		
<?PHP		
		}
?>