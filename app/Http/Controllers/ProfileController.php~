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
    	
    	// get current user
    	$user = Auth::user();
    	
        // validate the request data
    	$this->validate($request, 
    		["username" => "required|max:20",
    		 "name" => "required|max:255",
    		 "password" => "min:6",
    		 "email" => "unique:users,email,".$user->id
    		]);
    							
    	// check if password fields match
    	
    	// update fields
    	$user->username = $request->username;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->city = $request->city;
    	$user->state = $request->state;
    	$user->country = $request->country;
    	$user->bio = $request->bio;
    	
    	/* 
    	I had to check this manually and not via Laravel validation 
    	bc I wanted the user to leave either/both blank 
    	if they wanted to leave their password as is
    	*/
    	// only update password if user filled in matching passwords
		if (strlen($request->password) < 6 || !($request->password === $request->password_confirmation)) {
			\Session::flash('flash_message', 'Profile fields updated. Password not changed.');
		} else {
    		\Session::flash('flash_message', 'Profile updated, including password.');
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