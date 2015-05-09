
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
		<li><a href="{{ URL::to('barang') }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'barang/save/'.SiteHelpers::encryptID($row['id_brg']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> barang</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id Brg" class=" control-label col-md-4 text-left"> Id Brg </label>
									<div class="col-md-6">
									  {{ Form::text('id_brg', $row['id_brg'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Kategori Barang" class=" control-label col-md-4 text-left"> Kategori Barang <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='id_kategori_barang' rows='5' id='id_kategori_barang' code='{$id_kategori_barang}' 
							class='select2 '  requred  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Kode Barang" class=" control-label col-md-4 text-left"> Kode Barang <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('kode_brg', $row['kode_brg'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Nama Barang" class=" control-label col-md-4 text-left"> Nama Barang <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('nama_brg', $row['nama_brg'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Berat" class=" control-label col-md-4 text-left"> Berat <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('berat', $row['berat'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Unit" class=" control-label col-md-4 text-left"> Unit <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('unit', $row['unit'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Harga Jual" class=" control-label col-md-4 text-left"> Harga Jual </label>
									<div class="col-md-6">
									  {{ Form::text('harga_jual', $row['harga_jual'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Harga Beli" class=" control-label col-md-4 text-left"> Harga Beli </label>
									<div class="col-md-6">
									  {{ Form::text('harga_beli', $row['harga_beli'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_save') }} </button>
				<button type="button" onclick="location.href='{{ URL::to('barang') }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>				 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#id_kategori_barang").jCombo("{{ URL::to('barang/comboselect?filter=tb_kategori_barang:id_kategori:nm_kategori') }}",
		{  selected_value : '{{ $row["id_kategori_barang"] }}' });
		 
	});
	</script>		 