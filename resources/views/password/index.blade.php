@extends('layouts.master')

@section('title')
	Change Password
@stop

@section('content')
	<h2>Change Password</h2>
	<p>Password not shown for security reasons.</p>
    <form method="POST" action="/change-password" class="join">
		{!! csrf_field() !!}
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
	<input type="submit" name="change_pw" class="btn submit" value="Change Password">
</form>
@stop