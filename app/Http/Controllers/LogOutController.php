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
    * Responds to requests to GET /log-out
    */
    public function getIndex() {
    	
    	// log user out via database
    	
    	\Session::flash('flash_message','You are now logged out.');
    	
    	return redirect("/");
    }
}