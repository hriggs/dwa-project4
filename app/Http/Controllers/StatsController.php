<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
//use DB;

class StatsController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /stats
    *
    * @param $request request object
    */
    public function getIndex(Request $request) {
    	
    	// get the current user 
    	$user = Auth::user();
    	
    	// get user's default stats
    	$stats = \App\Gamesession::with("puzzle")->orderBy("id", "ASC")->where("user_id", "=", $user->id)->where("puzzle_id", "=", 1)->get();
    	
    	// get all gamesessions for this user
    	$gamesessions = \App\Gamesession::with("puzzle")->where("user_id", "=", $user->id)->get();
    	
    	// store at a glance stats	
    	$glance_stats = array(
    		"puzzles_solved" => count($gamesessions),
    		"min_time" => $gamesessions->min("total_time"),   
			"min_moves" => $gamesessions->min("moves"),
    	); 

    	// get list of created puzzles
		$puzzles = \App\Puzzle::where("created", "=", "1")->get();
    	
        return view("stats.index")->with(['stats'=>$stats, 
        								  'user'=>$user,
        								  'puzzle_titles'=>$this->returnTitles($puzzles),
        								  'data'=>$this->returnDropdownData($request),
        								  'glance_stats'=>$glance_stats,
        								  'delete_data'=>$this->returnDeleteData($request)]);
    }
    
   /**
    * Responds to requests to POST /stats
    *
    * @param $request request object
    */
    public function postIndex(Request $request) {
    	
	   	// get the current user 
		$user = Auth::user();
		
		// get list of created puzzles
		$puzzles = \App\Puzzle::where("created", "=", "1")->get();
    	
    	// either sort or delete the data
    	if ($request->input("sort")) {
    		
    		// get all gamesessions for this user
	    	$gamesessions = \App\Gamesession::with("puzzle")->where("user_id", "=", $user->id)->get();
			
			// store at a glance stats	
	    	$glance_stats = array(
	    		"puzzles_solved" => count($gamesessions),
	    		"min_time" => $gamesessions->min("total_time"),   
				"min_moves" => $gamesessions->min("moves"),
	    	); 
    		
	    	// store form data
	    	$puzzle_title = $request->puzzle;
	    	$sort_criteria = $request->criteria; 
			
			// get selected puzzle and its id
			$puzzle = $puzzles->where("title", $puzzle_title)->first();
			$puzzle_id = $puzzle["id"];
			
			$stats; 

    		// sort based on form specifications
    		if ($request->criteria == "first") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("id", "ASC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    		} elseif ($request->criteria == "last") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("id", "DESC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    		} elseif ($request->criteria == "fast") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("total_time", "ASC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    		} elseif ($request->criteria == "slow") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("total_time", "DESC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    		} elseif ($request->criteria == "least") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("moves", "ASC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    		} elseif ($request->criteria == "most") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("moves", "DESC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    		}
    		
			return view("stats.index")->with(['stats'=>$stats, 
											  'user'=>$user,
											  'puzzle_titles'=>$this->returnTitles($puzzles),
											  'data'=>$this->returnDropdownData($request),
											  'glance_stats' => $glance_stats,
        								  	  'delete_data'=>$this->returnDeleteData($request)]);
    		
    	} else if ($request->input("delete")) {
    		
    		// store form data
	    	$puzzle_title = $request->delete_stats;
	    	
	    	// get selected puzzle and its id
			$puzzle = $puzzles->where("title", $puzzle_title)->first();
			$puzzle_id = $puzzle["id"];
	    	
    		// delete stats from pivot table
    		$user->gamesessions()->where("puzzle_id", "=", $puzzle_id)->detach();

			// get stats from gamesessions table
			$stats = \App\Gamesession::where("user_id", "=", $user->id)->where("puzzle_id", "=", $puzzle_id)->get();
			
			// delete stats from gamesessions table
			foreach($stats as $stat) {
    			$stat->delete();
			}
			
			// get all gamesessions for this user
	    	$gamesessions = \App\Gamesession::with("puzzle")->where("user_id", "=", $user->id)->get();
			
			// store at a glance stats	
	    	$glance_stats = array(
	    		"puzzles_solved" => count($gamesessions),
	    		"min_time" => $gamesessions->min("total_time"),   
				"min_moves" => $gamesessions->min("moves"),
	    	); 
        								  	 
			return view("stats.index")->with(['user'=>$user,
											  'puzzle_titles'=>$this->returnTitles($puzzles),
											  'data'=>$this->returnDropdownData($request),
											  'glance_stats' => $glance_stats,
        								  	  'delete_data'=>$this->returnDeleteData($request),
        								  	  'delete_message'=>"Your stats for " . $puzzle["title"] . " were deleted."]);
    	}
    }
    
   /**
    * Return array of puzzle titles
    *
    * @param $puzzles collection of puzzles
    */
    public function returnTitles($puzzles) {
    	
    	$puzzle_titles = [];
    	
    	// store puzzle titles in array
    	foreach($puzzles as $puzzle) {
    		$puzzle_titles[] = $puzzle->title;
    	}
    	
    	return $puzzle_titles;
    }
    
   /**
    * Return an array which shows which dropdown values were selected
    * 
    *  @param $request request object
    */
    public function returnDropdownData(Request $request) {
    	
    	$data = [];
    	
    	// dropdown values	
    	$puzzles = array("The River Crossing Puzzle", "The Endangered Miners");
    	$criteria = array("first", "last", "fast", "slow", "least", "most");		  
    	
    	// for every puzzle value, save as selected if selected
    	for ($i = 0; $i < count($puzzles); $i++) {
    		$request->input("puzzle") === $puzzles[$i] ? ($data[$puzzles[$i]] = "selected") : ($data[$puzzles[$i]] = "");
    	}
    	
    	// for every criteria value, save as selected if selected 
    	for ($i = 0; $i < count($criteria); $i++) {
    		$request->input("criteria") === $criteria[$i] ? ($data[$criteria[$i]] = "selected") : ($data[$criteria[$i]] = "");
    	}
    	
    	return $data;
    }
    
   /**
    * Return an array which shows which delete dropdown values were selected
    * 
    *  @param $request request object
    */
    public function returnDeleteData(Request $request) {
    	
    	$delete_data = [];
    	
    	// dropdown values	
    	$puzzles = array("The River Crossing Puzzle", "The Endangered Miners");
    	
    	// for every puzzle value, save as selected if selected
    	for ($i = 0; $i < count($puzzles); $i++) {
    		$request->input("delete_stats") === $puzzles[$i] ? ($delete_data[$puzzles[$i]] = "selected") : ($delete_data[$puzzles[$i]] = "");
    	}
    	
    	return $delete_data;
    }
}