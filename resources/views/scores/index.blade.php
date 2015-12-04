@extends('layouts.master')

@section('title')
	High Scores
@stop

@section('content')
	<h2>High Scores</h2>
	
	@if(count($gamesessions) > 0)
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
		    		{{ $ranking }}
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