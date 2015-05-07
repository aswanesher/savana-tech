	<style>
		.desc:hover {
			background-color: #FFCC66;
		}
	</style>
<?PHP
	require ('config/hotel.conn.php');
	$keyword = '%'.$_POST['keyword'].'%';
	
	$sql = "SELECT a.kota_nama as hotel_nama FROM m_kota a WHERE a.kota_nama LIKE (:keyword) UNION SELECT a.hotel_nama FROM m_hotel a WHERE a.kode_kategory = '25437857' AND (a.hotel_nama LIKE (:keyword) OR a.keyword LIKE (:keyword)) GROUP BY hotel_id";
	$query = $conn->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$desc_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['hotel_nama']);
		// add new option
		echo '<li class="desc" style="cursor: pointer" onclick="set_item(\''.str_replace("'", "\'", $rs['hotel_nama']).'\')">'.$desc_name.'</li>';
	}
?>