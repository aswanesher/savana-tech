<?PHP
	if(isset($_POST['valid']) && $_POST['valid'] != '' && $_POST['beetwen_start'] != '' && $_POST['beetwen_to'] != ''){
		
		$hotel= $_POST['hotel'];
		
		$strBettwenStart	= explode('-', $_POST['beetwen_start']);
		$beetwenStart 		= $strBettwenStart[0].$strBettwenStart[1].$strBettwenStart[2];
		$strBettwenTo		= explode('-', $_POST['beetwen_to']);
		$beetwenTo	 		= $strBettwenTo[0].$strBettwenTo[1].$strBettwenTo[2];
		
		header("location: index.php?modul=rep&htl=".$hotel."&spec=".$_POST['valid'].".".$beetwenStart.".".$beetwenTo."");
		
	}else if(isset($_POST['valid']) && $_POST['valid'] != '' && $_POST['beetwen_start'] != ''){
		
		
		$strBettwenStart	= explode('-', $_POST['beetwen_start']);
		$beetwenStart 		= $strBettwenStart[0].$strBettwenStart[1].$strBettwenStart[2];
		
		header("location: index.php?modul=rep&spec=".$_POST['valid'].".".$beetwenStart.".");
		
	}else{
		echo '<script>alert("Tanggal mulai tidak boleh kosong!!!");location.href="index.php?modul=rep&spec=book.00000000.00000000"</script>';
	}
?>