@extends('layouts.master')

@section('title')
	My Profile
@stop

@section('content')
	<h2>Welcome user!</h2>
	<p>*Cannot be left blank</p>
	<p>Leave password fields blank if you wish to keep your previous password.<br>Password not shown for security reasons.</p>
	<form method="POST" action="/profile" class="join">
		{!! csrf_field() !!}
		<fieldset>
			<label>Username:*</label><br>
			<input type="text" name="username" class="form-box" value='{{$user->username}}' required>
		</fieldset>
		@if($errors->get('username'))
			<ul>
				@foreach($errors->get('username') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>Password:</label><br>
			<input type="password" name="password" class="form-box" required>
		</fieldset>
		@if($errors->get('password'))
			<ul>
				@foreach($errors->get('password') as $error)
 						<li><span class="error">{{ $error }}</span></li>
				@endforeach
			</ul>
		@endif
		<fieldset>
			<label>Confirm Password:</label><br>
			<input type="password" name="password_confirmation" class="form-box" required>
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
			<input type="text" name="name" class="form-box" value='{{$user->name}}' required>
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
			<input type="text" name="email" class="form-box" value='{{$user->email}}' required>
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
			<input type="text" name="city" class="form-box" value='{{$user->city}}'>
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
			<select>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>
		</fieldset>
		<fieldset>
			<label>Country:</label><br>
			<input type="text" name="country" class="form-box" value='{{$user->country}}'>
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
	</form>
@stop