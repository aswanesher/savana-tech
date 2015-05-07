<?PHP
	function ambilTgl($strDate){
		$hasil		= substr($strDate,-2);
		return $hasil;
	}
	
	function ambilBln($strDate){
		$hasil		= substr($strDate,4,-2);
		return $hasil;
	}
	
	function ambilThn($strDate){
		$hasil		= substr($strDate,0,4);
		return $hasil;
	}
?>