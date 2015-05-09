<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ CNF_APPNAME }}</title>
<link rel="shortcut icon" href="{{ URL::to('')}}/logo.ico" type="image/x-icon">
<link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
		{{ HTML::style('sximo/js/plugins/bootstrap/css/bootstrap.css')}}
		{{ HTML::style('sximo/fonts/awesome/css/font-awesome.min.css')}}
		{{ HTML::style('sximo/js/plugins/bootstrap.summernote/summernote.css')}}
		{{ HTML::style('sximo/js/plugins/datepicker/css/bootstrap-datetimepicker.min.css')}}
		{{ HTML::style('sximo/js/plugins/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css')}}
		{{ HTML::style('sximo/js/plugins/select2/select2.css')}}
		{{ HTML::style('sximo/css/sximo.css')}}
	
		<link href="{{ asset('sximo/css/sxinblue.css')}}" id="switchTheme" rel="stylesheet" type="text/css" />
		{{ HTML::style('sximo/css/icons.min.css')}}
		

		{{ HTML::script('sximo/js/plugins/jquery.min.js') }}
		{{ HTML::script('sximo/js/plugins/jquery.cookie.js') }}			
		{{ HTML::script('sximo/js/plugins/jquery-ui.min.js') }}	
		{{ HTML::script('sximo/js/plugins/datatables/js/jquery.dataTables.min.js') }}				
		{{ HTML::script('sximo/js/plugins/collapsible.min.js') }}
		{{ HTML::script('sximo/js/plugins/jquery.nestable.js') }}
		{{ HTML::script('sximo/js/plugins/select2/select2.min.js') }}
		{{ HTML::script('sximo/js/plugins/prettify.js') }}
		{{ HTML::script('sximo/js/plugins/parsley.js') }}
		{{ HTML::script('sximo/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}
		{{ HTML::script('sximo/js/plugins/switch.min.js') }}
		{{ HTML::script('sximo/js/plugins/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js') }}
		{{ HTML::script('sximo/js/plugins/bootstrap/js/bootstrap.js') }}
		{{ HTML::script('sximo/js/sximo.js') }}
		{{ HTML::script('sximo/js/plugins/jquery.jCombo.min.js') }}

		{{ HTML::script('sximo/js/plugins/bootstrap.summernote/summernote.min.js') }}
		{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/jquery.tinymce.js')}}
		{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js')}}
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->	
	<script>
	function SximoModal( url , title)
	{
		$('#sximo-modal-content').html(' ....Loading content , please wait ...');
		$('.modal-title').html(title);
		$('#sximo-modal-content').load(url,function(){
		});
		$('#sximo-modal').modal('show');	
	}	
	
	$(function(){
		tinymce.init({	
			mode : "specific_textareas",
			editor_selector : "mceEditor",
			 plugins : "openmanager",
			 file_browser_callback: "openmanager",
			 open_manager_upload_path: '../../../../../../../../uploads/images/',
			  content_css : "{{ URL::to('sximo/css/sximo.css')}}" 
		 });	
	});
	</script>
		
	
  	</head>

<body >

<nav class="navbar navbar-inverse " role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#toolmenu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-cogs"></span>
      </button>	  	
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topmenu">
        <span class="sr-only">Toggle navigation</span>
		<span class="icon-paragraph-justify2"></span>		
      </button>
	  

     <a class="navbar-brand" href="{{ URL::to('dashboard')}}">
	 	<img src="{{ asset('sximo/images/sximo.png')}}" alt="{{ CNF_APPNAME }}" />
	 </a>
	  @if(Auth::check()) <a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a> @endif
    </div>

		@include('layouts/topbar')
  </div>
</nav>


<div class="page-container  ">
	  @if(Auth::check())  <div class="sidebar in">@include('layouts/sidebar')</div> @endif
	{{ $content }}
</div>




<div class="modal fade" id="sximo-modal" tabindex="-1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header bg-default">
		
		<button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Modal title</h4>
	</div>
	<div class="modal-body" id="sximo-modal-content">

	</div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">
	$(function () {
		$(".checkall").click(function() {
			var cblist = $(".ids");
			if($(this).is(":checked"))
			{				
				cblist.prop("checked", !cblist.is(":checked"));
			} else {	
				cblist.removeAttr("checked");
			}	
		});
	
		$('ul.sxinthemes li a ').click(function (){
			var theme = $(this).attr('rel');
			var linkhref = '{{ URL::to("sximo/css/'+theme+'.css") }}';
			$.cookie("sxintheme",linkhref, {expires: 365, path: '/'});
		   	$('#switchTheme').attr('href',linkhref);
		 	
		});		
		
	});	

</script>	 
</body> 
</html>