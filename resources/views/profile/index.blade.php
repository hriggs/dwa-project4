@extends('layouts.master')

@section('title')
	My Profile
@stop

@section('content')
	<h2>Welcome {{ $user->name }}!</h2>
	<p>*Required</p>
	<p>Leave both password fields blank if you wish to keep your previous password.<br>Password not shown for security reasons.</p>
	<form method="POST" action="/profile" class="join">
		{!! csrf_field() !!}
		<fieldset>
			<label>Username:*</label><br>
			<p><span class="form-details">Must be less than 20 characters</span></p>
			<input type="text" name="username" class="form-box" value='{{$user->username}}' maxlength="20" required>
		</fieldset>
		@if($errors->get('username'))
			<ul>
				@foreach($errors->get('username') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>Name:*</label><br>
			<input type="text" name="name" class="form-box" value='{{$user->name}}' maxlength="255" required>
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
			<input type="text" name="email" class="form-box" value='{{$user->email}}' maxlength="255" required>
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
			<input type="text" name="city" class="form-box" value='{{$user->city}}' maxlength="255">
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
					{{ $selected = ($user->state == $state) ? 'selected' : '' }}
 					<option value="{{ $state }}" {{ $selected}}>{{ $state }}</option>
				@endforeach	
			</select>
		</fieldset>
		<fieldset>
			<label>Country:</label><br>
			<input type="text" name="country" class="form-box" value='{{$user->country}}' maxlength="255">
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
			<textarea name="bio" value='{{$user->bio}}'>{{$user->bio}}</textarea><br>
		</fieldset>
		<input type="submit" name="update" class="btn submit" value="Update Profile">
	</form>
@stop