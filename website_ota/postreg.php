<?PHP
	require ('config/hotel.conn.php');
	if(isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['password']) && $_POST['password'] != '' && isset($_POST['gender']) && $_POST['gender'] != '' && isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['alamat']) && $_POST['alamat'] != '' && isset($_POST['phone']) && $_POST['phone'] != ''){
		
		$passencrypt			= crypt(md5($_POST['password']), md5($_POST['password']));
		
		$qryguestreserv 		= "INSERT INTO guest_book SET
									email	 			= ?,
									password 			= ?,
									password_encrypt	= ?,
									name				= ?,
									gender				= ?,
									location			= ?,
									phone				= ?";
										
		$stmtguestreserv = $conn->prepare($qryguestreserv);
		$stmtguestreserv->bindParam(1, $_POST['email']);
		$stmtguestreserv->bindParam(2, $_POST['password']);
		$stmtguestreserv->bindParam(3, $passencrypt);
		$stmtguestreserv->bindParam(4, $_POST['name']);
		$stmtguestreserv->bindParam(5, $_POST['gender']);
		$stmtguestreserv->bindParam(6, $_POST['alamat']);
		$stmtguestreserv->bindParam(7, $_POST['phone']);
		$stmtguestreserv->execute();
		
	}else{
		header('location: //walanja.co.id');
	}
?>