<?PHP
	date_default_timezone_set("Asia/Jakarta");
	
	// date format "Senin, 30 December 2014"
	function convertDate($strDate){
		$dateConvert 	= strtotime($strDate); 
		$result 		= date("j F Y",$dateConvert);
		return $result;
	}
	
	// Set Day System Now "Senin s/d Minggu" berdasarkan tanggal penerbangan
	function dayChoice($strDayChoice){
		$strDay = date('N', strtotime($strDayChoice));
		if($strDay == 1){$dayNow = 'Senin';}else if($strDay == 2){$dayNow = 'Selasa';}else if($strDay == 3){$dayNow = 'Rabu';}else if($strDay == 4){$dayNow = 'Kamis';}else if($strDay == 5){$dayNow = 'Jumat';}else if($strDay == 6){$dayNow = 'Sabtu';}else if($strDay == 7){$dayNow = 'Minggu';}
		return $dayNow;
	}
	
	function fullDateDay($strDate){
		$dateConvert 	= strtotime($strDate); 
		$result 		= date("j F Y",$dateConvert);
		$strDay = date('N', strtotime($strDate));
		if($strDay == 1){$dayNow = 'Senin';}else if($strDay == 2){$dayNow = 'Selasa';}else if($strDay == 3){$dayNow = 'Rabu';}else if($strDay == 4){$dayNow = 'Kamis';}else if($strDay == 5){$dayNow = 'Jumat';}else if($strDay == 6){$dayNow = 'Sabtu';}else if($strDay == 7){$dayNow = 'Minggu';}
		$fullDateDay = $dayNow.', '.$result;
		return $fullDateDay;
	}
	
	function mount($mount){
		if($mount == 1){
			$bulan = 'Januari';
		}else if($mount == 2){
			$bulan = 'Februari';
		}else if($mount == 3){
			$bulan = 'Maret';
		}else if($mount == 4){
			$bulan = 'April';
		}else if($mount == 5){
			$bulan = 'Mei';
		}else if($mount == 6){
			$bulan = 'Juni';
		}else if($mount == 7){
			$bulan = 'Juli';
		}else if($mount == 8){
			$bulan = 'Agustus';
		}else if($mount == 9){
			$bulan = 'September';
		}else if($mount == 10){
			$bulan = 'Oktober';
		}else if($mount == 11){
			$bulan = 'November';
		}else if($mount == 12){
			$bulan = 'Desember';
		}
		return $bulan;
	}

?>