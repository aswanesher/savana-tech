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
		<li><a href="{{ URL::to('customer') }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
 	<div class="visible-xs breadcrumb-toggle">
		<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons">
		<i class="icon-menu2"></i></a>
	</div>	  
	   <ul class="breadcrumb-buttons collapse">
	   		<li><a href="{{ URL::to('customer') }}" class="tips" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;</a></li>
			@if($access['is_add'] ==1)
	   		<li><a href="{{ URL::to('customer/add/'.$id) }}" class="tips" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;</a></li>
			@endif  
			@if($access['is_remove'] ==1)
			<li ><a href="javascript://ajax"  onclick="SximoDelete();"class="tips" title="{{ Lang::get('core.btn_remove') }}"><i class="icon-bubble-trash"></i>&nbsp;</a></li>
			@endif 	   
	   </ul>
	   	  
	</div>  
	 {{ Form::open(array('url'=>'customer/destroy/', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
	 <input type="checkbox" style="display:none" checked="checked" class="ids"  name="id[]" value="{{ $id }}" />
	{{ Form::close() }}
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>CustomerId</td>
						<td>{{ $row->CustomerId }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Nama Depan</td>
						<td>{{ $row->FirstName }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Nama Belakang</td>
						<td>{{ $row->LastName }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Perusahaan</td>
						<td>{{ $row->Company }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Alamat</td>
						<td>{{ $row->Address }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Kota</td>
						<td>{{ $row->City }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Provinsi</td>
						<td>{{ $row->State }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Negara</td>
						<td>{{ $row->Country }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Kode Pos</td>
						<td>{{ $row->PostalCode }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Telepon</td>
						<td>{{ $row->Phone }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Fax</td>
						<td>{{ $row->Fax }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Email</td>
						<td>{{ $row->Email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>SupportRepId</td>
						<td>{{ $row->SupportRepId }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Updated</td>
						<td>{{ $row->updated }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created</td>
						<td>{{ $row->created }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
</div>
	  