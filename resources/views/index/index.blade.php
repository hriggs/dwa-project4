@extends('layouts.master')

@section('subheading')
	What is Developer's Best Friend?
@stop

@section('description')
<div class="justify">
	Developer's Best Friend contains three tools that a developer may need when developing a project. 
	<ol>
		<li>First, it contains a lorem ipsum generator tool which allows the user to specify how many paragraphs
		to generate, along with a variety of other options including the ability to have headers present, 
		various types of lists present, or bold and italic text.</li> 
		<li>It also includes a random user data generator tool which allows the user to generate data for the number of users of their chosing. This tools also
		allows for extra optional data to be generated.</li> 
		<li>Finally, the app contains a xkcd password generator tool.</li>
	</ol>
	</div>
@stop

@section('content')
	<div class="container-fluid"> 
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-4"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
				<img src="/images/icon.png" class="img-responsive" alt="Tentacle icon."><br>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-4"></div>
		</div> <!-- end row --> 
		
		<div class="clearfix"></div>
		
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<div class="col-lg-10 col-md-10 buttons">
				   <a href="/lorem-ipsum" class="btn btn-primary home-button">Lorem Ipsum Generator</a>
				   <div class="br-home"><br></div>
   				<a href="/random-user" class="btn btn-primary home-button">Random User Generator</a>
   				<div class="br-home"><br></div>
   				<a href="/password" class="btn btn-primary home-button">xkcd Password Generator</a>
   		</div>
			<div class="col-lg-1 col-md-1"></div>
		</div> <!-- end row --> 
	</div> <!-- end container-fluid -->
@stop