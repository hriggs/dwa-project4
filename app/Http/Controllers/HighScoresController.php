<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

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
    	
    	// get list of created puzzles
		$puzzles = \App\Puzzle::where("created", "=", "1")->get();
    	
    	// store created puzzle titles in array
    	$puzzle_titles = [];
    	foreach($puzzles as $puzzle) {
    		$puzzle_titles[] = $puzzle->title;
    	}

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
    	
    	// beginning rank must be 0 for index reasons in view
    	$ranking = 0;
    	
        return view("scores.index")->with(["gamesessions"=>$gamesessions, 
        								   "ranking"=>$ranking, 
        								   "usernames"=>$usernames,
        								   "puzzle_titles"=>$puzzle_titles]);
    }
    
   /**
    * Responds to requests to POST /high-scores
    */
    public function postIndex() {
    	
    	return "Profile controller -- by POST!";
        //return view("index.index");
    }
}