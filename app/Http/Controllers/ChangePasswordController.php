<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ChangePasswordController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /change-password
    */
    public function getIndex() {
    	
        return view("password.index");
    }
    
   /**
    * Responds to requests to POST /change-password
    */
    public function postIndex(Request $request) {
    	
    	// validate the request data
    	$this->validate($request, 
    		['password' => 'required|confirmed|min:6|max:60']);
    		
    	// get current user
    	$user = Auth::user();
    	
    	// update password
    	$user->password = \Hash::make($request->password);
    	$user->save();
    	
    	\Session::flash('flash_message', 'Password has been changed.');
    	return view("password.index");
    }
}