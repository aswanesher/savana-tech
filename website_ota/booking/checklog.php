<?PHP
		session_start();
		
		require ('../config/hotel.conn.php');
		if($_POST['code_safety'] == '' && $_POST['code_key'] == ''){
		header	("Location: login.php?result=fail");
		}else if(isset($_POST['code_safety']) && isset($_POST['code_key'])){
		try {
		$safety	= crypt(md5($_POST['code_safety']), md5($_POST['code_safety']));
		$key 	= crypt(md5($_POST['code_key']), md5($_POST['code_key']));
		
		$qrychecklog 	= $conn->query("SELECT * FROM authenticated WHERE code_encrypt ='".$safety."' AND code_key_encrypt ='".$key."'");
		$data		 	= $qrychecklog->fetch(PDO::FETCH_ASSOC);
		
		
		if($safety == $data['code_encrypt'] && $key == $data['code_key_encrypt']){	
		
			$_SESSION["per"] = $data['code_permission'];
			$_SESSION['code_id'] = $data['code_id'];
			$_SESSION['code_safety'] = $data['code_safety'];
			setcookie("per", $data['code_permission'], time()+3600);	
			setcookie("priv", $data['code_priv'], time()+3600);	
		
			/*$login 	= "LOGIN";
			$date   = date('Y-m-d H:i:s');
			$log_sql = "INSERT INTO log_story SET log_name = ? ,log_menu = ?, log_date_in = ?";
			$stmtlog = $conn->prepare($log_sql);
			$stmtlog->bindParam(1, $data['code_permission']);
			$stmtlog->bindParam(2, $login);
			$stmtlog->bindParam(3, $date);
			$stmtlog->execute();*/
		
			header	("Location: ../booking");
		}else{
			header	("Location: login.php?result=fail");
		}
		}catch(PDOException $exception){
        echo "Error: " . $exception->getMessage();
		}
		
		}

?>