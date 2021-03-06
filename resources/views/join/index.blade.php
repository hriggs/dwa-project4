@extends('layouts.master')

@section('title')
	Join GameLit
@stop

@section('content')
	<div class="center">
			<div class="left">
				<h2>Log in</h2>
				<p>*Required</p>
				<form method="POST" action="/login" class="join">
					<input type='hidden' name='_token' value='{{ csrf_token() }}'>
					<fieldset> 
						<label>Username:*</label><br>
						<input type="text" name="username" class="form-box" value='{{ old('username') }}' required><br>
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
						<input type="text" name="password" class="form-box" value='{{ old('password') }}' required>
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
			</div>
			<div class="right">
				<h2>Join GameLit</h2>
				<p>*Required</p>
				<form method="POST" action="/register" class="join">
					<input type='hidden' name='_token' value='{{ csrf_token() }}'>
					<fieldset>
						<label>Username:*</label><br>
						<input type="text" name="username-join" class="form-box" value='{{ old('username-join') }}' required>
					</fieldset>
					@if($errors->get('username-join'))
    					<ul>
        					@foreach($errors->get('username-join') as $error)
         						<li><span class="error">{{ $error }}</span></li>
        					@endforeach
    					</ul>
					@endif
					<fieldset>
						<label>Password:*</label><br>
						<input type="text" name="password-join" class="form-box" value='{{ old('password-join') }}' required>
					</fieldset>
					@if($errors->get('password-join'))
    					<ul>
        					@foreach($errors->get('password-join') as $error)
         						<li><span class="error">{{ $error }}</span></li>
        					@endforeach
    					</ul>
					@endif
					<fieldset>
						<label>Name:*</label><br>
						<input type="text" name="name" class="form-box" value='{{ old('name') }}' required>
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
						<input type="text" name="email" class="form-box" value='{{ old('email') }}' required>
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
						<input type="text" name="city" class="form-box" value='{{ old('city') }}'>
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
						<input type="text" name="country" class="form-box" value='{{ old('country') }}'>
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
						<textarea name="bio" value='{{ old('bio') }}'>About me...</textarea><br>
					</fieldset>
					<input type="submit" name="join" class="btn submit" value="Join">
				</form>
			</div>
			<div class="clearfix"></div>
	</div>
@stop