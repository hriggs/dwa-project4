@extends('layouts.master')

@section('title')
	The River Crossing Puzzle
@stop

@section('head')
	<link href="/css/river-crossing.css" type="text/css" rel="stylesheet">
@stop

@section('content')
	<h2>The River Crossing Puzzle</h2>
	<div id="left">
		<h3>Directions:</h3>
		<p id="directions">A farmer must bring three items
		across the river (he must be on the raft to go across). The top item may not be left alone
		with the middle item and the middle item may not be
		left alone with the last.
		<br>
		<br>
		The farmer may only take one item across at a time. Click an item to move it onto/off the raft.
		To win, all four characters must be on the right bank.
		<br>
		<br>
		Customize your game below. To (re)start the game press the button
		below!
		</p>
		<br>
		<h3>Customize:</h3>
		<form>
			Play as:<span class="error" id="genderError"> Please select a gender.</span><br>
			<input type="radio" name="gender" value="male">Male
			<br>
			<input type="radio" name="gender" value="female">Female
			<br>
			<br>
			Theme:<br>
			<select id="select">
				<option>Fox/Chicken/Grain</option>
				<option>Panther/Pig/Porridge</option>
				<option>Wolf/Sheep/Cabbage</option>
				<option>Fox/Goose/Beans</option>
			</select>
			<br>
			<br>
			<button id="startBtn" type="button">Restart</button>
		</form>
	</div>
	<div id="center" class="extraSpace">
		<div id="playerMsg"></div>
			<div id="canvas">
				<div id="endText"></div>
				<div id="charsInit">
					<div class="character" id="farmerLeft">
						<img src="" alt="" id="farmerImg">
					</div>
					<div class="character" id="aLeft">
						<img src="" alt="" id="aImg">
					</div>
					<div class="character" id="bLeft">
						<img src="" alt="" id="bImg">
					</div>
					<div class="character" id="cLeft">
						<img src="" alt="" id="cImg">
					</div>
				</div>
				<div id="raft">
					<div id="farmerSpot"></div>
					<div id="passengerSpot"></div>
				</div>
				<div id="rightBank">
					<div class="character" id="farmerRight">
					</div>
					<div class="character" id="aRight">
					</div>
					<div class="character" id="bRight">
					</div>
					<div class="character" id="cRight">
					</div>
				</div>
				<div class="clearFix"></div>
			</div>
		<div>
			<button id="crossBtn" type="button">Cross River</button>
		</div>
	</div>
	<div id="right" class="extraSpace">
		<h3>Steps:</h3>
		<br>
		<ol id="steps">
		</ol>
	</div>
	<div class="clearFix"></div>
@stop

@section('js')
	<script src="/js/river-crossing.js"></script>	
@stop