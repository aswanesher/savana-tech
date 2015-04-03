@extends('layouts.default')

@section('content')
	@foreach($getsp as $gt)
	{{ Form::open(array('action'=>'DashboardController@editData','files'=>true)) }}

		{{Form::hidden('id', $gt->id_smartphone)}}

		{{Form::label('nama', 'Nama/Type') }}
		{{Form::text('nama', $gt->type, array('class' => 'form-control','placeholder'=>'contoh : X2-00,Galaxy Mini'))}}

		{{Form::label('kategori', 'Kategori/Level') }}
		<select class="form-control" name='kategori'>
			<option value="0">--Pilih Level--</option>
			@foreach($categories as $cat)
			<option value="{{ $cat->id_category }}" <?php if($gt->category_id==$cat->id_category){echo'selected="selected"';}else{} ?>>{{ $cat->category }}</option>
			@endforeach
		</select>

		{{Form::label('merk', 'Merk') }}
		<select class="form-control" name='merk'>
			<option value="0">--Pilih Merk--</option>
			@foreach($brands as $bren)
			<option value="{{ $bren->id_brand }}" <?php if($gt->brand_id==$bren->id_brand){echo'selected="selected"';}else{} ?>>{{ $bren->brand }}</option>
			@endforeach
		</select>

		{{Form::label('os', 'Sistem Operasi') }}
		<select class="form-control" name='os'>
			<option value="0">--Pilih Sistem Operasi Ponsel--</option>
			@foreach($ostypes as $os)
			<option value="{{ $os->id_ostype }}" <?php if($gt->ostype_id==$os->id_ostype){echo'selected="selected"';}else{} ?>>{{ $os->ostype }}</option>
			@endforeach
		</select>

		{{Form::label('deskripsi', 'Deskripsi') }}
		{{Form::textarea('deskripsi', $gt->description, array('class' => 'form-control'))}}

		{{Form::label('foto', 'Foto') }}
		{{Form::file('foto')}}

		
		{{Form::label('harga', 'Harga') }}
		<div class="input-group">
		<div class="input-group-addon">Rp</div>
		{{Form::text('harga', $gt->price, array('class' => 'form-control','placeholder'=>'contoh:1500000'))}}
		</div>

		<hr/>

		<a href="{{ URL::to('/') }}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		{{Form::submit('Simpan', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
	@endforeach
@stop