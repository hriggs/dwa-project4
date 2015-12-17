@extends('layouts.master')

@section('content')
	
	<div class="page-link">
    	<p>Already have an account? <a href='/login'>Login here...</a></p>
    </div>

    <h2>Register</h2>
    <p>*Required</p>
    
	<form method="POST" action="/register" class="join">
		{!! csrf_field() !!}
		<fieldset>
			<label>Username:*</label><br>
			<p><span class="form-details">Must be less than 20 characters and may not contain spaces</span></p>
			<input type="text" name="username" class="form-box" value='{{ old('username') }}' maxlength="20" required>
		</fieldset>
		@if($errors->get('username'))
			<ul>
				@foreach($errors->get('username') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>Password:*</label><br>
			<p><span class="form-details">Must be at least 6 characters</span></p>
			<input type="password" name="password" class="form-box" maxlength="60" required>
		</fieldset>
		@if($errors->get('password'))
			<ul>
				@foreach($errors->get('password') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>Confirm Password:*</label><br>
			<input type="password" name="password_confirmation" class="form-box" maxlength="60" required>
		</fieldset>
		@if($errors->get('password'))
			<ul>
				@foreach($errors->get('password') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>Name:*</label><br>
			<input type="text" name="name" class="form-box" value='{{ old('name') }}' maxlength="255" required>
		</fieldset>
		@if($errors->get('name'))
			<ul>
				@foreach($errors->get('name') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>E-mail:*</label><br>
			<input type="text" name="email" class="form-box" value='{{ old('email') }}' maxlength="255" required>
		</fieldset>
		@if($errors->get('email'))
			<ul>
				@foreach($errors->get('email') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>City:</label><br>
			<input type="text" name="city" class="form-box" value='{{ old('city') }}' maxlength="255">
		</fieldset>
		@if($errors->get('city'))
			<ul>
				@foreach($errors->get('city') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>State:</label><br>
				<select name="state">
					@foreach($states as $state)
 						<option value="{{ $state }}" {{ old('state') == $state ? "selected" : ''}}>{{ $state }}</option>
					@endforeach	
				</select>
		</fieldset>
		<fieldset>
			<label>Country:</label><br>
			<input type="text" name="country" class="form-box" value='{{ old('country') }}' maxlength="255">
		</fieldset>
		@if($errors->get('country'))
			<ul>
				@foreach($errors->get('country') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>Bio:</label><br>
			<textarea name="bio" value='{{ old('bio') }}'>{{ old('bio') }}</textarea><br>
		</fieldset>
		<input type="submit" name="join" class="btn submit" value="Join">
	</form>
@stop