<table width="100%" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
			<tr>
				<td width="2%">#</td>
				<td width="20%">Judul</td>
				<td>Konten</td>
				<td>Option</td>
			</tr>
			<?PHP
				require ('../../config/hotel.conn.php');
				$qryhotel 	= "SELECT * FROM m_hotel_desk WHERE hotel_id = '".$_GET['id']."' ORDER BY desk_hotel_id DESC";
				$stmthotel 	= $conn->prepare( $qryhotel );
				$stmthotel->execute();
				$i=0;
				while ($rowhotel = $stmthotel->fetch(PDO::FETCH_ASSOC)){
				extract($rowhotel);
				$i++;
				?>
			<tr>
				<td><?PHP echo $i;?></td>
				<td><?PHP echo $desk_judul?></td>
				<td><?PHP echo $desk_konten?></td>
				<td><a href="javascript:;" onclick="location.href='posthoteldesk.php?act=desk&point=hapus&iddesk=<?PHP echo $desk_hotel_id?>&hotel_id=<?PHP echo $_GET['id']?>'" id="" class="delRowDesk"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a></td>
			</tr>
			<?PHP
			}
			?>
		</table>