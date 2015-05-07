<?PHP
	require ('../../config/hotel.conn.php');
	$action = $_POST['act'];
	$act = $_GET['act'];
	$now	= date("Y-m-d H:i:s");
	
	if ($action == 'tambah'){
		
		$qryguestreserv 		= "INSERT INTO m_room_detail SET 
									fac_id			= ?,  
									ame_id			= ?,  
									hotel_id		= ?,  
									date_input		= ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['fac_id']);
		$stmtguestreserv->bindParam(2, $_POST['ame_id']);
		$stmtguestreserv->bindParam(3, $_POST['id']);
		$stmtguestreserv->bindParam(4, $now);
		$stmtguestreserv->execute();
	
	}else if ($act == 'del'){
	
		$qryremove	= "DELETE FROM m_room_detail WHERE room_detail_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
		
		header ("location: addfac.form.php?id=".$_GET['hotel_id']."&type=".$_GET['type']."");
	
	}
?>