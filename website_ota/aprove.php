<?PHP
	require ("config/hotel.conn.php");
	$qrycekguest 	= $conn->query("SELECT flag_confirm,pdf_name FROM `guest_book` WHERE book_kode_encrypt = '".$_GET['code']."'");
	$qrycekguest	= $qrycekguest->fetch(PDO::FETCH_ASSOC);
	
	if ($qrycekguest['flag_confirm'] == 1){
	$filename = "booking/doc/".$qrycekguest['pdf_name'];
	if (file_exists($filename)) {
	   header('Content-type: application/force-download');
	   header('Content-Disposition: attachment; filename='.$filename);
	   readfile($filename);
	}
	}else{
		header ('location: index.php?menu=veri&result=fail');
	}
?>