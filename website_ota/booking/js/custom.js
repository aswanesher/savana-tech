function waredit(){alert('Maaf Data Tidak Bisa Ubah!!!');}
		function warremove(){alert('Maaf Data Tidak Bisa Dihapus!!!');}
		
		//Element UI
		$(function() {
			$( "#picker_dayin, #tgl_beetwen_start, #tgl_beetwen_to" ).datepicker({
				changeMonth: true,
			    changeYear: true,
				dateFormat: 'dd-mm-yy'
			});
		});
		
		$(document).ready(function(){
			$('<audio id="chatAudio"><source src="sound/notif.mp3" type="audio/mpeg"></audio>').appendTo('body');
			setInterval(function(){loadNotifPay()},1000);
			
			//Highcharts with mySQL and PHP - Ajax101.com
			
			var yearNow = new Date().getFullYear();
			var months = [];
			var days = [];
			var switch1 = true;
			$.get('chartbook.php', function(data) {
				data = data.split('/');
				for (var i in data) {
					if (switch1 == true) {
						months.push(data[i]);
						switch1 = false;
					} else {
						days.push(parseFloat(data[i]));
						switch1 = true;
					}

				}
				months.pop();
			$('#chartBook').highcharts({
				chart : {
						type : 'spline',
						spacingBottom: 5,
						spacingTop: 5,
						spacingLeft: 5,
						spacingRight: 5,
						// Explicitly tell the width and height of a chart
						width: 700,
						height: 300
				},
				title : {
					text : 'Grafik Pemesanan Tahun '+ yearNow +''
				},
				subtitle : {
					text : 'Walanja.co.id'
				},
				xAxis : {
				title : {
					text : 'Bulan'
				},
					categories : months
				},
				yAxis : {
				title : {
					text : 'Jumlah Pemesanan'
				},
				labels : {
				formatter : function() {
				return this.value + ''
				}
				}
				},
			tooltip : {
				crosshairs : true,
				shared : true,
				valueSuffix : ''
			},
			plotOptions : {
				spline : {
				marker : {
				radius : 4,
				lineColor : '#666666',
				lineWidth : 1
				}
				}
				},
			series : [{
				name : 'Jumlah Pemesanan',
				data : days
				}]
				});
			});
			
			
			
			//LOAD NITIFIKASI UPDATE Pembayaran
			function showListPay(){
				var fileLoad = 'showlistpay.php';
				$('#showListPay').load(fileLoad);
			}
			
			function loadNotifPay(){
				$.ajax({
					url: 'cek_notif_pembayaran.php',
					cache: false,
					success: function(callBackNotif) {
						$('#jmlPay').html(callBackNotif);	
						$('#showListPay').html(showListPay);
					}
				});
			}
			
			$(".btn-yellow").click(function() {
					var idTutup = $(this).attr('id');
					$.ajax({
						url: 'prosestutup.php',
						type: 'POST',
						data: 'idTutup='+idTutup,
						cache: false,
						success: function(resconf) {
							$('.alert-success').show('fast');
							location.reload();
						}
					});
			});
			
			$('#conf').bind("click", function () {
					var id 	= $('input:hidden[name=hotel_id]').val();
					
					//alert(id);
						
						$.ajax({
								url: 'menu.editconf.php',
								type: 'GET',
								data: 'idold='+id,
								cache: false,
								success: function(resconf) {
									//alert(resconf);
									$('#showmod').html(resconf);
									
								}
							});
							
				});
			
		});
		
		//EXEKUSI JIKA WAKTU PEMBAYARAN HABIS
		var myVarExe	= setInterval(function(){loadTimeExe()},1000);
			function loadTimeExe() {
				var act = 'exedirect';
				$.ajax({
					url: 'exedirect.php',
					type: 'GET',
					data: 'act='+act,
					cache: false,
					success: function(resconf) {
						if(resconf == 1){
							alert('Ada Pembatalan Pemesanan!!!');
							location.reload();
						}
					}
				});
			}
			
	$(function(){
		
		$(".btlAgent").click(function() {
			var spec	= $(this).attr('id');
			var str 	= spec.split('.');
			
			var answer = confirm('Apakah kode '+ str[1] +' akan di konfirmasi ?');

			if(answer) { 
				
				$('.accAgent').hide();
				$('.btlAgent').hide();
				$('#loadbuttonAgent').show();
				var myVarload=setInterval(function(){loadtime()},800);
					function loadtime() {
				
				$.ajax({
					type:'POST',
					url:'btlagent.php',
					data: 'spec=' + str[0],
					success: function(data){
						$('#messageAgent').show();
						location.reload();
					}

					});
				clearTimeout(myVarload);
				}
			}

		});
		
		$(".accAgent").click(function() {
			var spec	= $(this).attr('id');
			var str 	= spec.split('.');
			
			
			var answer = confirm('Apakah kode '+ str[1] +' akan di konfirmasi ?');

			if(answer) { 
				
				$('.accAgent').hide();
				$('.btlAgent').hide();
				$('#loadbuttonAgent').show();
				var myVarload=setInterval(function(){loadtime()},800);
					function loadtime() {
				
				$.ajax({
					type:'POST',
					url:'bktagent.php',
					data: 'spec=' + str[0],
					success: function(data){
						//alert(data);
						$('#messageAgent').show();
						location.reload();
					}

					});
				clearTimeout(myVarload);
				}
			}

		});
		
		$(".acc").click(function() {
			var code	= $(this).attr('id');
			var answer = confirm('Apakah kode '+ code +' akan di konfirmasi ?');

			if(answer) { 
				
				$('.acc').hide();
				$('#loadbutton').show();
				
				var myVarload=setInterval(function(){loadtime()},800);
					function loadtime() {
				
				$.ajax({
					type:'POST',
					url:'bktpdf.php',
					data: 'code='+code,
					success: function(data){
						$('#message').show();
						location.reload();
					}

					});
				clearTimeout(myVarload);
				}
			}

		});
		
		$(".warning").click(function() {
		
			alert("Cek Kembali Apakah Sudah Ada Pembayaran!!!");
		});
		
    });
	
	
 	$(document).ready(function() {
		$(".fancybox").fancybox({
		closeClick  : false, // prevents closing when clicking INSIDE fancybox 
		openEffect  : 'none',
		closeEffect : 'none',
		'width'    	: 650,
		'height'   	: 100,
		helpers   : { 
		overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox 
		}
		});
	});