<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>admin - Online Booking | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]>
	<script src="js/flot/excanvas.min.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	
	<link rel="stylesheet" type="text/css" href="css/cloud-admin.css" >
	
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="js/uniform/css/uniform.default.min.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="css/animatecss/animate.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body class="login">	
	<section id="login" class="visible">
				<div class="container">
					<div class="row">
						<div class="row"></br></br>
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">
							<div class="logoota" align="center" ></div>								
								<div class="divide-40"></div>
							
								<form role="form" action="checklog.php" method="POST">
								  <div class="form-group">
									<label for="exampleInputEmail1">Kode </label>
									<i class="fa fa-barcode"></i>
									<input type="text" name="code_safety" class="form-control" id="exampleInputEmail1" >
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword1">Kata Sandi</label>
									<i class="fa fa-lock"></i>
									<input type="password" name="code_key" class="form-control" id="exampleInputPassword1" >
								  </div>
								  <div class="form-actions">
									<label class="checkbox"> <input type="checkbox" class="uniform" value=""> Remember me</label>
									<button type="submit" class="btn btn-danger">Masuk</button>
								  </div>
								</form>
								
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('forgot');return false;">Lupa Kata Sandi?</a> <br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/LOGIN -->
			
			<!-- FORGOT PASSWORD -->
			<section id="forgot">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">
								<h2 class="bigintro">Reset Password</h2>
								<div class="divide-40"></div>
								<form role="form">
								  <div class="form-group">
									<label for="exampleInputEmail1">Masukan Kode</label>
									<i class="fa fa-barcode"></i>
									<input type="text" name="code_safety" class="form-control" id="exampleInputEmail1" >
								  </div>
								  <div class="form-actions">
									<button type="submit" class="btn btn-info">Send Me Reset Instructions</button>
								  </div>
								</form>
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('login');return false;">Back to Login</a> <br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- FORGOT PASSWORD -->
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="bootstrap-dist/js/bootstrap.min.js"></script>
	
	
	<!-- UNIFORM -->
	<script type="text/javascript" src="js/uniform/jquery.uniform.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="js/script.js"></script>
	<script type="text/javascript">
		$('#failed').hide('fast');
		var rest = '<?=$_GET['result']?>';
		
		if (rest == 'fail'){
			$('#failed').show('fast');
			$('#sigin').hide('fast');
			
			var myVarload=setInterval(function(){loadtime()},3000);
			function loadtime() {
				
				$('#sigin').show('fast');
				$('#failed').hide('fast');
			}
		}
		
			
	</script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("login");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>