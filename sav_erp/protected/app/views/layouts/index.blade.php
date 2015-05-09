<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ CNF_APPNAME }}</title>
<link rel="shortcut icon" href="{{ URL::to('')}}/logo.ico" type="image/x-icon">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>	
		{{ HTML::style('sximo/js/plugins/bootstrap/css/bootstrap.css')}}
		{{ HTML::style('sximo/fonts/awesome/css/font-awesome.min.css')}}
		{{ HTML::style('sximo/js/plugins/bootstrap.summernote/summernote.css')}}
		{{ HTML::style('sximo/js/plugins/datepicker/css/bootstrap-datetimepicker.min.css')}}
		{{ HTML::style('sximo/js/plugins/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css')}}
		{{ HTML::style('sximo/js/plugins/markdown/css/bootstrap-markdown.min.css')}}
		{{ HTML::style('sximo/js/plugins/datatables/css/jquery.dataTables.css')}}
		{{ HTML::style('sximo/js/plugins/select2/select2.css')}}
		{{ HTML::style('sximo/css/sximo.css')}}
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
		{{ HTML::script('sximo/js/plugins/markdown/js/bootstrap-markdown.js') }}
		{{ HTML::script('sximo/js/plugins/bootstrap.summernote/summernote.min.js') }}
		

	<script>
	function SximoModal( url , title)
	{
		$('#sximo-modal-content').html(' ....Loading content , please wail ...');
		$('.modal-title').html(title);
		$('#sximo-modal-content').load(url,function(){
		});
		$('#sximo-modal').modal('show');	
	}	
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
	  

     <a class="navbar-brand" href="{{ URL::to('config/dashboard')}}"><i class="icon-windows8"></i> {{ CNF_APPNAME }}</a>
	  @if(Auth::check()) <a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a> @endif
    </div>

		@include('layouts/topbar')
  </div>
</nav>


<div class="page-container  ">

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
	});	

</script>	 
</body> 
</html>