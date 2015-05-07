<?PHP
	require ('../config/hotel.conn.php');
	session_start();
	if(isset($_GET['nilai']) && $_GET['nilai'] == 'true'){
		$QryUpdateGuest = "UPDATE guest_book SET flag_news = '1' WHERE email = '".$_COOKIE['mail']."' AND name = '".$_COOKIE['usr']."'"; 
		$stmUpdateGuest = $conn->prepare($QryUpdateGuest); 
		$stmUpdateGuest->execute();
	}else if(isset($_GET['nilai']) && $_GET['nilai'] == 'false'){
		$QryUpdateGuest = "UPDATE guest_book SET flag_news = '0' WHERE email = '".$_COOKIE['mail']."' AND name = '".$_COOKIE['usr']."'"; 
		$stmUpdateGuest = $conn->prepare($QryUpdateGuest); 
		$stmUpdateGuest->execute();
	}
?>