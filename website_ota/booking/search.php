<?PHP
	if(isset($_POST['keyword']) && $_POST['keyword'] == 'dayin' && $_POST['dayin'] != ''){
		$daySearch 	= explode('-', $_POST['dayin']);
		$dayStr 	= $daySearch[0].$daySearch[1].$daySearch[2];
		header("location: index.php?modul=dash&key=".$dayStr."");
	}else{
		header("location: index.php?modul=dash");
	}
?>