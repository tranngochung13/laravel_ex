@extends('layouts.master')

@section('header')
    <h2>Edit Blog</h2>
@stop

@section('content')
    {!! Form::model($blog, ['route'=>['blog.update', $blog->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                {!! $errors->has('title')?$errors->first('title'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                {!! $errors->has('description')?$errors->first('description'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'name', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::textarea('name', null, ['class'=>'form-control']) !!}
                {!! $errors->has('name')?$errors->first('name'):'' !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop