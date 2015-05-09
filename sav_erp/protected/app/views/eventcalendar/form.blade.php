
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('eventcalendar') }}">{{ $pageTitle }}</a></li>
        <li class="active">{{ Lang::get('core.addedit') }} </li>
      </ul>
	</div>  
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	<div class="panel-default panel">
		<div class="panel-body">

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		 {{ Form::open(array('url'=>'eventcalendar/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> eventcalendar</legend>
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Id    </label>									
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Title    </label>									
									  {{ Form::text('title', $row['title'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Description    </label>									
									  {{ Form::text('description', $row['description'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Start  <span class="asterix"> * </span>  </label>									
									  
				{{ Form::text('start', $row['start'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> End  <span class="asterix"> * </span>  </label>									
									  
				{{ Form::text('end', $row['end'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 						
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_save') }} </button>
				<button type="button" onclick="location.href='{{ URL::to('eventcalendar') }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>				 
   <script type="text/javascript">
	$(document).ready(function() { 
		 
	});
	</script>		 