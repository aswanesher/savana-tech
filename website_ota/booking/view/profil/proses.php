<?PHP
	session_start();
	require ('../../../config/hotel.conn.php');
	
echo $aksi = $_POST['aksi']==''?$_GET['act']:$_POST['aksi'];
echo $_SESSION['code_id'];
		 if($aksi=='ubahpass'){
		
		if($_POST['code_id'] != '' || $_POST['password_baru'] != ''){
		
		$qpass="select code_key_encrypt from authenticated where code_id= ".$_POST['code_id'];
		
		$stmtpasslama	= $conn->prepare( $qpass );
		$stmtpasslama->execute();
		$pass= $stmtpasslama->fetch(PDO::FETCH_ASSOC);

	
	$pass_lama = crypt(md5($_POST['password_lama']), md5($_POST['password_lama'])); 
	if($pass['code_key_encrypt'] ==$pass_lama){
		if($_POST['password_baru']==$_POST['password_baru2']){
			$password_baru = crypt(md5($_POST['password_baru']), md5($_POST['password_baru']));
			$query = "UPDATE authenticated SET code_key_encrypt='".$password_baru."' WHERE code_id = '".$_POST['code_id']."'";
			$stmtpass	= $conn->prepare( $query );
			$stmtpass->execute();
			header ("Location: ../../index.php?modul=pass&sts=cck");
		}else{
			header ("Location: ../../index.php?modul=pass&sts=gagal1");
		}
	}else{
	header ("Location: ../../index.php?modul=pass&sts=gagal");
	}
	
	}
}
	
?>