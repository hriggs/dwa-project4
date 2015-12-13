@extends('layouts.master')

@section('title')
	The Endangered Miners
@stop

@section('head')
	<link href="/css/miners.css" type="text/css" rel="stylesheet">
@stop

@section('content')
	<h2>The Endangered Miners</h2>
	<div id="left">
		<h3>Directions:</h3>
		<p class="directions">Four miners have just been trapped in a mine cavern that 
		will collapse in exactly 15 minutes! The tunnel leading to safety requires 
		a lantern to traverse safely. The miners can traverse in the following times:</p>
		<div class="directions"> 
			<ol>
				<li>Onika - 1 minute</li>
				<li>Twitch - 2 minutes</li>
				<li>Fiona - 4 minutes</li>
				<li>Edward - 8 minutes</li>
			</ol>
		</div>
		<p class="directions">
		One to two miners can traverse the tunnel at once. 
		Click the "Traverse Tunnel" button to move the miners. 
		When two miners traverse at once, they will move at the 
		pace of the slowest miner. 
		<br>
		<br>
		To (re)start the game press the button below!
		</p>
		<form>
			{!! csrf_field() !!}
			<input type="radio" name="gender" value="male" checked>Male
			<br>
			<input type="radio" name="gender" value="female">Female
			<br>
			Theme:<br>
			<select id="select">
				<option>Fox/Chicken/Grain</option>
				<option>Panther/Pig/Porridge</option>
				<option>Wolf/Sheep/Cabbage</option>
				<option>Fox/Goose/Beans</option>
			</select>
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
			<button id="crossBtn" type="button">Traverse Tunnel</button>
		</div>
	</div>
	<div id="right">
		<h3>Steps:</h3>
		<ol id="steps">
		</ol>
	</div>
	<div class="clearFix"></div>
@stop

@section('js')
	<script src="/js/miners.js"></script>	
@stop