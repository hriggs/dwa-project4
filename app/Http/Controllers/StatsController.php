<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StatsController extends Controller {
	
   /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /stats
    */
    public function getIndex() {
    	
    	// get the current user 
    	$user = Auth::user();
    	
    	// get user's stats
    	$stats = \App\Gamesession::with("puzzle")->orderBy("id", "ASC")->where("user_id", "=", $user->id)->get();
    	
        return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    }
    
   /**
    * Responds to requests to POST /stats
    */
    public function postIndex(Request $request) {
    	
	   	// get the current user 
		$user = Auth::user();
    	
    	// either sort or delete the data
    	if ($request->input("sort")) {
    		
    		// if stats do not exist yet
    		if (\App\Gamesession::where("user_id", "=", $user->id)->count() == 0) {
    			\Session::flash('flash_message','No stats to sort. Go play some games!');
    			return redirect('/stats')->with('user', $user);
    		}
    		
    		// sort based on form specifications
    		if ($request->stats == "first") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("id", "ASC")->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    		} elseif ($request->stats == "last") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("id", "DESC")->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    		} elseif ($request->stats == "fast") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("total_time", "ASC")->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    		} elseif ($request->stats == "slow") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("total_time", "DESC")->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    		} elseif ($request->stats == "least") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("moves", "ASC")->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    		} elseif ($request->stats == "most") {
    			$stats = \App\Gamesession::with("puzzle")->orderBy("moves", "DESC")->where("user_id", "=", $user->id)->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    		} elseif ($request->stats == "puzzle") {
    			// ONLY RETURNING ONE ROW-- TO FIX
    			$stats = \App\Gamesession::with("puzzle")->where("user_id", "=", $user->id)->GroupBy("puzzle_id")->get();
    			return view("stats.index")->with(['stats'=>$stats, 'user'=>$user]);
    		}
    	} else if ($request->input("delete")) {
    		
    		// delete stats
    		$stats = \App\Gamesession::where("user_id", "=", $user->id)->get();
    		
    		foreach($stats as $stat) {
    			$stat->delete();
			}
    		
    		\Session::flash('flash_message','Your stats were deleted.');
    		return redirect('/stats')->with('user', $user);
    	}
    }
}