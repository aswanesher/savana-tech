<?PHP
	if(isset($_POST['menu']) && $_POST['menu'] == "list" && $_POST['rent_kota'] != "" && $_POST['rent_tanggal_berangkat'] != "" && $_POST['rent_tanggal_kembali'] != "" && $_POST['rent_penumpang'] != ""){
	$spec = $_POST['rent_kota']. '.' .$_POST['rent_tanggal_berangkat']. '.' .$_POST['rent_tanggal_kembali']. '.' .$_POST['rent_penumpang']. '.25437858';
	header('Location: index.php?menu=rent_list&spec='.$spec);	
	}else if($_GET['spec'] != ""){
		header('Location: rent/booking.php?spec='.$_GET['spec']);
	} else{
		header('Location: index.php?menu=home');
	}
?>