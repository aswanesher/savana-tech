<?PHP
	require ('../../config/hotel.conn.php');
	echo $action = ($_POST['act']==''?$_GET['act']:$_POST['act']);
	
	function acak($panjang)
		{
			$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$string = '';
			for ($i = 0; $i < $panjang; $i++) {
				$pos = rand(0, strlen($karakter)-1);
				$string .= $karakter{$pos};
			}
			return $string;
		}
		$autoname = acak(6);
		
		$codeencrypt	= crypt(md5($_POST['code_safety']), md5($_POST['code_safety']));
		$keyencrypt	= crypt(md5($_POST['code_key']), md5($_POST['code_key']));
	
	if ($action == 'tambah'){
		
		if($_POST['code_key'] != '' || $_POST['kar_id'] != ''){
		$priv = "1";
		$qryguestreserv 		= "INSERT INTO authenticated SET 
									code_safety			= ?, 
									kar_id				= ?, 
									code_encrypt		= ?, 
									code_key	 		= ?, 
									code_key_encrypt	= ?, 
									
									code_priv			= ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['code_safety']);
		$stmtguestreserv->bindParam(2, $_POST['kar_id']);
		$stmtguestreserv->bindParam(3, $codeencrypt);
		$stmtguestreserv->bindParam(4, $_POST['code_key']);
		$stmtguestreserv->bindParam(5, $keyencrypt);
		
		$stmtguestreserv->bindParam(6, $priv);
		$stmtguestreserv->execute();
		
		header ("location: ../index.php?modul=author&stts=sukses");
		}else{
		header ("location: ../index.php?modul=author&stts=gagal");
		}
	}else if ($action=='ubah'){
	echo $qryedit	= " update authenticated set
					code_safety			= '".$_POST['code_safety']."', 
					kar_id				=  '".$_POST['kar_id']."'
					WHERE code_id = ".$_POST['code_id']."";
		$stmtedit = $conn->prepare($qryedit);
		$stmtedit->execute();
		header ("location: ../index.php?modul=author&stts=sukses");
		
	}else if ($action=='hapus'){
	$qryremove	= "DELETE FROM authenticated WHERE code_id = ".$_GET['code_id']."";
		$stmtremove = $conn->prepare($qryremove);
		$stmtremove->execute();
		header ("location: ../index.php?modul=author&stts=sukses");
		
	}else if ($action=='reset'){
		$pass = crypt(md5('bandung'), md5('bandung')); 
		$query = "UPDATE authenticated SET code_key_encrypt = '".$pass."' WHERE code_id= '".$_GET['code_id']."'";
		$stmtreset = $conn->prepare($query);
		$stmtreset->execute();
		header ("location: ../index.php?modul=author&stts=sukses");
		
	}
	

?>