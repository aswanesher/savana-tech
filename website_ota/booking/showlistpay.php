<?PHP
	require ('../config/hotel.conn.php');
	$qryguestbook 	= "SELECT a.flag_baca,a.very_code as kodeWlj,b.very_code as kodeAgt, a.book_id,b.rinci_id,b.status_baca2 
	FROM  guest_book a 
	LEFT JOIN guest_book_detail c ON a.book_id = c.book_id 
	LEFT JOIN trs_kebutuhan b ON a.rinci_id=b.rinci_id  
	ORDER BY c.book_id DESC LIMIT 0,6 ";
	$stmtguestbook 	= $conn->prepare( $qryguestbook );
	$stmtguestbook->execute();
	
	while ($rowguestbook = $stmtguestbook->fetch(PDO::FETCH_ASSOC)){
	extract($rowguestbook);
	
	 $qdetail	= "SELECT a.tgl_transfer,a.status_baca FROM guest_book_detail a where book_id='".$book_id."'";
	$stmtdetail 	= $conn->prepare( $qdetail );
	$stmtdetail->execute();
	
	//$rowdetail = $stmtdetail->fetch(PDO::FETCH_ASSOC);
	//extract($rowdetail);
	$rows = $stmtdetail->fetch(PDO::FETCH_NUM);
	if($rows > 0){
		$bayar='Telah Membayar';
	}else{
		$bayar='';
	}
	
	if($status_baca2 == '1' or $flag_baca =='1' ){
	$style = 'class="label label-default"';
	
	}else{
		$style = 'class="label label-info"';
	}
?>
<li>
<a href="prosesUpdate.php?very_code=<?PHP echo $kodeWlj?>&rinci_id=<?PHP echo $rinci_id?>">
<span <?php echo $style ?> ><i class="fa fa-money" ></i></span>
	<span class="body">
	<span class="message">ID Pemesanan <b><?PHP echo ($kodeAgt==''?$kodeWlj:$kodeAgt) ?></b> </span>
	<span class="time">
	<span><?php echo $bayar?></span>
	</span>
</span>
</a>
</li>
<?PHP
	}
?>