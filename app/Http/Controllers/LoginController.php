<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /
    */
    public function getIndex() {
    	
    	return "Login controller -- by GET!";
        //return view("index.index");
    }
    
   /**
    * Responds to requests to POST /
    */
    public function postIndex() {
    	
    	return "Login controller -- by POST!";
        //return view("index.index");
    }
}