<?PHP
	function confMailServer($conn, $var){
		$QryMailServer	= $conn->query("SELECT * FROM mail_server LIMIT 0,1");
		$dataMailServer	= $QryMailServer->fetch(PDO::FETCH_ASSOC);
		return $dataMailServer[$var];
	}
?>