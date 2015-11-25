@extends('layouts.master')

@section('content')
	<p>Play games and solve puzzles! <br>
	Join and login if you want your progress to be tracked or play anonymously.</p>
	<div class="container-fluid main-content">
		<div class="row">
			<div class="col-lg-7 col-md-7">
				<a href="/puzzles" class="btn btn-primary home-button">Play Now</a>
				<div class="or">
					<p>or</p>
				</div>
				<a href="/login" class="btn btn-primary home-button">Log in</a>
				<div class="or">
					<p>or</p>
				</div>
				<a href="/register" class="btn btn-primary home-button">Join</a>
			</div>
			<div class="col-lg-5 col-md-5">
				<img src="/images/jigsaw.png" alt="Jigsaw puzzle image." class="img-responsive jigsaw">
			</div>
		</div>
	</div>
@stop