<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoinController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /join
    */
    public function getIndex() {

        return view("join.index");
    }
    
   /**
    * Responds to requests to POST /join
    */
    public function postIndex(Request $request) {
    	
    	// log in form
    	if ($request->input("log_in")) {
    		
    		// validate the request data
    		$this->validate($request, 
    							["username" => "required|alpha_num|min:1|max:10",
    							 "password" => "required|min:5|max:20",
    							]
    						);
    						
			// check if information in database
			
			// log user in
			
			return redirect('/profile');    		
    	}
    	
    	// join form
   		if ($request->input("join")) {
   			
   			// custom error messages
    		$messages = [
    			'required' => 'Field is required',
    			'numeric' => 'Field must only contain a number',
    			'min' => 'Field input must be between 1 and 9',
    			'max' => 'Field input must be between 1 and 9'
			];
    		
    		// validate the request data
    		$this->validate($request, 
    							["username" => "required|alpha_num|min:1|max:10",
    							 "password" => "required|min:5|max:20",
    							]
    						);
   			
   			
    		return "Join YAY controller -- by POST!";
    	}
    }
}