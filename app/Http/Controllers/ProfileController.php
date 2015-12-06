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
    public function getIndex() {
    	
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
    		["username" => "required|max:20|unique:users,username,".$user->id,
    		 "name" => "required|max:255",
    		 "email" => "required|email|max:255|unique:users,email,".$user->id,
    		 "city" => "alpha|max:255",
    		 "country" => "alpha|max:255"
    		]);
    	
    	// update fields
    	$user->username = $request->username;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->city = $request->city;
    	$user->state = $request->state;
    	$user->country = $request->country;
    	$user->bio = $request->bio;
    	$user->save();
    	
    	\Session::flash('flash_message', 'Profile updated.');
    	return redirect('/profile')->with(['user'=>$user,'states'=>$this->getStates()]);
    }
    
   /**
    * Returns an array of states. 
    */
    public function getStates() {
    	return file(storage_path() . "/app/text/states.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }
}