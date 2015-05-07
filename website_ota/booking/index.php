<?PHP

session_start();
	require ('library/function.modul.php');
	
	if($_COOKIE['per'] == '' || $_COOKIE['priv'] == ''){
		header ('location: checklogout.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Admin | Hotel </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="css/responsive.css" >
	<!-- DATA TABLES -->
	<link rel="stylesheet" type="text/css" href="js/datatables/media/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="js/datatables/media/assets/css/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="js/datatables/extras/TableTools/media/css/TableTools.min.css" />
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- JQUERY UI-->
	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<link rel='stylesheet' type='text/css' href='../plugins/fancybox/source/jquery.fancybox.css?v=2.1.5' media='screen' />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- DATE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/datepicker/themes/default.min.css" />
	<link rel="stylesheet" type="text/css" href="js/datepicker/themes/default.date.min.css" />
	<link rel="stylesheet" type="text/css" href="js/datepicker/themes/default.time.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="index.html">
						<!--<img src="img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">-->
					</a>
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
				</div>
				<!-- NAVBAR LEFT -->
				<ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-cog"></i>
							<span class="name">Tema</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu skins">
							<li class="dropdown-title">
								<span><i class="fa fa-leaf"></i> Tipe Tema</span>
							</li>
							<li><a href="#" data-skin="default">Subtle (default)</a></li>
							<li><a href="#" data-skin="night">Night</a></li>
							<li><a href="#" data-skin="earth">Earth</a></li>
							<li><a href="#" data-skin="utopia">Utopia</a></li>
							<li><a href="#" data-skin="nature">Nature</a></li>
							<li><a href="#" data-skin="graphite">Graphite</a></li>
						 </ul>
					</li>
				</ul>
				<!-- /NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown" id="header-notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge" id="jmlPay"></span>
							
						</a>
						<ul class="dropdown-menu notification" style="width: 285px;">
							<li class="dropdown-title">
								<span><i class="fa fa-bell"></i> Pemberitahuan Pemesanan</span>
							</li>
							<div id="showListPay"></div>
							
							<li class="footer">
								<a href="prosesUpdate.php?aksi=viewall">Lihat Semua Pemberitahuan <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="img/avatars/avatar3.jpg" />
							<span class="username">Hallo, <?php echo $_SESSION['code_safety']?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
						<li><a href="index.php?modul=pass"><i class="fa fa-key"></i> Ubah Password</a></li>
							<li><a href="checklogout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
						</ul>
						
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
		
		
	</header>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						
						
						<!-- SIDEBAR MENU -->
						<ul>
							
							<li>
								<a href="index.php?modul=dash">
									<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								</a>					
							</li>
						<?PHP
							if ($_COOKIE['priv'] == 1){
								$dayNow = date('dmY');
						?>
							 <li class="has-sub">
							
								<a href="javascript:;" class="">
								<i class="fa fa-user"></i> <span class="menu-text">Operator</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
                               
											<li><a class="" href="index.php?modul=opwlnj"><span class="sub-sub-menu-text">Pemesanan dari Walanja</span></a></li>
											<li><a class="" href="index.php?modul=opagt"><span class="sub-sub-menu-text">Pemesanan dari Agent</span></a></li>
									
								</ul>
                                
							</li>
							<li>
								<a href="index.php?modul=cl">
									<i class="fa fa-share-square-o"></i> <span class="menu-text">Penutupan Pesanan</span>
								</a>					
							</li>
							<li>
								<a href="index.php?modul=m_voc">
									<i class="fa fa-tags"></i> <span class="menu-text">Data Voucher</span>
								</a>					
							</li>
							<li>
								<a href="index.php?modul=rep&spec=book.<?PHP echo $dayNow?>.">
									<i class="fa fa-bar-chart-o"></i> <span class="menu-text">Laporan</span>
								</a>					
							</li>
							<?php if ($_SESSION['code_id']==1){ ?>
							<li>
								<a href="index.php?modul=author">
									<i class="fa fa-users"></i> <span class="menu-text">Master Pengguna</span>
								</a>					
							</li>
						<?PHP
						}
						}else{
						?>
							<li>
								<a href="index.php?modul=m_conf">
									<i class="fa fa-building-o"></i> <span class="menu-text">Konfigurasi Hotel</span>
								</a>					
							</li>
							<li>
								<a href="index.php?modul=m_room">
									<i class="fa fa-building-o"></i> <span class="menu-text">Persediaan</span>
								</a>					
							</li>
						<?PHP
						}
						?>	
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content">
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<?PHP
							if (isset($_GET['modul'])) 
							{
								$str	= $_GET['modul'];
							}else{
								$str 	= '';
							}
							
							modul($str);
						?>
					</div>
				</div>
			</div>
		</div>
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
	
	<!-- DATA TABLES -->
	<script type="text/javascript" src="js/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/datatables/media/assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
	<script type="text/javascript" src="js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
	
	<!-- Add fancyBox main JS and CSS files -->
	<script type='text/javascript' src='../plugins/fancybox/source/jquery.fancybox.js?v=2.1.5'></script> 
	<!-- DATE RANGE PICKER -->
	<script src="js/bootstrap-daterangepicker/moment.min.js"></script>
	<script src="js/highcharts/highcharts.js"></script>
	<script src="js/highcharts/exporting.js"></script>
	<script src="js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- DATE PICKER -->
	<script type="text/javascript" src="js/datepicker/picker.js"></script>
	<script type="text/javascript" src="js/datepicker/picker.date.js"></script>
	<script type="text/javascript" src="js/datepicker/picker.time.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="js/script.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("elements");  //Set current page
			App.setPage("widgets_box");  //Set current page
			App.setPage("dynamic_table");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>