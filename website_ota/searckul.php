<?PHP
	if(isset($_POST['menu']) && $_POST['menu'] == "list" && $_POST['kul_kota'] != "" && $_POST['kul_tanggal_berangkat'] != "" && $_POST['kul_dewasa'] != "" && $_POST['kul_anak'] != ""){
	$pax	= $_POST['kul_dewasa'] + $_POST['kul_anak'];
	$spec = $_POST['kul_kota']. '.' .$_POST['kul_tanggal_berangkat']. '.' .$pax. '.25437860';
	header('Location: index.php?menu=kul_list&spec='.$spec);	
	}else if($_GET['spec'] != ""){
		header('Location: wiskul/booking.php?spec='.$_GET['spec']);
	} else{
		header('Location: index.php?menu=home');
	}
?>