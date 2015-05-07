<?php
require ('config/hotel.conn.php');
$con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

if($_GET['type'] == 'wilayah'){
	$result = mysqli_query($con, "SELECT wilayah_id AS id,`name` AS search FROM wilayah WHERE `name` LIKE '%".strtoupper($_GET['name_startsWith'])."%' UNION ALL SELECT hotel_id,hotel_nama FROM m_hotel WHERE hotel_nama LIKE '%".strtoupper($_GET['name_startsWith'])."%' UNION ALL SELECT hotel_id,hotel_address FROM m_hotel WHERE hotel_address LIKE '%".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysqli_fetch_array($result)) {
		array_push($data, $row['search']);	
	}	
	echo json_encode($data);
}

?>