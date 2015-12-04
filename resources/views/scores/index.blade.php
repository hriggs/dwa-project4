@extends('layouts.master')

@section('title')
	High Scores
@stop

@section('content')
	<h2>High Scores - Top 20</h2>
	
	@if(count($gamesessions) > 0)
			<div class="sort">
			    <form method="POST" action="/high-scores">
					{!! csrf_field() !!}
					<fieldset>
						<label>See High Scores for:</label><br>
							<select name="stats">
								@foreach($puzzle_titles as $title)
									<option value="{{ $title }}">{{ $title }}</option>
								@endforeach
							</select>
					</fieldset>
					<fieldset>
						<label>Sort by:</label><br>
							<select name="stats">
							 	<option value="first">Fastest Time</option>
			 					<option value="last">Least Number of moves</option>
							</select>
					</fieldset>
					<input type="submit" name="sort" class="btn submit" value="Sort">
				</form>
			</div>
		<table>
			<tr>
				<th>Ranking</th>
			    <th>User</th>
	    		<th>Puzzle</th>		
	    		<th>Thing Counted</th>
	    		<th>Other thing</th>
			</tr>
			@foreach($gamesessions as $session)
		    	<tr>
		    		<td>{{ ++$ranking }}</td>
		    		<td>{{ $usernames[$ranking] }}</td>
		    		<td>{{ $session->puzzle->title }}</td>
		    		<td>{{ $session->total_time }}</td>
		    		<td>{{ $session->moves }}</td>
		        </tr>
		    @endforeach
	    </table>
	@else
		<div class="page-link">
			<p>There are no high scores yet! <a href="/register">Join</a> to get on the high score board!</p>
		</div>
	@endif
@stop