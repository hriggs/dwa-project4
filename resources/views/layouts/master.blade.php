<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to "PuzzleLit" --}}
        @yield("title","PuzzleLit")
    </title>

    <meta charset="utf-8">
    <link href="/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
    <link href="/css/styles.css" type="text/css" rel="stylesheet">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield("head")
</head>
<body>
    @if(\Session::has('flash_message'))
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif
    
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="Gamelit logo."></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/puzzles">Puzzles</a></li>
            <li><a href="/high-scores">High Scores</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	@if(Auth::check())
           		<li class="dropdown">
              		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User {{ $user->username }} <span class="caret"></span></a>
              		<ul class="dropdown-menu logged-in">
                		<li><a href="/profile">My Profile</a></li>
                		<li><a href="/stats">My Stats</a></li>
                		<li><a href="/change-password">Change Password</a></li>
                		<li><a href="/logout">Logout</a></li>
              		</ul>
            	</li>
        	@else
        	  	<li><a href="/login">Log in</a></li>
        	  	<li><a href="/register">Join</a></li>
        	@endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>	

	<div class="container-fluid wrapper"> 
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 content">
				<h1>PuzzleLit</h1>
    			<div>
        			{{-- Main page content will be yielded here --}}
        			@yield('content')
    			</div>
    		</div> <!-- end content -->
    		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
   		</div> <!-- end row of all content -->
   		<div class="push"></div>
	</div> <!-- end container-fluid -->
	<footer>
    	Copyright &copy; {{ date('Y') }} Hannah Riggs <br>
   	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>	
   @yield("js")
</body>
</html>