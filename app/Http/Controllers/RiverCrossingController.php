<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    
   /**
    * Responds to requests to POST /the-river-crossing-puzzle
    */
    public function postIndex(Request $request) {
 		
 		// array to save data in
 		$data = [];
		
		// put all request data in array
 		foreach ($request->all() as $key => $value) {
 			$data[$key] = $value;
 		}
 		
 		dump($request->all());
 		
 		//echo $data["test1"];
    	
        return "POST!";
    }
}