<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class JoinController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /
    */
    public function getIndex() {

        return view("join.index");
    }
    
   /**
    * Responds to requests to POST /
    */
    public function postIndex() {
    	
    	return "Join controller -- by POST!";
        //return view("index.index");
    }
}