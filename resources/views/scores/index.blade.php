@extends('layouts.master')

@section('title')
	High Scores
@stop

@section('content')
	<h2>High Scores - Top 20</h2>
	<div class="sort">
	    <form method="POST" action="/high-scores">
			{!! csrf_field() !!}
			<fieldset>
				<label>See High Scores for:</label><br>
					<select name="puzzle">
						@foreach($puzzle_titles as $title)
							<option value="{{ $title }}" {{ $data[$title] }}>{{ $title }}</option>
						@endforeach
					</select>
			</fieldset>
			<fieldset>
				<label>Sort by:</label><br>
					<select name="criteria">
					 	<option value="total_time" {{ $data["total_time"] }}>Fastest Time</option>
	 					<option value="moves" {{ $data["moves"] }}>Least Number of moves</option>
					</select>
			</fieldset>
			<input type="submit" name="sort" class="btn submit" value="Sort">
		</form>
	</div>
	
	@if(count($gamesessions) > 0)
		<table>
			<tr>
				<th>Ranking</th>
			    <th>User</th>
	    		<th>Puzzle</th>		
	    		<th>{{ $headers[0] }} {{ $headers[0] == "Time" ? "in Minutes" : ""}}</th>
	    		<th>{{ $headers[1] }} {{ $headers[1] == "Time" ? "in Minutes" : ""}}</th>
			</tr>
			@foreach($gamesessions as $session)
		    	<tr>
		    		<td>{{ ++$ranking }}</td>
		    		<td class="page-link"><a href="/users/{{ $usernames[$ranking] }}">{{ $usernames[$ranking] }}</a></td>
		    		<td>{{ $session->puzzle->title }}</td>
			    		@if ( $headers[0] == "Time")
	    					<td>{{ $session->total_time }}</td>
		    				<td>{{ $session->moves }}</td>
						@else
		    				<td>{{ $session->moves }}</td>
		    				<td>{{ $session->total_time }}</td>
						@endif
		        </tr>
		    @endforeach
	    </table>
	@else
		<div class="page-link">
			<p>There are no high scores for this puzzle yet!</p>
			<p>If you've already <a href="/register">joined</a> then pick one of the <a href="/puzzles">puzzles</a> and start playing to get on the high score board!</p>
		</div>
	@endif
@stop