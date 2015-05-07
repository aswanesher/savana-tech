<?PHP
		require ('config/hotel.conn.php');
		//require ('library/function.uang.php');
		$today	= date("Ymd");
		
		if ($_POST['book_id'] != "" && $_POST['bank_tujuan'] != "" && $_POST['asal_bank'] != "" && $_POST['atas_nama'] != ""){
		
		//CONVERSI DATE TRANSFER
		$tgltrf = explode("/",$_POST['tgl_transfer']);
		$tgl_trf = $tgltrf[2]."-".$tgltrf[0]."-".$tgltrf[1];
		
		if (isset($_FILES['upload']['type']) ) {
		   //echo $_FILES['upload']['tmp_name'];
		   //echo $_FILES['upload']['type'];
		   $nama_file 	= $_FILES['upload']['name'];
		   $ukuran_file =  $_FILES['upload']['size'];
		   
		   $uploaddir	= 'images/require/';
		   $dirfile		= $uploaddir.$nama_file;
		   move_uploaded_file($_FILES['upload']['tmp_name'],$dirfile);
		   
		}
		
		
		$id = (int)$_POST['book_id'];
		$qrycheckbook 	= $conn->query("SELECT book_id FROM guest_book_detail WHERE book_id = '".$id."'");
		$qrycheckbook 	= $qrycheckbook->fetch(PDO::FETCH_ASSOC);
		
		if ($qrycheckbook['book_id'] == ""){
		
		$jml_trf = str_replace(".","",$_POST['jml_transfer']);
		//echo $jml_trf;
		
		$qryconfirm 		= "INSERT INTO guest_book_detail SET 
									book_id 			= ?, 
									bank_tujuan			= ?, 
									asal_bank			= ?, 
									atas_nama			= ?, 
									tgl_transfer		= ?, 
									jml_transfer		= ?, 
									upload				= ?,
									date_input			= ?";
										
		$stmtconfirm = $conn->prepare($qryconfirm);
		$stmtconfirm->bindParam(1, $_POST['book_id']);
		$stmtconfirm->bindParam(2, $_POST['bank_tujuan']);
		$stmtconfirm->bindParam(3, $_POST['asal_bank']);
		$stmtconfirm->bindParam(4, $_POST['atas_nama']);
		$stmtconfirm->bindParam(5, $tgl_trf);
		$stmtconfirm->bindParam(6, $jml_trf);
		$stmtconfirm->bindParam(7, $nama_file);
		$stmtconfirm->bindParam(8, $today);
		$stmtconfirm->execute();
		}		
				header ('location: index.php?menu=veri');
		
		}else{
				echo "<script>alert('Silahkan Lengkapi Kolom inputan!!!');window.location = 'index.php?menu=veri';</script>";
		}
?>