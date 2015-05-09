<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ CNF_APPNAME }}</title>
<meta name="keywords" content="{{ CNF_METAKEY }}">
<meta name="description" content="{{ CNF_METADESC }}"/>
<link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="{{ URL::to('')}}/logo.ico" type="image/x-icon">	
		{{ HTML::style('sximo/themes/sximoice/css/bootstrap.min.css')}}
		{{ HTML::style('sximo/themes/sximoice/css/style.css')}}
		{{ HTML::style('sximo/themes/sximoice/css/responsive.css')}}
		{{ HTML::style('sximo/fonts/awesome/css/font-awesome.min.css')}}
		{{ HTML::style('sximo/css/icons.min.css')}}


		{{ HTML::script('sximo/themes/sximoice/js/jquery.min.js') }}		
		{{ HTML::script('sximo/themes/sximoice/js/bootstrap.min.js') }}		
		{{ HTML::script('sximo/themes/sximoice/js/jquery.easing.1.3.js') }}		
		{{ HTML::script('sximo/themes/sximoice/js/detectmobilebrowser.js') }}	
		{{ HTML::script('sximo/themes/sximoice/js/jquery.inview.min.js') }}	
		{{ HTML::script('sximo/js/plugins/parsley.js') }}	
		{{ HTML::script('sximo/themes/sximoice/js/smoothscroll.js') }}	
		{{ HTML::script('sximo/themes/sximoice/js/animations.js') }}	
		
		
		
		{{ HTML::script('sximo/themes/sximoice/portpolio/js/jquery.easing.min.js') }}
		{{ HTML::script('sximo/themes/sximoice/portpolio/js/jquery.mixitup.min.js') }}	
		{{ HTML::style('sximo/themes/sximoice/portpolio/css/layout.css') }}		
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->		


	
  	</head>

<body data-spy="scroll" data-offset="0" data-target=".navbar">

<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{ URL::to('') }}" class="navbar-brand"><img src="{{ asset('sximo/themes/sximoice/img/main.logo.png')}}" alt="{{ CNF_APPNAME }}" /></a>
				</div>

				<div class="navbar-collapse collapse">
					@include('layouts/sximo/topbar')
				</div><!--/nav-collapse -->
			</div><!-- /container -->
		</div>
		

{{ $content }}
		
	

<div class="footerwrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<h3>Contact Us</h3>
						<br>
						<p><i class="fa fa-map-marker"></i> Some Address 373, Miami,USA <br>
							<i class="fa fa-phone"></i> (800) 373-7733 <br>
							<i class="fa fa-envelope-o"></i> <a href="mailto:support@mycompany.com">support@mycompany.com</a>
						</p>
					</div>

					<div class="col-lg-4">
						<h3>Visit Our Social Network</h3>
						<br>
						<div id="social">
							<a class="facebook" title="Facebook" rel="tooltip" href="#"><i class="icon-facebook2"></i> </a>
							<a class="twitter" title="Twitter" rel="tooltip" href="#"><i class="icon-twitter2"></i> </a>
							<a class="rss" title="RSS" rel="tooltip" href="#"><i class="icon-feed3"></i> </a>
							<a class="github" title="Github" rel="tooltip" href="#"><i class="icon-github5"></i> </a>
							<a class="linkedin" title="LinkedIn" rel="tooltip" href="#"><i class="icon-linkedin"></i> </a>
							<a class="vimeo" title="Vimeo" rel="tooltip" href="#"><i class="icon-vimeo2"></i> </a>
							<a class="youtube" title="YouTube" rel="tooltip" href="#"><i class="icon-youtube"></i> </a>
						</div>
					</div>

					<div class="col-lg-4">
						<h3>Newsletter</h3>
						<br>
						<p>Subscribe to our newsletter and be the first to know our latest updates.</p>
						<div class="form-inline">
							<input type="text" placeholder="Your email" class="form-control">
							<button type="button" class="btn btn-theme">Subscribe</button>
						</div>
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div>
		
<div class="copywrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						
					</div>
					<div class="col-lg-6">
						<p class="text-right">Copyright &copy;2014 {{ CNF_APPNAME }}. All Rights Reserved.</p>
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div>		
{{ HTML::script('sximo/themes/sximoice/js/sximo.js') }}	
</body> 
</html>