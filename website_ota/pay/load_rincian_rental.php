		<?PHP
			$qryCekPesanan	= $conn->query("SELECT b.rent_merk,b.hotel_nama,a.rent_tujuan,a.rent_jml_penumpang,a.check_in,a.check_out,a.rent_jam,b.hotel_avg,a.flag_supir,b.rent_harga_supir FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id WHERE a.hotel_id = '".$strDataProf['hotel_id']."'");
			$qryCekPesanan	= $qryCekPesanan->fetch(PDO::FETCH_ASSOC);
			
			
			$tglAmbil 	= convertDate($qryCekPesanan['check_in']);
			$hariAmbil 	= dayChoice($qryCekPesanan['check_in']);
			
			$tglKembali	= convertDate($qryCekPesanan['check_out']);
			$hariKembali= dayChoice($qryCekPesanan['check_out']);
		?>
		<div class="col-md-7 offset-0" style="margin-top: 10px;">
			<table>
				<tr>
					<td><b>Detail Pemesanan</b></td>
				</tr>
			</table>
			<table border="1" width="100%">
				<tr>
					<td width="50%"><b>Nama Mobil</b></td>
					<td width="50%">&nbsp;<?PHP echo $qryCekPesanan['rent_merk']?> <?PHP echo $qryCekPesanan['hotel_nama']?></td>
				</tr>
				<tr>
					<td width="50%"><b>Tujuan</b></td>
					<td width="50%">&nbsp;<?PHP echo $qryCekPesanan['rent_tujuan']?></td>
				</tr>
				<tr>
					<td width="50%"><b>Jml Penumpang</b></td>
					<td width="50%">&nbsp;<?PHP echo $qryCekPesanan['rent_jml_penumpang']?> Orang</td>
				</tr>
				<tr>
					<td width="50%"><b>Tgl & Waktu Pengambilan</b></td>
					<td width="50%" style="font-size: 15px">&nbsp;<?PHP echo $hariAmbil?>, <?PHP echo $tglAmbil?> - <?PHP echo $qryCekPesanan['rent_jam']?></td>
				</tr>
				<tr>
					<td width="50%"><b>Tgl & Waktu Pengembalian</b></td>
					<td width="50%" style="font-size: 15px">&nbsp;<?PHP echo $hariKembali?>, <?PHP echo $tglKembali?> - <?PHP echo $qryCekPesanan['rent_jam']?></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><b>Rincian Biaya</b></td>
				</tr>
			</table>
			<table border="1" width="100%">
				<tr>
					<td width="50%"><b>Harga Per Hari</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($qryCekPesanan['hotel_avg'],2,",",".")?></td>
				</tr>
				<?PHP
					if($qryCekPesanan['flag_supir'] == 1){
				?>
				<tr>
					<td width="50%"><b>Include Supir</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($qryCekPesanan['rent_harga_supir'],2,",",".")?></td>
				</tr>
				<?PHP
				}else{
				?>
				<tr>
					<td width="50%"><b>Include Supir</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format("0",2,",",".")?></td>
				</tr>
				<?PHP
				}
				?>
				<tr>
					<td width="50%"><b>Disc</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($datavoc['voc_nilai'],2,",",".")?></td>
				</tr>
				<tr>
					<td width="50%"><b>Total Pembayaran</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($strDataProf['total_stlh_disc'],2,",",".")?></td>
				</tr>
			</table>
		</div>