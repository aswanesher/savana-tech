		<div class="col-md-7 offset-0">
			<table border="1" width="100%">
				<tr>
					<td align="center">No Kursi</td>
				</tr>
				<tr>
					<td align="center"><h4><b><?PHP echo $strDataProf['meja_nomor']?></b></h4></td>
				</tr>
			</table>
		</div>
		<div class="col-md-7 offset-0" style="margin-top: 10px;">
			<table>
				<tr>
					<td><b>Detail Pemesanan</b></td>
				</tr>
			</table>
			<table border="1" width="100%">
				<tr>
					<td width="50%"><b>Nama Menu</b></td>
					<td width="3%"><b>Jumlah</b></td>
					<td width="50%"><b>Harga</b></td>
				</tr>
				<?PHP
					$totalPembayaranMakan = 0;
					$qryMenuMasakan	= "SELECT a.pesanan_id,b.menu_masakan_nama,b.menu_masakan_id,b.menu_harga,COUNT(b.menu_masakan_id) as total_pesan,SUM(b.menu_harga) as total FROM m_menu_pesanan a INNER JOIN m_menu_masakan b ON a.menu_masakan_id = b.menu_masakan_id WHERE a.hotel_id = '".$strDataProf['hotel_id']."' AND a.meja_nomor_pesanan = '".$strDataProf['meja_nomor_pesanan']."' GROUP BY a.menu_masakan_id ORDER BY a.pesanan_id DESC";
					$stmtMenuMasakan= $conn->prepare( $qryMenuMasakan );
					$stmtMenuMasakan->execute();		 
					while ($rowMenuMasakan = $stmtMenuMasakan->fetch(PDO::FETCH_ASSOC)){
					extract($rowMenuMasakan);
				?>
				<tr>
					<td width="50%"><?PHP echo $menu_masakan_nama?></td>
					<td width="3%" align="center"><?PHP echo $total_pesan?></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($total,2,",",".")?></td>
				</tr>
				<?PHP
					$totalPembayaranMakan += $total;
				}
				?>
				<tr>
					<td width="50%" colspan="2" align="right"><b>Total</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($totalPembayaranMakan,2,",",".")?></td>
				</tr>
				<tr>
					<td width="50%" colspan="2" align="right"><b>Disc</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($datavoc['voc_nilai'],2,",",".")?></td>
				</tr>
				<tr>
					<td width="50%" colspan="2" align="right"><b>Total Pembayaran</b></td>
					<td width="50%" align="right">Rp. <?PHP echo number_format($strDataProf['total_stlh_disc'],2,",",".")?></td>
				</tr>
			</table>
		</div>