<?PHP
	if(isset($_POST['menu']) && $_POST['menu'] == "list" && $_POST['obj_kota'] != "" && $_POST['obj_tanggal_berangkat'] != "" && $_POST['obj_dewasa'] != "" && $_POST['obj_anak'] != ""){
	$spec = $_POST['obj_kota']. '.' .$_POST['obj_tanggal_berangkat']. '.' .$_POST['obj_dewasa']. '.' .$_POST['obj_anak']. '.25437859';
	header('Location: index.php?menu=obj_list&spec='.$spec);	
	}else if($_GET['spec'] != ""){
		header('Location: wisata/booking.php?spec='.$_GET['spec']);
	} else{
		header('Location: index.php?menu=home');
	}
?>