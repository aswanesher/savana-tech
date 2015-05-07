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
		
		<form action="checklog.php" method="POST">
		<!-- Login Wrap  -->
		<div class="login-wrap" style="background-color: white">
			<img src="images/logo.png" class="login-img" alt="logo"/><br/><br/>
			<div class="cpadding50">
					<input type="text" name="email" class="form-control" placeholder="Email Pengguna">
					<br/>
					<input type="password" name="password" class="form-control" placeholder="Kata Sandi">
					<br/>
					<input type="password" name="passwordCek" id="cekPassVal" class="form-control" placeholder="Ulangi Sandi">
					<br/>
					<!--<input type="text" name="very_code" class="form-control" placeholder="Kode Verifikasi">-->
					<span id="tidakVal" style="color: red;display: none">Kata sandi tidak cocok!</span>
					<span id="yaVal" style="color: green;display: none">Kata sandi cocok!</span><br><br>
				</div>
				<div class="chpadding50">
							<div class="alignbottom">
								<button class="btn-search4"  type="submit" onclick="">Masuk</button>							
							</div>
							<div class="alignbottom2">
							  <div class="checkbox">
								<label>
								  <input type="checkbox">Remember
								</label>
							  </div>
							</div>
					</div>
					
			<div class="login-c3" style="top: 100px">
				<div class="left"><a style="text-decoration: none" href="javascript:;" onclick="location.href='//walanja.co.id'" class="whitelink"><span></span>walanja.co.id</a></div>
				<div class="right"><a href="javascript:;" onclick="location.href='index.php?menu=forgot'" style="text-decoration: none" class="whitelink">Lupa Kata Sandi?</a></div>
			</div>
			<div class="login-c3" style="top: 150px">
				<div class="left"><p class="color: white">Sudah Berlangganan ?</p></div>
				<div class="right"><a style="text-decoration: none" href="javascript:;" onclick="location.href='index.php?menu=reg'" class="whitelink">Daftar Disini</a></div>
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
	
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="dist/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#cekPassVal").keyup(function () {
					var passVal 	= $('input:password[name=password]').val();
					var passCekVal = $('input:password[name=passwordCek]').val();
					if(passVal != passCekVal){
						$('#yaVal').hide();
						$('#tidakVal').show();
					}else if(passVal == '' || passCekVal == ''){
						$('#yaVal').hide();
						$('#tidakVal').hide();
					}else{
						$('#tidakVal').hide();
						$('#yaVal').show();
					}
				});
		});
	</script>
  </body>
</html>