					<?PHP
						require ('../config/hotel.conn.php');
						session_start();
						$totalPembayaranMakan = '0';
						if(isset($_SESSION['cmj']) && isset($_SESSION['bks'])){
						$qryMenuMasakan	= "SELECT a.pesanan_id,b.menu_masakan_nama,b.menu_masakan_id,b.menu_harga,COUNT(b.menu_masakan_id) as total_pesan,SUM(b.menu_harga) as total FROM m_menu_pesanan a INNER JOIN m_menu_masakan b ON a.menu_masakan_id = b.menu_masakan_id WHERE a.hotel_id = '".$_GET['wiskulId']."' AND a.meja_nomor = '".$_SESSION['cmj']."' AND a.meja_nomor_pesanan = '".$_SESSION['bks']."' GROUP BY a.menu_masakan_id ORDER BY a.pesanan_id DESC";
						$i=0;
						$stmtMenuMasakan= $conn->prepare( $qryMenuMasakan );
						$stmtMenuMasakan->execute();		 
						while ($rowMenuMasakan = $stmtMenuMasakan->fetch(PDO::FETCH_ASSOC)){
						extract($rowMenuMasakan);
						$i++;
							if($pesanan_id != ''){
					?>
							<tr>
								<td width="3%" align="center"><h4><b style="font-family: Freestyle Script;font-size: 25px;"><?PHP echo $i?>.</b></h4></td>
								<td width="50%"><h4><b style="font-family: Freestyle Script;font-size: 25px;"><?PHP echo $menu_masakan_nama?></b></h4></td>
								<td width="4%" align="center"><h4><b style="font-family: Freestyle Script;font-size: 25px;"><?PHP echo $total_pesan?></b></h4></td>
								<td align="right"><h4><b style="font-family: Freestyle Script;font-size: 25px;">Rp. <?PHP echo number_format($total,2,",",".")?></b></h4></td>
							</tr>
					<?PHP
							$totalPembayaranMakan += $total;
							}
							
						}
						}
					?>
							<tr>
								<td colspan="2" style="border-top: 2px solid grey"><h4><b>Total Pembayaran</b></h4></td>
								<td align="right" colspan="2" style="border-top: 2px solid grey"><h4><b>Rp. <?PHP echo number_format($totalPembayaranMakan,2,",",".")?></b></h4>
								</td>
							</tr>
					<?PHP
						//JIKA VOCHER DIGUNAKAN
						if(isset($_GET['wiskulId']) && isset($_GET['vocode'])){
						
						$wiskulId 	= $_GET['wiskulId'];
						$vocode 	= $_GET['vocode'];
						$xcode 		= crypt(md5($vocode), md5($vocode));
						
						//CHECK VOCHER
						$qrycek 	= $conn->query("SELECT *,DATEDIFF(voc_exp,CURDATE()) as exp, IF(DATEDIFF(voc_exp,CURDATE()) < 0,'expire','longex') AS status FROM m_voucher WHERE voc_code_encrypt = '".$xcode."' AND flag_use = '0'");
						$datavoc	= $qrycek->fetch(PDO::FETCH_ASSOC);
						if($datavoc['voc_id'] != '' && $datavoc['status'] == 'longex'){
						$_SESSION['xcd'] = $datavoc['voc_code_encrypt'];
						$totprice = $totalPembayaranMakan - $datavoc['voc_nilai'];
					?>		
							<tr>
								<td colspan="2"><span class="label label-danger arrow-in arrow-in-right"><i class="fa fa-plus-circle"></i> Discount</span></td>
								<td align="right" colspan="2"><h4><b>Rp. <?PHP echo (number_format($datavoc['voc_nilai'],2,",","."))?></b></h4>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="border-top: 2px solid grey"><h4><b>Total Setelah Discount</b></h4></td>
								<td align="right" colspan="2" style="border-top: 2px solid grey"><h4><b>Rp. <?PHP echo (number_format($totalPembayaranMakan - $datavoc['voc_nilai'],2,",","."))?></b></h4>
								</td>
							</tr>
							<tr>
								<td colspan="4" style="color: red"><span class="fa fa-exclamation-triangle"></span><b> Voucher Ini Hanya Berlaku Untuk 1x Pemakaian</b></td>
								</td>
							</tr>
							<input type="hidden" name="totprice" value="<?PHP echo $totprice?>" />
					<?PHP
		}else if($datavoc['status'] == 'expire'){
			$totprice = $totalPembayaranMakan;
			unset($_SESSION['xcd']);
?>
							<tr>
								<td colspan="4" style="color: red" align="center">&nbsp;<div class="alert alert-block alert-danger fade in" id="warvoc">Masa Berlaku Voucher Telah Berakhir !!!</div></td>
							</tr>
							<input type="hidden" name="totprice" value="<?PHP echo $totprice?>" />
<?PHP
		}else if($datavoc['voc_id'] == ''){
			$totprice = $totalPembayaranMakan;
			unset($_SESSION['xcd']);
?>
							<tr>
								<td colspan="4" style="color: red" align="center">&nbsp;<div class="alert alert-block alert-danger fade in" id="warvoc">Nomor Voucher Tidak Berlaku !!!</div></td>
							</tr>		
							<input type="hidden" name="totprice" value="<?PHP echo $totprice?>" />
<?PHP		
			}
		}else{
?>
							<input type="hidden" name="totprice" value="<?PHP echo $totalPembayaranMakan?>" />
<?PHP
		}
?>
							