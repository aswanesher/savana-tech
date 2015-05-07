<?PHP
	require ('config/hotel.conn.php');
	$in			= date_create($_GET['in']);
	$out		= date_create($_GET['out']);
	$tot_day	= date_diff($in,$out);
?>
<!DOCTYPE html>

<html>
  <body id="top" class="thebg" >
    
	<br>		
	<br>		
	<br>		
	<br>		
	<br>		
	<br>		

	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			<!-- FILTERS -->
			<div class="col-md-3 filters offset-0" style=" margin-top: -116px;>
			<table width="100%">
				<tr>
					<td width="50%">&nbsp;</td>
					<td width="2" align="center">&nbsp;</td>
					<td><h4><div id="resttext">&nbsp;</div></h4></td>
				</tr>
			</table>
			<table width="100%" id="getschedule">
				<tr>
					<td colspan="5" style="border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
					<td colspan="3">Waktu Menginap</td>
					<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
					<td width="40%">Check-in</td>
					<td width="2%">:</td>
					<td><b><?PHP echo $_GET['in']?></b></td>
					<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
					<td>Check-out</td>
					<td>:</td>
					<td><b><?PHP echo $_GET['out']?></b></td>
					<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
					<td>Durasi</td>
					<td>:</td>
					<td><b><?PHP echo $tot_day->format("%a")?> Malam</b></td>
					<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" style="border-left: 2px solid #ebebeb;border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" style="border-left: 2px solid #ebebeb;border-right: 2px solid #ebebeb;" align="center"><a href="javascript:;" id="reschedule" style="text-decoration: none;" class="bookbtn">Ganti Waktu</a></td>
				</tr>
				<tr>
					<td colspan="5" style="border-left: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
			</table>
				
				<div class="padding20title">&nbsp;</div>
			
			<table width="100%">
				<tr>
					<td colspan="5" style="border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">Pengaturan Hasil</td>
				</tr>
				
				
				<tr>
					<td colspan="5" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">
					<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3"><img src="images/asc.png"/> Urutkan Hasil <span class="collapsearrow"></span>
				</button>
					</td>
				</tr>
				
				<tr>
					<td width="40%" colspan="5" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">
					
						

				<div id="collapse3" class="collapse in">
					<div class="hpadding20">
						<div class="radio">
						  <label>
							<a href="javascript:;" id="harga" style="text-decoration: none;"><img src="images/rupiah.png"/> Harga <span id="checklistHarga"></span></a>
						  </label>
						</div>
						<div class="radio" id="showRatePrice">
						  <label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" id="termurah" style="text-decoration: none;">Termurah</a><a href="javascript:;" id="tertinggi" style="text-decoration: none;">Tertinggi</a>
						  </label>
						</div>
						<div class="radio">
						  <label>
							<a href="javascript:;" id="priceReview" style="text-decoration: none;"><img src="images/like.png"/> Nilai Review <span id="checklistPriceReview"></span></a>
						  </label>
						</div>
						<div class="radio">
						  <label>
							<a href="javascript:;" id="popular" style="text-decoration: none;"><img src="images/fav.png"/> Popular <span id="checklistPopular"></span></a>
						  </label>
						</div>
					</div>	
					<div class="clearfix"></div>					
				</div>
					
					</td>
				</tr>
				
				
				<tr>
					<td colspan="5" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">
					<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1"><img src="images/like.png"/> Pilih Bintang Hotel <span class="collapsearrow"></span>
				</button>
					</td>
				</tr>
				<tr>
					<td width="40%" colspan="5" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">
					
						

				<div id="collapse1" class="collapse in">
					<div class="hpadding20">
						<form action="#" method="POST">
						<div class="radio">
							<label>
							  <input type="radio" id="allStar" name="rateBin" value="5" checked > Semua
							</label>
						</div>
						<div class="radio">
							<label>
							  <input type="radio" id="choiceRateFive" name="rateBin" value="5"><img src="images/filter-rating-5.png" class="imgpos1" alt=""/> Bintang 5
							</label>
						</div>
						<div class="radio">
							<label>
							  <input type="radio" id="choiceRateFour" name="rateBin" value="4"><img src="images/filter-rating-4.png" class="imgpos1" alt=""/> Bintang 4
							</label>
						</div>
						<div class="radio">
							<label>
							  <input type="radio" id="choiceRateTree" name="rateBin" value="3"><img src="images/filter-rating-3.png" class="imgpos1" alt=""/> Bintang 3
							</label>
						</div>
						<div class="radio">
							<label>
							  <input type="radio" id="choiceRateTwo" name="rateBin" value="2"><img src="images/filter-rating-2.png" class="imgpos1" alt=""/> Bintang 2
							</label>
						</div>
						<div class="radio">
							<label>
							  <input type="radio" id="choiceRateOne" name="rateBin" value="1"><img src="images/filter-rating-1.png" class="imgpos1" alt=""/> Bintang 1
							</label>
						</div>	
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
					
					</td>
				</tr>
				
			</table>
			
			<table width="100%">
				<tr>
					<td colspan="2" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;"><button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4"><img src="images/rupiah.png"/> Kisaran Harga Total <span class="collapsearrow"></span>
				</button></td>
				</tr>
				<tr>
					<td align="center" style="border-left: 2px solid #ebebeb;"><input type="text" style="border: 0px solid;" id="priceMin" value="Rp. 0" size="10" readonly>s/d</td>
					<td align="center" style="border-right: 2px solid #ebebeb;"><input type="text" style="border: 0px solid;" id="priceMax" value="Rp. 5000000" size="10" readonly></td>
				</tr>
				<tr>
					<td colspan="2" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" style="border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;"><div width="20px" id="slider-3"></div></td>
				</tr>
			</table>
			
				<br/>
				<br/>
				<br/>
				
			</div>
			<!-- END OF FILTERS -->
			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-9 offset-0">
			
				<div class="hpadding20">
					
				</div>
				<!-- End of padding -->
				
				<br/><br/>
				<div class="clearfix"></div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div class="itemscontainer offset-1" style="position: fixed; width: 855px;height: 185;background-color: white;margin-top: -338px;">
					<div class="offset-2" style="margin-top: 92px;">
					<input type="text" name="tags" class="form-control" id="keyCode" onkeyup="getData(this.value)" placeholder="Ketik nama daerah atau nama hotel">
					</div>
					<!--<center><h3 style="color:red;text-decoration: underline;"><b>DEMO SITE<b></h3></center>	-->
					<center><h3 style="color: orange; margin-left: 62px; margin-top: 12px;">Hasil Pencarian : <?PHP echo $_GET['loc']?></h3></center>
				</div>
				<div class="itemscontainer offset-1" style="margin-top: -177px">
					
					<div class="clearfix"></div>
					<div class="offset-2"><hr class="featurette-divider3"></div>
					
					<div class="offset-2">
						<table width="100%">
							<tr>
								<th id="getlist" style="vertical-align:top;" align="center"><div align="center" id="loadsrc"></div></th>
							</tr>
						</table>
					</div>

				</div>	
				<!-- End of offset1-->		


			</div>
			<!-- END OF LIST CONTENT-->
			
		

		</div>
		<!-- END OF container-->
		
	</div>
	<!-- END OF CONTENT -->
	
	
	<br>
	<br>
	<br>
	<br>
	<br>
	

  </body>
  <script>
  
  //JIKA KEYWORD DI KETIKAN
  
  
	function getData(str){
		var loc			= '<?PHP echo $_GET['loc']?>';
		var checkIn 	= '<?PHP echo $_GET['in']?>';
		var checkOut 	= '<?PHP echo $_GET['out']?>';
		var pax 		= '<?PHP echo $_GET['pax']?>';
		var fill 		= 'getKey';
		$('#loadsrc').html('<img src="images/loadvoc.gif" />').show('1000');
		if (str != ''){
		$('#resttext').html(str);
		}else{
		$('#resttext').html(loc);
		}
		$.ajax({
		
			type:'get',
			url:'getlist.php',
			data: 'fill=' + fill + '&keyword=' + str + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
			success: function(resfill){
				$('#getlist').html(resfill);
				
			}
		
		});
	
	}
	
	
	$(document).ready(function() {
	
		//HASIL PENCARIAN
		var checkIn 	= '<?PHP echo $_GET['in']?>';
		var checkOut 	= '<?PHP echo $_GET['out']?>';
		var pax 		= '<?PHP echo $_GET['pax']?>';
		var searchLoc 	= '<?PHP echo $_GET['loc']?>';
		$('#loadsrc').html('<img src="images/load.gif" />').show();
		if (searchLoc != ''){
		var myVarloadLoc	= setInterval(function(){loadingLoc()},2000);
		function loadingLoc() {
			$.ajax({
			
				type:'get',
				url:'getlist.php',
				data: 'fill=codeLoc&loc=' + searchLoc + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
				success: function(resfill){
					$('#loadsrc').html('<img src="images/load.gif" />').hide();
					$('#getlist').html(resfill);
					clearTimeout(myVarloadLoc);
				}
			
			});
		}
		}else{
		
			$('#loadsrc').html('<img src="images/not-found.png" width="100%" />').show();
		
		}
		
		
	

		$( "#reschedule" ).bind("click", function(event) {
			var	tags		= '<?PHP echo $_GET['loc']?>'		
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			
			$.ajax({
							url: 'getschedule.php',
							type: 'GET',
							data: 'tags=' + tags + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getschedule').html(resfill);	
							}
					});
			
		  });
	
		$( "#choiceRateOne" ).bind("click", function(event) {
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill = 'pointOne';
			var QryStatment			= 'SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE a.rate_id = 1';
			
			$.ajax({
							url: 'getlist.php',
							type: 'GET',
							data: 'in=' + checkIn + '&out=' + checkOut + '&pax=' + pax + '&fill=' + fill + '&QryStatment=' + QryStatment,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getlist').html(resfill);	
							}
					});
			
		  });
		  
		  $( "#choiceRateTwo" ).bind("click", function(event) {
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill = 'pointTwo';
			var QryStatment			= 'SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE a.rate_id = 2';
			
			$.ajax({
							url: 'getlist.php',
							type: 'GET',
							data: 'in=' + checkIn + '&out=' + checkOut + '&pax=' + pax + '&fill=' + fill + '&QryStatment=' + QryStatment,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getlist').html(resfill);	
							}
					});
			
		  });
		  
		  $( "#choiceRateTree" ).bind("click", function(event) {
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill = 'pointTree';
			var QryStatment			= 'SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE a.rate_id = 3';
			
			$.ajax({
							url: 'getlist.php',
							type: 'GET',
							data: 'in=' + checkIn + '&out=' + checkOut + '&pax=' + pax + '&fill=' + fill + '&QryStatment=' + QryStatment,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getlist').html(resfill);	
							}
					});
			
		  });
		  
		  $( "#choiceRateFour" ).bind("click", function(event) {
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill 		= 'pointFour';
			var QryStatment	= 'SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE a.rate_id = 4';
			
			$.ajax({
							url: 'getlist.php',
							type: 'GET',
							data: 'in=' + checkIn + '&out=' + checkOut + '&pax=' + pax + '&fill=' + fill + '&QryStatment=' + QryStatment,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getlist').html(resfill);	
							}
					});
			
		  });
		  
		  $( "#choiceRateFive" ).bind("click", function(event) {
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill 		= 'pointFive';
			var QryStatment	= 'SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id WHERE a.rate_id = 5';
			
			$.ajax({
							url: 'getlist.php',
							type: 'GET',
							data: 'in=' + checkIn + '&out=' + checkOut + '&pax=' + pax + '&fill=' + fill + '&QryStatment=' + QryStatment,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getlist').html(resfill);	
							}
					});
			
		  });
		  
		  $( "#allStar" ).bind("click", function(event) {
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill 		= 'pointAll';
			var QryStatment	= 'SELECT a.*,b.rate_name,b.rate_icon FROM m_hotel a INNER JOIN m_rating b ON a.rate_id = b.rate_id ORDER BY a.hotel_id ASC';
			
			$.ajax({
							url: 'getlist.php',
							type: 'GET',
							data: 'in=' + checkIn + '&out=' + checkOut + '&pax=' + pax + '&fill=' + fill + '&QryStatment=' + QryStatment,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getlist').html(resfill);	
							}
					});
			
		  });
		  
		  
	});
	
  
	  $(function() {
            $( "#slider-3" ).slider({
               range:true,
               min: 0,
               max: 5000000,
               values: [ 0, 5000000 ],
               slide: function( event, ui ) {
				
                  $( "#priceMin" ).val('Rp. ' + ui.values[ 0 ]);
                  $( "#priceMax" ).val('Rp. ' + ui.values[ 1 ]);
				  
				  
               },
			   
			   //JIKA SLIDER STOP DI HARGA TERTENTU
			   
			   stop: function( event, ui ) {
					var fill = 'slideRange';
					var checkIn 	= '<?PHP echo $_GET['in']?>';
					var checkOut 	= '<?PHP echo $_GET['out']?>';
					var pax 		= '<?PHP echo $_GET['pax']?>';
					var rangMin 	= Number(ui.values[ 0 ]);
					var rangMax 	= Number(ui.values[ 1 ]);
					
					
					$.ajax({
							url: 'getlist.php',
							type: 'GET',
							data: 'fill=' + fill + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax + '&rangMin=' + rangMin + '&rangMax=' + rangMax,
							cache: false,
							success: function(resfill) {
							//alert(resfill);
							$('#getlist').html(resfill);	
							}
					});
					
				}
			   
           });
         //$( "#price" ).val( "Rp. " + $( "#slider-3" ).slider( "values", 0 ) + " - Rp. " + $( "#slider-3" ).slider( "values", 1 ) );
      });
  
	  $(document).ready(function(){
		$('#termurah').show();
		$('#tertinggi').hide();
		$('#showRatePrice').hide();
		
		$('#harga').bind("click", function () {
			$('#showRatePrice').show();
			$('#checklistHarga').html('<img src="images/checklist.png"/>').show();
			$('#checklistPriceReview').html('<img src="images/checklist.png"/>').hide();
			$('#checklistPopular').html('<img src="images/checklist.png"/>').hide();
		});
		
		$('#priceReview').bind("click", function () {
			$('#showRatePrice').hide();
			$('#checklistPriceReview').html('<img src="images/checklist.png"/>').show();
			$('#checklistHarga').html('<img src="images/checklist.png"/>').hide();
			$('#checklistPopular').html('<img src="images/checklist.png"/>').hide();
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill 		= 'price review';
			
			$.ajax({
					url: 'getlist.php',
					type: 'GET',
					data: 'fill=' + fill + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
					cache: false,
					success: function(resfill) {
					//alert(resfill);
					$('#getlist').html(resfill);	
					}
			});
			
		});
		
		//JIKA HARGA TERMURAH DI CLIK
		$('#termurah').bind("click", function () {
			$('#tertinggi').show();
			$('#termurah').hide();
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill 		= 'termurah';
			
			$.ajax({
					url: 'getlist.php',
					type: 'GET',
					data: 'fill=' + fill + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
					cache: false,
					success: function(resfill) {
					//alert(resfill);
					$('#getlist').html(resfill);	
					}
			});
			
			
		});
		
		//JIKA HARGA TERTINGGI DI CLIK
		$('#tertinggi').bind("click", function () {
			$('#tertinggi').hide();
			$('#termurah').show();
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill 		= 'tertinggi';
			
			$.ajax({
					url: 'getlist.php',
					type: 'GET',
					data: 'fill=' + fill + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
					cache: false,
					success: function(resfill) {
					//alert(resfill);
					$('#getlist').html(resfill);
									
					}
			});
		});
		
		//JIKA POPULAR DI CLICK
		
		$('#popular').bind("click", function () {
			
			$('#showRatePrice').hide();
			$('#checklistPriceReview').html('<img src="images/checklist.png"/>').hide();
			$('#checklistHarga').html('<img src="images/checklist.png"/>').hide();
			$('#checklistPopular').html('<img src="images/checklist.png"/>').show();
			var checkIn 	= '<?PHP echo $_GET['in']?>';
			var checkOut 	= '<?PHP echo $_GET['out']?>';
			var pax 		= '<?PHP echo $_GET['pax']?>';
			var fill 		= 'popular';
			
			$.ajax({
					url: 'getlist.php',
					type: 'GET',
					data: 'fill=' + fill + '&in=' + checkIn + '&out=' + checkOut + '&pax=' + pax,
					cache: false,
					success: function(resfill) {
					//alert(resfill);
					$('#getlist').html(resfill);	
					}
			});
			
		});
	});
  </script>
</html>
