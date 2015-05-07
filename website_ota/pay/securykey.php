<?PHP
	require ('../config/hotel.conn.php');
	if(isset($_GET['question']) && isset($_GET['answer'])){
	
		$QryUpdateGuest = "UPDATE guest_book SET question = '".$_GET['question']."', answer = '".$_GET['answer']."' WHERE email = '".$_COOKIE['mail']."' AND name = '".$_COOKIE['usr']."'"; 
		$stmUpdateGuest = $conn->prepare($QryUpdateGuest); 
		$stmUpdateGuest->execute();
	}
?>