<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Auth;

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
    	//dump($stats);
    	
        return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    }
    
   /**
    * Responds to requests to POST /stats
    */
    public function postIndex() {
    	
    	return "Profile controller -- by POST!";
        //return view("index.index");
    }
}