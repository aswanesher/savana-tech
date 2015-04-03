@extends('layouts.default')

@section('content')
	@foreach($detailsp as $ds)
	<div class="row">
	  <div class="col-md-9 col-md-push-3">
	  	<table class="table table-bordered">
		  <thead>
		  	<th colspan="2">{{ $ds->brand }} : {{ $ds->type }}</th>
		  </thead>
		  <tbody>
		  	<tr>
		  		<td width="18%">Merk</td>
		  		<td>{{ $ds->brand }}</td>
		  	</tr>
		  	<tr>
		  		<td width="18%">Nama/Tipe</td>
		  		<td>{{ $ds->type }}</td>
		  	</tr>
		  	<tr>
		  		<td width="18%">Level</td>
		  		<td>{{ $ds->category }}</td>
		  	</tr>
		  	<tr>
		  		<td width="18%">Sistem Operasi</td>
		  		<td>{{ $ds->ostype }}</td>
		  	</tr>
		  	<tr>
		  		<td width="18%">Deskripsi</td>
		  		<td>{{ $ds->description }}</td>
		  	</tr>
		  	<tr>
		  		<td width="18%">Harga</td>
		  		<td>Rp <?php echo number_format($ds->price) ?></td>
		  	</tr>
		  </tbody>
		</table>
		<a href="{{ URL::to('/') }}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		<div class="btn-group">
			<button type="button" class="btn btn-primary">Opsi</button>
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			<span class="caret"></span>
			<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
			<li><a href="{{ URL::to('dashboard/edit') }}/{{ $ds->id_smartphone }}"><i class="glyphicon glyphicon-pencil"></i> Ubah</a></li>
			<li><a href="{{ URL::to('dashboard/delete/') }}/{{ $ds->id_smartphone }}" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></li>
			</ul>
		</div>
	  </div>
	  <div class="col-md-3 col-md-pull-9"><img src="{{ asset('assets/img/sp') }}/{{ $ds->image }}" width="100%" height="100%"></div>
	</div>
	@endforeach
@stop