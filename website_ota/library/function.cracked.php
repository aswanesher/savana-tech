<?PHP
	function crackedSpec($strCracked,$point){
		$crackPoint 	= explode('.',$strCracked);
		$result		 	= $crackPoint[$point];
		return $result;
	}
?>