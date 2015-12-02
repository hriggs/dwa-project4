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
					<label>Sort Stats by...</label><br>
						<select name="stats">
						 	<option value="puzzle">Group Puzzles Together</option>
						 	<option value="first">First to Last Attempt</option>
		 					<option value="last">Last to First Attempt</option>
		 					<option value="fast">Fastest to Slowest Time</option>
		 					<option value="slow">Slowest to Fastest Time</option>
		 					<option value="least">Least Moves First</option>
		 					<option value="most">Most Moves First</option>
						</select>
				</fieldset>
				<input type="submit" name="sort" class="btn submit" value="Sort">
			</form>
		</div>
		<div class="middle">
			<h3>Stats at a glance:</h3>
			<p>Total Puzzles Attempted: Number here</p>
			<p>Fastest Puzzle Solve: Number here</p>
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
    		<th>Was Puzzle Solved?</th>
		</tr>
		@foreach($stats as $stat)
	    	<tr>
	    		<td>{{ $stat->puzzle->title }}</td>
	    		<td>{{ $stat->attempt_num }}</td>
	    		<td>{{ $stat->start_time }}</td>
	    		<td>{{ $stat->end_time }}</td>
	    		<td>{{ $stat->total_time }}</td>
	    		<td>{{ $stat->moves }}</td>
	    		<td>
	    			@if($stat->solved)
	    				Yes
	    		 	@else
        	  			No
        			@endif
	    		</td>
	        </tr>
	    @endforeach
    </table>
@stop