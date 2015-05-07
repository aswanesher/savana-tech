<?PHP
	require ("../config/hotel.conn.php");
	if(isset($_GET['with']) && $_GET['with'] == 'agent' && isset($_GET['id']) && $_GET['id'] !=''){
		$qryCekPesanan 	= $conn->query("SELECT rinci_nomor,status_cetak, pdf_name_agent,pdf_name_guest FROM trs_kebutuhan WHERE rinci_id = '".$_GET['id']."'");
		$qryCekPesanan	= $qryCekPesanan->fetch(PDO::FETCH_ASSOC);
		
		if($qryCekPesanan['status_cetak'] == 2){
			echo "<script>alert('Maaf Pesanan Telah Dibatalkan!!!');window.location = 'index.php?modul=opagt';</script>";
		}else if($qryCekPesanan['status_cetak'] == 0){
			echo "<script>alert('Silahkan Konfirmasikan Pemesanan!!!');window.location = 'index.php?modul=opagt';</script>";
		}else{
			
			/*
			$explodNomor = explode('/', $qryCekPesanan['rinci_nomor']);
			$zipName = $explodNomor[0].$explodNomor[1].$explodNomor[2];
			
			$files = array($qryCekPesanan['pdf_name_agent'], $qryCekPesanan['pdf_name_guest']);
			$zip = new ZipArchive();
			$zip_name = $zipName.".zip"; // Zip name
			$zip->open($zip_name,  ZipArchive::CREATE);
			$zip->addFile('doc/'.$zip_name, $zip_name);
			foreach ($files as $file) {
			 $path = "doc/".$file;
			 
				  if(file_exists($path)){
				  $zip->addFromString(basename($path),  file_get_contents($path));  
				  }
				  else{
				   echo"file does not exist";
				  }
			}
			$zip->close();
			
			//UPDATE GUEST RESERVATION
			$qryupdate = "UPDATE trs_kebutuhan set zip_name = '".$zip_name."' where rinci_id = '".$_GET['id']."'";
			$stmt_update = $conn->prepare($qryupdate);
			$stmt_update->execute();
			
			//ambil file zip
			$qryCekZip 	= $conn->query("SELECT zip_name FROM trs_kebutuhan WHERE rinci_id = '".$_GET['id']."' LIMIT 0,1");
			$qryCekZip	= $qryCekZip->fetch(PDO::FETCH_ASSOC);
			*/
			
			$filename = "doc/".$qryCekPesanan['pdf_name_agent'];
			if (file_exists($filename)) {
			   header('Content-type: application/force-download');
			   header('Content-Disposition: attachment; filename='.$filename);
			   readfile($filename);
			}
			
			
		}
		
	}else{
		header('location: //cmedia.co.id');
	}
?>