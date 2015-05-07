<?PHP
	require ('../config/hotel.conn.php');
	session_start();
	
	$vocode 	= $_GET['vocode'];
	$totyar 	= $_GET['totyar'];
	$xcode 		= crypt(md5($vocode), md5($vocode));
	
	//CHECK VOCHER
		$qrycek 	= $conn->query("SELECT *,DATEDIFF(voc_exp,CURDATE()) as exp, IF(DATEDIFF(voc_exp,CURDATE()) < 0,'expire','longex') AS status FROM m_voucher WHERE voc_code_encrypt = '".$xcode."' AND flag_use = '0'");
		$datavoc	= $qrycek->fetch(PDO::FETCH_ASSOC);
		
		if($datavoc['voc_id'] != '' && $datavoc['status'] == 'longex'){
		$_SESSION['xcd'] = $datavoc['voc_code_encrypt'];
		
		if(isset($_SESSION['cdt']) && $_SESSION['cdt'] != ""){
	//TOTAL tiket jika ada tambahan permainan
			$qryWisata 		= $conn->query("SELECT SUM(b.tiket_harga_permainan) AS totalTiket FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$_SESSION['cdt']."'");
			$strWisata 		= $qryWisata->fetch(PDO::FETCH_ASSOC);
			$totyar 		= $totyar + $strWisata['totalTiket'];
		}else{
			$totyar		= $totyar;
		}
		
		$totalSetelahDiscount	= $totyar - $datavoc['voc_nilai'];
		echo '
							
							<tr>
								<td style="border-top: 2px solid"><h4><b>Total Pembayaran</b></h4><td>
								<td align="right" style="border-top: 2px solid"><h4><b id="tarifStlhSupir">Rp. '.(number_format($totyar,2,",",".")).'</b></h4><td>
							</tr>
							<tr>
								<td style="border-bottom: 2px solid grey;"><span class="label label-danger arrow-in arrow-in-right"><i class="fa fa-plus-circle"></i> Discount</span><td>
								<td align="right" style="border-bottom: 2px solid grey;"><h4><b>Rp. '.(number_format($datavoc['voc_nilai'],2,",",".")).'</b></h4><td>
							</tr>
							<tr>
								<td style="border-top: 2px solid"><h4><b>Total Setelah Discount</b></h4><td>
								<td align="right" style="border-top: 2px solid"><h4><b>Rp. '.(number_format($totalSetelahDiscount,2,",",".")).'</b></h4><td>
							</tr>
							<tr>
								<td colspan="3" style="color: red"><span class="fa fa-exclamation-triangle"></span><b> Voucher Ini Hanya Berlaku Untuk 1x Pemakaian</b>
								<input type="hidden" name="totprice" value="'.$totalSetelahDiscount.'" />
								<td>
							</tr>
			
		';
		}else if($datavoc['status'] == 'expire'){
				
				if(isset($_SESSION['cdt']) && $_SESSION['cdt'] != ""){
			//TOTAL tiket jika ada tambahan permainan
					$qryWisata 		= $conn->query("SELECT SUM(b.tiket_harga_permainan) AS totalTiket FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$_SESSION['cdt']."'");
					$strWisata 		= $qryWisata->fetch(PDO::FETCH_ASSOC);
					$totyar 		= $totyar + $strWisata['totalTiket'];
				}else{
					$totyar		= $totyar;
				}
				
				$totalSetelahDiscount	= $totyar;
			unset($_SESSION['xcd']);
			echo '
							<tr>
								<td><h4><b>Total Pembayaran</b></h4><td>
								<td align="right"><h4><b id="tarifStlhSupir">Rp. '.(number_format($totyar,2,",",".")).'</b></h4><td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;<td>
							</tr>
							<tr>
								<td colspan="3" align="center">&nbsp;<div class="alert alert-block alert-danger fade in" id="warvoc">Masa Berlaku Voucher Telah Berakhir !!!</div>
								<input type="hidden" name="totprice" value="'.$totalSetelahDiscount.'" />
								</td>
							</tr>
			
		';
		}else if($datavoc['voc_id'] == ''){
			if(isset($_SESSION['cdt']) && $_SESSION['cdt'] != ""){
			//TOTAL tiket jika ada tambahan permainan
					$qryWisata 		= $conn->query("SELECT SUM(b.tiket_harga_permainan) AS totalTiket FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$_SESSION['cdt']."'");
					$strWisata 		= $qryWisata->fetch(PDO::FETCH_ASSOC);
					$totyar 		= $totyar + $strWisata['totalTiket'];
				}else{
					$totyar		= $totyar;
				}
				
				$totalSetelahDiscount	= $totyar;
			unset($_SESSION['xcd']);
			echo '
							<tr>
								<td><h4><b>Total Pembayaran</b></h4><td>
								<td align="right"><h4><b id="tarifStlhSupir">Rp. '.(number_format($totyar,2,",",".")).'</b></h4><td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;<td>
							</tr>
							<tr>
								<td colspan="3" align="center">&nbsp;<div class="alert alert-block alert-danger fade in" id="warvoc">Nomor Voucher Tidak Berlaku !!!</div>
								<input type="hidden" name="totprice" value="'.$totalSetelahDiscount.'" />
								</td>
							</tr>
			
		';
		
		}
?>