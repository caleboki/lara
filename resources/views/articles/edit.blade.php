@extends('layouts.master')

@section('content')
	<h1>Edit <i>{!! $article->title !!}</i></h1>

	{!! Form::model($article, ['method' => 'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}
		
		@include ('articles.form', ['submitButtonText' => 'Update Artice'])
	{!! Form::close() !!}

	@include ('errors.list')
	
	
	
@stop




