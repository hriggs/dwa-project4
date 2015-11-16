<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

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
    	
        return view("stats.index");
    }
    
   /**
    * Responds to requests to POST /stats
    */
    public function postIndex() {
    	
    	return "Profile controller -- by POST!";
        //return view("index.index");
    }
}