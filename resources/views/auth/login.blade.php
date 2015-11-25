@extends('layouts.master')

@section('content')
	<div class="page-link">
    	<p>Don't have an account? <a href='/register'>Register here...</a></p>
    </div>

    <h2>Login</h2>
    <p>*Required</p>
    
    <form method="POST" action="/login" class="join">
		{!! csrf_field() !!}
		<fieldset> 
			<label for='email'>Email*</label><br>
            <input type='text' name='email' class="form-box" id='email' value='{{ old('email') }}' required><br>
		</fieldset>
			@if($errors->get('email'))
    			<ul>
        			@foreach($errors->get('email') as $error)
         				<li><span class="error">{{ $error }}</span></li>
        			@endforeach
    					</ul>
			@endif
		<fieldset>
			<label>Password:*</label><br>
			<input type="password" name="password" class="form-box" value='{{ old('password') }}' required>
		</fieldset>
			@if($errors->get('password'))
    			<ul>
        			@foreach($errors->get('password') as $error)
         				<li><span class="error">{{ $error }}</span></li>
        			@endforeach
    					</ul>
					@endif
		<input type="submit" name="log_in" class="btn submit" value="Log In">
	</form>
@stop