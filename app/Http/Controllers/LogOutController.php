<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class LogOutController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /
    */
    public function getIndex() {
    	
        return view("logout.index");
    }
    
   /**
    * Responds to requests to POST /
    */
    public function postIndex() {
    	
    	return "Profile controller -- by POST!";
        //return view("index.index");
    }
}