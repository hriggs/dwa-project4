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
    	
    	//dump($gamesessions);
    	
    	// array to hold usernames
    	$usernames = [];
    	
    	$users = \App\User::all(); 
    	
    	// get list of gamesession user ids
    	$ids = $gamesessions->lists("user_id");
    	
    	$k = 0; 
    	
    	
    	// for every gamesession
    	for ($i = 1; $i < count($gamesessions) + 1; $i++) {
    		
    		echo "In contorller: " . $i;
    		
    		$user = $users->where("id", $ids[$k])->first();
    		$k++;
    		
    		$usernames[$i] = $user["username"];
    	}
    	
    	$ranking = 0;
    	
        return view("scores.index")->with(["gamesessions"=>$gamesessions, "ranking"=>$ranking, "usernames"=>$usernames]);
    }
    
   /**
    * Responds to requests to POST /high-scores
    */
    public function postIndex() {
    	
    	return "Profile controller -- by POST!";
        //return view("index.index");
    }
}