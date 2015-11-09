@extends('layouts.master')

@section('content')
	<div class="container-fluid main-content">
		<div class="row">
			<div class="col-lg-2 col-md-1 col-sm-1"></div>
			<div class="col-lg-5 col-md-5 col-sm-5">
				<h2>Log in</h2>
				<p>*Required</p>
				<form method="POST" action="/unknown-yet" class="join">
					<input type='hidden' name='_token' value='{{ csrf_token() }}'>
					<label>Username:*</label><br>
					<input type="text" name="username" class="form-box" required><br>
					<label>Password:*</label><br>
					<input type="text" name="password" class="form-box" required><br>
					<input type="submit" class="btn submit" value="Log In">
				</form>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5">
				<h2>Join Gamelit</h2>
				<p>*Required</p>
				<form method="POST" action="/unknown-yet" class="join">
					<input type='hidden' name='_token' value='{{ csrf_token() }}'>
					<input type='hidden' name='_token' value='{{ csrf_token() }}'>
					<label>Username:*</label><br>
					<input type="text" name="username-join" class="form-box" required><br>
					<label>Password:*</label><br>
					<input type="text" name="password-join" class="form-box" required><br>
					<label>Name:*</label><br>
					<input type="text" name="name" class="form-box" required><br>
					<label>E-mail:*</label><br>
					<input type="text" name="email" class="form-box" required><br>
					<label>City:</label><br>
					<input type="text" name="city" class="form-box"><br>
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
					</select><br>
					<label>Country:</label><br>
					<input type="text" name="country" class="form-box"><br>
					<label>Bio:</label><br>
					<textarea name="bio">About me...</textarea><br>
					<input type="submit" class="btn submit" value="Join">
				</form>
			</div>
		</div>
	</div>
@stop