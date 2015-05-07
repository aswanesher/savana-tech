<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Travel Agency - HTML5 Booking template</title>
	
	<!-- Bootstrap -->
	<link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="assets/css/custom.css" rel="stylesheet" media="screen">

	<!-- Animo css-->
	<link href="plugins/animo/animate+animo.css" rel="stylesheet" media="screen">
	
	<link href="examples/carousel/carousel.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="assets/js/html5shiv.js"></script>
	  <script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="screen" />
	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
	<!-- Load jQuery -->
	<script src="assets/js/jquery.v2.0.3.js"></script>


	

  </head>
  <body>
	<!-- 100% Width & Height container  -->
	<div class="login-fullwidith">
		
		<form action="#" method="POST">
		<!-- Login Wrap  -->
		<div class="login-wrap" style="top: -40px;background-color: white;height: 540px;">
			<img style="margin-top: 6px;" src="images/logo.png" class="login-img" alt="logo"/><br/><br/>
			<div>
				<div class="login-c3" style="top: -239px">
					<div class="left"><a style="text-decoration: none" href="javascript:;" onclick="location.href='//walanja.co.id'" class="whitelink">Formulir Registrasi</a></div>
				</div>
				<div class="cpadding50">
					<input type="radio" name="gender" value="Laki-Laki"> Laki-Laki
					<input type="radio" name="gender" value="Perempuan"> Perempuan
					<br>
					<br>
					<input type="text" name="name" class="form-control" placeholder="Nama">
					<br/>
					<textarea type="text" name="location" class="form-control" placeholder="Alamat"></textarea>
					<br/>
					<input type="text" name="phone" class="form-control" placeholder="Telepon">
					<br/>
					<input type="text" name="email" class="form-control" placeholder="Email">
					<br/>
					<input type="password" name="password" class="form-control" placeholder="Password">
					<br/>
					<!--<input type="text" name="very_code" class="form-control" placeholder="Kode Verifikasi">-->
					<div style="margin-top: -12px;display: none" id="war">Lengkapi Form Inputan!</div>
					<div style="margin-top: -12px;display: none" id="valid">Pendaftaran Berhasil!</div>
				</div>
				<div class="logmargfix">
					<div class="chpadding50">
							<div class="alignbottom">
								<a class="btn-search4" style="text-decoration: none" href="javascript:;" id="okReg">Daftarkan</a>							
							</div>
					</div>
				</div>
				<div class="login-c3" style="top: 260px">
					<div class="left"><a style="text-decoration: none" href="javascript:;" onclick="location.href='//walanja.co.id'" class="whitelink"><span></span>walanja.co.id</a></div>
					<div class="right"><a style="text-decoration: none" href="javascript:;" onclick="location.href='index.php?menu=login'" class="whitelink">Login</a></div>
				</div>
			</div>
			
			
		</div>
		<!-- End of Login Wrap  -->
		</form>
	</div>	
	<!-- End of Container  -->

	<!-- Javascript  -->
	<script src="assets/js/initialize-loginpage.js"></script>
	<script src="assets/js/jquery.easing.js"></script>
	<!-- Load Animo -->
	<script src="plugins/animo/animo.js"></script>
	<script>
	$(document).ready(function(){
		$("#okReg").click(function() {
			var email 	= $("input:text[name=email]").val();
			var pass 	= $("input:password[name=password]").val();
			var gender 	= $('input[type="radio"]:checked').val();
			var name 	= $("input:text[name=name]").val();
			var alamat 	= $("textarea[name=location]").val();
			var phone 	= $("input:text[name=phone]").val();
			
			if(email != "" && pass != "" && gender != "" && name != "" && alamat != "" && phone != ""){
				$.ajax({
					url: 'postreg.php',
					type: 'POST',
					data: {'email' : email, 'password' : pass, 'gender' : gender, 'name' : name, 'alamat' : alamat, 'phone' : phone},
					cache: false,
					success: function(resconf) {
						//alert(resconf);
						$("#valid").show();
						location.href = "index.php?menu=login";
					}
				});
			}else if(!phone.match(/^\d+/)){
				alert('Telepon tidak valid!');
			}else{
				$("#war").show();
			}
			
			//alert(phone);
		});
	});
	</script>
	<script>
	function errorMessage(){
		$('.login-wrap').animo( { animation: 'tada' } );
	}
	</script>
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>