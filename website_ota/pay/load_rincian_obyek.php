		<div class="col-md-7 offset-0" style="margin-top: 10px;">
			<?PHP
				if(isset($from) && $from == 'FromHist'){
				$Qry = "WHERE a.book_id = '".$strDataTerakhir['book_id']."'";
				}else{
					$Qry = "WHERE a.hotel_id = '".$strDataProf['hotel_id']."'";
				}
				date_default_timezone_set('Asia/Jakarta');
				//CEK HARI INI APAKAH WEEKEND
				$now	  = date("Y-m-d H:i:s");
				$sekarang = date('N', strtotime($now));
				
				$qryCekTiketHoliday		= $conn->query("SELECT flag_hari_libur FROM m_tiket WHERE hotel_id = '".$strDataProf['hotel_id']."'");
				$strHargaTiketHoliday	= $qryCekTiketHoliday->fetch(PDO::FETCH_ASSOC);
				
				//JIKA HARI INI ADALAH WEEKEND
				if ($sekarang == 6 || $sekarang == 7 || $strHargaTiketHoliday['flag_hari_libur'] == 1){
					if($strHargaTiketHoliday['flag_hari_libur'] == 0){
					$qryHargaWeekEnd= $conn->query("SELECT tiket_nama,tiket_harga_dewasa_libur,tiket_harga_anak_libur FROM m_tiket WHERE hotel_id = '".$strDataProf['hotel_id']."'");
					$strHargaWeekEnd= $qryHargaWeekEnd->fetch(PDO::FETCH_ASSOC);
					$tiketNama		= $strHargaWeekEnd['tiket_nama'];
					$tiketDewasa	= $strHargaWeekEnd['tiket_harga_dewasa_libur'];
					$tiketAnak		= $strHargaWeekEnd['tiket_harga_anak_libur'];
					}else if($strHargaTiketHoliday['flag_hari_libur'] == 1){
					$qryHargaWeekEnd= $conn->query("SELECT tiket_nama,tiket_harga_dewasa_holiday,tiket_harga_anak_holiday FROM m_tiket WHERE hotel_id = '".$strDataProf['hotel_id']."'");
					$strHargaWeekEnd= $qryHargaWeekEnd->fetch(PDO::FETCH_ASSOC);
					$tiketNama		= $strHargaWeekEnd['tiket_nama'];
					$tiketDewasa	= $strHargaWeekEnd['tiket_harga_dewasa_holiday'];
					$tiketAnak		= $strHargaWeekEnd['tiket_harga_anak_holiday'];
					}
				}else{
					$qryHargaWeekEnd= $conn->query("SELECT tiket_nama,tiket_harga_dewasa_biasa,tiket_harga_anak_biasa FROM m_tiket WHERE hotel_id = '".$strDataProf['hotel_id']."'");
					$strHargaWeekEnd= $qryHargaWeekEnd->fetch(PDO::FETCH_ASSOC);
					$tiketNama		= $strHargaWeekEnd['tiket_nama'];
					$tiketDewasa	= $strHargaWeekEnd['tiket_harga_dewasa_biasa'];
					$tiketAnak		= $strHargaWeekEnd['tiket_harga_anak_biasa'];
				}
			?>
			<table>
				<tr>
					<td><b>Harga Tiket</b></td>
				</tr>
			</table>
			<table width="100%" border="1">
				<tr>
					<td width="50%"><b>Dewasa</b></td>
					<td align="right" width="50%">Rp. <?PHP echo number_format($tiketDewasa,2,",",".")?></td>
				</tr>
				<tr>
					<td><b>Anak</b></td>
					<td align="right">Rp. <?PHP echo number_format($tiketAnak,2,",",".")?></td>
				</tr>
			</table>
			
			<table>
				<tr>
					<td><b>Tambahan Permintaan Lain</b></td>
				</tr>
			</table>
			
			<table border="1" width="100%">
				<tr>
					<td width="50%"><b>Nama Pemainan</b></td>
					<td width="50%"><b>Harga</b></td>
				</tr>
				<?PHP
					
					$totalPembayaranMakan = 0;
					$qryMenuMasakan	= "SELECT b.tiket_nama,b.tiket_harga_permainan FROM guest_book_wisata_detail a INNER JOIN m_tiket b ON a.tiket_id = b.tiket_id WHERE a.guest_book_wisata_detail_kode = '".$strDataProf['guest_book_wisata_detail_kode']."'";
					$stmtMenuMasakan= $conn->prepare( $qryMenuMasakan );
					$stmtMenuMasakan->execute();		 
					while ($rowMenuMasakan = $stmtMenuMasakan->fetch(PDO::FETCH_ASSOC)){
					extract($rowMenuMasakan);
				?>
				<tr>
					<td width="50%"><?PHP echo $tiket_nama?></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($tiket_harga_permainan,2,",",".")?></td>
				</tr>
				<?PHP
					$totalPembayaranMakan += $tiket_nama;
				}
				?>
				<tr>
					<td width="50%" align="right"><b>Total</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($totalPembayaranMakan,2,",",".")?></td>
				</tr>
				<tr>
					<td width="50%" align="right"><b>Disc</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($datavoc['voc_nilai'],2,",",".")?></td>
				</tr>
				<tr>
					<td width="50%" align="right"><b>Total Pembayaran</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($strDataProf['total_stlh_disc'],2,",",".")?></td>
				</tr>
			</table>
		</div>