<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	require ('../config/hotel.conn.php');
	
		if($_GET['aksi']=='viewall'){
		
		
		$QryCekPay	= $conn->query("update  guest_book set flag_baca ='1' WHERE flag_baca ='0' ");
		$QryBaca2	= $conn->query("update  trs_kebutuhan set status_baca2 ='1' WHERE status_baca2 ='0' ");
		
		header('location:index.php?modul=vall ');
	
	}else{
	
	//$qryguestbook 	= "SELECT book_id FROM  guest_book  where very_code ='".$_GET['very_code']."' ";
	//	$qryguestbook 	= "SELECT book_id FROM  guest_book  where rinci_id ='".$_GET['rinci_id']."' ";
	
	$stmtguestbook 	= $conn->prepare( $qryguestbook );
	$stmtguestbook->execute();
	$rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC);
	extract($rowguestbook);
	if($_GET['very_code'] <> 0){
		$QryBaca2	= $conn->query("update  trs_kebutuhan set status_baca2 ='1' WHERE rinci_id ='".$_GET['rinci_id']."' ");
	}else{
		$QryCekPay	= $conn->query("update  guest_book set flag_baca ='1' WHERE very_code ='".$_GET['very_code']."'  ");
	}
	header('location:index.php?modul=view&very_code='.$_GET['very_code'].'&rinci_id='.$_GET['rinci_id'].'  ');
	}

?>