<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class RiverCrossingController extends Controller {
	
  /**
	* Construct function
	*/
    public function __construct() {
    }
    
    /**
    * Responds to requests to GET /the-river-crossing-puzzle
    */
    public function getIndex() {
    	
        return view("river.index");
    }
    
   /**
    * Responds to requests to POST /the-river-crossing-puzzle
    */
    public function postIndex(Request $request) {
    	
    	// if user not logged in, do not store data
    	if (!Auth::check()) {
    		return;
    	}
 		
 		// array to save data in
 		$data = [];
		
		// put all request data in array
 		foreach ($request->all() as $key => $value) {
 			$data[$key] = $value;
 		}
 		
 		// remove "T" from start and end times
 		$start_time = str_replace("T", " ", $data["start_time"]);
 		$end_time = str_replace("T", " ", $data["end_time"]);
 		
 		// remove last 5 characters from start and end time strings (milliseconds)
 		$start_time = substr($start_time, 0, 19);
 		$end_time = substr($end_time, 0, 19);
 		
 		// find total time spent on game in minutes
 		$datetime1 = strtotime($start_time);
		$datetime2 = strtotime($end_time);
		$difference = abs($datetime2 - $datetime1);
		$total_time = round($difference / 60, 2);
		
		// get puzzle id
		$puzzle = \App\Puzzle::where("title", "=", "The River Crossing Puzzle")->first();
		$puzzle_id = $puzzle["id"];

		// get and set last attempt for this puzzle
		$last_attempt = \App\Gamesession::where("user_id", "=", \Auth::id())->max("attempt_num");
		$last_attempt++;
    	
    	// enter gamesession into database
    	$gamesession = new \App\Gamesession();
    	$gamesession->user_id = \Auth::id();
    	$gamesession->puzzle_id = $puzzle_id;
    	$gamesession->attempt_num = $last_attempt;
    	$gamesession->start_time = $start_time;
    	$gamesession->end_time = $end_time;
    	$gamesession->total_time = $total_time;
    	$gamesession->moves = $data["moves"];
    	$gamesession->save();
    	
    	// save data in gamesession_user
    	$user = array(\Auth::id());
    	$gamesession->users()->sync($user);
    }
}