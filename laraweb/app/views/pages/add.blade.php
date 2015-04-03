@extends('layouts.default')

@section('content')
	{{ Form::open(array('action'=>'DashboardController@saveData','files'=>true)) }}

		{{Form::label('nama', 'Nama/Type') }}
		{{Form::text('nama', '', array('class' => 'form-control','placeholder'=>'contoh : X2-00,Galaxy Mini'))}}

		{{Form::label('kategori', 'Kategori/Level') }}
		<select class="form-control" name='kategori'>
			<option value="0" selected="selected">--Pilih Level--</option>
			@foreach($categories as $cat)
			<option value="{{ $cat->id_category }}">{{ $cat->category }}</option>
			@endforeach
		</select>

		{{Form::label('merk', 'Merk') }}
		<select class="form-control" name='merk'>
			<option value="0" selected="selected">--Pilih Merk--</option>
			@foreach($brands as $bren)
			<option value="{{ $bren->id_brand }}">{{ $bren->brand }}</option>
			@endforeach
		</select>

		{{Form::label('os', 'Sistem Operasi') }}
		<select class="form-control" name='os'>
			<option value="0" selected="selected">--Pilih Sistem Operasi Ponsel--</option>
			@foreach($ostypes as $os)
			<option value="{{ $os->id_ostype }}">{{ $os->ostype }}</option>
			@endforeach
		</select>

		{{Form::label('deskripsi', 'Deskripsi') }}
		{{Form::textarea('deskripsi', '', array('class' => 'form-control'))}}

		{{Form::label('foto', 'Foto') }}
		{{Form::file('foto')}}

		
		{{Form::label('harga', 'Harga') }}
		<div class="input-group">
		<div class="input-group-addon">Rp</div>
		{{Form::text('harga', '', array('class' => 'form-control','placeholder'=>'contoh:1500000'))}}
		</div>

		<hr/>

		<a href="{{ URL::to('/') }}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		{{Form::submit('Simpan', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
@stop