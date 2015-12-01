@extends('layouts.master')

@section('title')
	My Stats
@stop

@section('content')
	<h2>The Stats of {{ $user->username }}</h2>
	
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