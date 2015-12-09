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
    	
    	$links = [];
    	
    	// make created puzzle links
    	foreach($created_puzzles as $puzzle) {
			
			// links are lowercase
			$link = strtolower($puzzle->title);		
			
			// links have dashes instead of spaces between words
    		$links[$puzzle->title] = str_replace(" ", "-", $link);
    	}
    	
        return view("puzzles.index")->with(["created_puzzles"=>$created_puzzles, 
        									"not_created_puzzles"=>$not_created_puzzles,
        									"links"=>$links]);
    }
}