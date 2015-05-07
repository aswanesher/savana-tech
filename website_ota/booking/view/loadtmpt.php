<table width="100%" id="dataTmpt" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
			<tr>
				<td width="2%">#</td>
				<td width="20%">Nama Tempat</td>
				<td>Jarak</td>
				<td>Option</td>
			</tr>
			<?PHP
				require ('../../config/hotel.conn.php');
				$qryhotel 	= "SELECT * FROM m_tmpt WHERE hotel_id = '".$_GET['id']."' ORDER BY tmpt_id DESC";
				$stmthotel 	= $conn->prepare( $qryhotel );
				$stmthotel->execute();
				$i=0;
				while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
				extract($rowhotel);
				$i++;
				?>
			<tr>
				<td><?PHP echo $i?></td>
				<td><?PHP echo $tmpt_nama?></td>
				<td><?PHP echo $tmpt_jarak?> (<i><?PHP echo $tmpt_satuan?></i>)</td>
				<td><a href="javascript:;" onclick="location.href='posthoteldesk.php?act=tmpt&point=hapus&idtmpt=<?PHP echo $tmpt_id?>&hotel_id=<?PHP echo $_GET['id']?>'" id="" class="delRowDesk"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a></td>
			</tr>
			<?PHP
			}
			?>
		</table>