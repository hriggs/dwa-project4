<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /profile
    */
    public function getIndex(Request $request) {
    	
    	// get the current user 
    	$user = Auth::user();
    	
        return view("profile.index")->with(['user'=>$user,'states'=>$this->getStates()]);
    }
    
   /**
    * Responds to requests to POST /profile
    */
    public function postIndex(Request $request) {
    	
    	// validate input here
    	// check if password fields match
    	
    	// get current user
    	$user = Auth::user();
    	
    	echo "db: " . $user->state;
    	
    	echo $request->state;
    	
    	// update fields
    	$user->username = $request->username;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->city = $request->city;
    	$user->state = $request->state;
    	$user->country = $request->country;
    	$user->bio = $request->bio;
    	
    	// only update password if user filled in passwords
    	if (strlen($request->password) != 0) { 
    		$user->password = \Hash::make($request->password);
    	}
    	
    	// save in database
    	$user->save();
    	
        return view("profile.index")->with(['user'=>$user,'states'=>$this->getStates()]);
    }
    
   /**
    *
    */
    public function getStates() {
    	return file(storage_path() . "/app/text/states.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }
}