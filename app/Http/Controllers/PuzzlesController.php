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
    * Responds to requests to GET /puzzles
    */
    public function getIndex() {
    	
    	// get created puzzles
    	$created_puzzles = \App\Puzzle::orderBy("id", "ASC")->where("created", 1)->get();
    	
    	// get puzzles not created
    	$not_created_puzzles = \App\Puzzle::orderBy("id", "ASC")->where("created", 0)->get();
    	
        return view("puzzles.index")->with(["created_puzzles"=>$created_puzzles, "not_created_puzzles"=>$not_created_puzzles]);
    }
    
   /**
    * Responds to requests to POST /puzzles
    * NEEDED??
    */
    public function postIndex() {
    	
    	return "Puzzles controller -- by POST!";
        //return view("index.index");
    }
}