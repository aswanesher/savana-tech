<?PHP
	require ('../../config/hotel.conn.php');
	if(isset($_POST['act']) && $_POST['act'] == 'desk' || isset($_GET['act']) && $_GET['act'] == 'desk'){
		if (isset($_POST['point']) && $_POST['point'] == 'tambah'){
			$qryguestreserv 		= "INSERT INTO m_hotel_desk SET 
										hotel_id 			= ?, 
										desk_judul 			= ?, 
										desk_konten			= ?";
											
			$stmtguestreserv = $conn->prepare($qryguestreserv);
			$stmtguestreserv->bindParam(1, $_POST['idhotel']);
			$stmtguestreserv->bindParam(2, $_POST['judul']);
			$stmtguestreserv->bindParam(3, $_POST['konten']);
			$stmtguestreserv->execute();
		}else if (isset($_GET['point']) && $_GET['point'] == 'hapus'){
			$qryremovedetail	= "DELETE FROM m_hotel_desk WHERE desk_hotel_id = ".$_GET['iddesk']."";
			$stmtremovedetail = $conn->prepare($qryremovedetail);
			$stmtremovedetail->execute();
			//echo $_GET['id'];
			header('location: infohotel.form.php?id='.$_GET['hotel_id'].'&result=sucdesk');
		}
	}else if(isset($_POST['act']) && $_POST['act'] == 'keb' || isset($_GET['act']) && $_GET['act'] == 'keb'){
		if (isset($_POST['point']) && $_POST['point'] == 'tambah'){
			$qryguestreserv 		= "INSERT INTO m_hotel_kebijakan SET 
										hotel_id 			= ?, 
										keb_judul 			= ?, 
										keb_konten			= ?";
											
			$stmtguestreserv = $conn->prepare($qryguestreserv);
			$stmtguestreserv->bindParam(1, $_POST['idhotel']);
			$stmtguestreserv->bindParam(2, $_POST['judul']);
			$stmtguestreserv->bindParam(3, $_POST['konten']);
			$stmtguestreserv->execute();
		}else if (isset($_GET['point']) && $_GET['point'] == 'hapus'){
			$qryremovedetail	= "DELETE FROM m_hotel_kebijakan WHERE keb_hotel_id = ".$_GET['idkeb']."";
			$stmtremovedetail = $conn->prepare($qryremovedetail);
			$stmtremovedetail->execute();
			//echo $_GET['id'];
			header('location: infohotel.form.php?id='.$_GET['hotel_id'].'&result=suckeb');
		}
	}else if(isset($_POST['act']) && $_POST['act'] == 'tmpt' || isset($_GET['act']) && $_GET['act'] == 'tmpt'){
		if (isset($_POST['point']) && $_POST['point'] == 'tambah'){
			$qryguestreserv 		= "INSERT INTO m_tmpt SET 
										hotel_id 			= ?, 
										tmpt_nama 			= ?, 
										tmpt_jarak			= ?,
										tmpt_satuan			= ?";
											
			$stmtguestreserv = $conn->prepare($qryguestreserv);
			$stmtguestreserv->bindParam(1, $_POST['idhotel']);
			$stmtguestreserv->bindParam(2, $_POST['nama']);
			$stmtguestreserv->bindParam(3, $_POST['jarak']);
			$stmtguestreserv->bindParam(4, $_POST['satuan']);
			$stmtguestreserv->execute();
		}else if (isset($_GET['point']) && $_GET['point'] == 'hapus'){
			$qryremovedetail	= "DELETE FROM m_tmpt WHERE tmpt_id = ".$_GET['idtmpt']."";
			$stmtremovedetail = $conn->prepare($qryremovedetail);
			$stmtremovedetail->execute();
			//echo $_GET['id'];
			header('location: infohotel.form.php?id='.$_GET['hotel_id'].'&result=suctmpt');
		}
	}
?>