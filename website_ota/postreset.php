<?PHP
	require ('config/hotel.conn.php');
	if(isset($_POST['password']) && $_POST['password'] != '' && isset($_POST['email']) && $_POST['email'] != ''){
		
		
		$passencrypt			= crypt(md5($_POST['password']), md5($_POST['password']));
		
		$updtstatus	= "UPDATE guest_book SET password = '".$_POST['password']."', password_encrypt = '".$passencrypt."' WHERE email = '".$_POST['email']."'";
		$stmtupdt 	= $conn->prepare($updtstatus);
		$stmtupdt->execute();
		
		
	}else{
		header('location: //walanja.co.id');
	}
?>