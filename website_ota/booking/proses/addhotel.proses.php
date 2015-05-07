<?PHP
	require ('../../config/hotel.conn.php');
	if (isset($_POST['act'])){
	$action = $_POST['act'];
	}else if (isset($_GET['act'])){
	$action = $_GET['act'];
	}
	$now	= date("Y-m-d H:i:s");
	
	if (isset($_FILES['hotel_img']['type']) ) {
		   //echo $_FILES['upload']['tmp_name'];
		   //echo $_FILES['upload']['type'];
		   $nama_file 	= $_FILES['hotel_img']['name'];
		   $ukuran_file = $_FILES['hotel_img']['size'];
		   
		   $uploaddir	= '../../images/';
		   $dirfile		= $uploaddir.$nama_file;
		   move_uploaded_file($_FILES['hotel_img']['tmp_name'],$dirfile);
		   
		}
	
	if ($action == 'tambah'){
		
		
		
		$qryguestreserv 		= "INSERT INTO m_hotel SET 
									hotel_nama 			= ?, 
									hotel_address 		= ?, 
									rate_id		 		= ?, 
									hotel_lat	 		= ?, 
									hotel_lang	 		= ?, 
									hotel_img	 		= ?, 
									hotel_avg	 		= ?, 
									date_input			= ?,
									keyword				= ?,
									count_id			= ?,
									prov_id				= ?,
									kota_id				= ?,
									hotel_area			= ?,
									hotel_jml_kamar		= ?,
									hotel_jml_lantai	= ?,
									wil_id				= ?
									";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['hotel_nama']);
		$stmtguestreserv->bindParam(2, $_POST['hotel_desk']);
		$stmtguestreserv->bindParam(3, $_POST['rate_id']);
		$stmtguestreserv->bindParam(4, $_POST['hotel_lat']);
		$stmtguestreserv->bindParam(5, $_POST['hotel_lang']);
		$stmtguestreserv->bindParam(6, $nama_file);
		$stmtguestreserv->bindParam(7, $_POST['hotel_avg']);
		$stmtguestreserv->bindParam(8, $now);
		$stmtguestreserv->bindParam(9, $_POST['keyword']);
		$stmtguestreserv->bindParam(10, $_POST['count_id']);
		$stmtguestreserv->bindParam(11, $_POST['prov_id']);
		$stmtguestreserv->bindParam(12, $_POST['kota_id']);
		$stmtguestreserv->bindParam(13, $_POST['hotel_area']);
		$stmtguestreserv->bindParam(14, $_POST['hotel_jml_kamar']);
		$stmtguestreserv->bindParam(15, $_POST['hotel_jml_lantai']);
		$stmtguestreserv->bindParam(16, $_POST['wil_id']);
		$stmtguestreserv->execute();
		
		header ("location: ../index.php?modul=m_hotel&menu=m_hotel");
	
	}else if ($action == 'edit'){
	
		//echo $_POST['id'];
	
		$qryupdthot = "UPDATE m_hotel set 
					hotel_nama 			= :hotel_nama, 
					hotel_address 		= :hotel_address, 
					rate_id		 		= :rate_id, 
					hotel_lat	 		= :hotel_lat, 
					hotel_lang	 		= :hotel_lang, 
					hotel_img	 		= :hotel_img, 
					hotel_avg	 		= :hotel_avg, 
					keyword				= :keyword,
					count_id			= :count_id,
					prov_id				= :prov_id,
					kota_id				= :kota_id,
					hotel_area			= :hotel_area,
					hotel_jml_kamar		= :hotel_jml_kamar,
					hotel_jml_lantai	= :hotel_jml_lantai,
					wil_id				= :wil_id
					where hotel_id 		= :hotel_id";
        $stmt_update = $conn->prepare($qryupdthot);
		$stmt_update->bindParam(':hotel_nama', $_POST['hotel_nama']);
		$stmt_update->bindParam(':hotel_address', $_POST['hotel_address']);
		$stmt_update->bindParam(':rate_id', $_POST['rate_id']);
		$stmt_update->bindParam(':hotel_lat', $_POST['hotel_lat']);
		$stmt_update->bindParam(':hotel_lang', $_POST['hotel_lang']);
		$stmt_update->bindParam(':hotel_img', $nama_file);
		$stmt_update->bindParam(':hotel_avg', $_POST['hotel_avg']);
		$stmt_update->bindParam(':keyword', $_POST['keyword']);
		$stmt_update->bindParam(':count_id', $_POST['count_id']);
		$stmt_update->bindParam(':prov_id', $_POST['prov_id']);
		$stmt_update->bindParam(':kota_id', $_POST['kota_id']);
		$stmt_update->bindParam(':hotel_area', $_POST['hotel_area']);
		$stmt_update->bindParam(':hotel_jml_kamar', $_POST['hotel_jml_kamar']);
		$stmt_update->bindParam(':hotel_jml_lantai', $_POST['hotel_jml_lantai']);
		$stmt_update->bindParam(':wil_id', $_POST['wil_id']);
        $stmt_update->bindParam(':hotel_id', $_POST['id']);
        $stmt_update->execute();
		
		if(isset($_POST['res']) && $_POST['res'] == 'profile'){
			header ("location: ../index.php?modul=m_conf");
		}else{
			header ("location: ../index.php?modul=m_hotel&menu=m_hotel");
		}
	}else if($action == 'del'){
	
		$qryremove	= "DELETE FROM m_tmpt WHERE hotel_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
	
		$qryremove	= "DELETE FROM m_hotel_kebijakan WHERE hotel_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
		
		$qryremove	= "DELETE FROM m_hotel_desk WHERE hotel_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
		
		$qryremove	= "DELETE FROM m_room_detail WHERE hotel_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
	
		$qryremove	= "DELETE FROM m_hotel WHERE hotel_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
		
		header ("location: ../index.php?modul=m_hotel&menu=m_hotel");
	}
?>