<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class PuzzlesController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /
    */
    public function getIndex() {
    	
        return view("puzzles.index");
    }
    
   /**
    * Responds to requests to POST /
    */
    public function postIndex() {
    	
    	return "Puzzles controller -- by POST!";
        //return view("index.index");
    }
}