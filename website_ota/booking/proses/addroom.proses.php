<?PHP
	require ('../../config/hotel.conn.php');
	$action = $_POST['act'];
	$now	= date("Y-m-d H:i:s");
	
	if (isset($_FILES['room_image']['type']) ) {
		   //echo $_FILES['upload']['tmp_name'];
		   //echo $_FILES['upload']['type'];
		   $nama_file 	= $_FILES['room_image']['name'];
		   $ukuran_file = $_FILES['room_image']['size'];
		   
		   $uploaddir	= '../../images/room-images/';
		   $dirfile		= $uploaddir.$nama_file;
		   move_uploaded_file($_FILES['room_image']['tmp_name'],$dirfile);
		   
		}
	
	if ($action == 'tambah'){
		
		
		$qryguestreserv 		= "INSERT INTO m_room SET 
									hotel_id 			= ?, 
									room_type 			= ?, 
									room_avaibility		= ?, 
									room_jml_org 		= ?, 
									room_price	 		= ?, 
									room_disc	 		= ?, 
									date_input	 		= ?, 
									room_tipe_kamar		= ?,
									room_info_penting	= ?,
									room_biaya_tambah	= ?,
									room_image	 		= ?,
									flag_breakfast 		= ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['hotel_id']);
		$stmtguestreserv->bindParam(2, $_POST['room_type']);
		$stmtguestreserv->bindParam(3, $_POST['room_avaibility']);
		$stmtguestreserv->bindParam(4, $_POST['room_jml_org']);
		$stmtguestreserv->bindParam(5, $_POST['room_price']);
		$stmtguestreserv->bindParam(6, $_POST['room_disc']);
		$stmtguestreserv->bindParam(7, $now);
		$stmtguestreserv->bindParam(8, $_POST['room_tipe_kamar']);
		$stmtguestreserv->bindParam(9, $_POST['room_info_penting']);
		$stmtguestreserv->bindParam(10, $_POST['room_biaya_tambah']);
		$stmtguestreserv->bindParam(11, $nama_file);
		$stmtguestreserv->bindParam(12, $_POST['flag_breakfast']);
		$stmtguestreserv->execute();
		
		header ("location: ../index.php?modul=m_room&menu=m_ava");
	
	}else if ($action == 'edit'){
	
		//echo $_POST['id'];
	
		$qryupdthot = "UPDATE m_room set 
					room_type 			= :room_type, 
					room_avaibility		= :room_avaibility, 
					room_jml_org 		= :room_jml_org, 
					room_price	 		= :room_price, 
					room_disc	 		= :room_disc, 
					room_tipe_kamar		= :room_tipe_kamar,
					room_info_penting	= :room_info_penting,
					room_biaya_tambah	= :room_biaya_tambah,
					room_image	 		= :room_image,
					flag_breakfast	 	= :flag_breakfast
					where room_id 		= :room_id";
        $stmt_update = $conn->prepare($qryupdthot);
		$stmt_update->bindParam(':room_type', $_POST['room_type']);
		$stmt_update->bindParam(':room_avaibility', $_POST['room_avaibility']);
		$stmt_update->bindParam(':room_jml_org', $_POST['room_jml_org']);
		$stmt_update->bindParam(':room_price', $_POST['room_price']);
		$stmt_update->bindParam(':room_disc', $_POST['room_disc']);
		$stmt_update->bindParam(':room_tipe_kamar', $_POST['room_tipe_kamar']);
		$stmt_update->bindParam(':room_info_penting', $_POST['room_info_penting']);
		$stmt_update->bindParam(':room_biaya_tambah', $_POST['room_biaya_tambah']);
		$stmt_update->bindParam(':room_image', $nama_file);
        $stmt_update->bindParam(':flag_breakfast', $_POST['flag_breakfast']);
        $stmt_update->bindParam(':room_id', $_POST['id']);
        $stmt_update->execute();
		
		header ("location: ../index.php?modul=m_room&menu=m_ava");
	
	}else if($_GET['act'] == 'del'){
	
		$qryremove	= "DELETE FROM m_room WHERE room_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
		
		$qryremovedetail	= "DELETE FROM m_room_detail WHERE room_id = ".$_GET['id']."";
		$stmtremovedetail = $conn->prepare($qryremovedetail);
		$stmtremovedetail->execute();
		
		header ("location: ../index.php?modul=m_room&menu=m_ava");
	}
?>