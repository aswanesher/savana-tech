<?php
// Koneksi database
$DB_HOST		= 'localhost';
	$DB_NAME		= 'dbota';
	$DB_USER		= 'root';
	$DB_PASSWORD		= 'cmedia2014--';
	
	try{
		$conn = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME.'',$DB_USER, $DB_PASSWORD);
	}catch(PDOExeption $exeption){
		echo 'Connection Error: '.$exeption->getMessage();
	} 
$q = trim(strip_tags($_GET['term'])); // variabel $q untuk mengambil inputan user
$sql = mysql_query("SELECT * FROM m_daerah WHERE nm_wilayah LIKE '%".$q."%'"); // menampilkan data yg ada didatabase yg sesuai dengan inputan user
while ($data = mysql_fetch_array($sql)){
	$result[] = htmlentities(stripslashes($data['nm_wilayah'])); // manempilkan nama jabatan
}
echo json_encode($result); // menampilkan data dengan format json
?>