<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class ProfileController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /profile
    */
    public function getIndex() {
    	
        return view("profile.index");
    }
    
   /**
    * Responds to requests to POST /profile
    */
    public function postIndex() {
    	
    	return "Profile controller -- by POST!";
        //return view("index.index");
    }
}