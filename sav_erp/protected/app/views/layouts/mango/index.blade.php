<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> <?php echo isset($page['pageTitle']) ? $page['pageTitle'].' | '.$page['pageNote'] : CNF_APPNAME ;?></title>
<meta name="keywords" content="{{ CNF_METAKEY }}">
<meta name="description" content="{{ CNF_METADESC }}"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>	
<link rel="shortcut icon" href="{{ URL::to('')}}/logo.ico" type="image/x-icon">	
		{{ HTML::style('sximo/themes/mango/css/bootstrap.min.css')}}
		
		{{ HTML::style('sximo/fonts/awesome/css/font-awesome.min.css')}}
		{{ HTML::style('sximo/css/icons.min.css')}}
		{{ HTML::style('sximo/themes/mango/js/fancybox/source/jquery.fancybox.css') }}		
		{{ HTML::style('sximo/themes/mango/js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}	
		{{ HTML::style('sximo/themes/mango/js/owl-carousel/owl.carousel.css')}}	
		{{ HTML::style('sximo/themes/mango/js/owl-carousel/owl.theme.css')}}	
		{{ HTML::style('sximo/themes/mango/css/mango.css')}}	


		
		{{ HTML::script('sximo/themes/mango/js/jquery.min.js') }}		
		{{ HTML::script('sximo/themes/mango/js/bootstrap.min.js') }}	
		{{ HTML::script('sximo/themes/mango/js/fancybox/source/jquery.fancybox.js') }}	
		{{ HTML::script('sximo/themes/mango/js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7s') }}	
		{{ HTML::script('sximo/themes/mango/js/fancybox/source/jquery.fancybox.js') }}	
		{{ HTML::script('sximo/themes/mango/js/owl-carousel/owl.carousel.js') }}	
		{{ HTML::script('sximo/js/plugins/prettify.js') }}	
		{{ HTML::script('sximo/js/plugins/parsley.js') }}
		{{ HTML::script('sximo/themes/mango/js/unslider.js') }}	
		{{ HTML::script('sximo/themes/mango/js/jquery.mixitup.min.js') }}	
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->		


	
  	</head>

<body >
<div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 left">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+1 765 1190</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>info@sximobuilder.com</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 right">
                    <ul class="list-unstyled list-inline pull-right">
                         @if(!Auth::check()) 
						 	<li><a href="{{ URL::to('user/login') }}"><i class="fa fa-sign-in"></i> Log In</a></li>
                        	<li><a href="{{ URL::to('user/register') }}"><i class="fa fa-user"></i> Registration</a></li>
						 @else
						 	<li><a href="{{ URL::to('user/profile') }}"><i class="fa fa-user "></i>Account</a></li>
                        	<li><a href="{{ URL::to('dashboard') }}"><i class="fa fa-desktop"></i> Dashboard</a></li>	
							<li><a href="{{ URL::to('user/logout') }}"><i class="fa  fa-sign-out"></i> Log Out</a></li>					 
						 @endif	
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
	
	<div class="navbar navbar-default ">
			<div class="container">
				<div class="navbar-header">
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{ URL::to('') }}" class="site-logo"><img src="{{ asset('sximo/themes/mango/img/logo.png')}}" alt="{{ CNF_APPNAME }}" /></a>
				</div>

				<div class="navbar-collapse collapse">
					@include('layouts/mango/topbar')
				</div><!--/nav-collapse -->
			</div><!-- /container -->
		</div>
		

		<?php if(isset($page['breadcrumb']) &&  $page['breadcrumb'] =='active' ) { ?>			
				@include('layouts/mango/breadcrumb')
		<?php } ?>
		<div style="min-height:400px;">
		{{ $content }}
		</div>
		
		<div class="clr"></div>
	

<div id="prefooter">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h3>About Us </h3>
				<p>Unterdum, lacus et vulputate pellentesque, velit nulla commodo sem, at egestas nulla metus vel sapien!</p>
			</div>
			<div class="col-md-3 ">
				<h3>Our Social Network</h3>
				<div id="social">
					<a href="#" rel="tooltip" title="Facebook" class="facebook"><i class="icon-facebook2"></i> </a>
					<a href="#" rel="tooltip" title="Twitter" class="twitter"><i class="icon-twitter2"></i> </a>
					<a href="#" rel="tooltip" title="RSS" class="rss"><i class="icon-feed3"></i> </a>
					<a href="#" rel="tooltip" title="Github" class="github"><i class="icon-github5"></i> </a>
					<a href="#" rel="tooltip" title="LinkedIn" class="linkedin"><i class="icon-linkedin"></i> </a>
					<a href="#" rel="tooltip" title="Vimeo" class="vimeo"><i class="icon-vimeo2"></i> </a>
					<a href="#" rel="tooltip" title="YouTube" class="youtube"><i class="icon-youtube"></i> </a>
				</div>
				
			</div>
			<div class="col-md-3 usefullink">
				<h3>Useful links</h3>
				<ul>
					<li><a href=""><i class="fa fa-arrow-circle-right"></i> Support Portal </a></li>
					<li><a href=""><i class="fa fa-arrow-circle-right"></i> Knowledge Base </a></li>
					<li><a href=""><i class="fa fa-arrow-circle-right"></i> laravel Documentation </a></li>
					<li><a href=""><i class="fa fa-arrow-circle-right"></i> PHP knowledge Base </a></li>
					<li><a href=""><i class="fa fa-arrow-circle-right"></i> Bootstrap Guide</a></li>
				</ul>		
				
			</div>
			<div class="col-md-3 contact-info">
				<h3>Contact Info</h3>
				<ul class=""><li><span class="color-primary">Address:</span><br>102580 Santa Monica BLVD Los Angeles</li><li><span class="color-primary">Phone numbers:</span><br>+9 876 543 00 21, +0 123 400 56 78</li><li><span class="color-primary">E-mail:</span><br>info@your-domain.com</li></ul>
			</div>	
		</div>
	</div>	
</div>
<div id="footer">
	<div class=" container">
		<div class="col-md-7"> Copyright 2014 {{ CNF_APPNAME }} . ALL Rights Reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></div>
		<div class="col-md-5"></div>
	</div>	
</div>
		
</body> 
</html>