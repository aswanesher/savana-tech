		<?PHP
			$qryCekPesanan	= $conn->query("SELECT b.hotel_nama,c.room_type,c.room_id,a.check_in,a.check_out,a.noroom,a.pax,c.room_price,c.room_disc,a.hrg_hari_ini FROM guest_book a INNER JOIN m_hotel b ON a.hotel_id = b.hotel_id INNER JOIN m_room c ON a.room_id = c.room_id WHERE a.book_id = '".$strDataProf['book_id']."'");
			$qryCekPesanan	= $qryCekPesanan->fetch(PDO::FETCH_ASSOC);
			
			$in		= date_create($qryCekPesanan['check_in']);
			$out	= date_create($qryCekPesanan['check_out']);
			$tot_day= date_diff($in,$out);
			
			$dayHarga = 0;
			$harga='';
			$dtharga = 0;
			  $jum = 0;
			  
			  $q = $conn->query("SELECT * FROM kalender_harga WHERE cal_bulan = month(curdate()) and cal_tahun= year(curdate())  and room_id=".$qryCekPesanan['room_id']."");
			
			  $dtharga = $q->fetch(PDO::FETCH_ASSOC);
				
				$harga=explode("," ,$dtharga['cal_harga']);
			
			$jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
			
			$tgl= $jumlah_hari[$dtharga['cal_bulan'] - 1];  
			
			 if ($dtharga['cal_bulan'] == 2) {
				if ($dtharga[cal_tahun] % 400 == 0 OR ($dtharga[cal_tahun] % 4 == 0 AND $dtharga[cal_tahun] % 100 != 0)) {
					$tgl= 29; 
				} 
			}
			
			$qday =$conn->query("SELECT day(curdate()) as day");	
			$dd=$qday->fetch(PDO::FETCH_ASSOC);
				
			for($a=1;$a<=$tgl;$a++){
				if($a == $dd['day']){
					$dayHarga=$harga[$a-1];
				}
			}
			
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
					<td width="50%" align="right">Rp. <?PHP echo number_format($qryCekPesanan['hrg_hari_ini'],2,",",".")?></td>
				</tr>
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