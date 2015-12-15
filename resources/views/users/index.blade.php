@extends('layouts.master')

@section('title')
	My Stats
@stop

@section('content')
	@if(isset($user)) 
		<h2>View PuzzleLit User: {{ $user->username }}</h2>
		<p><span class="header">Name:</span><br>{{ $user->name }}</p>
		<p><span class="header">City:</span><br>{{ $user->city }}</p>
		<p><span class="header">State:</span><br>{{ $user->state }}</p>
		<p><span class="header">Country:</span><br>{{ $user->country }}</p>
		<p><span class="header">Bio:</span><br>{{ $user->bio }}</p>
	@else
		<p>A valid username was not at the end of the URL!</p>
		<div class="page-link">
			<p>Please visit the <a href="/high-scores">high scores page</a> to find some users.</p>
		</div>
	@endif
@stop