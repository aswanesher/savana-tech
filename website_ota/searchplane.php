<?PHP
	//session_start();
	if(isset($_POST['radiodest']) && $_POST['radiodest'] == 1){
		$_POST['tglDari']	= $_POST['tglDari'];
		$_POST['tglSampai']	= '00/00/0000';
		$menuRedirect = 'plane_list';
	}else if(isset($_POST['radiodest']) && $_POST['radiodest'] == 2){
		$_POST['tglDari']	= $_POST['tglDari'];
		$_POST['tglSampai'] 	= $_POST['tglSampai'];
		$menuRedirect = 'plane_twolist';
	}
	
	if(isset($_POST['menu']) && $_POST['menu'] == "list" && $_POST['kotaAsal'] != "" && $_POST['kotaTujuan'] != "" && $_POST['tglDari'] != "" && $_POST['tglSampai'] != "" && $_POST['adult'] != "" && $_POST['child'] != "" && $_POST['radiodest'] != ""){
	
	//$jmlPost = count($_POST);
	
	//$_SESSION['cnt'] = $jmlPost;
	
	$spec = $_POST['kotaAsal']. '.' .$_POST['kotaTujuan']. '.' .$_POST['tglDari']. '.' .$_POST['tglSampai']. '.' .$_POST['adult']. '.' .$_POST['child']. '.' .$_POST['radiodest']. '.25437856';
	
	header('Location: index.php?menu='.$menuRedirect.'&spec='.$spec);
		
	}else if($_GET['spec'] != ""){
		header('Location: plane/booking.php?spec='.$_GET['spec']);
	}else{
		header('Location: index.php?menu=home');
	}
?>