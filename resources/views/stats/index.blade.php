@extends('layouts.master')

@section('title')
	My Stats
@stop

@section('content')
	<h2>The Stats of {{ $user->username }}</h2>
	
	@if(count($stats) > 0)
		<div class="sort">
			<div class="small">
			    <form method="POST" action="/stats">
					{!! csrf_field() !!}
					<fieldset>
						<label>Sort Stats by...</label><br>
							<select name="stats">
							 	<option value="first">First to Last Attempt</option>
			 					<option value="last">Last to First Attempt</option>
			 					<option value="fast">Fastest to Slowest Time</option>
			 					<option value="slow">Slowest to Fastest Time</option>
			 					<option value="least">Least to Most Moves</option>
			 					<option value="most">Most to Least Moves</option>
	 							<option value="puzzle">Group Puzzles Together</option>
							</select>
					</fieldset>
					<input type="submit" name="sort" class="btn submit" value="Sort">
				</form>
			</div>
		<div class="middle">
			<h3>Stats at a Glance:</h3>
			<p>Total Puzzles Solved: Number here</p>
			<p>Fastest Time: Number here</p>
			<p>Least Number of Moves: Number here</p>
		</div>
		<div class="small">
			<h3>Want to delete your stats?</h3>
			<form  method="POST" action="/stats">
				{!! csrf_field() !!}
				<input type="submit" name="delete" class="btn submit" value="Delete All Stats">
			</form>
		</div>
		<div class="clearfix"></div>
		</div>
		<table>
			<tr>
			    <th>Puzzle</th>
	    		<th>Attempt Number</th>		
	    		<th>Start Time</th>
	    		<th>End Time</th>
	    		<th>Total Time</th>
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
			<p>You have no game stats yet! <a href="/puzzles">Solve a puzzle</a> to get some stats...</p>
		</div>
	@endif
@stop