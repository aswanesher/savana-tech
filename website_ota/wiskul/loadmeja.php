<script type="text/javascript">
	function loadListMeja(){
				var wiskulId 	= '<?PHP echo $_GET['wiskulId']?>';
				var noBooking	= '<?PHP echo $_GET['noBooking'] ?>';
				$.ajax({
					url: 'loadmeja.php',
					type: 'GET',
					data: 'wiskulId=' + wiskulId + '&noBooking=' +noBooking,
					cache: false,
					success: function(resMeja) {
						$('#view-meja').html(resMeja);	
					}
				});
			}
	$('#formWizard .col-md-3').bind("click", function (event) {
				var mejaId		= $(this).attr('id');
				var wiskulId	= '<?PHP echo $_GET['wiskulId'] ?>';
				var noBooking	= '<?PHP echo $_GET['noBooking'] ?>';
				if(mejaId > 0){
					$.ajax({
						url: 'postmeja.php',
						type: 'POST',
						data: 'wiskulId=' + wiskulId +'&mejaId=' + mejaId + '&noBooking=' +noBooking,
						cache: false,
						success: function(resKursi) {
							loadListMeja();
							if(resKursi > 2){
								$('#noMeja').html(resKursi);
							}else if(resKursi == 2){
								alert('Maaf Pemesanan tidak bisa di lakukan berulang kali!!!');
							}
						}
					});
				}
				
			});
</script>
<?PHP 
														require ('../config/hotel.conn.php');
														$qryMeja 		= "SELECT meja_id,meja_nomor,meja_nomor_pesanan FROM m_wiskul_meja WHERE hotel_id = '".$_GET['wiskulId']."'";
														$stmtMeja 	= $conn->prepare( $qryMeja );
														$stmtMeja->execute();		 
														while ($rowMeja = $stmtMeja->fetch(PDO::FETCH_ASSOC)){
														extract($rowMeja);
															if($meja_nomor_pesanan == ''){
													   ?>
														<div class="col-md-3" id="<?PHP echo $meja_id?>" style="margin-left: auto;margin-right: auto;border: 1px solid grey;cursor: pointer;border-radius: 10px;">
															<img style="margin-left: 21px;margin-right: auto;width: 70%;" src="../images/wiskul_icon/icon_tersedia.png"/>
															<p style="margin-left: 55px;margin-right: auto;"><b style="font-size: 25px"><?PHP echo $meja_nomor?></b></p>
														</div>
														<?PHP
															}else{
														?>
														
														<div class="col-sm-3" data-toggle="collapse" data-target="#danger<?PHP echo $meja_id?>" style="margin-left: auto;margin-right: auto;border: 1px solid grey;cursor: pointer;border-radius: 10px;">
														<div id="danger<?PHP echo $meja_id?>" class="panel-collapse collapse" style="height: auto;">
															<div class="alert alert-info">
															<i class="fa fa-info"></i> Meja sudah terisi.
															</div>
														</div>
															<img style="margin-left: 21px;margin-right: auto;width: 70%;" src="../images/wiskul_icon/icon_penuh.png"/>
															<p style="margin-left: 55px;margin-right: auto;"><b style="font-size: 25px"><?PHP echo $meja_nomor?></b></p>
														</div>
														<?PHP	
															}
														}
														?>