<?PHP
		session_start();
		require ('config/hotel.conn.php');
		setcookie("crv", "", time());
		if($_POST['email'] == '' && $_POST['password'] == ''){
		header	("Location: index.php?menu=login");
		}else if(isset($_POST['email']) && isset($_POST['password'])){
		try {
		$pass 	= crypt(md5($_POST['password']), md5($_POST['password']));
		
		$qrychecklog 	= $conn->query("SELECT * FROM guest_book WHERE `email` = '".$_POST['email']."' AND password_encrypt = '".$pass."'");
		$data		 	= $qrychecklog->fetch(PDO::FETCH_ASSOC);
		
		if($_POST['email'] == $data['email'] && $pass == $data['password_encrypt']){	
		
		setcookie("usr", $data['name'], time()+3600);
		setcookie("mail", $data['email'], time()+3600);
		/*
		$login 	= "LOGIN";
		$date   = date('Y-m-d H:i:s');
		$log_sql = "INSERT INTO log_story SET log_name = ? ,log_menu = ?, log_date_in = ?";
		$stmtlog = $conn->prepare($log_sql);
		$stmtlog->bindParam(1, $_POST['email']);
		$stmtlog->bindParam(2, $login);
		$stmtlog->bindParam(3, $date);
		$stmtlog->execute();
		*/
			header("Location: index.php?menu=veri");
		}else{
			header("Location: index.php?menu=login");
		}
		}catch(PDOException $exception){
        echo "Error: " . $exception->getMessage();
		}
		
		}

?>