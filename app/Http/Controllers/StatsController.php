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
    */
    public function getIndex() {
    	
    	// get the current user 
    	$user = Auth::user();
    	
    	// get user's stats
    	$stats = \App\Gamesession::with("puzzle")->orderBy("id", "ASC")->where("user_id", "=", $user->id)->get();
    	
    	// get default user stats: fastest time for first puzzle
    	$gamesessions = \App\Gamesession::with("puzzle")->orderBy("id", "ASC")->where("user_id", "=", $user->id)->get();
    	
    	// get list of created puzzles
		$puzzles = \App\Puzzle::where("created", "=", "1")->get();
    	
        return view("stats.index")->with(['stats'=>$stats, 
        								  'user'=>$user,
        								  'puzzle_titles'=>$this->returnTitles($puzzles)]);
    }
    
   /**
    * Responds to requests to POST /stats
    */
    public function postIndex(Request $request) {
    	
	   	// get the current user 
		$user = Auth::user();
		
		// store form data
    	$puzzle_title = $request->puzzle;
    	$sort_criteria = $request->criteria; 
    	
    	//echo $puzzle_title . " " . $sort_criteria;
    	
    	// either sort or delete the data
    	if ($request->input("sort")) {
    		
			// get list of created puzzles
			$puzzles = \App\Puzzle::where("created", "=", "1")->get();
			
			// get selected puzzle and its id
			$puzzle = $puzzles->where("title", $puzzle_title)->first();
			
			$puzzle_id = $puzzle["id"];

    		// sort based on form specifications
    		if ($request->criteria == "first") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("id", "ASC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user,'puzzle_titles'=>$this->returnTitles($puzzles)]);
    		} elseif ($request->criteria == "last") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("id", "DESC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user,'puzzle_titles'=>$this->returnTitles($puzzles)]);
    		} elseif ($request->criteria == "fast") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("total_time", "ASC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user,'puzzle_titles'=>$this->returnTitles($puzzles)]);
    		} elseif ($request->criteria == "slow") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("total_time", "DESC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user,'puzzle_titles'=>$this->returnTitles($puzzles)]);
    		} elseif ($request->criteria == "least") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("moves", "ASC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user,'puzzle_titles'=>$this->returnTitles($puzzles)]);
    		} elseif ($request->criteria == "most") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("moves", "DESC")->where("puzzle_id", "=", $puzzle_id)->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user,'puzzle_titles'=>$this->returnTitles($puzzles)]);
    		}
    	} else if ($request->input("delete")) {
    		
    		// delete stats from pivot table
    		$user->gamesessions()->detach();

			// get stats from gamesessions table
			$stats = \App\Gamesession::where("user_id", "=", $user->id)->get();
			
			// delete stats from gamesessions table
			foreach($stats as $stat) {
    			$stat->delete();
			}
    		
    		\Session::flash('flash_message','Your stats were deleted.');
    		return redirect('/stats')->with('user', $user);
    	}
    }
    
   /**
    * Return array of puzzle titles
    */
    public function returnTitles($puzzles) {
    	
    	$puzzle_titles = [];
    	
    	// store puzzle titles in array
    	foreach($puzzles as $puzzle) {
    		$puzzle_titles[] = $puzzle->title;
    	}
    	
    	return $puzzle_titles;
    }
}