<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class UsersController extends Controller {
	
  /**
	* Construct function
	*/
    public function __construct() {
    }
    
    /**
    * Responds to requests to GET /users/{$username}
    * 
    * @param $username user's username, allowed to be null
    */
    public function getIndex($username = null) {
    	
    	// if no username specified inform user that no user selected
    	if ($username == null) {
    		return view("users.index");
    	}
    	
    	// get user with given username
    	$user = \App\User::where("username", "=", $username)->first();
    	
        return view("users.index")->with("user", $user);
    }
}