<?PHP
	require ('../../config/hotel.conn.php');
	$action = $_POST['act'];
	$now	= date("Y-m-d H:i:s");
	if(!empty($_POST['voc_exp'])){
			$tgl = explode("/",$_POST['voc_exp']);
			$tglexp = $tgl[2]."-".$tgl[0]."-".$tgl[1];
		}
	$codeencrypt = crypt(md5($_POST['voc_code']), md5($_POST['voc_code']));
	
	if ($action == 'tambah'){
		
		//convert date
		
		
		
		
		
		$qryguestreserv 		= "INSERT INTO m_voucher SET 
									voc_code 			= ?, 
									voc_code_encrypt	= ?, 
									voc_nilai			= ?, 
									voc_exp		 		= ?,
									date_input	 		= ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['voc_code']);
		$stmtguestreserv->bindParam(2, $codeencrypt);
		$stmtguestreserv->bindParam(3, $_POST['voc_nilai']);
		$stmtguestreserv->bindParam(4, $tglexp);
		$stmtguestreserv->bindParam(5, $now);
		$stmtguestreserv->execute();
		
		header ("location: ../index.php?modul=m_voc");
	
	}else if ($action == 'edit'){
	
		//echo $_POST['id'];
	
		$qryupdthot = "UPDATE m_voucher set 
					 voc_code			= :voc_code, 
					 voc_code_encrypt 	= :voc_code_encrypt, 
					 voc_nilai	 		= :voc_nilai, 
					 voc_exp	 		= :voc_exp
					 where voc_id 		= :voc_id";
        $stmt_update = $conn->prepare($qryupdthot);
		$stmt_update->bindParam(':voc_code', $_POST['voc_code']);
		$stmt_update->bindParam(':voc_code_encrypt', $codeencrypt);
		$stmt_update->bindParam(':voc_nilai', $_POST['voc_nilai']);
		$stmt_update->bindParam(':voc_exp', $tglexp);
        $stmt_update->bindParam(':voc_id', $_POST['id']);
        $stmt_update->execute();
		
		header ("location: ../index.php?modul=m_voc");
	
	}else if($_GET['act'] == 'del'){
	
		$qryremove	= "DELETE FROM m_voucher WHERE voc_id = ".$_GET['id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
		
		header ("location: ../index.php?modul=m_voc");
	}
?>