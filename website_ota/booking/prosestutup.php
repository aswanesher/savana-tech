<?PHP
	require ('../config/hotel.conn.php');
	require ('../library/function.cracked.php');
	if(isset($_POST['idTutup']) && $_POST['idTutup'] != ''){
		$kodeKategory 	= crackedSpec($_POST['idTutup'], 0);
		$idBook 		= crackedSpec($_POST['idTutup'], 1);
		$noMejaPesanan	= crackedSpec($_POST['idTutup'], 2);
	  if($kodeKategory == '25437857'){
		 $sql = "UPDATE guest_book SET flag_closing = '1' WHERE book_id = :book_id";
		 $statement = $conn->prepare($sql);
		 $statement->bindValue(":book_id", $idBook);
		 $statement->execute();
	  }else if($kodeKategory == '25437858'){
		 $sql = "UPDATE guest_book SET flag_closing = '1' WHERE book_id = :book_id";
		 $statement = $conn->prepare($sql);
		 $statement->bindValue(":book_id", $idBook);
		 $statement->execute();
	  }else if($kodeKategory == '25437859'){
		 $sql = "UPDATE guest_book SET flag_closing = '1' WHERE book_id = :book_id";
		 $statement = $conn->prepare($sql);
		 $statement->bindValue(":book_id", $idBook);
		 $statement->execute();
	  }else if($kodeKategory == '25437860'){
		 $sqlKosongkanMeja = "UPDATE m_wiskul_meja SET meja_nomor_pesanan = NULL, meja_tgl_pesanan = NULL WHERE meja_nomor_pesanan = :meja_nomor_pesanan";
		 $stmtKosongMeja = $conn->prepare($sqlKosongkanMeja);
		 $stmtKosongMeja->bindValue(":meja_nomor_pesanan", $noMejaPesanan);
		 $stmtKosongMeja->execute();
		 
		 $sql = "UPDATE guest_book SET flag_closing = '1' WHERE book_id = :book_id";
		 $statement = $conn->prepare($sql);
		 $statement->bindValue(":book_id", $idBook);
		 $statement->execute();
	  }
	  
		 
		 $conn = null;
	  
	}
?>