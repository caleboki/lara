@extends('layouts.master')

@section('content')
	<h1>Articles</h1>
	<hr/>
	@foreach ($articles as $article)
	<article>
		<h4>

		<a href="{{ url('/articles', $article->id)}}"> {{$article->title}}</h4> </a>

		<div class="body">{{$article->body}}</div>
		<br>
	</article>
	
	@endforeach
@endsection	




