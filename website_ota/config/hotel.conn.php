<?PHP
	$DB_HOST		= 'localhost';
	$DB_NAME		= 'otadb';
	$DB_USER		= 'root';
	$DB_PASSWORD		= '12012013';
	
	try{
		$conn = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME.'',$DB_USER, $DB_PASSWORD);
	}catch(PDOExeption $exeption){
		echo 'Connection Error: '.$exeption->getMessage();
	}
?>