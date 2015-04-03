@extends('layouts.default')

@section('content')
	{{ Form::open(array('action'=>'DashboardController@saveDataMerk','files'=>false)) }}

		{{Form::label('nama', 'Nama Merk') }}
		{{Form::text('merk', '', array('class' => 'form-control','placeholder'=>'contoh : Samsung, Asus dll.'))}}

		<hr/>

		<a href="{{ URL::to('/') }}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		{{Form::submit('Simpan', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
@stop