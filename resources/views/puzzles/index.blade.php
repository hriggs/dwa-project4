@extends('layouts.master')

@section('title')
	Puzzles List
@stop

@section('content')
	<div class="puzzles">
		<h2>Play Now!</h2>
		@foreach($created_puzzles as $puzzle)
	        <div class="puzzle">
	            <h3>{{ $puzzle->title }}</h3>
				<img src="{{ $puzzle->img_path }}" alt="Puzzle image. ">
				<p>{{ $puzzle->description }}</p>
				<p>Creator: {{ $puzzle->creator }}</p>
				<p>Creation date: {{ $puzzle->creation_date }}</p>
				<p>How to play: {{ $puzzle->directions }}</p>
				<a class="btn btn-puzzle" href="/">Play {{ $puzzle->title }}</a>
	        </div>
	    @endforeach
	    
	   	<h2>Coming Soon!</h2>
		@foreach($not_created_puzzles as $puzzle)
	        <div class="puzzle">
	            <h3>{{ $puzzle->title }}</h3>
				<img src="{{ $puzzle->img_path }}" alt="Puzzle image. ">
				<p>{{ $puzzle->description }}</p>
				<p>Creator: {{ $puzzle->creator }}</p>
				<p>Creation date: {{ $puzzle->creation_date }}</p>
				<p>How to play: {{ $puzzle->directions }}</p>
	        </div>
	    @endforeach
	</div>
@stop