<?PHP
	session_start();
	require ('config/hotel.conn.php');
	require ('library/function.menu.php');
        //require ('check_device.php');
	//CLEAR SESSION-------------
		//session_cache_expire(30);
		session_destroy();
	//--------------------------
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Walanja - Online Booking</title>
	
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/custom.css" rel="stylesheet" media="screen">

    <!-- Carousel -->
	<link href="examples/carousel/carousel.css" rel="stylesheet">
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <!--<link rel="stylesheet" type="text/css" href="css/fullscreen.css" media="screen" />-->
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

    <!-- Picker UI-->	
	<link rel="stylesheet" href="assets/css/jquery-ui.css" />
	
	<!-- bin/jquery.slider.min.css -->
	<link rel="stylesheet" href="plugins/jslider/css/jslider.css" type="text/css">
	<!--<link rel="stylesheet" href="plugins/jslider/css/jslider.round-blue.css" type="text/css">-->
	
	  
    <!-- jQuery -->
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" ></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js" ></script>
	<script src="http://richhollis.github.com/vticker/downloads/jquery.vticker.js?v=1.15" ></script>
    <script src="assets/js/jquery.v2.0.3.js"></script>
	
	<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="plugins/jslider/js/jshashtable-2.1_src.js" defer="defer"></script>
	<script type="text/javascript" src="plugins/jslider/js/jquery.numberformatter-1.2.3.js" defer="defer"></script>
	<script type="text/javascript" src="plugins/jslider/js/tmpl.js" defer="defer"></script>
	<script type="text/javascript" src="plugins/jslider/js/jquery.dependClass-0.1.js" defer="defer"></script>
	<script type="text/javascript" src="plugins/jslider/js/draggable-0.1.js" defer="defer"></script>
	<script type="text/javascript" src="plugins/jslider/js/jquery.slider.js" defer="defer"></script>
		
	<!-- Javascript -->
    <!-- Custom Select -->
	<script type='text/javascript' src='assets/js/jquery.customSelect.js' defer="defer"></script>
	
    <!-- Custom Select -->
	<script type='text/javascript' src='js/lightbox.js' defer="defer"></script>	
	
    <!-- Counter -->	
    <script src="assets/js/counter.js" defer="defer"></script>	
	<?PHP
		$qrycek 	= $conn->query("SELECT hotel_avg FROM m_hotel ORDER BY hotel_avg ASC LIMIT 0,1");
		$dataavg	= $qrycek->fetch(PDO::FETCH_ASSOC);
	?>
    <!-- This page JS -->
	
    <!-- Custom functions -->
    <script src="assets/js/functions.js" defer="defer"></script>
	
    <!-- Picker UI-->	
	<script src="assets/js/jquery-ui.js" defer="defer"></script>		
	
	<!-- Easing -->
    <script src="assets/js/jquery.easing.js" defer="defer"></script>
	
    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js" defer="defer"></script>
	
   <!-- Nicescroll  -->	
	<script src="assets/js/jquery.nicescroll.min.js" defer="defer"></script>
	
    <!-- CarouFredSel -->
    <script src="assets/js/jquery.carouFredSel-6.2.1-packed.js" defer="defer"></script>
    <script src="assets/js/helper-plugins/jquery.touchSwipe.min.js" defer="defer"></script>
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js" defer="defer"></script>
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.transit.min.js" defer="defer"></script>
	<script type="text/javascript" src="assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js" defer="defer"></script>
	<script type="text/javascript" src="assets/js/jquery.vticker.js" defer="defer"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js" defer="defer"></script>
    <!-- Custom Select -->
	<script type='text/javascript' src='assets/js/jquery.customSelect.js' defer="defer"></script>	
  </head>
  <body id="top">
    <?PHP
			if($_GET['menu'] != 'login' && $_GET['menu'] != 'veri' && $_GET['menu'] != 'reg' && $_GET['menu'] != 'forgot' && $_GET['menu'] != 'rest'){
		?>
	<!-- Top wrapper -->
	<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">
		
			<div class="container offset-3">
			  <!-- Navigation-->
			  <div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a href="//walanja.co.id" class="navbar-brand"><img src="images/logo.png" alt="Travel Agency Logo" class="logo"/></a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				
				  <li <?PHP echo $_GET['menu']=='home'?'class="dropdown active"':'';?>><a style="text-decoration: none" href="javascript:;" onclick="location.href='index.php?menu=home'">Beranda</a></li>
				  
				  <li <?PHP echo $_GET['menu']=='tutor'?'class="dropdown active"':'';?>><a style="text-decoration: none" href="javascript:;" onclick="location.href='index.php?menu=tutor'">Cara Pemesanan</a></li>
				  
				   <li <?PHP echo $_GET['menu']=='faq'?'class="dropdown active"':'';?>><a style="text-decoration: none" href="javascript:;" onclick="location.href='index.php?menu=faq'">FAQ</a></li>
				  
				  <li>
					<a style="text-decoration: none" href="javascript:;" target="_blank" onclick="window.open('http://info.walanja.co.id')">Blog</a>
				  </li>
				  
				  <li <?PHP echo $_GET['menu']=='login'?'class="dropdown active"':'';?>><a style="text-decoration: none" href="javascript:;" onclick="location.href='index.php?menu=login'">Login / Registrasi</a></li>	
				</ul>
			  </div>
			  <!-- /Navigation-->			  
			</div>
		
        </div>
      </div>
    </div>
	<!-- /Top wrapper -->
	<?PHP
		}
		if (isset($_GET['menu'])) 
		{
			$str	= $_GET['menu'];
		}else{
			$str = '';
		}
		menu($str);
		$qrycek 	= $conn->query("SELECT hotel_avg FROM m_hotel ORDER BY hotel_avg ASC LIMIT 0,1");
		$dataavg	= $qrycek->fetch(PDO::FETCH_ASSOC);
	?>
	
  </body>
  <script type="text/javascript" src="js/custom.js"></script>
</html>