@extends('layouts.master')

@section('content')
	<h1>{{$article->title}}</h1>
	<hr/>
	<article>
		{{ $article->body}}
	</article>

	@unless ($article->tags->isEmpty())
	<h5>Tags:</h5>
	<ul>

		@foreach ($article->tags as $tag)

			<li>{{ $tag->name }} </li>

		@endforeach


	</ul>
	@endunless
	@if (Auth::check())
	<br>
			
    <div class="col-md-16 col-md-offset-4">
    
    {!! Form::open(['method' => 'DELETE', 'route'=> ['articles.destroy', $article->id]]) !!}
    <a href={{ url('articles/'.$article->id, ['edit']) }}>Edit Article</a>
    {!! Form::submit ('Delete Article', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

                                
    </div>
    @endif
                        
		
	
	
	
@stop




