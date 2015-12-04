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
    	
    	// get all scores
    	
        return view("scores.index");
    }
    
   /**
    * Responds to requests to POST /high-scores
    */
    public function postIndex() {
    	
    	return "Profile controller -- by POST!";
        //return view("index.index");
    }
}