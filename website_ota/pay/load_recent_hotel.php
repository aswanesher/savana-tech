		<?PHP
		
			$qryCekPesanan	= $conn->query("SELECT b.hotel_nama,c.room_type,a.check_in,a.check_out,a.noroom,a.pax,a.hrg_hari_ini,c.room_price,c.room_disc FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id INNER JOIN m_room c ON a.room_id = c.room_id WHERE a.book_id = '".$strDataTerakhir['book_id']."'");
			$qryCekPesanan	= $qryCekPesanan->fetch(PDO::FETCH_ASSOC);
			
			$in		= date_create($qryCekPesanan['check_in']);
			$out	= date_create($qryCekPesanan['check_out']);
			$tot_day= date_diff($in,$out);
			$subTot = $qryCekPesanan['hrg_hari_ini'] * $qryCekPesanan['noroom'];
			
			$disc= $qryCekPesanan['room_disc']/100 * $subTot;
			$totHarga = $disc + $qryCekPesanan['hrg_hari_ini'];
			
		?>
		<div class="col-md-7 offset-0" style="margin-top: 10px;">
			<table>
				<tr>
					<td><b>Detail Pemesanan</b></td>
				</tr>
			</table>
			<table border="1" width="100%">
				<tr>
					<td width="50%"><b>Nama Hotel</b></td>
					<td width="50%">&nbsp;<?PHP echo $qryCekPesanan['hotel_nama']?></td>
				</tr>
				<tr>
					<td width="50%"><b>Type Kamar</b></td>
					<td width="50%">&nbsp;<?PHP echo $qryCekPesanan['room_type']?></td>
				</tr>
				<tr>
					<td width="50%"><b>Durasi</b></td>
					<td width="50%">&nbsp;<?PHP echo $tot_day->format("%a")?> Malam</td>
				</tr>
				<tr>
					<td width="50%"><b>Jml Kamar</b></td>
					<td width="50%">&nbsp;<?PHP echo $qryCekPesanan['noroom']?></td>
				</tr>
				<tr>
					<td width="50%"><b>Jml Tamu</b></td>
					<td width="50%">&nbsp;<?PHP echo $qryCekPesanan['pax']?></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><b>Rincian Biaya</b></td>
				</tr>
			</table>
			<table border="1" width="100%">
				<tr>
					<td width="50%"><b>Harga Kamar</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format( $qryCekPesanan['hrg_hari_ini'],2,",",".")?></td>
				</tr>
				<tr>
					<td width="50%"><b>Disc</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($datavoc['voc_nilai'],2,",",".")?></td>
				</tr>
				<tr>
					<td width="50%"><b>Total Pembayaran</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($strDataTerakhir['total_stlh_disc'],2,",",".")?></td>
				</tr>
			</table>
		</div>