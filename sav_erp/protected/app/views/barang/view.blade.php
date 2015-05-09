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
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
 	<div class="visible-xs breadcrumb-toggle">
		<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons">
		<i class="icon-menu2"></i></a>
	</div>	  
	   <ul class="breadcrumb-buttons collapse">
	   		<li><a href="{{ URL::to('barang') }}" class="tips" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;</a></li>
			@if($access['is_add'] ==1)
	   		<li><a href="{{ URL::to('barang/add/'.$id) }}" class="tips" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;</a></li>
			@endif  
			@if($access['is_remove'] ==1)
			<li ><a href="javascript://ajax"  onclick="SximoDelete();"class="tips" title="{{ Lang::get('core.btn_remove') }}"><i class="icon-bubble-trash"></i>&nbsp;</a></li>
			@endif 	   
	   </ul>
	   	  
	</div>  
	 {{ Form::open(array('url'=>'barang/destroy/', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
	 <input type="checkbox" style="display:none" checked="checked" class="ids"  name="id[]" value="{{ $id }}" />
	{{ Form::close() }}
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>ID</td>
						<td>{{ $row->id_brg }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Kode Barang</td>
						<td>{{ $row->kode_brg }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Nama Barang</td>
						<td>{{ $row->nama_brg }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Berat</td>
						<td>{{ $row->berat }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Unit</td>
						<td>{{ $row->unit }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Harga Jual</td>
						<td>{{ $row->harga_jual }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Harga Beli</td>
						<td>{{ $row->harga_beli }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Kategori Barang</td>
						<td>{{ SiteHelpers::gridDisplayView($row->id_kategori_barang,'id_kategori_barang','1:tb_kategori_barang:id_kategori:nm_kategori') }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
</div>
	  