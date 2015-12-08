<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class RiverCrossingController extends Controller {
	
  /**
	* Construct function
	*/
    public function __construct() {
    }
    
    /**
    * Responds to requests to GET /the-river-crossing-puzzle
    */
    public function getIndex() {
    	
        return view("river.index");
    }
}