<?PHP
	require ('../config/hotel.conn.php');
	if(isset($_GET['newKey'])){
	
		$pass = crypt(md5($_GET['newKey']), md5($_GET['newKey']));
		
		$QryUpdateGuest = "UPDATE guest_book SET password = '".$_GET['newKey']."', password_encrypt = '".$pass."' WHERE email = '".$_COOKIE['mail']."' AND name = '".$_COOKIE['usr']."'"; 
		$stmUpdateGuest = $conn->prepare($QryUpdateGuest); 
		$stmUpdateGuest->execute();
	}
?>