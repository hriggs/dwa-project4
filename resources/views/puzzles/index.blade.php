@extends('layouts.master')

@section('title')
	Puzzles List
@stop

@section('content')
	<div class="puzzles">
		<h2>Play Now!</h2>
		<p>You must be logged in for your scores to be recorded.</p>
		<br>
		@foreach($created_puzzles as $puzzle)
	        <div class="puzzle">
	            <h3>{{ $puzzle->title }}</h3>
				<img src="{{ $puzzle->image_path }}" alt="Puzzle image. " class="img-thumbnail img-responsive">
				<p><span class="header">What it is:</span><br>{{ $puzzle->description }}</p>
				<p><span class="header">Creator:</span><br>{{ $puzzle->creator }}</p>
				<p><span class="header">Creation Date:</span><br>{{ $puzzle->creation_date == 0 ? "Unknown" : $puzzle->creation_date }}</p>
				<p><span class="header">How to Play:</span><br>{{ $puzzle->directions }}</p>
				<a class="btn btn-puzzle" href="{{ $links[$puzzle->title] }}">Play {{ $puzzle->title }}</a>
	        </div>
	    @endforeach
	    
	   	<h2>Coming Soon!</h2>
		@foreach($not_created_puzzles as $puzzle)
	        <div class="puzzle">
	            <h3>{{ $puzzle->title }}</h3>
				<img src="{{ $puzzle->image_path }}" alt="Puzzle image. " class="img-thumbnail img-responsive">
				<p><span class="header">What it is:</span><br>{{ $puzzle->description }}</p>
				<p><span class="header">Creator:</span><br>{{ $puzzle->creator }}</p>
				<p><span class="header">Creation Date:</span><br>{{ $puzzle->creation_date == 0 ? "Unknown" : $puzzle->creation_date }}</p>
				<p><span class="header">How to Play:</span><br>{{ $puzzle->directions }}</p>
	        </div>
	    @endforeach
	</div>
@stop