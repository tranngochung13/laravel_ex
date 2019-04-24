@extends('layouts.master')

@section('header')
    <h2>Upload Image</h2>
@stop

@section('content')
	@if (Session::has('message'))
	<div class="alert alert-success">
		{!! Session('message') !!}
	</div>
	@endif

     {!! Form::open(array('url'=>'product/upload','method'=>'POST', 'files'=>true, 'class'=>'form-horizontal')) !!}



		<div class="form-group">
		    {!! Form::label('image','Product Image', ['class'=>'control-label col-md-2']) !!}
			<div class="col-md-10">
		    {!! Form::file('file', null) !!}
			<span class="text-danger">{!! $errors->has('file')?$errors->first('file'):'' !!}</span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
			</div>
		</div>
		{!! Form::close() !!}
		</div>
@stop