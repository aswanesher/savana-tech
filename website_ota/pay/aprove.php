<?PHP
	require ("../config/hotel.conn.php");
	if(isset($_GET['code']) && $_GET['code'] != ''){
		$qrycekguest 	= $conn->query("SELECT flag_confirm,flag_batal,pdf_name FROM `guest_book` WHERE book_kode_encrypt = '".$_GET['code']."'");
		$qrycekguest	= $qrycekguest->fetch(PDO::FETCH_ASSOC);
		
		if ($qrycekguest['flag_confirm'] == 1 && $qrycekguest['flag_batal'] == 0){
			$filename = "../booking/doc/".$qrycekguest['pdf_name'];
			if (file_exists($filename)) {
			   header('Content-type: application/force-download');
			   header('Content-Disposition: attachment; filename='.$filename);
			   readfile($filename);
			}
		}else if ($qrycekguest['flag_batal'] == 1){
			if(isset($_GET['with']) && $_GET['with'] == 'op'){
					echo "<script>alert('Pesanan Telah Dibatalkan Oleh system!!!');window.location = '../booking/index.php?modul=op';</script>";
			}else{
					echo "<script>alert('Maaf permintaan anda telah di batalkan karna konfirmasi pembayaran telah melewati batas waktu pembayaran!!!');window.location = '../index.php?menu=veri';</script>";
			}
			
		}else{
			if(isset($_GET['with']) && $_GET['with'] == 'op'){
					echo "<script>alert('Pesanan Belum Di ACC!!!');window.location = '../booking/index.php?modul=op';</script>";
			}else{
					echo "<script>alert('Maaf permintaan anda masih dalam proses, silahkan coba beberapa saat lagi!');window.location = '../index.php?menu=veri';</script>";
			}
			
		}
	}else{
		header('location: ../index.php?menu=veri');
	}
?>