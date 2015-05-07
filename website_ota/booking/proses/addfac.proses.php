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
	
		$qryupdthot = "UPDATE m_facilities set 
					 fac_nama			= :fac_nama, 
					 fac_desk			= :fac_desk
					 where fac_id 		= :fac_id";
        $stmt_update = $conn->prepare($qryupdthot);
		$stmt_update->bindParam(':fac_nama', $_POST['fac_nama']);
		$stmt_update->bindParam(':fac_desk', $_POST['fac_desk']);
        $stmt_update->bindParam(':fac_id', $_POST['id']);
        $stmt_update->execute();
		
		header ("location: ../index.php?modul=m_hotel&menu=m_fac");
	
	}
?>