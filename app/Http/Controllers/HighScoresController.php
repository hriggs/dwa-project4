<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HighScoresController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /high-scores
    */
    public function getIndex() {
    	
    	// get default high scores: fastest time for first puzzle
    	$gamesessions = \App\Gamesession::with("puzzle")->orderBy("total_time", "ASC")->where("puzzle_id", "=", 1)->take(20)->get();
    	
    	// store table headers
    	$headers = ["Time", "Moves"]; 
    	
    	// get list of created puzzles
		$puzzles = \App\Puzzle::where("created", "=", "1")->get();
    	
    	// beginning rank must be 0 for index reasons in view
    	$ranking = 0;
    	
        return view("scores.index")->with(["gamesessions"=>$gamesessions, 
        								   "ranking"=>$ranking, 
        								   "usernames"=>$this->returnUsernames($gamesessions),
        								   "puzzle_titles"=>$this->returnTitles($puzzles),
        								   "headers"=>$headers]);
    }
    
   /**
    * Responds to requests to POST /high-scores
    */
    public function postIndex(Request $request) {
    	
    	// store form data
    	$puzzle_title = $request->puzzle;
    	$sort_criteria = $request->criteria; 
    	
    	// get list of created puzzles
		$puzzles = \App\Puzzle::where("created", "=", "1")->get();
		
		// get selected puzzle and its id
		$puzzle = $puzzles->where("title", $puzzle_title)->first();
		$puzzle_id = $puzzle["id"];
		
    	// get high scores based on form data
    	$gamesessions = \App\Gamesession::with("puzzle")->orderBy($sort_criteria, "ASC")->where("puzzle_id", "=", $puzzle_id)->take(20)->get();
    	
    	$headers = [];
    	
    	// set up table headers based on form data
    	if ($sort_criteria == "total_time") { 
    		$headers = ["Time", "Moves"];
    	} else {
    		$headers = ["Moves", "Time"];
    	}
    	
    	// beginning rank must be 0 for index reasons in view
    	$ranking = 0;
    	
    	//return "Profile controller -- by POST!";
        return view("scores.index")->with(["gamesessions"=>$gamesessions, 
        								   "ranking"=>$ranking, 
        								   "usernames"=>$this->returnUsernames($gamesessions),
        								   "puzzle_titles"=>$this->returnTitles($puzzles),
     									   "headers"=>$headers]);
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
    
   /**
    * Return array of usernames associated with given gamesessions
    */
    public function returnUsernames($gamesessions) {
    	
    	// get list of gamesession user ids
    	$ids = $gamesessions->lists("user_id");
    	$k = 0; 
    	
    	// users
    	$usernames = [];
    	$users = \App\User::all(); 
    	
    	// for every gamesession
    	for ($i = 1; $i < count($gamesessions) + 1; $i++) {
    		
			// find user associated with gamesession    		
    		$user = $users->where("id", $ids[$k])->first();
    		$k++;
    		
    		// add username to list
    		$usernames[$i] = $user["username"];
    	}
    	
    	return $usernames; 
    }
}