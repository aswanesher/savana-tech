<?PHP
	require ('../../config/hotel.conn.php');
	if (isset($_POST['act'])){
	$action = $_POST['act'];
	}else if (isset($_GET['act'])){
	$action = $_GET['act'];
	}
	$now	= date("Y-m-d H:i:s");
	
	if ($action == 'edit'){
	
		//echo $_POST['id'];
	
		$qryupdthot = "UPDATE m_amenities set 
					 ame_nama			= :ame_nama, 
					 ame_desk			= :ame_desk
					 where ame_id 		= :ame_id";
        $stmt_update = $conn->prepare($qryupdthot);
		$stmt_update->bindParam(':ame_nama', $_POST['ame_nama']);
		$stmt_update->bindParam(':ame_desk', $_POST['ame_desk']);
        $stmt_update->bindParam(':ame_id', $_POST['id']);
        $stmt_update->execute();
		
		header ("location: ../index.php?modul=m_hotel&menu=m_ame");
	
	}
?>