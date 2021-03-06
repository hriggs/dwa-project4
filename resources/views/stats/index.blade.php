@extends('layouts.master')

@section('title')
	My Stats
@stop

@section('content')
	<h2>The Stats of {{ $user->username }}</h2>
	
	<div class="sort">
		<div class="small">
		    <form method="POST" action="/stats">
				{!! csrf_field() !!}
				<fieldset>
					<label>See stats for:</label><br>
						<select name="puzzle">
							@foreach($puzzle_titles as $title)
								<option value="{{ $title }}" {{ $data[$title] }}>{{ $title }}</option>
							@endforeach
						</select>
				</fieldset>
				<fieldset>
					<label>Sort Stats by:</label><br>
						<select name="criteria">
						 	<option value="first" {{ $data["first"] }}>First to Last Attempt</option>
		 					<option value="last" {{ $data["last"] }}>Last to First Attempt</option>
		 					<option value="fast" {{ $data["fast"] }}>Fastest to Slowest Time</option>
		 					<option value="slow" {{ $data["slow"] }}>Slowest to Fastest Time</option>
		 					<option value="least" {{ $data["least"] }}>Least to Most Moves</option>
		 					<option value="most" {{ $data["most"] }}>Most to Least Moves</option>
						</select>
				</fieldset>
				<input type="submit" name="sort" class="btn submit" value="Sort">
			</form>
		</div>
	<div class="middle">
		<h3>Stats at a Glance:</h3>
		<p>Total Puzzles Solved: {{ $glance_stats["puzzles_solved"] }}</p>
		<p>Fastest Time in Minutes: {{ $glance_stats["puzzles_solved"] == 0 ? "N/A" : $glance_stats["min_time"] }}</p>
		<p>Least Number of Moves: {{ $glance_stats["puzzles_solved"] == 0 ? "N/A" : $glance_stats["min_moves"] }}</p>
	</div>
	<div class="small">
		<h3>Want to delete your stats?</h3>
		<form  method="POST" action="/stats">
			{!! csrf_field() !!}
			<fieldset>
				<label>Delete stats for:</label><br>
					<select name="delete_stats">
						@foreach($puzzle_titles as $title)
							<option value="{{ $title }}" {{ $delete_data[$title] }}>{{ $title }}</option>
						@endforeach
					</select>
			</fieldset>
			<input type="submit" name="delete" class="btn submit" value="Delete Stats">
		</form>
	</div>
	<div class="clearfix"></div>
	</div>
	
	@if(isset($stats) && count($stats) > 0)
		<table class="stats">
			<tr>
			    <th>Puzzle</th>
	    		<th>Attempt Number</th>		
	    		<th>Start Time</th>
	    		<th>End Time</th>
	    		<th>Total Time in Minutes</th>
	    		<th>Total Moves</th>
			</tr>
			@foreach($stats as $stat)
		    	<tr>
		    		<td>{{ $stat->puzzle->title }}</td>
		    		<td>{{ $stat->attempt_num }}</td>
		    		<td>{{ $stat->start_time }}</td>
		    		<td>{{ $stat->end_time }}</td>
		    		<td>{{ $stat->total_time }}</td>
		    		<td>{{ $stat->moves }}</td>
		        </tr>
		    @endforeach
	    </table>
	@else
		<div class="page-link">
			@if(isset($delete_message)) 
				<p><span class="stat-msg">{{$delete_message}}</span></p>
			@endif
			<p>You have no game stats for this game yet! <a href="/puzzles">Solve a puzzle</a> to get some stats...</p>
		</div>
	@endif
@stop