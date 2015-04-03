@extends('layouts.default')

@section('content')
	<div class="">
		{{ Form::open(array('action'=>'DashboardController@searchPage','class'=>'form-inline')) }}
		<form class="form-inline">
			<div class="form-group">
				<select class="form-control" name='merk'>
					<option value="0" selected="selected" name="merk">-- Merk --</option>
					@foreach($brands as $bren)
					<option value="{{ $bren->id_brand }}">{{ $bren->brand }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Type" name="nama">
			</div>
			<div class="form-group">
				<select class="form-control" name='kategori'>
					<option value="0" selected="selected">-- Level --</option>
					@foreach($categories as $cat)
					<option value="{{ $cat->id_category }}">{{ $cat->category }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<select class="form-control" name='os'>
					<option value="0" selected="selected">- Sistem Operasi --</option>
					@foreach($ostypes as $os)
					<option value="{{ $os->id_ostype }}">{{ $os->ostype }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Harga" name="harga">
			</div>
			<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
		</form>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
		<thead>
			<th width="5%">No</th>
			<th>Merk</th>
			<th>Type</th>
			<th colspan="3" width="10%">Opsi</th>
		</thead>
		<tbody>
			<?php $count = $allsp->getFrom(); ?>
			@foreach($allsp as $a)
			<tr>
				<td>{{ $count++ }}</td>
				<td>{{ $a->brand }}</td>
				<td>{{ $a->type }}</td>
				<td><a href="{{ URL::to('dashboard/detail') }}/{{ $a->id_smartphone }}" title="Rincian"><i class='glyphicon glyphicon-list-alt'></i></a></td>
				<td><a href="{{ URL::to('dashboard/edit') }}/{{ $a->id_smartphone }}" title="Ubah"><i class='glyphicon glyphicon-pencil'></i></a></td>
				<td><a href="{{ URL::to('dashboard/delete/') }}/{{ $a->id_smartphone }}" title="Hapus" onclick="return confirm('Anda Yakin Ingin Menghapusnya ?')"><i class='glyphicon glyphicon-trash'></i></a></td>
			</tr>
			@endforeach
			<tr>
				<td colspan="6"><a href="{{ URL::to('dashboard/add') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i></a></td>
			</tr>
		</tbody>
		</table>
		<?php echo $allsp->links(); ?>
	</div>
@stop